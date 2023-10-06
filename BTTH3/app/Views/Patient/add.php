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
<?php include(APP_ROOT . "/app/Views/Doctor/navbar.php") ?>
  <div class="container">
    <h3 class='text-center text-uppercase text-success my-3'>Thêm Bệnh Nhân</h3>
    <form action="<?= DOMAIN . 'public/index.php?controller=patient&action=insert' ?>"  method="post" id="form-data">
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">Tên Bệnh Nhân</span>
        <input type="text" class="form-control" name="tenBN"  aria-describedby="addon-wrapping">
      </div>
       <br>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Ngày Khám</span>
            <input type="text" class="form-control" name="ngayKham"  aria-describedby="addon-wrapping">
        </div>
        <br>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Triệu Chứng</span>
            <input type="text" class="form-control" name="trieuchung"  aria-describedby="addon-wrapping">
        </div>
        <br>
        <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping">Bác Sĩ</span>
            <input type="text" class="form-control" name="idBS"  aria-describedby="addon-wrapping">
        </div>
      <div class="d-flex justify-content-end mt-5"> <!-- Sử dụng lớp d-flex và justify-content-end -->
        <button type="submit" class="btn btn-success me-2" name="them" id="insert">Thêm</button> 
        <!-- <a href="../../../Controller/CategoryController.php?action=insert" name="them" id="insert"  class="btn btn-success me-2">Them</a> -->
        <a href="<?= DOMAIN .'/public/index.php?controller=patient&action=index'?>" class="btn btn-warning">Quay Lại</a>
      </div>
    </form>
  </div>    
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('#form-data').submit(function (e) {
        e.preventDefault();
        if (this.checkValidity()) {
            $.ajax({
                url: 'http://localhost:8080/CSE485_0923/BTTH3/public/index.php?controller=patient&action=insert',
                type: "POST",
                data: $(this).serialize(),
                dataType: 'json', // Chúng ta mong đợi phản hồi dưới dạng JSON
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Thêm Bệnh nhân thành công!',
                            icon: 'success'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "http://localhost:8080/CSE485_0923/BTTH3/public/index.php?controller=patient&action=index";
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Lỗi!',
                            text: response.message,
                            icon: 'error'
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        title: 'Lỗi!',
                        text: 'Lỗi thêm Bệnh Nhân.',
                        icon: 'error'
                    });
                }
            });
        }
    });
</script>