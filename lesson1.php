<?php

//задание 2

$stack = [];
$int = 600851475143;
$a = 2;

while($int > $a){
    if($int % $a == 0){
        $stack[] = $a;
        $int = $int / $a*2;
    }
    $a++;
}
for($i = 0; $i < count($stack); $i++ ){
    for($n = 2; $n < $stack[$i]; $n++){
        if($stack[$i] % $n == 0 ){
            $stack[$i] = 0;
        }
    }
}

print_r($stack[count($stack) - 1]); //6857

//задание 3
$arr = ['()', '{}', '[]', '""'];
$str = '"Это тестовый вариант проверки (задачи со скобками). И вот еще скобки: {[][()]}"'; // true
//$str = '((a + b)/ c) - 2'; // true
//$str = '"([ошибка)"'; // false
//$str = '"(")'; // false
$str = preg_replace('/[^()\[\]{}"]/ui', '', $str);
$bool = true;
while($bool && strlen($str) > 0){
    $str1 = $str;
    $str = str_replace($arr, '', $str);
    if($str1 === $str){
        $bool = false;
    }
}
var_dump($bool);



