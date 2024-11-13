<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath . '/../lib/session.php';
include_once $filepath . '/../lib/database.php';
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
            "SELECT * FROM loaisanpham WHERE IDLoaiSanPham = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    //show loại menu 


    public function insert($data)
    {
        $tenloaisanpham = $data['TenLoaiSanPham'];
        $mota = $data['MoTa'];
       
        $query = "INSERT INTO loaisanpham(TenLoaiSanPham , Mota) ".
                        "VALUES ('$tenloaisanpham', '$mota')";
        $result = $this->db->insert($query);
        if ($result) {
            header("Location: index.php");
            $alert = "Thêm mới thành công!";
            return $alert;
        } else {
            $alert = "Thêm mới không thành công!";
            return $alert;
        }
    }


    // Cap nhat tt nhan vien
    public function update($data)
    {
        $id = $data['id'];
        $tenloaisanpham = $data['TenLoaiSanPham'];
        $mota = $data['MoTa'];

        $query = "UPDATE loaisanpham SET TenLoaiSanPham = '$tenloaisanpham', MoTa = '$mota' ".
        "WHERE IDLoaiSanPham = '$id'";
        
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
        $query = "DELETE FROM loaisanpham WHERE IDLoaiSanPham = '$id'";
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
