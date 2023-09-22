<?php 
// Mảng ban đầu
$array = array(1, 2, 3, 4, 5);

// Trình bày hàm trước khi xóa
echo "Hàm trước khi xóa: <br>";
print_r($array);

// Xóa phần tử thứ 3 (với index 2)
unset($array[2]);

// Đảm bảo key là tuần tự
$array = array_values($array);

// Trình bày hàm sau khi xóa
echo "<br> Hàm sau khi xóa:<br>";
print_r($array);

?>