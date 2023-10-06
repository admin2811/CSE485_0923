<?php 
        require_once __DIR__ . '/../config/config.php';
        require_once APP_ROOT . '/app/libs/DBConnection.php';
        require_once APP_ROOT. '/app/Services/DoctorService.php';
    class DoctorController{
        private $doctorService;

        public function __construct(){
            $this->doctorService = new DoctorService();
        }
        //Hiển thị dữ liệu vào Views
        public function index(){
            $doctor = $this->doctorService->getAllDoctor();
            require_once APP_ROOT.'/app/Views/Doctor/index.php';
        }
    //Form thêm mới  
    public function insertForm() {
        require_once(APP_ROOT."/app/Views/Doctor/add.php");
    }

    //Thêm Mới dữ liệu
      //Thêm mới dữ liệu
      public function insert(){
        $response = array();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $tenBacSi = $_POST['tenBS'];
            $chuyenkhoa = $_POST['tenCK'];
            if(empty($tenlop) && empty($chuyenkhoa)){
                $response['success'] = false;
                $response['message'] = "Vui lòng nhập đầy đủ thông tin";
                // echo "Không có tên lớp";
            }else{
                //Tạo kết nối cơ sở dữ liệu
                $dbConnection = new DBConnection();
                $conn = $dbConnection->getConnection();
                if($conn){
                    $result = $this->doctorService->addNewDoctor($tenBacSi,$chuyenkhoa);
                    if($result){
                        $response['success'] = true;
                        // echo "Thêm thành công";
                    }else{
                        $response['success'] = false;   
                        $response['message'] = "Không thể thêm Bác Sĩ";
                        // echo "Thêm thất bại";
                    }
                }else{
                    $response['success'] = false; // Đánh dấu lỗi kết nối đến cơ sở dữ liệu
                    $response['message'] = "Không thể kết nối đến cơ sở dữ liệu.";
                    // echo "Không có kết nối cơ sở dữ liệu";
                }
            }

        }else{
            $response['success'] = false; // Đánh dấu dữ liệu không hợp lệ
            $response['message'] = "Dữ liệu không hợp lệ.";
            // echo "Dữ liệu không hợp lệ";
        }
             header('Content-Type: application/json');
             echo json_encode($response);
             exit();
           
    }
    //Form sửa
    public function editForm() {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
    
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();
    
            if($conn){
                $doctorServices = new DoctorService();
                $doctor = $doctorServices->getDoctorById($id);
                if($doctor){
                    $maBS = $doctor->getId();
                    $tenBacSi = $doctor->getTenBacSi();
                    $chuyenkhoa = $doctor->getChuyenKhoa();
                    require_once APP_ROOT . '/app/Views/Doctor/edit.php';
                }else{
                    echo "Không tìm thấy thông tin bác sĩ";
                    exit();
                }
            }else{
                echo "Không thể kết nối đến cơ sở dữ liệu";
                exit();
            }
        }else{
            echo "Không tìm thấy thông tin bác sĩ";
            exit();
        }
    }
    //Sửa dữ liệu
    public function edit(){
        $response = array();

        if($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_GET['action'])){
            $maBS = $_GET['id'];
            $tenBacSi = $_POST['tenBS'];
            $chuyenkhoa = $_POST['tenCK'];
            if(empty($tenBacSi) && empty($chuyenkhoa)){
                $response['success'] = false;
                $response['message'] = "Vui lòng nhập thông tin";
                // echo 'Nhập tên lớp';
            }else{
                //Tạo kết nối cơ sở dữ liệu
                $dbConnection = new DBConnection();
                $conn = $dbConnection->getConnection();
                if($conn){
                    $result = $this->doctorService->updateDoctor($maBS, $tenBacSi,$chuyenkhoa);
                    if($result){
                        $response['success'] = true;
                        // echo "Sửa thành công";
                    }else{
                        $response['success'] = false;
                        $response['message'] = "Không thể sửa lớp";
                        // echo "Sửa thất bại";
                    }
                }else{
                    $response['success'] = false; // Đánh dấu lỗi kết nối đến cơ sở dữ liệu
                    $response['message'] = "Không thể kết nối đến cơ sở dữ liệu.";
                    // echo "Lỗi kết nối";
                }
            }
        }else{
            $response['success'] = false; // Đánh dấu dữ liệu không hợp lệ
            $response['message'] = "Dữ liệu không hợp lệ.";
            // echo "Ngu quá";
        }
             header('Content-Type: application/json');
            echo json_encode($response);
            exit();          
    }

    //Xóa dữ liệu
    public function delete(){
        $response = array();

        if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])){
            $id = $_GET['id'];
            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();
            if($conn){
                $result = $this->doctorService->deleteDoctor($id);
                if($result){
                    $response['success'] = true;
                    // echo "Xóa thành công";
                }else{
                    $response['success'] = false;
                    $response['message'] = "Không thể xóa bác sĩ";
                    // echo "Xóa thất bại";
                }
            }else{
                $response['success'] = false; // Đánh dấu lỗi kết nối đến cơ sở dữ liệu
                $response['message'] = "Không thể kết nối đến cơ sở dữ liệu.";
                // echo "Lỗi kết nối";
            }
        }else{
            $response['success'] = false; // Đánh dấu dữ liệu không hợp lệ
            $response['message'] = "Dữ liệu không hợp lệ.";
            // echo "Ngu quá";
        }
             header('Content-Type: application/json');
            echo json_encode($response);
            exit();
    }
}
?>