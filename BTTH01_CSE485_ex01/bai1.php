<!--[1]. Viết hàm tổng – tích – hiệu - thương của các phần tử trong mảng số nguyên sau,
sử dụng hàm trong PHP: $arrs = [2, 5, 6, 9, 2, 5, 6, 12 ,5];
Kết quả hiển thị được hiển thị như sau:
Tổng các phần tử = 2 + 5 + 6 + 9 + 2 + 5 + 6 + 12 + 5 = <giá-trị>
Tích các phần tử = 2 * 5 * 6 * 9 * 2 * 5 * 6 * 12 * 5 = <giá-trị>
Hiệu các phần tử = 2 - 5 - 6 - 9 - 2 - 5 - 6 - 12 - 5 = <giá-trị>
Thương các phần tử = 2 / 5 / 6 / 9 / 2 / 5 / 6 / 12 / 5 = <giá-trị>-->

<?php

$arr = [2, 5, 6, 9, 2, 5, 6, 12, 5];
//Tính tổng các phần tử
$tong = array_sum($arr);
//Tính tích cách phần tử
$tich = array_product($arr);
//Tính hiệu các phần tử
$hieu = $arr[0];
for ($i = 1; $i < count($arr); $i++) {
    $hieu -= $arr[$i];
}
//Tính thương các phần tử
$thuong = $arr[0];
for ($i = 1; $i < count($arr); $i++) {
    $thuong /= $arr[$i];
}

//Hiển thị kết quả
echo "Tổng các phần tử = " . implode(" + ", $arr) . " = " . $tong . "<br>";
echo "Tích các phần tử = " . implode(" * ", $arr) . " = " . $tich . "<br>";
echo "Hiệu các phần tử = " . implode(" - ", $arr) . " = " . $hieu . "<br>";
echo "Thương các phần tử = " . implode(" / ", $arr) . " = " . $thuong . "<br>";

?>