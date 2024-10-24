<?php 
    include_once '../../lib/session.php';
    include '../../lib/database.php';
?>
<?php
class khachhang
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
        $query = "INSERT INTO khachhang(hoten, email, matkhau) VALUES ('$hoten', '$email', '$password')";
        $result = $this->db->insert($query);
        if ($result) {
            ?>
            <script>alert("Đăng ký thành công!")</script>
            <?php
            header("Location: login.php");
            return true;
        } else {
            $alert = "Đăng ký không thành công!";
            ?>
            <script>alert("Đăng ký không thành công! Thử lại...")</script>
            <?php
            return $alert;
        }
    }
}
