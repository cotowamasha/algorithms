<?php
/**
 * задание 2
 */

function findNum($arr){
    $start = 0;
    $end = count($arr) -1;

    if(count($arr) > 1){
        $base = floor(($start + $end) / 2);

        if($arr[$base] - $arr[$base - 1] == 2){
            return $arr[$base] - 1;
        }
        elseif ($arr[$base + 1] - $arr[$base] == 2){
            return $arr[$base] + 1;
        }
        else {
            $left = array_slice($arr, 0, $base);
            $right = array_slice($arr, $base + 1);
            $num = findNum($left);
            if ($num == null){
                $num = findNum($right);
            }
            return $num;
        }
    }
    if (count($arr) < 1){
        return 1;
    }
}
$myArr = [1, 2, 4, 5, 6];
print_r(findNum($myArr));
/**
 * задание 3
 */

function binarySearch($myArray, $num)
{

    $start = 0;
    $end = count($myArray) - 1;
    $index = -1;

    while ($start < $end && $index < 0) {

        $base = floor(($start + $end) / 2);

        if ($myArray[$base] == $num) {
            $index = $base;
            break;
        }
        elseif ($myArray[$base] < $num) {
            $start = $base + 1;
        }
        else {
            $end = $base - 1;
        }
    }
    if($index == -1){
        return "Число $num не найдено";
    }
    $n = 1;
    $a = 1;
    while ($myArray[$index] == $myArray[$index - $n] || $myArray[$index] == $myArray[$index + $n]){
        if($myArray[$index] == $myArray[$index - $n]){
            $a++;
        }

        if($myArray[$index] == $myArray[$index + $n]){
            $a++;
        }

        $n++;
    }
    return "Найдено число $num с количеством повторений $a";
}

$arr = [6, 7, 8, 8, 10];
print_r(binarySearch($arr, 8));