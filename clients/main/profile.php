<?php
include_once '../layouts/header.php';
include_once '../../controller/khachhang.php';

$khachhang = new KhachHang();

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect only non-empty fields
    $updateData = ['IDKhachHang' => $_GET['id']];

    $fields = ['HoTen', 'Email', 'SDT', 'DiaChi', 'NamSinh'];
    foreach ($fields as $field) {
        if (isset($_POST[$field]) && trim($_POST[$field]) !== '') {
            $updateData[$field] = trim($_POST[$field]);
        }
    }

    $result = $khachhang->update($updateData);

    if ($result === true) {
        $_SESSION['success_message'] = "Cập nhật thông tin thành công!";
        header("Location: profile.php?id=" . $_GET['id']);
        exit();
    } else {
        $_SESSION['error_message'] = $result;
    }
}

// Check for ID in URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['error_message'] = "Không tìm thấy thông tin khách hàng.";
    header("Location: index.php");
    exit();
}

// Get customer information
$khachhangUpdate = $khachhang->getById($_GET['id']);
if (!$khachhangUpdate) {
    $_SESSION['error_message'] = "Không tìm thấy thông tin khách hàng với ID: " . htmlspecialchars($_GET['id']);
    header("Location: index.php");
    exit();
}

// Display messages if any
if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success_message']) . '</div>';
    unset($_SESSION['success_message']);
}
if (isset($_SESSION['error_message'])) {
    echo '<div class="alert alert-danger">' . htmlspecialchars($_SESSION['error_message']) . '</div>';
    unset($_SESSION['error_message']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .containerProfile {
            width: 80%;
            margin: 50px auto;
            display: flex;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .left-panel {
            flex: 1;
            background-color: #F9F3EC;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        .left-panel img {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ddd;
        }

        .left-panel button {
            margin-top: 20px;
            padding: 10px 15px;
            font-size: 1rem;
            background-color: #FFD700;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .left-panel button:hover {
            background-color: #FFC300;
        }

        .left-panel input[type="file"] {
            display: none;
        }

        .right-panel {
            flex: 2;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group input:disabled {
            background-color: #f4f4f4;
            color: #777;
        }

        .btn-container {
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #FFD700;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn:hover {
            background-color: #FFC300;
        }
    </style>
</head>

<body>
    <hr>
    <form action="profile.php?id=<?= htmlspecialchars($_GET['id']) ?>" method="POST" enctype="multipart/form-data">
        <div class="containerProfile">
            <!-- Left Panel -->
            <div class="left-panel">
                <img id="profileImg" src="/<?= $khachhangUpdate['HinhAnhKhachHang']?>" alt="Profile Picture">
                <button type="button" id="changeImageButton">Đổi hình ảnh</button>
                <input type="file" name="HinhAnhKhachHang" id="imageInput" accept="image/*">
            </div>

            <!-- Right Panel -->
            <div class="right-panel">
                <input type="hidden" name="IDSanPham" value="<?= $sanphamUpdate['IDSanPham'] ?>">

                <div class="form-group">
                    <label for="HoTen">Tên khách hàng</label>
                    <input type="text" id="HoTen" name="HoTen" value="<?= htmlspecialchars($khachhangUpdate['HoTen'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" id="Email" name="Email" value="<?= htmlspecialchars($khachhangUpdate['Email'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="SDT">Số điện thoại</label>
                    <input type="text" id="SDT" name="SDT" value="<?= htmlspecialchars($khachhangUpdate['SDT'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="DiaChi">Địa chỉ</label>
                    <input type="text" id="DiaChi" name="DiaChi" value="<?= htmlspecialchars($khachhangUpdate['DiaChi'] ?? '') ?>">
                </div>
              
                <div class="btn-container">
                    <button type="submit" class="btn">Chỉnh sửa</button>
                    <a href="../main/home.php" class="btn" style="background-color: #6c757d;">Hủy</a>
                </div>
            </div>
        </div>
    </form>
    <hr>
    <script>
        const changeImageButton = document.getElementById('changeImageButton');
        const imageInput = document.getElementById('imageInput');
        const profileImg = document.getElementById('profileImg');

        // Hiển thị file input khi nhấn nút
        changeImageButton.addEventListener('click', () => {
            imageInput.click();
        });

        // Đổi hình ảnh khi người dùng chọn ảnh mới
        imageInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profileImg.src = e.target.result; // Gán hình ảnh mới
                };
                reader.readAsDataURL(file); // Đọc file ảnh
            }
        });
    </script>
</body>

</html>

<?php include '../layouts/footer.php'; ?>