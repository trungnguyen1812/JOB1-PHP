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
    public function insertPageSP($idkh, $idsp)
    {
        try {
            // Kiem tra san pham co trong gio hang hay chua
            $query = "SELECT IDGioHang, SoLuong FROM GioHang WHERE IDKhachHang = '$idkh' AND IDSanPham = '$idsp'";
            $giohang_sanpham = $this->db->select($query);
            if ($giohang_sanpham) {
                $data = $giohang_sanpham->fetch_assoc();
                $query = "UPDATE GioHang SET SoLuong = " . ($data['SoLuong'] + 1) . " WHERE IDGioHang = " . $data['IDGioHang'];
                $result = $this->db->update($query);
                ?>
                <?php
            } else {
                // $idkh -> ID khach hang;  $idsp -> ID san pham
                $query = "INSERT INTO GioHang(IDKhachHang, IDSanPham, SoLuong) VALUES ($idkh, $idsp, 1)";
                $result = $this->db->insert($query);
            }

            if (!$result) {
                
                return "Thêm vào giỏ hàng không thành công. Xin hãy thử lại!";
            } else {
                header('Location: sanpham.php');
                return "Thêm vào giỏ hàng thành công.";
            }
        } catch (\Exception $e) {
            ?>
            <?php
            return (string) $e;
        }
    }


    public function insertPageHome($idkh, $idsp)
    {
        try {
            // Kiem tra san pham co trong gio hang hay chua
            $query = "SELECT IDGioHang, SoLuong FROM GioHang WHERE IDKhachHang = '$idkh' AND IDSanPham = '$idsp'";
            $giohang_sanpham = $this->db->select($query);
            if ($giohang_sanpham) {
                $data = $giohang_sanpham->fetch_assoc();
                $query = "UPDATE GioHang SET SoLuong = " . ($data['SoLuong'] + 1) . " WHERE IDGioHang = " . $data['IDGioHang'];
                $result = $this->db->update($query);
                ?>
                <?php
            } else {
                // $idkh -> ID khach hang;  $idsp -> ID san pham
                $query = "INSERT INTO GioHang(IDKhachHang, IDSanPham, SoLuong) VALUES ($idkh, $idsp, 1)";
                $result = $this->db->insert($query);
            }

            if (!$result) {
                
                return "Thêm vào giỏ hàng không thành công. Xin hãy thử lại!";
            } else {
                // header('Location: home.php');
            
             
                return "Thêm vào giỏ hàng thành công.";
            }
        } catch (\Exception $e) {
            ?>
            <?php
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
    public function delete($id)
    {
        try {
            $query = "DELETE FROM GioHang WHERE IDGioHang = '$id'";
            $result = $this->db->delete($query);
            return $result;
        } catch (\Exception $e) {
            return (string) $e;
        }
    }

    // Lay toan bo gio hang voi tai khoan dang nhap
    public function getByIDKhachHang($id)
    {
        $query =
            "SELECT g.*, s.IDSanPham, s.TenSanPham, s.Gia FROM giohang g JOIN sanpham s ON g.IDSanPham = s.IDSanPham WHERE IDKhachHang = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
}