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
            // $hoten = $data['hoten'];
            $diachi = $data['diachi'];
            $sdt = $data['sdt'];
            $tongtien = $data['tongtien'];
            $thoigian = date("Y-m-d");
            $query = "INSERT INTO DonHang(IDKhachHang, TongGia, TrangThai, TrangThaiVanChuyen, NgayTao, IDNhanVien, DiaChi, SDT) " .
                "VALUES ('$idkhach', '$tongtien', 0, 0, '$thoigian', null, '$diachi', '$sdt')";
            $result = $this->db->insert($query);


            $lastDonHang = $this->db->select("SELECT IDDonHang FROM DonHang ORDER BY IDDonHang DESC LIMIT 1")->fetch_assoc();
            $iddonhang = $lastDonHang['IDDonHang'];
            if ($result) {
                foreach ($datagiohang as $key => $value) {
                    $idsanpham = $value['IDSanPham'];
                    $soluong = $value['SoLuong'];
                    $gia = $value['Gia'];
                    $query = "INSERT INTO ChiTietDonHang(IDDonHang, IDSanPham, SoLuong, Gia, TrangThai) VALUES " .
                        "($iddonhang, $idsanpham, $soluong, $gia, 0)";
                    $result = $this->db->insert($query);
                    if (!$result) {
                    }

                    // Xoa gio hang
                    $idgiohang = $value['IDGioHang'];
                    $queryDelete = "DELETE FROM GioHang WHERE IDGIoHang = '$idgiohang'";
                    $resultDelete = $this->db->delete($queryDelete);
                    if (!$resultDelete) {
                    }
                }
                ;
                header("Location:thank-you.php");
            } else
                return "Đặt hàng không thành công.";
        } catch (Exception $e) {
            ?>
            <script>alert('<?php echo (String) $e ?>')</script>
            <?php
        }
    }

    // Cap nhat gio hang 
    public function update($id, $trangthai)
    {
        try {
            $query = "UPDATE DonHang SET " .
                "TrangThaiVanChuyen = '$trangthai'" .
                "WHERE IDDonHang = '$id'";
            $result = $this->db->update($query);
            $previousPage = $_SERVER['HTTP_REFERER'];
            // Chuyển hướng về trang trước
            header("Location: $previousPage");
        } catch (\Exception $e) {
            //throw $th;
        }
    }
    // public function delete()
    // {
    // }

    // Get data theo trang thai
    public function getAllByStatus($status)
    {
        try {
            $query = "SELECT dh.*, kh.HoTen FROM DonHang dh JOIN KhachHang kh ON dh.IDKhachHang = kh.IDKhachHang WHERE TrangThaiVanChuyen = $status ORDER BY IDDonHang DESC";
            $result = $this->db->select($query);
            return $result;
        } catch (\Exception $e) {
            //throw $th;
        }
    }



    public function getByIDKhachHang($id, $status)
    {
        try {
            $query = "SELECT dh.*, kh.HoTen FROM DonHang dh JOIN KhachHang kh ON dh.IDKhachHang = kh.IDKhachHang WHERE TrangThaiVanChuyen = $status AND kh.IDKhachHang = $id  ORDER BY IDDonHang DESC";
            $result = $this->db->select($query);
            return $result;
        } catch (\Exception $e) {
            //throw $th;
        }
    }
}