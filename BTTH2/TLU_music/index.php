<?php 
require_once('./app/config/config.php');
echo APP_ROOT;
// $controller = isset($_GET['controller']) ? $_GET['controller'] : 'admin';
// $action = isset($_GET['action']) ? $_GET['action'] : 'index';
// $controller = ucfirst($controller);
// $controller =  $controller."Controller";
// $path = "/app/Controller/".$controller.".php";
// echo $path;
// if(!file_exists($path)){ 
//     echo "<h1>404 Not Found</h1>";
// }
// include "$path";

// $myController = new $controller();
// if(method_exists($myController,$action)){
//     $myController->$action();
// }else{
//     header("Location: index.php?controller=error&action=notFound");
// }
// echo $controller .'--' . $action;
// if ($controller == 'home') {
//     // Import HomeController
//     require_once APP_ROOT . '/app/Controller/AdminController.php';
//     $homeController = new HomeController();

//     // Chọn hành động (action)
//     if ($action == 'index') {
//         $homeController->index();
//     } else {
//         // Xử lý các hành động (actions) khác của HomeController nếu cần
//     }
// } else {
//     echo '404'; // Xử lý trường hợp không tìm thấy controller hoặc action
// }
?>