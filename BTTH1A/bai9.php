<?php
function convert_to_lowercase($array) {
    $lowercase_array = [];
    foreach ($array as $element) {
      if (is_string($element)) {
        $lowercase_array[] = strtolower($element);
      } elseif ($element === null) {
        $lowercase_array[] = 'null';
      } elseif ($element === false) {
        $lowercase_array[] = 'false';
      } else {
        $lowercase_array[] = (string)$element;
      }
    }
    return $lowercase_array;
  }
  
  $arrs = ['1', 'B', 'C', 'E'];
  print_r(convert_to_lowercase($arrs)); 
  
  $arrs = ['a', 0, null, false];
  print_r(convert_to_lowercase($arrs));  
  
?>