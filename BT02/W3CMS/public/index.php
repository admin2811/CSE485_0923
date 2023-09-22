<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('link.php') ?>
    <title>W3CMS</title>
</head>

<body style="background: none; background-color: none">
    <!--Header-->
    <?php include('header.php') ?>
    <div class="container-fluid position-relative">
        <div class="row">
            <!--Sidebar-->
            <?php include('sidebar.php') ?>
            <!--Main-->
            <?php include('main.php') ?>
        </div>
    </div>
</body>
<?php include('script.php') ?>

</html>
<!-- <script>
    // Lấy danh sách tất cả các mục dropdown
    const dropdownItems = document.querySelectorAll('.dropdown-item');

    // Lặp qua từng mục dropdown
    dropdownItems.forEach((item) => {
        // Gắn sự kiện click vào mỗi mục
        item.addEventListener('click', function (event) {
            // Ngăn chặn hành vi mặc định của liên kết
            event.preventDefault();

            // Lấy nội dung của mục được chọn
            const selectedItemText = item.textContent;

            // Tìm phần tử có class "NamePage"
            const namePageElement = document.querySelector('.NamePage h2');

            // Thay đổi nội dung của tiêu đề tương ứng
            namePageElement.textContent = selectedItemText;
        });
    });
</script> -->
