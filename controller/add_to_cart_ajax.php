<?php
// Start session at the beginning
session_start();

// Turn off warnings temporarily while debugging
error_reporting(0);
ini_set('display_errors', 0);

// Fix the paths - adjust these based on your actual directory structure
// Use absolute paths with the project directory structure
include_once $filepath . '/../lib/session.php';
include_once $filepath . '/../lib/database.php';
include_once './giohang.php'; // Make sure this path is correct

// Make sure no output before JSON
ob_start();

// Create response array
$response = [
    'success' => false,
    'message' => '',
    'cartCount' => 0
];

try {
    // Check if user is logged in
    if (!isset($_SESSION['userId'])) {
        $response['message'] = 'Đăng nhập để thực hiện mua hàng.';
        ob_end_clean(); // Clear any output
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    // Check if it's a POST request and has the expected model value
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['model']) && $_POST['model'] == 'giohang') {
        // Create giohang object 
        $giohang = new Giohang();
        
        // Add to cart
        $result = $giohang->insertPageHome($_SESSION['userId'], $_POST['idsanpham']);
        
        // Set response
        $response['message'] = $result;
        
        // If successful, update the cart count
        if (strpos($result, 'thành công') !== false) {
            $response['success'] = true;
            
            // Get total cart items count - adjust query based on your database structure
            $db = new Database();
            $query = "SELECT SUM(SoLuong) as totalItems FROM GioHang WHERE IDKhachHang = " . $_SESSION['userId'];
            $result = $db->select($query);
            if ($result) {
                $row = $result->fetch_assoc();
                $response['cartCount'] = (int)$row['totalItems'];
            }
        }
    }
} catch (Exception $e) {
    $response['message'] = 'Có lỗi xảy ra: ' . $e->getMessage();
}

// Clear any output that might have been generated before
ob_end_clean();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
exit;