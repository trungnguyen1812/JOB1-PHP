<?php
include_once "../../../lib/session.php";
session_start();
include_once "../../../controller/donhang.php";
$donhang = new DonHang();
$donhang_0 = $donhang->getAllByStatus(0);
$donhang_1 = $donhang->getAllByStatus(1);
$donhang_2 = $donhang->getAllByStatus(2);
$donhang_3 = $donhang->getAllByStatus(3);
$donhang_4 = $donhang->getAllByStatus(4);

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $donhang = new DonHang();
    $donhang->update($_POST['id'], $_POST['trangthai']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
    <title>
        Teddy Shop
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="../../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
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

<body class="g-sidenav-show  bg-gray-100">
    <?php
    include "../../layouts/sidebar.php";
    ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Trang</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Đơn Hàng</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Đơn Hàng</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                    </div>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 d-flex justify-content-between">
                            <h6>Danh sách đơn hàng</h6>
                            <!-- <a class="btn btn-primary" href="create.php">Thêm Mới</a> -->
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="p-3">
                                <!-- Tab links -->
                                <div class="tab">
                                    <button id="tab0" class="tablinks" onclick="openCity(event, 'status_0')">Chờ xác
                                        nhận</button>
                                    <button class="tablinks" onclick="openCity(event, 'status_1')">Đã Xác Nhận</button>
                                    <button class="tablinks" onclick="openCity(event, 'status_2')">Đang Vận
                                        Chuyển</button>
                                    <button class="tablinks" onclick="openCity(event, 'status_3')">Đã Vận
                                        Chuyển</button>
                                    <button class="tablinks" onclick="openCity(event, 'status_4')">Bị Huỷ</button>
                                </div>

                                <!-- Tab content -->
                                <div id="status_0" class="tabcontent pt-3">
                                    <h3>Các đơn hàng chờ xác nhận</h3>

                                    <?php
                                    if (!$donhang_0) {
                                        echo "Chưa có đơn hàng chờ xác nhận!";
                                    } else {
                                    ?>
                                        <table class="table table-hover pt-5 w-100">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Mã đơn hàng</th>
                                                    <th class="text-center">Tên Người Đặt</th>
                                                    <th class="text-center">Địa chỉ</th>
                                                    <th class="text-center">SĐT</th>
                                                    <th class="text-center">Ngày Đặt</th>
                                                    <th class="text-center">Tổng tiền</th>
                                                    <th class="text-center">Xác Nhận</th>
                                                    <th class="text-center">Huỷ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($donhang_0 as $key => $value) {
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
                                                        <td class="text-center" style="color: green;">
                                                            <span class="text-center text-xs font-weight-bold">
                                                                <?= number_format($value['TongGia'], 0, ',', '.') ?>VND
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <form action="index.php" method="post">
                                                                <input type="hidden" name="id"
                                                                    value="<?= $value['IDDonHang'] ?>">
                                                                <input type="hidden" name="trangthai" value="1">
                                                                <input class="btn btn-primary" type="submit" value="Xác nhận">
                                                            </form>
                                                        </td>
                                                        <td class="text-center">
                                                            <form action="index.php" method="post">
                                                                <input type="hidden" name="id"
                                                                    value="<?= $value['IDDonHang'] ?>">
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
                                    <h3>Các đơn hàng đã xác nhận</h3>

                                    <?php
                                    if (!$donhang_1) {
                                        echo "Chưa có đơn hàng đã xác nhận!";
                                    } else {
                                    ?>
                                        <table class="table table-hover pt-5 w-100 w-100">
                                            <thead>
                                                <th class="text-center">Mã đơn hàng</th>
                                                <th class="text-center">Tên Người Đặt</th>
                                                <th class="text-center">Địa chỉ</th>
                                                <th class="text-center">SĐT</th>
                                                <th class="text-center">Ngày Đặt</th>
                                                <th class="text-center">Tổng tiền</th>
                                                <th class="text-center">Vận Chuyển</th>
                                                <th class="text-center">Huỷ</th>
                                            </thead>
                                            <tbody>
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
                                                        <td class="text-center" style="color: green;">
                                                            <span class="text-center text-xs font-weight-bold">
                                                                <?= number_format($value['TongGia'], 0, ',', '.') ?>VND
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <form action="index.php" method="post">
                                                                <input type="hidden" name="id"
                                                                    value="<?= $value['IDDonHang'] ?>">
                                                                <input type="hidden" name="trangthai" value="2">
                                                                <input class="btn btn-primary" type="submit" value="Vận chuyển">
                                                            </form>
                                                        </td>
                                                        <td class="text-center">
                                                            <form action="index.php" method="post">
                                                                <input type="hidden" name="id"
                                                                    value="<?= $value['IDDonHang'] ?>">
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
                                    <h3>Các đơn hàng đang vận chuyển</h3>

                                    <?php
                                    if (!$donhang_2) {
                                        echo "Chưa có đơn hàng đang vận chuyển!";
                                    } else {
                                    ?>
                                        <table class="table table-hover pt-5 w-100 w-100">
                                            <thead>
                                                <th class="text-center">Mã đơn hàng</th>
                                                <th class="text-center">Tên Người Đặt</th>
                                                <th class="text-center">Địa chỉ</th>
                                                <th class="text-center">SĐT</th>
                                                <th class="text-center">Ngày Đặt</th>
                                                <th class="text-center">Tổng tiền</th>
                                                <th class="text-center">Hoàn Thành Vận Chuyển</th>
                                                <th class="text-center">Huỷ</th>
                                            </thead>
                                            <tbody>
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
                                                        <td class="text-center" style="color: green;">
                                                            <span class="text-center text-xs font-weight-bold">
                                                                <?= number_format($value['TongGia'], 0, ',', '.') ?>VND
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <form action="index.php" method="post">
                                                                <input type="hidden" name="id"
                                                                    value="<?= $value['IDDonHang'] ?>">
                                                                <input type="hidden" name="trangthai" value="3">
                                                                <input class="btn btn-primary" type="submit" value="Hoàn Thành">
                                                            </form>
                                                        </td>
                                                        <td class="text-center">
                                                            <form action="index.php" method="post">
                                                                <input type="hidden" name="id"
                                                                    value="<?= $value['IDDonHang'] ?>">
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

                                <div id="status_3" class="tabcontent pt-3">
                                    <h3>Các đơn đã vận chuyển</h3>

                                    <?php
                                    if (!$donhang_3) {
                                        echo "Chưa có đơn hàng đã vận chuyển!";
                                    } else {
                                    ?>
                                        <table class="table table-hover pt-5 w-100">
                                            <thead>
                                                <th class="text-center">Mã đơn hàng</th>
                                                <th class="text-center">Tên Người Đặt</th>
                                                <th class="text-center">Địa chỉ</th>
                                                <th class="text-center">SĐT</th>
                                                <th class="text-center">Ngày Đặt</th>
                                                <th class="text-center">Tổng tiền</th>
                                            </thead>
                                            <tbody>
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
                                                        <td class="text-center" style="color: green;">
                                                            <span class="text-center text-xs font-weight-bold">
                                                                <?= number_format($value['TongGia'], 0, ',', '.') ?>VND
                                                            </span>
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
                                    <h3>Các đơn đã bị huỷ</h3>

                                    <?php
                                    if (!$donhang_4) {
                                        echo "Chưa có đơn hàng bị huỷ!";
                                    } else {
                                    ?>
                                        <table class="table table-hover pt-5 w-100">
                                            <thead>
                                                <th class="text-center">Mã đơn hàng</th>
                                                <th class="text-center">Tên Người Đặt</th>
                                                <th class="text-center">Địa chỉ</th>
                                                <th class="text-center">SĐT</th>
                                                <th class="text-center">Ngày Đặt</th>
                                                <th class="text-center">Tổng tiền</th>
                                            </thead>
                                            <tbody>
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
                                                        <td class="text-center" style="color: red;">
                                                            <span class="text-center text-xs font-weight-bold">
                                                                <?= number_format($value['TongGia'], 0, ',', '.') ?>VND
                                                            </span>
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
            <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">

                        </div>
                        <div class="col-lg-6">

                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg ">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
                        onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3">
                    <h6 class="mb-0">Navbar Fixed</h6>
                </div>
                <div class="form-check form-switch ps-0">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                        onclick="navbarFixed(this)">
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn bg-gradient-dark w-100"
                    href="https://www.creative-tim.com/product/soft-ui-dashboard-pro">Free Download</a>
                <a class="btn btn-outline-dark w-100"
                    href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View
                    documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
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

    <!--   Core JS Files   -->
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>