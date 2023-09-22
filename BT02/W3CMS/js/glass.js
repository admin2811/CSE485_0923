$(document).ready(function () {
  $(window).scroll(function () {
    // Lấy vị trí cuộn trang
    var scroll = $(window).scrollTop();

    // Điều kiện để kiểm tra xem bạn có nên thay đổi class của header hay không
    if (scroll > 100) {
      // Thay đổi khi cuộn xuống 100px
      $(".header").addClass("glass-header");
    } else {
      $(".header").removeClass("glass-header");
    }
  });
});
