
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

            // Chuyển đến trang user.php (không thay đổi URL)
            window.location.href = 'user.php';
        });
    });

