<?php
$filepath = realpath(dirname(__FILE__));
include $filepath . '/../lib/session.php';
include $filepath . '/../lib/database.php';
?>
<?php
class LoaiSanPham
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }


    //Lay toan bo nhan vien
    public function getAll()
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
        $tenSanPham = $data['TenSanPham'];
        $gia = $data['Gia'];
        $soLuong = $data['SoLuong'];
        $moTa = $data['MoTa'];
        $idLoaiSanPham = $data['IDLoaiSanPham'];
        $hinhAnh = $_FILES['HinhAnh'] ?? null;

        // Đường dẫn đến thư mục lưu hình ảnh
        $targetDir = __DIR__ . '/../assets/imgUpload/';

        // Kiểm tra xem thư mục uploads có tồn tại không, nếu không thì tạo nó
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Xử lý upload file hình ảnh
        $relativePath = ''; // Đường dẫn tương đối của hình ảnh
        if ($hinhAnh && $hinhAnh["error"] === UPLOAD_ERR_OK) {
            // Tạo tên file duy nhất để tránh trùng
            $targetFile = $targetDir . uniqid() . '_' . basename($hinhAnh["name"]);

            // Di chuyển file từ vị trí tạm đến thư mục lưu trữ
            if (move_uploaded_file($hinhAnh["tmp_name"], $targetFile)) {
                // Chỉ lưu đường dẫn tương đối vào CSDL
                $relativePath = 'assets/imgUpload/' . basename($targetFile);
            } else {
                $alert = "Có lỗi xảy ra khi upload hình ảnh!";
                return $alert;
            }
        }

        // Câu truy vấn để thêm sản phẩm vào bảng sanpham
        $query = "INSERT INTO sanpham(TenSanPham, Gia, SoLuong, MoTa, HinhAnh, IDLoaiSanPham) " .
            "VALUES ('$tenSanPham', '$gia', '$soLuong', '$moTa', '$relativePath', '$idLoaiSanPham')";
        $result = $this->db->insert($query);

        if ($result) {
            header("Location: index.php?page=products");
            $alert = "Thêm sản phẩm mới thành công!";
            return $alert;
        } else {
            $alert = "Thêm sản phẩm không thành công!";
            return $alert;
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
