<?php
session_start();

include_once '../../controller/sanpham.php';

include_once '../layouts/header.php';

$sanpham = new  Sanpham();

$dssanpham = $sanpham->getAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once '../../controller/khachhang.php';
    $khachhang = new KhachHang();
    $result_register = $khachhang->register($_POST);
    echo "<script>alert('" . $result_register . "')</script>";
}
?>
<div id="main-content">
    
</div>
<?php include '../layouts/footer.php'; ?>