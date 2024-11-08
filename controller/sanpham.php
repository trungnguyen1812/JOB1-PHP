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
        $tenSanPham = addslashes(trim($data['TenSanPham'] ?? ''));
        $gia = floatval($data['Gia'] ?? 0);
        $soLuong = intval($data['SoLuong'] ?? 0);
        $moTa = addslashes(trim($data['MoTa'] ?? ''));
        $idLoaiSanPham = intval($data['IDLoaiSanPham'] ?? 0);
        $hinhAnh = $_FILES['HinhAnh'] ?? null;
    
        if (empty($tenSanPham) || $gia <= 0 || $soLuong <= 0 || empty($moTa) || $idLoaiSanPham <= 0) {
            return "Vui lòng điền đầy đủ thông tin hợp lệ!";
        }
    
        // Xử lý upload file hình ảnh
        $relativePath = '';
        if ($hinhAnh && $hinhAnh["error"] === UPLOAD_ERR_OK) {
            $targetDir = __DIR__ . '/../imgUploads/';
    
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
    
            $uniqueFileName = uniqid() . '_' . basename($hinhAnh["name"]);
            $targetFile = $targetDir . $uniqueFileName;
    
            if (move_uploaded_file($hinhAnh["tmp_name"], $targetFile)) {
                $relativePath = 'imgUploads/' . $uniqueFileName;
            } else {
                return "Có lỗi xảy ra khi upload hình ảnh!";
            }
        }
    
        $query = "INSERT INTO sanpham (TenSanPham, Gia, SoLuong, MoTa, IDLoaiSanPham, HinhAnh) " .
            "VALUES ('$tenSanPham', '$gia', '$soLuong', '$moTa', '$idLoaiSanPham', '$relativePath')";
        $result = $this->db->insert($query);
    
        if ($result) {
            echo "Thêm mới thành công!";
            header("Location: index.php");
            exit(); // Dừng lại sau khi chuyển hướng
        } else {
            echo "Lỗi: " . $this->db->error;
        }die();
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
