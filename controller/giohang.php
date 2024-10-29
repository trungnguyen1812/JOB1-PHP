<?php
$filepath = realpath(dirname(__FILE__));
include $filepath . '/../lib/session.php';
include $filepath . '/../lib/database.php';
?>
<?php
class GioHang
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    // Lay toan bo gio hang voi tai khoan dang nhap
    public function getByID($id) {
        $query =
            "SELECT * FROM giohang g JOIN sanpham s ON g.IDSanPham = s.IDSanPham WHERE IDGioHang = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}