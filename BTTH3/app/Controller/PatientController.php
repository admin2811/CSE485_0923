<?php
require_once __DIR__ . '/../config/config.php';
require_once APP_ROOT . '/app/libs/DBConnection.php';
require_once APP_ROOT . '/app/Services/PatientService.php';
class PatientController
{
    private $patientService;

    public function __construct()
    {
        $this->patientService = new PatientService();
    }
    //Hiển thị dữ liệu vào Views
    public function index()
    {
        $patient = $this->patientService->getAllPatient();
        require_once APP_ROOT . '/app/Views/Patient/index.php';
    }
    //Form thêm mới
    public function insertForm()
    {
        require_once(APP_ROOT . "/app/Views/Patient/add.php");
    }
    //Thêm mới dữ liệu
    public function insert()
    {
        $response = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tenBenhNhan = $_POST['tenBN'];
            $ngayKham = $_POST['ngayKham'];
            $trieuChung = $_POST['trieuchung'];
            $ngayKham = date("Y-m-d", strtotime($ngayKham)); // Chuyển đổi định dạng ngày
            $idBS = $_POST['idBS'];
            if (empty($tenBenhNhan) && empty($ngayKham) && empty($trieuChung) && empty($idBS)) {
                $response['success'] = false;
                $response['message'] = "Vui lòng nhập đầy đủ thông tin";
                // echo "Không có tên lớp";
            } else {
                //Tạo kết nối cơ sở dữ liệu
                $dbConnection = new DBConnection();
                $conn = $dbConnection->getConnection();
                if ($conn) {
                    $result = $this->patientService->addNewPatient($tenBenhNhan, $ngayKham, $trieuChung, $idBS);
                    if ($result) {
                        $response['success'] = true;
                        // echo "Thêm thành công";
                    } else {
                        $response['success'] = false;
                        $response['message'] = "Không thể thêm lớp";
                        // echo "Thêm thất bại";
                    }
                } else {
                    $response['success'] = false; // Đánh dấu lỗi kết nối đến cơ sở dữ liệu
                    $response['message'] = "Không thể kết nối đến cơ sở dữ liệu.";
                    // echo "Không có kết nối cơ sở dữ liệu";
                }
            }
        } else {
            $response['success'] = false; // Đánh dấu dữ liệu không hợp lệ
            $response['message'] = "Dữ liệu không hợp lệ.";
            // echo "Dữ liệu không hợp lệ";
        }
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

    //Form sửa dữ liệu
    public function editForm()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $dbConnection = new DBConnection();
            $conn = $dbConnection->getConnection();

            if ($conn) {
                $patientServices = new PatientService();
                $patient = $patientServices->getPatientById($id);
                if ($patient) {
                    $maBN = $patient->getId();
                    $tenBenhNhan = $patient->getTenBenhNhan();
                    $ngayKham = $patient->getNgayKham();
                    $trieuChung = $patient->getTrieuChung();
                    $idBS = $patient->getIdBacSi();
                    require_once APP_ROOT . '/app/Views/Patient/edit.php';
                } else {
                    echo "Không tìm thấy thông tin Bệnh nhân";
                    exit();
                }
            } else {
                echo "Không thể kết nối đến cơ sở dữ liệu";
                exit();
            }
        } else {
            echo "Không tìm thấy thông tin Bệnh Nhân";
            exit();
        }
    }
    //Sửa dữ liệu
    public function edit()
    {
        $response = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST'  && isset($_GET['action'])) {
            $maBN = $_GET['id'];
            $tenBN = $_POST['tenBN'];
            $ngayKham = $_POST['ngaykham'];
            $ngayKham = date("Y-m-d", strtotime($ngayKham)); // Chuyển đổi định dạng ngày
            $trieuChung = $_POST['trieuchung'];
            $idBS = $_POST['idBS'];
            if (empty($tenBN) && empty($idBS) && empty($trieuChung) && empty($ngayKham)) {
                $response['success'] = false;
                $response['message'] = "Vui lòng nhập thông tin";
                // echo 'Nhập tên lớp';
            } else {
                //Tạo kết nối cơ sở dữ liệu
                $dbConnection = new DBConnection();
                $conn = $dbConnection->getConnection();
                if ($conn) {
                    $result = $this->patientService->updatePatient($maBN, $tenBN, $ngayKham, $trieuChung, $idBS);
                    if ($result) {
                        $response['success'] = true;
                        // echo "Sửa thành công";
                    } else {
                        $response['success'] = false;
                        $response['message'] = "Không thể sửa lớp";
                        // echo "Sửa thất bại";
                    }
                } else {
                    $response['success'] = false; // Đánh dấu lỗi kết nối đến cơ sở dữ liệu
                    $response['message'] = "Không thể kết nối đến cơ sở dữ liệu.";
                    // echo "Lỗi kết nối";
                }
            }
        } else {
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
                $result = $this->patientService->deletePatient($id);
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
