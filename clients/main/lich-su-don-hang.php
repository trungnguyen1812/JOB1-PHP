<?php
ob_start();
session_start();
include_once '../layouts/header.php';

include_once "../../controller/donhang.php";
$donhang = new DonHang();
$donhang_0 = $donhang->getByIDKhachHang($_SESSION['userId'], 0);
$donhang_1 = $donhang->getByIDKhachHang($_SESSION['userId'], 1);
$donhang_2 = $donhang->getByIDKhachHang($_SESSION['userId'], 2);
$donhang_3 = $donhang->getByIDKhachHang($_SESSION['userId'], 3);
$donhang_4 = $donhang->getByIDKhachHang($_SESSION['userId'], 4);

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $donhang = new DonHang();
    $donhang->update($_POST['id'], $_POST['trangthai']);
}

?>

<head>
    <style>
        body {
            font-family: Arial;
        }

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
</head>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mg-100" style="margin: 96px;">
                <div class="card-header pb-0 d-flex justify-content-between text-color-white">
                    <h6 style="color: white;">Các đơn hàng của bạn</h6>
                    <!-- <a class="btn btn-primary" href="create.php">Thêm Mới</a> -->
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-3" style="color: white;">
                        <!-- Tab links -->
                        <div class="tab">
                            <button id="tab0" class="tablinks" onclick="openCity(event, 'status_0')">Chờ xác
                                nhận</button>
                            <button class="tablinks" onclick="openCity(event, 'status_1')">Chờ vận chuyển</button>
                            <button class="tablinks" onclick="openCity(event, 'status_2')">Đang Vận
                                Chuyển</button>
                            <button class="tablinks" onclick="openCity(event, 'status_3')">Đã Giao</button>
                            <button class="tablinks" onclick="openCity(event, 'status_4')">Đã Huỷ</button>
                        </div>

                        <!-- Tab content -->
                        <div id="status_0" class="tabcontent pt-3">
                            <h3 style="color: white;">Các đơn hàng chờ xác nhận</h3>

                            <?php
                            if (!$donhang_0) {
                                echo "Chưa có đơn hàng chờ xác nhận!";
                            } else {
                                ?>
                                <table class="table table-hover pt-5 w-100" style="color: white;">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Mã đơn hàng</th>
                                            <th class="text-center">Tên Người Đặt</th>
                                            <th class="text-center">Địa chỉ</th>
                                            <th class="text-center">SĐT</th>
                                            <th class="text-center">Ngày Đặt</th>
                                            <th class="text-center">Tổng tiền</th>                                           
                                            <th class="text-center">Huỷ</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: white;">
                                        <?php
                                        foreach ($donhang_0 as $key => $value) {
                                            ?>
                                            <tr style="color: white;">
                                                <td class="text-center"><?= $value['IDDonHang'] ?></td>
                                                <td class="text-center" style="color: white;">
                                                    <?= $value['HoTen'] ?>
                                                </td>
                                                <td class="text-center" style="color: white;">
                                                    <?= $value['DiaChi'] ?>
                                                </td>
                                                <td class="text-center"style="color: white;">
                                                    <?= $value['SDT'] ?>
                                                </td>
                                                <td class="text-center"style="color: white;">
                                                    <?= $value['NgayTao'] ?>
                                                </td>
                                                <td class="text-center"style="color: white;">
                                                    <?=number_format($value['TongGia'],0) ?>VND
                                                </td>                                                
                                                <td class="text-center"style="color: white;">
                                                    <form action="lich-su-don-hang.php" method="post">
                                                        <input type="hidden" name="id" value="<?= $value['IDDonHang'] ?>">
                                                        <input type="hidden" name="trangthai" value="4">
                                                        <input class="btn btn-danger" type="submit" value="Huỷ">
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                            ?>
                        </div>

                        <div id="status_1" class="tabcontent pt-3">
                            <h3 style="color: white;">Các đơn hàng đã xác nhận</h3>

                            <?php
                            if (!$donhang_1) {
                                echo "Chưa có đơn hàng đã xác nhận!";
                            } else {
                                ?>
                                <table class="table table-hover pt-5 w-100 w-100">
                                    <thead style="color: white;">
                                        <th class="text-center">Mã đơn hàng</th>
                                        <th class="text-center">Tên Người Đặt</th>
                                        <th class="text-center">Địa chỉ</th>
                                        <th class="text-center">SĐT</th>
                                        <th class="text-center">Ngày Đặt</th>
                                        <th class="text-center">Tổng tiền</th>
                                        <th class="text-center">Huỷ</th>
                                    </thead>
                                    <tbody style="color: white;">
                                        <?php
                                        foreach ($donhang_1 as $key => $value) {
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $value['IDDonHang'] ?></td>
                                                <td class="text-center">
                                                    <?= $value['HoTen'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $value['DiaChi'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $value['SDT'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $value['NgayTao'] ?>
                                                </td>
                                                <td class="text-center">
                                                <?=number_format($value['TongGia'],0) ?>VND
                                                </td>
                                                <td class="text-center">
                                                    <form action="lich-su-don-hang.php" method="post">
                                                        <input type="hidden" name="id" value="<?= $value['IDDonHang'] ?>">
                                                        <input type="hidden" name="trangthai" value="4">
                                                        <input class="btn btn-danger" type="submit" value="Huỷ">
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                            ?>
                        </div>

                        <div id="status_2" class="tabcontent pt-3">
                            <h3 style="color: white;">Các đơn hàng đang vận chuyển</h3>

                            <?php
                            if (!$donhang_2) {
                                echo "Chưa có đơn hàng đang vận chuyển!";
                            } else {
                                ?>
                                <table class="table table-hover pt-5 w-100 w-100">
                                    <thead style="color: white;">
                                        <th class="text-center">Mã đơn hàng</th>
                                        <th class="text-center">Tên Người Đặt</th>
                                        <th class="text-center">Địa chỉ</th>
                                        <th class="text-center">SĐT</th>
                                        <th class="text-center">Ngày Đặt</th>
                                        <th class="text-center">Tổng tiền</th>
                                        <th class="text-center">Đã nhận được hàng?</th>
                                    </thead>
                                    <tbody style="color: white;">
                                        <?php
                                        foreach ($donhang_2 as $key => $value) {
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $value['IDDonHang'] ?></td>
                                                <td class="text-center">
                                                    <?= $value['HoTen'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $value['DiaChi'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $value['SDT'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $value['NgayTao'] ?>
                                                </td>
                                                <td class="text-center">
                                                <?=number_format($value['TongGia'],0) ?>VND
                                                </td>
                                                <td class="text-center">
                                                    <form action="lich-su-don-hang.php" method="post">
                                                        <input type="hidden" name="id" value="<?= $value['IDDonHang'] ?>">
                                                        <input type="hidden" name="trangthai" value="3">
                                                        <input class="btn btn-danger" type="submit" value="Đã nhận">
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                            ?>
                        </div>

                        <div id="status_3" class="tabcontent pt-3">
                            <h3 style="color: white;">Các đơn hàng nhận thành công</h3>

                            <?php
                            if (!$donhang_3) {
                                echo "Chưa có đơn hàng đã nhận!";
                            } else {
                                ?>
                                <table class="table table-hover pt-5 w-100">
                                    <thead style="color: white;">
                                        <th class="text-center">Mã đơn hàng</th>
                                        <th class="text-center">Tên Người Đặt</th>
                                        <th class="text-center">Địa chỉ</th>
                                        <th class="text-center">SĐT</th>
                                        <th class="text-center">Ngày Đặt</th>
                                        <th class="text-center">Tổng tiền</th>
                                    </thead>
                                    <tbody style="color: white;">
                                        <?php
                                        foreach ($donhang_3 as $key => $value) {
                                            ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= $value['IDDonHang'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $value['HoTen'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $value['DiaChi'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $value['SDT'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $value['NgayTao'] ?>
                                                </td>
                                                <td class="text-center">
                                                <?=number_format($value['TongGia'],0) ?>VND
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                            ?>
                        </div>

                        <div id="status_4" class="tabcontent pt-3">
                            <h3 style="color: white;">Các đơn đã bị huỷ</h3>

                            <?php
                            if (!$donhang_4) {
                                echo "Chưa có đơn hàng đã huỷ!";
                            } else {
                                ?>
                                <table class="table table-hover pt-5 w-100">
                                    <thead style="color: white;">
                                        <th class="text-center">Mã đơn hàng</th>
                                        <th class="text-center">Tên Người Đặt</th>
                                        <th class="text-center">Địa chỉ</th>
                                        <th class="text-center">SĐT</th>
                                        <th class="text-center">Ngày Đặt</th>
                                        <th class="text-center">Tổng tiền</th>
                                    </thead>
                                    <tbody style="color: white;">
                                        <?php
                                        foreach ($donhang_4 as $key => $value) {
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $value['IDDonHang'] ?></td>
                                                <td class="text-center">
                                                    <?= $value['HoTen'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $value['DiaChi'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $value['SDT'] ?>
                                                </td>
                                                <td class="text-center">
                                                    <?= $value['NgayTao'] ?>
                                                </td>
                                                <td class="text-center">
                                                <?=number_format($value['TongGia'],0) ?>VND
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    document.getElementById("tab0").click();
</script>

<?php
include_once '../layouts/footer.php';
?>