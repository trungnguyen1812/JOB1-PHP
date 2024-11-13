<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/../lib/session.php';
include_once $filepath . '/../lib/database.php';
?>
<?php
class GioHang
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    // Them san pham vao gio hang
    public function insert($idkh, $idsp)
    {
        try {
            // Kiem tra san pham co trong gio hang hay chua
            $query = "SELECT IDGioHang, SoLuong FROM GioHang WHERE IDKhachHang = '$idkh' AND IDSanPham = '$idsp'";
            $giohang_sanpham = $this->db->select($query);
            if ($giohang_sanpham) {
                $query = "UPDATE GioHang SET SoLuong = ".($giohang_sanpham+1)." WHERE IDKhachHang = '$idkh' AND IDSanPham = '$idsp')";
                $result = $this->db->update($query);
            } else {
                // $idkh -> ID khach hang;  $idsp -> ID san pham
                $query = "INSERT INTO GioHang VALUES ('$idkh', '$idsp', 1)";
                $result = $this->db->insert($query);
            }
            if (!$result) {
                return "Thêm vào giỏ hàng không thành công. Xin hãy thử lại!";
            }
        } catch (\Exception $e) {
            return (string) $e;
        }
    }

    // Cap nhat gio hang 
    public function update($id, $soluong)
    {
        try {
             
        } catch (\Exception $e) {
            return (string) $e;
        }
    }
    public function delete()
    {
    }

    // Lay toan bo gio hang voi tai khoan dang nhap
    public function getByIDKhachHang($id)
    {
        $query =
            "SELECT * FROM giohang g JOIN sanpham s ON g.IDSanPham = s.IDSanPham WHERE IDGioHang = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}