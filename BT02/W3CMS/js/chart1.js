const data1 = {
  labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
  datasets: [
    {
      label: "This Month",
      data: [18, 12, 6, 9, 12, 3, 9],

      backgroundColor: [
        "#FF6A59", // Màu cam
      ],
      borderColor: [
        "#FF6A59", // Màu cam
      ],
      tension: 0, // Đặt tension thành 0 để tạo đường thẳng
      borderWidth: 2, // Đặt độ rộng của đường
      fill: false, // Không điền màu dưới đường
    },
    {
      label: "Last Month",
      data: [9, 12, 3, 18, 20, 33, 24],
      backgroundColor: [
        "rgba(0, 128, 0, 1)", // Màu xanh lá cây
      ],
      borderColor: [
        "rgba(0, 128, 0, 1)", // Màu xanh lá cây
      ],
      tension: 0, // Đặt tension thành 0 để tạo đường thẳng
      borderWidth: 2, // Đặt độ rộng của đường
      fill: false, // Không điền màu dưới đường
    },
  ],
};

const config1 = {
  type: "line",
  data: data1,
  options: {
    plugins: {
      legend: {
        labels: {
          usePointStyle: true,
          pointStyle: "circle",
          //Chỉnh vị trí label cả đường trong sang bên tráia
          boxWidth: 10,
          padding: 20,
          color: "black",
          font: {
            size: 14,
          },
          className: "custom-label",
        },
      },
    },
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
};

const myChart1 = new Chart(document.getElementById("myChart1"), config1);
