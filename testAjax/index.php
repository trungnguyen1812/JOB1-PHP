<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Page Application Example</title>
    <style>
        nav button { margin: 5px; padding: 10px; }
    </style>
</head>
<body>
    <nav>
        <!-- Các nút điều hướng gọi hàm loadContent() để tải nội dung mới -->
        <button onclick="loadContent('home')">Home</button>
        <button onclick="loadContent('about')">About</button>
        <button onclick="loadContent('contact')">Contact</button>
    </nav>
    
    <!-- Phần nội dung chính sẽ được thay đổi bằng AJAX -->
    <div id="content">
        <h1>Welcome to Our Website!</h1>
        <p>This is the main landing page. Click on the buttons above to navigate.</p>
    </div>
    
    <script src="app.js"></script>
</body>
</html>
