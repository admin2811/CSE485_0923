let options = {
    startAngle: -1.55,
    size: 150,
    value: 0.85,
    fill: { color: '#FF6A59' }, // Thay đổi màu thành cam
    emptyFill: 'transparent', // Đặt màu nền của đường viền
    thickness: 10, // Đặt độ dày của đường viền
  }
  $(".circle .bar").circleProgress(options).on('circle-animation-progress',
  function(event, progress, stepValue){
    $(this).parent().find("span").text(String(stepValue.toFixed(2).substr(2)) + "%");
  });
  $(".js .bar").circleProgress({
    value: 0.70
  });