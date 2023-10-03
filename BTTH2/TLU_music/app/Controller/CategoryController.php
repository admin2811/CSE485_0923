    <?php
    require_once __DIR__ . '/../config/config.php';
    require_once APP_ROOT . '/app/libs/DBConnection.php';
    require_once APP_ROOT . '/app/Services/CategoryServices.php';
    // include '../Views/admin/action/add_category.php';

    class CategoryController
    {

        // Trong CategoryController  implementation.php
        public function themTheLoai()
        {
            $response = array(); // Khởi tạo mảng JSON cho phản hồi

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ten_the_loai'])) {
                $tenTheLoai = $_POST['ten_the_loai'];
                if (empty($tenTheLoai)) {
                    $response['success'] = false; // Đánh dấu thất bại
                    $response['message'] = "Tên thể loại không được để trống.";
                    // echo 'Tên thể loại không để trống';
                } else {
                    // Tạo kết nối đến cơ sở dữ liệus
                    $dbConnection = new DBConnection();
                    $conn = $dbConnection->getConnection();

                    if ($conn) {
                        $categoryService = new CategoryService($conn);
                        $result = $categoryService->themTheLoai($tenTheLoai);

                        if ($result) {
                            $response['success'] = true; // Đánh dấu thêm thành công
                            // echo 'thêm thành công';
                        } else {
                            $response['success'] = false; // Đánh dấu thêm thất bại
                            $response['message'] = "Không thể thêm thể loại.";
                            // echo 'Xóa thất bại';
                        }
                    } else {
                        $response['success'] = false; // Đánh dấu lỗi kết nối đến cơ sở dữ liệu
                        $response['message'] = "Không thể kết nối đến cơ sở dữ liệu.";
                        // echo 'Không thể kết nối dữ liệu';
                    }
                }
            } else {
                $response['success'] = false; // Đánh dấu dữ liệu không hợp lệ
                $response['message'] = "Dữ liệu không hợp lệ.";
                // echo "Dữ liệu không hợp lệ";
            }
            // Trả về phản hồi dưới dạng JSON
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        }

        //Xóa thể loại
        public function deleteCategory()
        {
            if (isset($_GET['action']) && isset($_GET['id'])) {
                $categoryId = $_GET['id'];
                $response = array();
                if (empty($categoryId)) {
                    echo "Không tìm thấy id";
                } else {
                    $dbConnection = new DBConnection();
                    $conn = $dbConnection->getConnection();
                    if ($conn) {
                        $categoryService = new CategoryService($conn);
                        $result = $categoryService->xoaTheLoai($categoryId);
                        if ($result) {
                            $response['success'] = true;
                        } else {
                            $response['success'] = false;
                        }
                        header('Content-Type: application/json');
                        echo json_encode($response);
                        exit();
                    } else {
                        echo "Không thể kết nối đến cơ sở dữ liệu.";
                    }
                    //     // Gọi đến dịch vụ CategoryServices để xóa thể loại
                    //     $categoryServices = new CategoryService();
                    //     $result = $categoryServices->xoaTheLoai($categoryId);

                    //     if ($result) {
                    //         // Chuyển hướng đến trang delete_category.php và truyền thông báo xóa thành công
                    //         header('Location: ' . DOMAIN . 'app/Views/admin/action/delete_category.php?success=true');
                    //         exit();
                    //     } else {
                    //         // Chuyển hướng đến trang delete_category.php và truyền thông báo xóa thất bại
                    //         header('Location: ' . DOMAIN . 'app/Views/admin/action/delete_category.php?success=false');
                    //         exit();
                    //     }
                    // }else{
                    //     echo "Không tìm thấy id";
                    // }

                }
            } else {
                echo "Không tìm thấy action";
            }
        }
        //Sửa thể loại
        // Function to edit a category
        public function editCategory()
        {
            $response = array();

            if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_GET['action'])) {
                $maTheLoai = $_GET['id'];
                $tenTheLoai = $_POST['ten_the_loai'];

                // Tạo kết nối đến cơ sở dữ liệu
                $dbConnection = new DBConnection();
                $conn = $dbConnection->getConnection();

                if ($conn) {
                    $categoryService = new CategoryService($conn);
                    $result = $categoryService->suaTheLoai($maTheLoai, $tenTheLoai);

                    if ($result) {
                        $response['success'] = true; // Đánh dấu sửa thành công
                        // Redirect to a success page or display a success message
                        // echo "Sửa thành công";
                    } else {
                        $response['success'] = false; // Đánh dấu sửa thất bại
                        $response['message'] = "Không thể sửa thể loại.";
                        // Display an error message
                        // echo "Sửa thất bại";
                    }
                } else {
                    $response['success'] = false; // Đánh dấu lỗi kết nối đến cơ sở dữ liệu
                    $response['message'] = "Không thể kết nối đến cơ sở dữ liệu.";
                    // // Display an error message
                    // echo 'Lỗi kết nối';
                }
            } else {
                $response['success'] = false; // Đánh dấu dữ liệu không hợp lệ
                $response['message'] = "Dữ liệu không hợp lệ.";
                // // Display an error message
                // echo "Dữ liệu không hợp lệ";
            }

            // Trả về phản hồi dưới dạng JSON
            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
           
        }
    }
    $categoryController = new CategoryController();
    // $demo = $categoryController->themTheLoai();
    //lấy action và thực hiện thêm
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
            case 'insert':
                $categoryController->themTheLoai();
                break;
            case 'delete':
                $categoryController->deleteCategory();
                break;
            case 'edit':
                $categoryController->editCategory();
                break;
            default:
                echo "Không tìm thấy action.";
                break;
        }
    }
    ?>
    
