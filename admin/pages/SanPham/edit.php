<?php
include_once "../../../lib/session.php";
session_start();
include "../../../controller/sanpham.php";
$sanpham = new SanPham();
$loaisanpham  = $sanpham->getLoaiSanPham();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sanpham = new SanPham();
    $result = $sanpham->update($_POST);
}

$sanphamUpdate = mysqli_fetch_assoc($sanpham->getById($_GET['id']));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png">
    <title>Update Product - Soft UI Dashboard</title>
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
        /* Container chính của form */
        .form-container {
            display: flex;
            gap: 2rem;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Cột bên trái - chứa các input */
        .form-column {
            width: 50%;
            flex: 0 0 50%;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            float: left;
        }

        /* Cột bên phải - chứa upload và preview ảnh */
        .form-column-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        /* Style cho các label */
        .form-column label,
        .form-column-right label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #344767;
        }

        /* Style cho các input text, number, textarea */
        .form-column input[type="text"],
        .form-column input[type="number"],
        .form-column textarea,
        .form-column select {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #d2d6da;
            border-radius: 0.5rem;
            margin-bottom: 0.5rem;
        }

        /* Style cho input file */
        .form-column-right input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 2px dashed #d2d6da;
            border-radius: 0.5rem;
            cursor: pointer;
        }

        /* Style cho preview image */
        #image-preview {
            max-width: 100%;
            height: auto;
            margin-top: 1rem;
            border-radius: 0.5rem;
            display: none;
            /* Ẩn ban đầu, sẽ hiện khi có ảnh được chọn */
            box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.1);
        }

        /* Style cho nút submit */
        .submit-btn {
            margin-top: auto;
        }

        .submit-btn button {
            width: 100%;
            padding: 0.75rem;
            background-color: #82d616;
            color: white;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .submit-btn button:hover {
            background-color: #1a223f;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .form-container {
                flex-direction: column;
            }

            .form-column,
            .form-column-right {
                width: 100%;
            }
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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sửa sản phẩm</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Sửa sản phẩm</h6>
                </nav>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">

            <div class="card-header pb-0 d-flex justify-content-between">
                <h6>Chỉnh sửa thông tin sản phẩm</h6>
            </div>
            <hr>
            <div class="form-container">
            <form style="width: 100%;" action="edit.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="IDSanPham" value="<?= $sanphamUpdate['IDSanPham'] ?>">

    <!-- Cột bên trái: Các ô nhập văn bản -->
    <div class="form-column">
        <label for="TenSanPham">Tên Sản Phẩm</label>
        <input type="text" id="TenSanPham" name="TenSanPham" value="<?= $sanphamUpdate['TenSanPham'] ?>" required>

        <label for="Gia">Giá</label>
        <input type="number" id="Gia" name="Gia" value="<?= $sanphamUpdate['Gia'] ?>" required>

        <label for="SoLuong">Số Lượng</label>
        <input type="number" id="SoLuong" name="SoLuong" value="<?= $sanphamUpdate['SoLuong'] ?>" required>

        <label for="MoTa">Mô Tả</label>
        <textarea id="MoTa" name="MoTa" rows="4" required><?= $sanphamUpdate['MoTa'] ?></textarea>

        <label for="IDLoaiSanPham">Danh Mục Sản Phẩm</label>
        <select class="form-select" id="IDLoaiSanPham" name="IDLoaiSanPham" required>
            <?php foreach ($loaisanpham as $loaisanpham): ?>
                <option value="<?= $loaisanpham['IDLoaiSanPham'] ?>" <?= ($sanphamUpdate['IDLoaiSanPham'] == $loaisanpham['IDLoaiSanPham']) ? 'selected' : '' ?>>
                    <?= $loaisanpham['TenLoaiSanPham'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Cột bên phải: Tải lên hình ảnh và xem trước -->
    <div class="form-column-right">
        <label for="HinhAnh">Hình Ảnh Sản Phẩm</label>
        <input type="file" id="HinhAnh" name="HinhAnh" accept="image/*" onchange="previewImage(event)">

        <!-- Xem trước ảnh -->
        <img id="image-preview" src="/<?= $sanphamUpdate['HinhAnh'] ?>" alt="Xem trước ảnh" style="max-width: 500px; max-height: 370px; display: block; object-fit: contain;">

        <div class="submit-btn">
            <button type="submit">Lưu</button>
        </div>
    </div>

</form>

            </div>

            <script>
                function previewImage(event) {
                    const imagePreview = document.getElementById('image-preview');
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                            imagePreview.style.display = 'block'; // Hiện ảnh preview
                        }
                        reader.readAsDataURL(file);
                    } else {
                        imagePreview.style.display = 'none'; // Ẩn ảnh preview nếu không có ảnh nào được chọn
                    }
                }
            </script>



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
                    href="https://www.creative-tim.com/product/soft-ui-dashboard-pro">
                </a>
            </div>
        </div>
    </div>
</body>

</html>