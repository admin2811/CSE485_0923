<?php
$a = [
    'a' => [
    'b' => 0,
    'c' => 1
    ],
    'b' => [
    'e' => 2,
    'o' => [
    'b' => 3
    ]
    ]
   ];
   
   // Lấy giá trị có key "b" bằng 3
   $valueB = $a['b']['o']['b'];
   
   // Lấy giá trị có key "c" bằng 1
   $valueC = $a['a']['c'];
   
   // Lấy thông tin của phần tử có key "a"
   $arrayA = $a['a'];
   
   echo "Giá trị của key 'b' là $valueB <br> ";
   echo "Giá trị của key 'c' là $valueC <br>";
   echo "Thông tin của phần tử có key 'a': <br>";
   print_r($arrayA);
   
?>