<?php
include "../../../controller/donhang.php";
$donhang = new DonHang();
$donhang_0 = $donhang->getAllByStatus(0);
$donhang_1 = $donhang->getAllByStatus(1);
$donhang_2 = $donhang->getAllByStatus(2);
$donhang_3 = $donhang->getAllByStatus(3);
$donhang_4 = $donhang->getAllByStatus(4);

if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once '../../controller/donhang.php';
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
        Soft UI Dashboard by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
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
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div>
                    </div>
                    <!-- <ul class="navbar-nav  justify-content-end">
                       
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../../assets/img/small-logos/logo-spotify.svg"
                                                    class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)"
                                                            fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul> -->
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
                                                        <td class="text-center">
                                                            <?= $value['TongGia'] ?>
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
                                                        <td class="text-center">
                                                            <?= $value['TongGia'] ?>
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
                                                        <td class="text-center">
                                                            <?= $value['TongGia'] ?>
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
                                                        <td class="text-center">
                                                            <?= $value['TongGia'] ?>
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
                                                        <td class="text-center">
                                                            <?= $value['TongGia'] ?>
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
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                    Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                        target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                        target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://creative-tim.com/blog" class="nav-link text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                        target="_blank">License</a>
                                </li>
                            </ul>
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