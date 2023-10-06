<?php 
require_once APP_ROOT.'/app/Model/Doctor.php';
require_once APP_ROOT.'/app/libs/DBConnection.php';
class DoctorService{
    private $conn;
    public function __construct(){
        $dbConnection = new DBConnection();
        $this->conn = $dbConnection->getConnection();
    }
        //Hiển thị dữ liệu ra màn hình 
        public function getAllDoctor(){
            $doctor = [];
            if(!$this->conn){
                return false;
            }
    
            try{
                $sql = "SELECT * FROM bacsi";
                $stmt = $this->conn->query($sql);
                while ($row = $stmt->fetch()) {
                    $Doctor = new Doctor($row['id'], $row['tenBacSi'],$row['chuyenKhoa']);
                    $doctor[] = $Doctor;
                }
    
                return $doctor;
            }catch(PDOException $e){
                return false;
            }
        }

     //Thêm mới vào cơ sở dữ liệu
     public function addNewDoctor($tenBacSi,$chuyenKhoa) {
        if (!$this->conn) {
            return false;  
        }               
        try {
            $sql = "INSERT INTO bacsi(tenBacSi, chuyenKhoa) VALUES (:tenBacSi, :chuyenKhoa)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tenBacSi', $tenBacSi);
            $stmt->bindParam(':chuyenKhoa', $chuyenKhoa);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
            return false; 
        }
    }
    //Lấy dữ liệu bằng id
    public function getDoctorById($id){
        if(!$this->conn){
            return false;
        }

        try{
            $sql = "SELECT * FROM bacsi WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch();
            $Doctor = new Doctor($row['id'], $row['tenBacSi'],$row['chuyenKhoa']);
            return $Doctor;
        }catch(PDOException $e){
            return false;
        }
    }

    //Sửa dữ liệu
    public function updateDoctor($id, $tenBacSi, $chuyenKhoa){
        if(!$this->conn){
            return false;
        }

        try{
            $sql = "UPDATE bacsi SET tenBacSi = :tenBacSi , chuyenKhoa = :chuyenKhoa WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':tenBacSi', $tenBacSi);
            $stmt->bindParam(':chuyenKhoa', $chuyenKhoa);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

     //Xóa dữ liệu 
     public function deleteDoctor($id){
        if(!$this->conn){
            return false;
        }

        try{
            $sql = "DELETE FROM bacsi WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo "Lỗi truy vấn cơ sở dữ liệu" . $e->getMessage();
            return false;
        }
    }
}
?>