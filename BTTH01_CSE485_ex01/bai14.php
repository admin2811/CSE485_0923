<!--Gộp 2 mảng sau dựa theo key của từng mảng
$array1 = [
 [77, 87],
 [23, 45]
];
$array2 = [
 'giá trị 1', 'giá trị 2'
];
Kết quả mong đợi:
[
 0 => [
 'giá trị 1',
 77,
 87
 ],
 1 => [
 'giá trị 2',
 23,
 45,
]
]-->
<?php

$array1 = [
    [77, 87],
    [23, 45]
];

$array2 = [
    'giá trị 1', 'giá trị 2'
];

$result = [];

foreach ($array1 as $key => $value) {
    $result[$key][] = $array2[$key];
    $result[$key] = array_merge($result[$key], $value);
}
echo "<pre>";
print_r($result);
echo "</pre>";


?>