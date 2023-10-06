<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bác Sĩ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php include('navbar.php') ?>
    <div class="container">
    <h3 class="text-center text-uppercase text-success my-3">Quản lý Bác Sĩ</h3>
    <!-- <a href="<?= DOMAIN . 'app/Views/Class/add.php?action=insert' ?>" class="btn btn-success" style="margin-bottom: 15px">Thêm mới</a> -->
    <a href="<?= DOMAIN . 'public/index.php?controller=doctor&action=insertForm'?>" class="btn btn-success" style="margin-bottom: 15px">Thêm mới</a>
    <table id="myTable" class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Tên Bác Sĩ</th>
          <th scope="col">Chuyên Khoa</th>
          <th scope="col">Sửa</th>
          <th scope="col">Xóa</th>
        </tr>
      </thead>
      <tbody>
           <?php
           if(isset($doctor)){
             foreach($doctor as $dtc) {
          ?> 
              <tr>
              <td scope="row"><?= $dtc->getId()?></td>
              <td><?= $dtc->getTenBacSi() ?></td>
              <td><?= $dtc->getChuyenKhoa() ?></td>
              <td><a href="<?= DOMAIN. 'public/index.php?controller=doctor&action=editForm&id='.$dtc->getId() ?>"><i class="fas fa-edit"></i></a></td>
              <td><a href="<?= DOMAIN. 'public/index.php?controller=doctor&action=delete&id='.$dtc->getId() ?>" class='delBtn'><i class="fas fa-trash"></i></a></td>
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
</body>
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
</html>