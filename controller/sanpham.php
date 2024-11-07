<?php
$filepath = realpath(dirname(__FILE__));
include $filepath . '/../lib/session.php';
include $filepath . '/../lib/database.php';
?>
<?php
class SanPham
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }


    //Lay toan bo nhan vien
    public function getAll()
    {
        $sql = "SELECT s.*, l.TenLoaiSanPham 
        FROM sanpham s 
        JOIN loaisanpham l 
        ON s.IDLoaiSanPham  = l.IDLoaiSanPham ";
        $result = $this->db->select($sql);
        return $result;
    }

    public function getLoaiSanPham()
    {
        $query =
            "SELECT * FROM loaisanpham";
        $result = $this->db->select($query);
        return $result;
    }


    //Lay tt nhan vien
    public function getByID($id)
    {
        $query =
            "SELECT * FROM nhanvien WHERE IDNhanVien = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    //show loại menu 

    public function insert($data)
    {
        $tenSanPham = $data['TenSanPham'] ?? '';
        $gia = $data['Gia'] ?? '';
        $soLuong = $data['SoLuong'] ?? '';
        $moTa = $data['MoTa'] ?? '';
        $idLoaiSanPham = $data['IDLoaiSanPham'] ?? '';
        $hinhAnh = $_FILES['HinhAnh'] ?? null;

        if (empty($tenSanPham) || empty($gia) || empty($soLuong) || empty($moTa) || empty($idLoaiSanPham)) {
            return "Vui lòng điền đầy đủ thông tin!";
        }

        // Đường dẫn đến thư mục lưu hình ảnh
        $targetDir = __DIR__ . '/../assets/imgUpload/';

        // Kiểm tra xem thư mục uploads có tồn tại không
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Xử lý upload file hình ảnh
        $relativePath = '';
        if ($hinhAnh && $hinhAnh["error"] === UPLOAD_ERR_OK) {
            $targetFile = $targetDir . uniqid() . '_' . basename($hinhAnh["name"]);
            if (move_uploaded_file($hinhAnh["tmp_name"], $targetFile)) {
                $relativePath = 'assets/imgUpload/' . basename($targetFile);
            } else {
                return "Có lỗi xảy ra khi upload hình ảnh!";
            }
        }

        // Câu truy vấn
        $query = "INSERT INTO sanpham(TenSanPham, Gia, SoLuong, MoTa, HinhAnh, IDLoaiSanPham) " .
            "VALUES ('$tenSanPham', '$gia', '$soLuong', '$moTa', '$relativePath', '$idLoaiSanPham')";

        $result = $this->db->insert($query);
        
        if ($result) {
            header("Location: index.php");
            exit; // Thêm exit để dừng script
        } else {
            return "Thêm sản phẩm không thành công!";
        }
    }

    // Cap nhat tt nhan vien
    public function update($data)
    {
        $id = $data['id'];
        $hoten = $data['hoten'];
        $email = $data['email'];
        $password = $data['password'];
        $sdt = $data['sdt'];
        $namsinh = $data['namsinh'];
        $gioitinh = $data['gioitinh'];
        $diachi = $data['diachi'];

        $query = "UPDATE NhanVien SET HoTenNhanVien = '$hoten', Email = '$email', MatKhau = '$password', SĐT ='$sdt', NamSinh = '$namsinh', GioiTinh = '$gioitinh', DiaChi = '$diachi' " .
            "WHERE IDNhanVien = '$id'";
        $result = $this->db->update($query);
        if ($result) {
            header("Location: index.php");
            $alert = "Cập nhật thành công!";
            return $alert;
        } else {
            $alert = "Cập nhật không thành công!";
            return $alert;
        }
    }

    //Xoa nhan vien
    public function delete($id)
    {
        $query = "DELETE FROM NhanVien WHERE IDNhanVien = '$id'";
        $result = $this->db->update($query);
        if ($result) {
            $alert = "Đã xoá!";
            header("Location: index.php");
            return $alert;
        } else {
            $alert = "Xoá không thành công!";
            return $alert;
        }
    }
}
