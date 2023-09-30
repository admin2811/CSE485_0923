<?php 
 $arr = ['PHP','HTML','CSS','JS'];
 //In các phần tử trên ra thành table 
    echo "<table border='1' cellspacing='0' cellpadding='0'>";
    echo "<tr>";
    echo "<th>Tên khóa học</th>";
    echo "</tr>";
    for($i=0;$i<count($arr);$i++){
        echo "<tr>";
        echo "<td>".$arr[$i]."</td>";
        echo "</tr>";
    }
    echo "</table>";

?>