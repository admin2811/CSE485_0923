<?php 
require_once('../config/config.php');
// echo DB_HOST;
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

if ($controller == 'home') {
    // Import HomeController
    require_once APP_ROOT . '/app/Controller/AdminController.php';
    $homeController = new HomeController();

    // Chọn hành động (action)
    if ($action == 'index') {
        $homeController->index();
    } else {
        // Xử lý các hành động (actions) khác của HomeController nếu cần
    }
} else {
    echo '404'; // Xử lý trường hợp không tìm thấy controller hoặc action
}
?>