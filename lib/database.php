<?php
define("DB_HOST", 'localhost');
define("DB_USER", 'root');
define("DB_PASS", '');
define("DB_NAME", 'teddyshop');
?>

<?php
class Database extends PDO
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct()
    {
        $this->connectDB();
    }

    private function connectDB()
    {
        $this->link = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );
        if (!$this->link) {
            $this->error = "Connection fail" . $this->link->connect_error;
            return false;
        }
    }

    // Select or Read data
    public function select($query)
    {
        $result = $this->link->query($query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    // Insert data
    public function insert($query)
    {
        $insert_row = $this->link->query($query);
        if ($insert_row) {
            return $insert_row;
        } else {
            return false;
        }
    }

    // Insert san pham 
    public function insertSP($query, $params)
    {
        $stmt = $this->link->prepare($query);
        if ($stmt === false) {
            return false;
        }

        // Xác định kiểu dữ liệu của các tham số
        $types = '';
        foreach ($params as $param) {
            $types .= is_int($param) ? 'i' : (is_double($param) ? 'd' : 's');
        }

        // Gọi bind_param và truyền các tham số
        $stmt->bind_param($types, ...$params);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Update san pham 
    public function updateSP($query, $params)
    {
        $stmt = $this->link->prepare($query);
        if ($stmt === false) {
            return false;
        }

        // Xác định kiểu dữ liệu của các tham số
        $types = '';
        foreach ($params as $param) {
            $types .= is_int($param) ? 'i' : (is_double($param) ? 'd' : 's');
        }

        // Gọi bind_param và truyền các tham số
        $stmt->bind_param($types, ...$params);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Update data
    public function update($query)
    {
        $update_row = $this->link->query($query);
        if ($update_row) {
            return $update_row;
        } else {
            return false;
        }
    }

    // Delete data
    public function delete($query)
    {
        $delete_row = $this->link->query($query);
        if ($delete_row) {
            return $delete_row;
        } else {
            return false;
        }
    }

    // Fixed getConnection method
    public function getConnection()
    {
        return $this->link; // Return mysqli connection
    }
}
?>