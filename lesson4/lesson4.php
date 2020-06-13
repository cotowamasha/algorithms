<?php
/**
 * задание: Реализовать функцию a+b, где каждое из чисел а и b
 * имеет не менее 1000 разрядов. Числа хранятся в файле chisla.txt
 * на двух строчках. Ответ вписать на третью строчку
 */

$a = new SplFileObject('chisla.txt');
$a->seek(0);
$numA = $a->current();
$numA = substr($numA, 0, -1);

$b = new SplFileObject('chisla.txt');
$b->seek(1);
$numB = $b->current();

function sum($a, $b){
    $a = str_split($a);
    $revA = array_reverse($a);

    $b = str_split($b);
    $revB = array_reverse($b);

    $revSum = [];
    $bool = false;
    if(count($revA) > count($revB)){
        $count = count($revA);
    } else {
        $count = count($revB);
    }

    for($i = 0; $i < $count; $i++){
        $sum = (int)$revA[$i] + (int)$revB[$i];
        if($bool){
            $sum += 1;
            $bool = false;
        }
        if($sum > 9 && $i === ($count - 1)) {
            $num = str_split("$sum");
            $num = array_reverse($num);
            $sum = $num;
        }
        if($sum > 9 && $i !== ($count - 1)){
            $sum -= 10;
            $bool = true;
        }
        if(is_array($sum)){
            $revSum[] = $sum[0];
            $revSum[] = $sum[1];
        } else {
            $revSum[] = $sum;
        }

    }
    $sum = array_reverse($revSum);
    $sum = implode('', $sum);

    $file = fopen('chisla.txt', 'a');
    fwrite($file,PHP_EOL . $sum);
}
sum($numA, $numB);

/**
 * задание:  Выполнить умножение двух чисел a * b , где а и b имеют до 100 разрядов
 */

function multiply($a, $b){
    $a = str_split($a);
    $revA = array_reverse($a);

    $b = str_split($b);
    $revB = array_reverse($b);

    $arr = [];

    if(count($revA) < count($revB)){
        $count = count($revA);
    } else {
        $count = count($revB);
    }
    for($i = 0; $i < $count; $i++){
        $arr[] = [];
        if($i > 0){
            for($j = 0; $j < $i; $j++){
                $arr[$i][] = 0;
            }
        }
    }

    $n = 0;
    $vUme = 0;
    while($revB[$n] != null){

        for($i = 0; $i < count($revA); $i++){
            $mult = (int)$revA[$i] * (int)$revB[$n];
            if($vUme > 0){
                $mult += $vUme;
                $vUme = 0;
            }
            if($mult > 9 && $i === (count($revA) - 1)) {
                $num = str_split("$mult");
                $num = array_reverse($num);
                $mult = $num;
            }
            if($mult > 9 && $i !== (count($revA) - 1)){
                while($mult > 9){
                    $mult -= 10;
                    $vUme++;
                }
            }
            if(is_array($mult)){
                $arr[$n][] = $mult[0];
                $arr[$n][] = $mult[1];
            }else{
                $arr[$n][] = $mult;
            }
        }
        $n++;
    }

    while(count($arr) !== 1){

        $first = $arr[0];
        $second = $arr[1];

        $sumArr = [];
        $bool = false;
        if(count($first) > count($second)){
            $count = count($first);
        }else {
            $count = count($second);
        }
        for($i = 0; $i < $count; $i++){
            $sum = (int)$first[$i] + (int)$second[$i];
            if($bool){
                $sum += 1;
                $bool = false;
            }
            if($sum > 9){
                $sum -= 10;
                $bool = true;
            }
            $sumArr[] = $sum;
        }
        array_shift($arr);
        array_shift($arr);
        array_unshift($arr, $sumArr);
    }
    $arr[0] = array_reverse($arr[0]);
    $arr[0] = implode('', $arr[0]);

    echo $arr[0];
}

multiply('5234732991767776726668827466267277465537748992774345536873648947728847646278848883847', '7448827767735552773552774655377489');

