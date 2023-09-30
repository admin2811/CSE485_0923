<?php 
  $numbers = [
    'key1' => 12,
    'key2' => 30,
    'key3' => 4,
    'key4' => -123,
    'key5' => 1234,
    'key6' => -12565,
];

// Lấy ra phần tử đầu tiên và phần tử cuối cùng trong mảng
$firstElement = reset($numbers);
$lastElement = end($numbers);

// Tìm số lớn nhất, số nhỏ nhất và tổng các giá trị trong mảng
$maxValue = max($numbers);
$minValue = min($numbers);
$totalSum = array_sum($numbers);

// Sắp xếp mảng theo chiều tăng và giảm các giá trị
$ascendingOrder = $numbers;
asort($ascendingOrder);
$descendingOrder = $numbers;
arsort($descendingOrder);

// Sắp xếp mảng theo chiều tăng và giảm các key
$ascendingKeyOrder = $numbers;
ksort($ascendingKeyOrder);
$descendingKeyOrder = $numbers;
krsort($descendingKeyOrder);

// Hiển thị kết quả
echo "Phần tử đầu tiên: $firstElement<br>";
echo "Phần tử cuối cùng: $lastElement<br>";
echo "Số lớn nhất: $maxValue<br>";
echo "Số nhỏ nhất: $minValue<br>";
echo "Tổng các giá trị: $totalSum<br>";

echo "<br>Sắp xếp mảng theo chiều tăng giá trị:<br>";
print_r($ascendingOrder);

echo "<br>Sắp xếp mảng theo chiều giảm giá trị:<br>";
print_r($descendingOrder);

echo "<br>Sắp xếp mảng theo chiều tăng key:<br>";
print_r($ascendingKeyOrder);

echo "<br>Sắp xếp mảng theo chiều giảm key:<br>";
print_r($descendingKeyOrder);


?>