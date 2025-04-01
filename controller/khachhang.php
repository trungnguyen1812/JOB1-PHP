<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/../lib/session.php';
include_once $filepath . '/../lib/database.php';
?>
<?php
class KhachHang
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM khachhang WHERE email = '$email' AND matkhau = '$password' LIMIT 1 ";
        $result = $this->db->select($query);
        if ($result) {
            $value = $result->fetch_assoc();
            Session::set('username', $value['HoTen']);
            Session::set('userId', $value['IDKhachHang']);
            Session::set('role', 'khachHangUser');
            header("Location:home.php");
        } else {
            $alert = "Tên đăng nhập hoặc mật khẩu không đúng!";
?>
            <script>
                alert("Tai khoan hoac mat khau khong chinh xac!")
            </script>
            <?php
            return $alert;
        }
    }

    public function register($data)
    {
        $hoten = $data['hoten'];
        $email = $data['email'];
        $password = $data['password'];
        try {
            if (!$this->getByEmail($email)) {
                $query = "INSERT INTO khachhang(hoten, email, matkhau) VALUES ('$hoten', '$email', '$password')";
                $result = $this->db->insert($query);
                if ($result) {
            ?>
                    <script>
                        alert("Đăng ký thành công!")
                    </script>
                <?php
                    $alert = "Đăng ký không thành công!";
                    header("Location: login.php");
                    // return $alert;
                } else {
                    $alert = "Đăng ký không thành công!";
                ?>
                    <script>
                        alert("Đăng ký không thành công! Thử lại...")
                    </script>
<?php
                    return $alert;
                }
            } else {
                $alert = "Email đã được đăng ký. Nhập Email khác hoặc đăng nhập!";
                return $alert;
            }
        } catch (Exception) {
            echo "Có lỗi xảy ra. Vui lòng thử lại sau.";
        }
    }

    // Lay toan bo khach hang
    function getAll()
    {
        $query = "SELECT * FROM khachhang";
        $result = $this->db->select($query);
        return $result;
    }

    // Check khach hang dang ky (da dang ky chua)
    function getByEmail($email)
    {
        $query = "SELECT * FROM KhachHang WHERE Email = '$email'";
        $result = $this->db->select($query);
        return $result;
    }

    // GetByID
    function getByID($id)
    {
        $query = "SELECT * FROM KhachHang WHERE IDKhachHang = '$id'";
        $result = $this->db->select($query);

        // Kiểm tra nếu có kết quả, trả về dòng đầu tiên
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        // Trả về null nếu không tìm thấy khách hàng
        return null;
    }
    public function update($data)
    {
        // Đường dẫn đến thư mục chứa ảnh
        $targetDir = __DIR__ . '/../imgUploads/';
        $uniqueFileName = '';
        $relativePath = '';
        $targetFile = '';

        // Lấy thông tin từ dữ liệu gửi lên
        $idKhachHang = intval($data['IDKhachHang'] ?? 0);
        $hoTen = trim($data['HoTen'] ?? '');
        $email = trim($data['Email'] ?? '');
       
        $diaChi = trim($data['DiaChi'] ?? '');
        $sdt = trim($data['SDT'] ?? '');
        $hinhAnhKhachHang = $_FILES['HinhAnhKhachHang'] ?? null;

        // Kiểm tra dữ liệu nhập - đã loại bỏ kiểm tra mật khẩu
        if (empty($hoTen) || empty($email) || empty($diaChi) || empty($sdt) || $idKhachHang <= 0) {
            return "Vui lòng điền đầy đủ thông tin hợp lệ!";
        }

        // Kiểm tra nếu có hình ảnh mới được tải lên
        if ($hinhAnhKhachHang && $hinhAnhKhachHang["error"] === UPLOAD_ERR_OK) {
            // Kiểm tra và tạo thư mục nếu chưa tồn tại
            if (!is_dir($targetDir)) {
                if (!mkdir($targetDir, 0755, true)) {
                    return "Không thể tạo thư mục upload!";
                }
            }

            // Kiểm tra định dạng file
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($hinhAnhKhachHang['type'], $allowedTypes)) {
                return "Chỉ chấp nhận file ảnh định dạng JPG, PNG hoặc GIF!";
            }

            // Giới hạn kích thước file (5MB)
            $maxFileSize = 5 * 1024 * 1024;
            if ($hinhAnhKhachHang["size"] > $maxFileSize) {
                return "Kích thước file ảnh không được vượt quá 5MB!";
            }

            // Tạo tên file ngẫu nhiên
            $fileExtension = strtolower(pathinfo($hinhAnhKhachHang["name"], PATHINFO_EXTENSION));
            $uniqueFileName = uniqid() . '_' . time() . '.' . $fileExtension;
            $targetFile = $targetDir . $uniqueFileName;

            // Thử upload file
            if (!move_uploaded_file($hinhAnhKhachHang["tmp_name"], $targetFile)) {
                return "Có lỗi xảy ra khi upload hình ảnh!";
            }

            $relativePath = 'imgUploads/' . $uniqueFileName;
        }

        try {
            // Nếu có hình ảnh mới, cập nhật cả đường dẫn hình ảnh
            if ($relativePath) {
                $query = "UPDATE khachhang 
                          SET HoTen = ?, Email = ?, DiaChi = ?, SDT = ?, HinhAnhKhachHang = ? 
                          WHERE IDKhachHang = ?";
                $params = [
                    $hoTen,
                    $email,
                    
                    $diaChi,
                    $sdt,
                    $relativePath,
                    $idKhachHang
                ];
            } else {
                // Nếu không có hình ảnh mới, chỉ cập nhật các trường khác
                $query = "UPDATE khachhang 
                          SET HoTen = ?, Email = ?,  DiaChi = ?, SDT = ? 
                          WHERE IDKhachHang = ?";
                $params = [
                    $hoTen,
                    $email,
                    
                    $diaChi,
                    $sdt,
                    $idKhachHang
                ];
            }

            $result = $this->db->insertSP($query, $params);

            if ($result) {
                $_SESSION['success_message'] = "Cập nhật thông tin khách hàng thành công!";
                echo "<script>window.location.href = 'profile.php?id=$idKhachHang';</script>";
                exit();
            } else {
                throw new Exception("Lỗi khi cập nhật thông tin khách hàng vào database");
            }
            
        } catch (Exception $e) {
            // Nếu có lỗi xảy ra, xóa file hình ảnh đã upload
            if (!empty($targetFile) && file_exists($targetFile)) {
                unlink($targetFile);
            }
            return "Lỗi: " . $e->getMessage();
        }
    }
}
