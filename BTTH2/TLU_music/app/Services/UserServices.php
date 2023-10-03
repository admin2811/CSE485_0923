<?php
require_once APP_ROOT . '/app/Model/User.php';
require_once APP_ROOT . '/app/libs/DBConnection.php';

class UserService {
    private $conn;

    public function __construct() {
        // Khởi tạo kết nối
        $dbConnection = new DBConnection();
        $this->conn = $dbConnection->getConnection();
    }
    
    public function createUser($username, $password, $email, $agreed) {

        // if ($this->isUsernameTaken($username)) {
        //     return "Tên đăng nhập đã tồn tại";
        // }
    
        // // Kiểm tra xem email đã tồn tại hay chưa
        // if ($this->isEmailTaken($email)) {
        //     return "Email đã tồn tại";
        // }
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Kiểm tra kết nối cơ sở dữ liệu
        if (!$this->conn) {
            return false;
        }

        try {
            // Sử dụng câu truy vấn tham số hóa để tránh SQL injection
            $sql = "INSERT INTO user (username, password, email,agreed) VALUES (:username, :password, :email, :agreed)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hash);   
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':agreed',$agreed, PDO::PARAM_BOOL); 
            // Thực hiện truy vấn
            if ($stmt->execute()) {
                return true; // Đăng ký thành công
                
            } else {
                return false; // Lỗi đăng ký
            }
        } catch (PDOException $e) {
            // Xử lý lỗi PDO
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
            return false;
        }
    }

    //Chức năng đăng nhập
    public function login($username, $password) {
        if (!$this->conn) {
            return false;
        }
    
        try {
            $sql = "SELECT username, password FROM user WHERE username = :username";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if (isset($user['password']) && password_verify($password, $user['password'])) {
                    return $user;
                }
                return true;
            }
            
            return false;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn cơ sở dữ liệu" . $e->getMessage() . "\n";
            return false;
        }
    }
    
    
    public function isUsernameTaken($username) {
        if(!$this->conn){
            return null;
        }
        $sql = "SELECT COUNT(*) FROM user WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if($count > 0){
            return true;
        }
    }
    
    public function isEmailTaken($email) {
        if(!$this->conn){
            return false;
        }
        $sql = "SELECT COUNT(*) FROM user WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    }
    public function checkuser($username, $password){
        if(!$this->conn){
            return false;
        }
        $sql = "SELECT * FROM user WHERE username = :username AND password = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username',$username);
        $stmt->bindParam(':password',$password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user && password_verify($password,$user['password'])){
            // session_start();
            // $_SESSION['isLogin'] = $user;
            return $user;
        }else{
            return false;
        }
    }
}
?>
