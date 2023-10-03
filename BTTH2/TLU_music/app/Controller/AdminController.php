<?php 
// require_once(__DIR__ . '/../Model/Database.php');

require_once APP_ROOT. '/app/Services/CategoryServices.php';
// class AdminController {
//     public $message; // Để biến này có thể truy cập từ bên ngoài

//     public function index() {
//         $database = new Database();
//         $conn = $database->connect();
//         if ($database->isConnected()) {
//             $this->message = "Kết nối cơ sở dữ liệu thành công !";
//         } else {
//             $this->message = "Kết nối cơ sở dữ liệu thất bại !";
//         }
//     }
// }
 class HomeController{
    public function index(){
         $category = new CategoryService();
         $theloai = $category->getAllCategory();
         include APP_ROOT. '/app/Views/admin/category.php';
    }
 }
//  $category = new HomeController();
//  $category->index();
?>
