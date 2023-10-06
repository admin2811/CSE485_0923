<?php 
     require_once APP_ROOT.'/app/Model/Patient.php';
     require_once APP_ROOT.'/app/libs/DBConnection.php';
     class PatientService{
        private $conn;
        public function __construct(){
            $dbConnection = new DBConnection();
            $this->conn = $dbConnection->getConnection();
        }
        //Hiển thị dữ liệu ra màn hình
        public function getAllPatient(){
            $patient = [];
            if(!$this->conn){
                return false;
            }
            try{
                $sql = "SELECT * FROM benhnhan";
                $stmt = $this->conn->query($sql);
                while ($row = $stmt->fetch()) {
                    $Patient = new Patient($row['id'], $row['tenBenhNhan'], $row['ngayKham'],$row['trieuChung'], $row['idBacSi']);
                    $patient[] = $Patient;
                }
                return $patient;
            }catch(PDOException $e){
                return false;
            }
        }
        //Thêm mới dữ liệu
        public function addNewPatient($tenBenhNhan,$ngayKham,$trieuChung,$idBacSi) {
            if (!$this->conn) {
                return false;  
            }               
            try {
                $sql = "INSERT INTO benhnhan(tenBenhNhan,ngayKham,trieuChung, idBacSi) VALUES (:tenBenhNhan, :ngayKham, :trieuChung,:idBacSi)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':tenBenhNhan', $tenBenhNhan);
                $stmt->bindParam(':ngayKham', $ngayKham);
                $stmt->bindParam(':trieuChung', $trieuChung);
                $stmt->bindParam(':idBacSi', $idBacSi);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
                return false; 
            }
        }

        //Lấy id Bệnh nhân
        public function getPatientById($id){
            if(!$this->conn){
                return false;
            }
    
            try{
                $sql = "SELECT * FROM benhnhan WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $row = $stmt->fetch();
                $Patient = new Patient($row['id'], $row['tenBenhNhan'],$row['ngayKham'],$row['trieuChung'],$row['idBacSi']);
                return $Patient;
            }catch(PDOException $e){
                return false;
            }
        }

        //Sửa dữ liệu
        public function updatePatient($id, $tenBenhNhan,$ngayKham,$trieuChung, $idBacSi) {
            if (!$this->conn) {
                return false;
            }
        
            try {
                $sql = "UPDATE benhnhan SET tenBenhNhan = :tenBenhNhan, ngayKham = :ngayKham,trieuChung = :trieuChung, idBacSi = :idBacSi WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':tenBenhNhan', $tenBenhNhan);
                $stmt->bindParam(':ngayKham', $ngayKham);
                $stmt->bindParam(':trieuChung', $trieuChung);
                $stmt->bindParam(':idBacSi', $idBacSi);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo "Lỗi truy vấn cơ sở dữ liệu: " . $e->getMessage();
                return false;
            }
        }

        //Xóa dữ liệu
        public function deletePatient($id){
            if(!$this->conn){
                return false;
            }
    
            try{
                $sql = "DELETE FROM benhnhan WHERE id = :id";
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