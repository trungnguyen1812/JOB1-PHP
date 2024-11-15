<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/giohang.php';
include_once $filepath . '/../lib/session.php';
include_once $filepath . '/../lib/database.php';
?>
<?php
class DonHang
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    // Them san pham vao gio hang
    public function insert($data)
    {
        try {
            $giohang = new GioHang();
            $datagiohang = $giohang->getByIDKhachHang($data['id']);
            $idkhach = $data['id'];
            $hoten = $data['hoten'];
            $diachi = $data['diachi'];
            $sdt = $data['sdt'];
            ?>
            <script>
                alert("aaa");
            </script>
            <?php
            return "Đặt hàng thành công.";
        } catch (Exception $e) {
        }
    }

    // Cap nhat gio hang 
    public function update($id, $soluong)
    {
    }
    public function delete()
    {
    }

    public function getByIDKhachHang($id)
    {
    }
}