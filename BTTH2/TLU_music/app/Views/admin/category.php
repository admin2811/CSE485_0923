<?php
// category.php
require_once __DIR__ . '/../../config/config.php'; // Bao gồm config.php

// ...

session_start();
if (!isset($_SESSION['username'])) {
    // Người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập hoặc hiển thị thông báo lỗi
    header('Location:' . DOMAIN . 'app/Views/home/login.php?action=error');
    exit();
}
// else{
//   $category = new HomeController();
//   $category->index();
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Quản lý Thể loại</title>
  <style>
    .navbar-nav .nav-link.active {
      font-weight: bold;
    }
  </style>
</head>
<body>
  <?php include('navbar.php') ?>
  <div class="container">
    <h3 class="text-center text-uppercase text-success my-3">Quản lý Thể loại</h3>
    <a href="<?= DOMAIN . 'app/Views/admin/action/add_category.php?action=insert' ?>" class="btn btn-success" style="margin-bottom: 5px">Thêm mới</a>
    <table id="myTable" class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tên Thể Loại</th>
          <th scope="col">Sửa</th>
          <th scope="col">Xóa</th>
        </tr>
      </thead>
      <tbody>
           <?php
           if(isset($theloai)){
             foreach($theloai as $tloai) {
          ?> 
              <tr>
              <td scope="row"><?= $tloai->get_ma_tloai()?></td>
              <td><?= $tloai->getTheLoai() ?></td>
              <td><a href="<?= DOMAIN. 'app/Views/admin/action/edit_category.php?id='.$tloai->get_ma_tloai() ?>"><i class="fas fa-edit"></i></a></td>
              <td><a href="<?= DOMAIN. 'app/Controller/CategoryController.php?action=delete&id='.$tloai->get_ma_tloai() ?>" class='delBtn'><i class="fas fa-trash"></i></a></td>
            </tr>
          <?php
             }
          }else{
              echo "Không có dữ liệu";
            
          }
           ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable({
        "paging": true, // Cho phép phân trang
        "pageLength": 10, // Số lượng hàng trên mỗi trang
      });

      $(".delBtn").on("click", function (e) {
        e.preventDefault();
        var deleteLink = $(this).attr("href");

        Swal.fire({
          title: 'Bạn có muốn xóa?',
          text: "Hành động này không thể hoàn tác!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Có, xóa!',
          cancelButtonText: 'Hủy bỏ'
        }).then((result) => {
          if (result.isConfirmed) {
            // Nếu người dùng xác nhận xóa, thực hiện yêu cầu Ajax để xóa
            $.ajax({
              url: deleteLink,
              type: 'GET',
              success: function (response) {
                if (response.success) {
                  // Nếu xóa thành công, hiển thị thông báo thành công
                  Swal.fire('Xóa thành công!', '', 'success').then(function () {
                    // Sau khi thông báo biến mất, tải lại trang để cập nhật danh sách
                    location.reload();
                  });
                } else {
                  // Nếu xóa thất bại, hiển thị thông báo lỗi
                  Swal.fire('Xóa thất bại!', '', 'error');
                }
              },
              error: function () {
                // Xử lý lỗi khi gửi yêu cầu Ajax
                Swal.fire('Lỗi khi gửi yêu cầu!', '', 'error');
              }
            });
          }
        });
      });
    });
  </script>
</body>

</html>
