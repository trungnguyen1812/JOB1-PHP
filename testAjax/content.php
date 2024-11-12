<?php
// Kiểm tra nếu có tham số page được truyền vào từ AJAX
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    // Trả về nội dung dựa vào giá trị của tham số page
    switch ($page) {
        case 'home':
            include 'home.php';
            break;
        case 'about':
            include 'about.php';
            break;
        case 'contact':
            include 'contact.php';
            break;
        default:
            echo "<h1>404 Not Found</h1><p>The page you are looking for does not exist.</p>";
            break;
    }
} else {
    echo "<h1>Welcome!</h1><p>Select a page from the navigation to begin.</p>";
}
?>
