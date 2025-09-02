<?php

    $underline = "\033[4m";
    $reset     = "\033[0m";

    $a1 = (int) readline('How much are the first array? : ');
    $array1 = [];
    for ($i=0; $i < $a1; $i++){
        $array1[] = (int) readline("Enter the number ".($i+1).": ");
    }

    echo "[". implode(", ", $array1) . "]\n";

    $a2 = (int) readline('How much are the second array? : ');
    $array2 = [];
    for ($i=0; $i < $a2; $i++){
        $array2[] = (int) readline("Enter the number ".($i+1).": ");
    }

    echo "[". implode(", ", $array2) . "]\n";

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
            $output[] =  "$underline{$item['value']}$reset";
        } else {
            $output[] = "{$item['value']}";
        }
    }

    echo "[". implode(", ", $output) . "]";
?>