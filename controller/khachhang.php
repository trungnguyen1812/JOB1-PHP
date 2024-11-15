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
            header("Location:home.php");
        } else {
            $alert = "Tên đăng nhập hoặc mật khẩu không đúng!";
            ?>
            <script>alert("Tai khoan hoac mat khau khong chinh xac!")</script>
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
                    <script>alert("Đăng ký thành công!")</script>
                    <?php
                    $alert = "Đăng ký không thành công!";
                    header("Location: login.php");
                    // return $alert;
                } else {
                    $alert = "Đăng ký không thành công!";
                    ?>
                    <script>alert("Đăng ký không thành công! Thử lại...")</script>
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
        $query = "SELECT Email FROM KhachHang";
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
    function getByID($id) {
        $query = "SELECT * FROM KhachHang WHERE IDKhachHang = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}
