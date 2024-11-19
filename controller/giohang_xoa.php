<?php
$id = $_POST['id'];
include_once "giohang.php";

$giohang = new GioHang();
$giohang->delete($id);

$previousPage = $_SERVER['HTTP_REFERER'];
// Chuyển hướng về trang trước
header("Location: $previousPage");
?>