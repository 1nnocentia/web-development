<?php
    $array1 = [0,1,2,3,4,0,0,3];
    $array2 = [6,7,2,1];

    $tagged = [];

    foreach ($array1 as $num){
        if ($num != 0){
            $tagged[] = ['value' => $num, 'from' => 1];
        }
    }

    foreach ($array2 as $num){
        if ($num != 0){
            $tagged[] = ['value' => $num, 'from' => 2];
        }
    }

    usort($tagged, function($a,$b){
        return $a['value'] <=> $b['value'];
    });

    $output = [];

    foreach ($tagged as $item) {
        if ($item['from'] == 1) {
            $output[] =  "<u>{$item['value']}</u>";
        } else {
            $output[] = "{$item['value']}";
        }
    }

    echo "[". implode(", ", $output) . "]";
?>