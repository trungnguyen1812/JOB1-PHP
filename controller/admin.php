<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/../lib/session.php';
include_once $filepath . '/../lib/database.php';
?>
<?php
class Admin
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM Admin WHERE email = '$email' AND matkhau = '$password' LIMIT 1 ";
        $result = $this->db->select($query);
        if ($result) {
            $value = $result->fetch_assoc();
            Session::set('username', 'Admin');
            Session::set('userid', $value['AdminID']);
            Session::set('role', 'admin');
            header("Location: pages/dashboard/dashboard.php");
            return true;
        } else {
            $query = "SELECT * FROM nhanvien WHERE email = '$email' AND matkhau = '$password' LIMIT 1 ";
            $result = $this->db->select($query);
            if ($result) {
                $value = $result->fetch_assoc();
                Session::set('username', $value['HoTenNhanVien']);
                Session::set('userid', $value['IDNhanVien']);
                Session::set('role', 'nhanvien');
                header("Location: pages/sanpham/index.php");
            } else {          
                ?>
                <script>alert("Tên đăng nhập hoặc mật khẩu không đúng!")</script>
                <?php
                return false;
            }
        }
    }
}