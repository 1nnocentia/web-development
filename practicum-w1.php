<?php
    $array1 = [1,2,3,4,5,6];
    $array2 = [6,7];

    $mergedArray = array_merge($array1, $array2);
    echo implode(", ", $mergedArray);
?>