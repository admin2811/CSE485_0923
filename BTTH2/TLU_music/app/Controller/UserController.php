<?php 
 require_once __DIR__ . '/../config/config.php';
 require_once APP_ROOT . '/app/libs/DBConnection.php';
 require_once APP_ROOT . '/app/Services/UserServices.php';

 class UserController {
    //Thực hiện chức năng Đăng Ký
    public function DangKy() {
      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['gmail'];
        $repty_password = $_POST['retype_password'];
        $agreed = isset($_POST['agreeTerm']) ? true : false;
        //Kiểm tra xem đã nhập đủ thông tin hay chưa? Nếu có, tiến hành
       $dbConnection = new DBConnection();
       $conn = $dbConnection->getConnection();
       if($conn){
         if(isset($username) && isset($password) && isset($email) && isset($repty_password) && isset($agreed)){
            //Thực hiện kiểm tra có tồn tại trong cơ sở dữ liệu
            $check = new UserService();
            $checkuser = $check->isUsernameTaken($username);
            $checkemail = $check->isEmailTaken($email);

            if($checkuser){
            //   echo "Tên đăng nhập đã tồn tại";
             //Chuyển hướng về trang resgisert.php
             header("Location: " . DOMAIN . "app/Views/home/register.php?error=username_taken");
             exit();
            }elseif($checkemail){
               header("Location: " . DOMAIN . "app/Views/home/register.php?error=email_taken");
               exit();
            }elseif($checkuser && $checkemail){
               header("Location: " . DOMAIN . "app/Views/home/register.php?error=email_user");
               exit();
           }else{
            //Thực hiện đăng ký
             $register = $check->createUser($username,$password,$email,$repty_password,$agreed);
             if($register){
               header("Location: " . DOMAIN . "app/Views/home/login.php?success=registered&action='login'");
               exit();
             }else{
               header("Location: " . DOMAIN . "app/Views/home/register.php?error=registration_failed");
               exit();       
             }
           }
         }else{
            header("Location: " . DOMAIN . "app/Views/home/register.php?error=empty_input");
            exit();
         }
       }
      }
    }
    //Thực hiện chức năng đăng nhập
    public function DangNhap() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $username = $_POST['username'];
          $password = $_POST['password'];
  
          if (isset($username) && isset($password)) {
              $dbConnection = new DBConnection();
              $conn = $dbConnection->getConnection();
              if ($conn) {
                  $login = new UserService();
                  $result = $login->login($username, $password);
                  if ($result) {
                      session_start();
                      $_SESSION['username'] = $username;
                      $_SESSION['password'] = $password;
                      $_SESSION['user'] = $result;
                      // if (isset($_POST['rememberMe'])) {
                      //     // Tạo một cookie lưu thông tin đăng nhập trong 30 ngày
                      //     setcookie('rememberMe', '1', time() + 30 * 24 * 3600, '/');
                      // }
                      header("Location: " . DOMAIN . "app/Views/index.php?success=login");
                      exit();
      
                  } else {
                      header("Location: " . DOMAIN . "app/Views/home/login.php?error=login_failed");
                      exit();
                      // echo "Đăng nhập thất bại";
                  }
              } else {
                  echo "Lỗi kết nối cơ sở dữ liệu";
              }
          } else {
              echo "Gía trị không tồn tại";
          }
      }
  }
  
  //  public function checkLogin(){
  //     if
  //  }
 }
  $create = new UserController();

  if(isset($_GET['action'])){
    $action = $_GET['action'];  
    switch ($action) {
      case 'register':
          $create->DangKy();
          break;
      case 'login':
          $create->DangNhap();
        break;
      default:
          echo "Không tìm thấy action.";
          break;
  }
}
?>