<?php
$filepath = realpath(dirname(__FILE__));
include $filepath . '/../lib/session.php';
include $filepath . '/../lib/database.php';
?>
<?php
class NhanVien
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM nhanvien WHERE email = '$email' AND matkhau = '$password' LIMIT 1 ";
        $result = $this->db->select($query);
        if ($result) {
            $value = $result->fetch_assoc();
            Session::set('username', $value['HoTenNhanVien']);
            Session::set('userid', $value['IDNhanVien']);
            header("Location:dashboard.php");
            return true;
        } else {
            $alert = "Tên đăng nhập hoặc mật khẩu không đúng!";
            ?>
            <script>alert("Tai khoan hoac mat khau khong chinh xac!")</script>
            <?php
            return $alert;
        }
    }

    //Lay toan bo nhan vien
    public function getAll()
    {
        $query =
            "SELECT * FROM nhanvien";
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

    public function insert($data)
    {
        $hoten = $data['hoten'];
        $email = $data['email'];
        $password = $data['password'];
        $sdt = $data['sdt'];
        $namsinh = $data['namsinh'];
        $gioitinh = $data['gioitinh'];
        $diachi = $data['diachi'];
        
        $query = "INSERT INTO nhanvien(HoTenNhanVien, Email, MatKhau, SĐT, NamSinh, GioiTinh, DiaChi) ".
                        "VALUES ('$hoten', '$email', '$password', '$sdt', '$namsinh', '$gioitinh', '$diachi')";
        $result = $this->db->insert($query);
        if ($result) {
            header("Location: index.php");
            $alert = "Thêm mới thành công!";
            return $alert;
        } else {
            $alert = "Đăng ký không thành công!";
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
        
        $query = "UPDATE NhanVien SET HoTenNhanVien = '$hoten', Email = '$email', MatKhau = '$password', SĐT ='$sdt', NamSinh = '$namsinh', GioiTinh = '$gioitinh', DiaChi = '$diachi' ".
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
}
