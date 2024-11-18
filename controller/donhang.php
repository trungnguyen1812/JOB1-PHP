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
            $query = "INSERT INTO DonHang(IDKhachHang, TongGia, TrangThai, TrangThaiVanChuyen, NgayTao, IDNhanVien, DiaChi, SDT) ".
                    "VALUES ('$idkhach', '$tongtien', 0, 0, '$thoigian', null, '$diachi', '$sdt')";
            // $result = $this->db->insert($query);
            
            
            $lastDonHang = $this->db->select("SELECT IDDonHang FROM DonHang ORDER BY IDDonHang DESC LIMIT 1")->fetch_assoc();
            // if ($result) {
                foreach ($datagiohang as $key => $value) {
                    $query = "INSERT INTO ChiTietDonHang(IDDonHang, IDSanPham, SoLuong, Gia, TrangThai) VALUES ".
                            " VALUES ()";
                };
            // }
            // return "Đặt hàng thành công.";
        } catch (Exception $e) {
            ?>
            <script>alert('<?php echo $e?>')</script>
            <?php
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