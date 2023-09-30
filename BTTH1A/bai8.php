<?php
$array = ['programming', 'php', 'basic', 'dev', 'is', 'program is PHP'];

$minLength = PHP_INT_MAX;
$maxLength = 0;
$shortestString = '';
$longestString = '';

foreach ($array as $string) {
    $length = strlen($string);
    
    if ($length < $minLength) {
        $minLength = $length;
        $shortestString = $string;
    }
    
    if ($length > $maxLength) {
        $maxLength = $length;
        $longestString = $string;
    }
}

echo "Chuỗi lớn nhất là $longestString, độ dài = $maxLength <br>";
echo "Chuỗi nhỏ nhất là $shortestString, độ dài = $minLength";
?>