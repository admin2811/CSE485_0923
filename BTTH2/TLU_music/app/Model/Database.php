<?php 
class Database {
    private $conn = null;

    public function connect() {
        $config = include('D:/WebEnv/nginx-1.24.0/html/CSE485_0923/BTTH01_CSE485_ex02/TLU_music/config/database.php');
        // var_dump($config);
        try {
            $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['database']}";
            $this->conn = new PDO($dsn, $config['username'], $config['password']);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            echo "Kết nối đến cơ sở dữ liệu thất bại: " . $e->getMessage();
            return false;
        }
    }
    public function isConnected() {
        return $this->conn !== null;
    }
}

?>