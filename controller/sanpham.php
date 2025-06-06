<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/../lib/session.php';
include_once $filepath . '/../lib/database.php';
?>
<?php
class SanPham
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }


    //Lay toan bo san pham
    public function getAll()
    {
        $sql = "SELECT s.*, l.TenLoaiSanPham 
        FROM sanpham s 
        JOIN loaisanpham l 
        ON s.IDLoaiSanPham  = l.IDLoaiSanPham ";
        $result = $this->db->select($sql);
        return $result;
    }

    public function getLoaiSanPham()
    {
        $query =
            "SELECT * FROM loaisanpham";
        $result = $this->db->select($query);
        return $result;
    }


    //Lay thong tin san pham
    public function getByID($id)
    {
        $query =
            "SELECT * FROM sanpham WHERE IDSanPham = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    //show san pham

    public function insert($data)
    {
        $targetDir = __DIR__ . '/../imgUploads/';
        $uniqueFileName = '';
        $relativePath = '';
        $targetFile = '';  // Thêm biến này để lưu đường dẫn đầy đủ của file

        $idLoaiSanPham = intval($data['IDLoaiSanPham'] ?? 0);
        $tenSanPham = trim($data['TenSanPham'] ?? '');
        $gia = floatval($data['Gia'] ?? 0);
        $soLuong = intval($data['SoLuong'] ?? 0);
        $moTa = trim($data['MoTa'] ?? '');
        $percentSale = intval($data['PercentSale'] ?? 0);// khai báo biến % giảm 
        $hinhAnh = $_FILES['HinhAnh'] ?? null;
        $saleValue =  floatval($data['SaleValue'] ?? 0);// khai báo biến giá giảm 

        // Xử lý upload file hình ảnh
        if ($hinhAnh && $hinhAnh["error"] === UPLOAD_ERR_OK) {
            // Kiểm tra và tạo thư mục nếu chưa tồn tại
            if (!is_dir($targetDir)) {
                if (!mkdir($targetDir, 0755, true)) {
                    return "Không thể tạo thư mục upload!";
                }
            }

            // Kiểm tra định dạng file
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($hinhAnh['type'], $allowedTypes)) {
                return "Chỉ chấp nhận file ảnh định dạng JPG, PNG hoặc GIF!";
            }

            // Giới hạn kích thước file (5MB)
            $maxFileSize = 5 * 1024 * 1024;
            if ($hinhAnh["size"] > $maxFileSize) {
                return "Kích thước file ảnh không được vượt quá 5MB!";
            }

            // Tạo tên file ngẫu nhiên
            $fileExtension = strtolower(pathinfo($hinhAnh["name"], PATHINFO_EXTENSION));
            $uniqueFileName = uniqid() . '_' . time() . '.' . $fileExtension;
            $targetFile = $targetDir . $uniqueFileName;  // Lưu đường dẫn đầy đủ

            // Thử upload file
            if (!move_uploaded_file($hinhAnh["tmp_name"], $targetFile)) {
                return "Có lỗi xảy ra khi upload hình ảnh!";
            }

            $relativePath = 'imgUploads/' . $uniqueFileName;

            // Tính SaleValue dựa trên giá và phần trăm giảm giá
            if ($percentSale > 0) {
                $saleValue = round($gia * (1 - ($percentSale / 100)), 2);
            } else {
                $saleValue = $gia; // Không giảm giá
            }
        }

        try {
            $query = "INSERT INTO sanpham (IDLoaiSanPham, TenSanPham, Gia, SoLuong, MoTa, HinhAnh ,PercentSale ,SaleValue) 
                     VALUES (?, ?, ?, ?, ?, ? , ? , ?)";

            $params = [
                $idLoaiSanPham,
                $tenSanPham,
                $gia,
                $soLuong,
                $moTa,
                $relativePath,
                $percentSale,
                $saleValue,
            ];

            $result = $this->db->insertSP($query, $params);

            if ($result) {

                $_SESSION['success_message'] = "Thêm mới sản phẩm thành công!";
                header("Location: index.php");
                exit();
            } else {
                // Nếu insert thất bại, xóa file đã upload (nếu có)
                if (!empty($targetFile) && file_exists($targetFile)) {
                    unlink($targetFile);
                }
                throw new Exception("Lỗi khi thêm sản phẩm vào database");
            }
        } catch (Exception $e) {

            // Xóa file ảnh nếu có lỗi xảy ra
            if (!empty($targetFile) && file_exists($targetFile)) {
                unlink($targetFile);
            }
            return "Lỗi: " . $e->getMessage();
        }
    }

    // Cap nhat thong tin san pham
    public function update($data)
    {
        // Đường dẫn đến thư mục chứa ảnh
        $targetDir = __DIR__ . '/../imgUploads/';
        $uniqueFileName = '';
        $relativePath = '';
        $targetFile = '';  // Biến lưu đường dẫn đầy đủ của file

        // Lấy thông tin từ dữ liệu gửi lên
        $idLoaiSanPham = intval($data['IDLoaiSanPham'] ?? 0);
        $tenSanPham = trim($data['TenSanPham'] ?? '');
        $gia = floatval($data['Gia'] ?? 0);
        $soLuong = intval($data['SoLuong'] ?? 0);
        $moTa = trim($data['MoTa'] ?? '');
        $idSanPham = intval($data['IDSanPham'] ?? 0);  // IDSanPham là tham số cần thiết để cập nhật
        $percentSale = intval($data['PercentSale'] ?? 0);
        $saleValue =  floatval($data['SaleValue'] ?? 0);
        $hinhAnh = $_FILES['HinhAnh'] ?? null;

        // Kiểm tra dữ liệu nhập
        if (empty($tenSanPham) || $gia <= 0 || $soLuong <= 0 || empty($moTa) || $idLoaiSanPham <= 0 || $idSanPham <= 0) {
            return "Vui lòng điền đầy đủ thông tin hợp lệ!";
        }

        // Kiểm tra nếu có hình ảnh mới được tải lên
        if ($hinhAnh && $hinhAnh["error"] === UPLOAD_ERR_OK) {
            // Kiểm tra và tạo thư mục nếu chưa tồn tại
            if (!is_dir($targetDir)) {
                if (!mkdir($targetDir, 0755, true)) {
                    return "Không thể tạo thư mục upload!";
                }
            }

            // Kiểm tra định dạng file
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($hinhAnh['type'], $allowedTypes)) {
                return "Chỉ chấp nhận file ảnh định dạng JPG, PNG hoặc GIF!";
            }

            // Giới hạn kích thước file (5MB)
            $maxFileSize = 5 * 1024 * 1024;
            if ($hinhAnh["size"] > $maxFileSize) {
                return "Kích thước file ảnh không được vượt quá 5MB!";
            }

            // Tạo tên file ngẫu nhiên
            $fileExtension = strtolower(pathinfo($hinhAnh["name"], PATHINFO_EXTENSION));
            $uniqueFileName = uniqid() . '_' . time() . '.' . $fileExtension;
            $targetFile = $targetDir . $uniqueFileName;  // Lưu đường dẫn đầy đủ

            // Thử upload file
            if (!move_uploaded_file($hinhAnh["tmp_name"], $targetFile)) {
                return "Có lỗi xảy ra khi upload hình ảnh!";
            }

            $relativePath = 'imgUploads/' . $uniqueFileName;
        }
        // Tính SaleValue dựa trên giá và phần trăm giảm giá
        if ($percentSale > 0) {
            $saleValue = round($gia * (1 - ($percentSale / 100)), 2);
        } else {
            $saleValue = $gia; // Không giảm giá
        }

        try {
            // Nếu có hình ảnh mới, cập nhật cả đường dẫn hình ảnh
            // If there's a new image
            if ($relativePath) {
                $query = "UPDATE sanpham 
              SET IDLoaiSanPham = ?, TenSanPham = ?, Gia = ?, SoLuong = ?, MoTa = ?, HinhAnh = ?, PercentSale = ?, SaleValue = ?
              WHERE IDSanPham = ?";
                $params = [
                    $idLoaiSanPham,
                    $tenSanPham,
                    $gia,
                    $soLuong,
                    $moTa,
                    $relativePath,
                    $percentSale,  // Add PercentSale parameter
                    $saleValue,    // Add SaleValue parameter
                    $idSanPham     // Move IDSanPham to the end as it's in the WHERE clause
                ];
            } else {
                // If no new image
                $query = "UPDATE sanpham 
              SET IDLoaiSanPham = ?, TenSanPham = ?, Gia = ?, SoLuong = ?, MoTa = ?, PercentSale = ?, SaleValue = ?
              WHERE IDSanPham = ?";
                $params = [
                    $idLoaiSanPham,
                    $tenSanPham,
                    $gia,
                    $soLuong,
                    $moTa,
                    $percentSale,  // Add PercentSale parameter
                    $saleValue,    // Add SaleValue parameter
                    $idSanPham     // Move IDSanPham to the end as it's in the WHERE clause
                ];
            }

            $result = $this->db->insertSP($query, $params);

            if ($result) {
                $_SESSION['success_message'] = "Cập nhật sản phẩm thành công!";
                header("Location: index.php");
                exit();
            } else {
                throw new Exception("Lỗi khi cập nhật sản phẩm vào database");
            }
        } catch (Exception $e) {
            // Nếu có lỗi xảy ra, xóa file hình ảnh đã upload
            if (!empty($targetFile) && file_exists($targetFile)) {
                unlink($targetFile);
            }
            return "Lỗi: " . $e->getMessage();
        }
    }


    //Xoa san pham
    public function delete($id)
    {
        $query = "DELETE FROM sanpham WHERE IDSanPham = '$id'";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "Đã xoá!";
            header("Location: index.php");
            return $alert;
        } else {
            $alert = "Xoá không thành công!";
            return $alert;
        }
    }

    // show sản sản phẩm bán chạy 
    public function showSanPhamHot()
    {
        $query = "SELECT * FROM sanpham ORDER BY SoLuongBan DESC LIMIT 5";
        $result = $this->db->select($query);
        return $result;
    }

    // show sản phẩm hot trend 

    public function showProductsByCategory($categoryID)
    {
        $sanpham = [];
        if ($this->db) {
            $sql = "SELECT * FROM sanpham WHERE IDLoaiSanPham = $categoryID";
            $result = $this->db->select($sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($product = mysqli_fetch_assoc($result)) {
                    $sanpham[] = $product;
                }
            } else {
                echo "Không có sản phẩm nào cho loại sản phẩm với ID = $categoryID<br>";
            }
        } else {
            echo "Không kết nối được CSDL.<br>";
        }

        // Kiểm tra dữ liệu trả về

        return $sanpham;
    }



    public function view($view, $data = [])
    {
        extract($data); // Tạo biến từ mảng dữ liệu
        $viewPath = __DIR__ . '/../clients/pages/' . $view . '.php'; // Đảm bảo đường dẫn đúng từ thư mục controller
        if (file_exists($viewPath)) {
            require_once $viewPath; // Gọi file view nếu tồn tại
        } else {
            echo "View not found: " . $viewPath;
        }
    }

    //search san pham 
    public function getBySearch($search)
    {
        $search = '%' . $search . '%'; // Add wildcards for LIKE query
        $query = "SELECT s.*, l.TenLoaiSanPham 
                 FROM sanpham s 
                 JOIN loaisanpham l 
                 ON s.IDLoaiSanPham = l.IDLoaiSanPham 
                 WHERE s.TenSanPham LIKE ?";

        $stmt = $this->db->getConnection()->prepare($query);
        if ($stmt === false) {
            return [];
        }
        $stmt->bind_param('s', $search);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        $stmt->close();
        return $data;
    }
}
