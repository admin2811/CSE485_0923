<?php
function convert_to_uppercase($array) {
    $uppercase_array = [];
    foreach ($array as $element) {
      if ($element === null) {
        $uppercase_array[] = 'null';
      }elseif($element === false) {
        $uppercase_array[] = 'false';
      }    
      elseif (is_string($element)) {
        $uppercase_array[] = strtoupper($element);
      } else {
        $uppercase_array[] = $element;
      }
    }
    return $uppercase_array;
  }
  
  $arrs1 = ['a', 'b', 'ABC'];
  $arrs2 = ['1', 'b', 'c', 'd'];
  $arrs3 = ['a', 0, null, false];
  
  $result1 = convert_to_uppercase($arrs1);
  $result2 = convert_to_uppercase($arrs2);
  $result3 = convert_to_uppercase($arrs3);
  
  echo "Result 1:";
  print_r($result1);
  
  echo "<br> Result 2:";
  print_r($result2);
  
  echo "<br> Result 3:";
  print_r($result3);
  
?>