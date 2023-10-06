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
  <?php include('navbar.php') ?>
  <div class="container">
    <h3 class='text-center text-uppercase text-success my-3'>Sửa Thông tin Bác Sĩ</h3>
     <form action="<?= DOMAIN . 'public/index.php?controller=doctor&action=edit&id='.$id ?>"  method="post" id="form-data" >
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Mã Bác Sĩ</span>
        <input type="text" class="form-control" name= "maBS" value="<?= $maBS ?>" aria-describedby="addon-wrapping" disabled style="background: white">
      </div>
       <br>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Tên Bác Sĩ</span>
        <input type="text" class="form-control" name="tenBS" value="<?= $tenBacSi ?>"  aria-describedby="addon-wrapping">
      </div>
      <br>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Tên Chuyên Khoa</span>
        <input type="text" class="form-control" name="tenCK" value="<?= $chuyenkhoa ?>"  aria-describedby="addon-wrapping">
      </div>
      <div class="d-flex justify-content-end mt-5"> <!-- Sử dụng lớp d-flex và justify-content-end -->
        <button type="submit" class="btn btn-success me-2" name="edit" id="edit">Sửa</button> 
        <!-- <a href="../../../Controller/CategoryController.php?action=insert" name="them" id="insert"  class="btn btn-success me-2">Them</a> -->
        <a href="<?= DOMAIN .'/public/index.php?controller=doctor&action=index' ?>" class="btn btn-warning">Quay Lại</a>
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
        var id = <?= $_GET['id'] ?>;

        $.ajax({
          url: "http://localhost:8080/CSE485_0923/BTTH3/public/index.php?controller=doctor&action=edit&id=" + id, // Thêm tham số id vào URL
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
                window.location.href = 'http://localhost:8080/CSE485_0923/BTTH3/public/index.php?controller=doctor&action=index';
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
          },
          error: function () {
            Swal.fire({
              icon: 'error',
              title: 'Lỗi',
              text: 'Có lỗi xảy ra khi gửi yêu cầu.',
              showConfirmButton: false,
              timer: 1500
            })
          }
        });
      }
    });
  });
});

 </script>
