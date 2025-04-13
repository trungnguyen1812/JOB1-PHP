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


    public function insertPageHome($idkh, $idsp)
    {
        try {
            // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
            $query = "SELECT IDGioHang, SoLuong FROM GioHang WHERE IDKhachHang = '$idkh' AND IDSanPham = '$idsp'";
            $giohang_sanpham = $this->db->select($query);

            if ($giohang_sanpham) {
                $data = $giohang_sanpham->fetch_assoc();
                $query = "UPDATE GioHang SET SoLuong = SoLuong + 1 WHERE IDGioHang = " . $data['IDGioHang'];
                $result = $this->db->update($query);
            } else {
                // Lấy thông tin sản phẩm
                $query = "SELECT Gia, SaleValue FROM SanPham WHERE IDSanPham = '$idsp'";
                $sanpham = $this->db->select($query);

                if ($sanpham && $sp = $sanpham->fetch_assoc()) {
                    $donGia = ($sp['SaleValue'] > 0) ? $sp['SaleValue'] : $sp['Gia'];

                    $query = "INSERT INTO GioHang(IDKhachHang, IDSanPham, SoLuong, DonGia)
                              VALUES ('$idkh', '$idsp', 1, '$donGia')";
                    $result = $this->db->insert($query);
                } else {
                    return "Không tìm thấy sản phẩm để thêm vào giỏ.";
                }
            }

            return $result ? "Thêm vào giỏ hàng thành công." : "Thêm vào giỏ hàng không thành công. Xin hãy thử lại!";
        } catch (\Exception $e) {
            return "Đã xảy ra lỗi: " . $e->getMessage();
        }
    }



    // Add this method to your Giohang class
    public function getCartItems($userId)
    {
        $query = "SELECT g.*, s.TenSanPham, s.Gia, s.PercentSale, 
              CASE WHEN s.PercentSale > 0 
                  THEN s.Gia - (s.Gia * s.PercentSale / 100) 
                  ELSE 0 
              END as SaleValue 
              FROM GioHang g
              JOIN SanPham s ON g.IDSanPham = s.IDSanPham
              WHERE g.IDKhachHang = '$userId'";

        $result = $this->db->select($query);

        if ($result) {
            $items = [];
            while ($row = $result->fetch_assoc()) {
                $items[] = $row;
            }
            return $items;
        }
        return [];
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
