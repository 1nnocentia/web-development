<?php
    function mergeSortUnderline(array $array1, array $array2, bool $isCli = false): string{
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

        return "[". implode(", ", $output) . "]";

    }

    echo "Example 1: <br>";
    $num1 = [1,2,3,0,0,0];
    $num2 = [2,5,6];
    echo "nums1 = [". implode(", ", $num1) . "]<br>";
    echo "nums2 = [". implode(", ", $num2) . "]<br>";
    echo "output: " . mergeSortUnderline($num1, $num2, false);
    
    echo "<br><br>";

    echo "Example 2: <br>";
    $num3 = [1];
    $num4 = [];
    echo "nums1 = [". implode(", ", $num3) . "]<br>";
    echo "nums2 = [". implode(", ", $num4) . "]<br>";
    echo "output: " . mergeSortUnderline($num3, $num4, false);

    echo "<br><br>";

    echo "Example 3: <br>";
    $num5 = [0];
    $num6 = [1];
    echo "nums1 = [". implode(", ", $num5) . "]<br>";
    echo "nums2 = [". implode(", ", $num6) . "]<br>";
    echo "output: " . mergeSortUnderline($num5, $num6, false);
    
?>