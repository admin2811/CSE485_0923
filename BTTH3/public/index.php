<?php 
// D:\WebEnv\nginx-1.24.0\html\KiemTra\BaiKiemTra1
require_once('../app/config/config.php');
// echo DB_HOST;
// echo APP_ROOT;
if(isset($_GET['action']) && isset($_GET['controller'])){
    $controller = $_GET['controller'];
    $controllerClass = ucfirst($controller) . "Controller";
    $controllerName = $controller . "Controller.php";
    $controllerFile = APP_ROOT . "/app/Controller/" . $controllerName;
    $action = $_GET["action"];
    if(file_exists($controllerFile)){
        require_once($controllerFile);
        if(class_exists($controllerClass)){
                $controller = new $controllerClass();
                if(method_exists($controller,$action)){
                    $controller->$action();
                    // echo " có action";
                }else{
                    $controller->index();
                    // echo "Không có action";
                }
            // echo "Có class";
        }else{
            echo "Không có class";
        }
        // echo 'Có file';
    }else{
        require_once(APP_ROOT . "/app/Controller/DoctorController.php");
        $DoctorController = new DoctorController();
        $DoctorController->index();
        // echo 'Không có file';
    }
}else{
    require_once(APP_ROOT . "/app/Controller/DoctorController.php");
    $DoctorController = new DoctorController();
    $DoctorController->index();
    // echo 'Không có action';
}
?>