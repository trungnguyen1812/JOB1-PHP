
<?php
// index.php
session_start();

include 'layouts/header.php';

?>
<div id="main-content">
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        $file_path = "main/{$page}.php";
        if (file_exists($file_path)) {
            include $file_path;
        } else {
            echo "<p>Trang không tồn tại!</p>";
        }
    } else {
        include 'main/home.php'; // Trang mặc định
    }
    ?>
</div>
<?php include 'layouts/footer.php';?>
