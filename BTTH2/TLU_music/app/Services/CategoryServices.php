<?php
require_once APP_ROOT.'/app/Model/Category.php';
require_once APP_ROOT.'/app/libs/DBConnection.php';
// include '../Views/admin/action/add_category.php';

class CategoryService {
    private $conn; // Thêm thuộc tính để lưu kết nối đến cơ sở dữ liệu

    public function __construct() {
        // Khởi tạo kết nối đến cơ sở dữ liệu trong constructor
        $dbConnection = new DBConnection();
        $this->conn = $dbConnection->getConnection();
    }

    //Hiển thị 
    public function getAllCategory() {
        $theloai = [];

        if (!$this->conn) {
           throw new Exception("Lỗi kết nối cơ sở dữ liệu");  
        }

        try {
            $sql = "SELECT * FROM theloai";
            $stmt = $this->conn->query($sql);
            while ($row = $stmt->fetch()) {
                $category = new Theloai($row['ma_tloai'], $row['ten_tloai']);
                $theloai[] = $category;
            }

            return $theloai;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
            // return $theloai; 
        }
    }

    public function getCategoryById($ma_tloai){
        $category = null;
        if(!$this->conn){
            return $category;
        }

        try{
            $sql = "SELECT * FROM theloai WHERE ma_tloai = :ma_tloai";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ma_tloai',$ma_tloai);
            $stmt->execute();
            $row = $stmt->fetch();
            if($row){
                $category = new Theloai($row['ma_tloai'],$row['ten_tloai']);
            }
            return $category;	

        }catch(PDOException $e){
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
            return $category;
        }
    }

    //Thêm thể loại
    public function themTheLoai($ten_tloai) {
        if (!$this->conn) {
            return false;  
        }               
        try {
            $sql = "INSERT INTO theloai(ten_tloai) VALUES (:ten_the_loai)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten_the_loai', $ten_tloai);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
            return false; 
        }
    }

    //Xóa thể loại 
    public function xoaTheLoai($ma_tloai){
        if(!$this->conn){
            return false;
        }
            try {
                $sql = "DELETE FROM theloai WHERE ma_tloai = :ma_tloai";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':ma_tloai',$ma_tloai);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
                return false;
            }
    }  

    //Sửa thể loại
    public function suaTheLoai($ma_tloai,$ten_tloai){
        if(!$this->conn){
            return false;
        }
        try{
            $sql = "UPDATE theloai SET ten_tloai = :ten_tloai WHERE ma_tloai = :ma_tloai";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ma_tloai',$ma_tloai);
            $stmt->bindParam(':ten_tloai',$ten_tloai);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
            return false;
        }
    }
}
?>
