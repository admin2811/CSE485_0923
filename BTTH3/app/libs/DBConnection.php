<?php 
 class DBConnection {
    private $host;
    private $port;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct() {
        $this->host = DB_HOST;
        $this->username = DB_USER;
        $this->password = DB_PASS;
        $this->dbname = DB_NAME;
        $this->port = DB_PORT;
        try {
            // Sử dụng dấu nháy kép (") để đặt giá trị của các biến trong chuỗi kết nối
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};port={$this->port};charset=utf8";
            $this->conn = new PDO($dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            $this->conn = null;
        }
    }

    public function getConnection() {
        return $this->conn;
    }
    public function getDemo(){
        return $this->host;
    }
 }

?>