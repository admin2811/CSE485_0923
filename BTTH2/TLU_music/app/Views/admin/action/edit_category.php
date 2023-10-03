<?php 
    require_once __DIR__ . '/../../../config/config.php';
    require_once APP_ROOT . '/app/libs/DBConnection.php';
    require_once APP_ROOT . '/app/Services/CategoryServices.php';
    if(isset($_GET['id'])){
        $ma_tloai = $_GET['id'];

        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();

        if($conn){
            $categoryServices = new CategoryService($conn);
            $category = $categoryServices->getCategoryById($ma_tloai);
            if($category){
                $matheloai = $category->get_ma_tloai();
                $tentheloai = $category->getTheLoai();
            }else{
                echo "Không tìm thấy thông tin thể loại";
                exit();
            }
        }else{
            echo "Không thể kết nối đến cơ sở dữ liệu";
            exit();
        }
    }else{
        echo "Không tìm thấy thông tin thể loại";
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Document</title>
</head>
<body>
  <?php include('../navbar.php') ?>
  <div class="container">
    <h3 class='text-center text-uppercase text-success my-3'>Sửa Thể loại</h3>
     <form action="../../../Controller/CategoryController.php?action=edit&id=<?= $matheloai ?>"  method="post" id="form-data" >
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Mã thể loại</span>
        <input type="text" class="form-control" name="ma_the_loai" value="<?= $matheloai ?>" aria-describedby="addon-wrapping" disabled style="background: white">
      </div>
       <br>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Tên thể loại</span>
        <input type="text" class="form-control" name="ten_the_loai" value="<?= $tentheloai ?>"  aria-describedby="addon-wrapping">
      </div>
      <div class="d-flex justify-content-end mt-5"> <!-- Sử dụng lớp d-flex và justify-content-end -->
        <button type="submit" class="btn btn-success me-2" name="edit" id="edit">Sửa</button> 
        <!-- <a href="../../../Controller/CategoryController.php?action=insert" name="them" id="insert"  class="btn btn-success me-2">Them</a> -->
        <a href="../../../../public/index.php" class="btn btn-warning">Quay Lại</a>
      </div>
    </form>
  </div>    
</body>
<!---->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
      $("#form-data").on("submit", function (e) {
        e.preventDefault();

        // Sử dụng hộp thoại xác nhận
        Swal.fire({
          title: 'Xác nhận sửa?',
          text: 'Bạn có chắc muốn sửa không?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Đồng ý',
          cancelButtonText: 'Hủy bỏ'
        }).then((result) => {
          if (result.isConfirmed) {
            // Nếu người dùng đồng ý, thực hiện AJAX request
            var formData = new FormData($("#form-data")[0]);
            $.ajax({
              url: "../../../Controller/CategoryController.php?action=edit&id=<?php echo $_GET['id']; ?>",
              type: "POST",
              data: formData,
              processData: false,
              contentType: false,
              dataType: 'json',
              success: function (response) {
                if (response.success) {
                  Swal.fire({
                    icon: 'success',
                    title: 'Sửa thành công',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  setTimeout(function () {
                    window.location.href = "../../index.php";
                  }, 1000);
                } else {
                  Swal.fire({
                    icon: 'error',
                    title: 'Sửa thất bại',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                  })
                }
              }
            });
          }
        });
      });
    });
 </script>

</html>
