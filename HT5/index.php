<?php

require 'ht5.html';

//$str = "";

if (isset($_POST["area1"])){
    $str = $_POST["area1"];
}

$flag = FALSE;
$arr = [];
$i = 0;

if (strlen($str) < 10) {
    if ($flag == FALSE) {$flag = TRUE;}
    $arr[$i] = "Ошибка: длина пароля меньше 10 символов"; $i++;
} elseif ((preg_match("/[a-z]{2,}/",$str)) == FALSE) {
    if ($flag == FALSE) {$flag = TRUE;}
    $arr[$i] = "Ошибка: в пароле меньше 2 строчных букв"; $i++;
} elseif ((preg_match("/[A-Z]{2,}/",$str)) == FALSE) {
    if ($flag == FALSE) {$flag = TRUE;}
    $arr[$i] = "Ошибка: в пароле меньше 2 прописных букв"; $i++;
} elseif ((preg_match("/[0-9]{2,}/",$str)) == FALSE) {
    if ($flag == FALSE) {$flag = TRUE;}
    $arr[$i] = "Ошибка: в пароле меньше 2 цифр"; $i++;
} elseif ((preg_match("/[%$#_*]{2,}/",$str)) == FALSE) {
    if ($flag == FALSE) {$flag = TRUE;}
    $arr[$i] = "Ошибка: в пароле меньше 2 спецсиволов"; $i++;
} elseif (preg_match("/([%$#_*]){4,}/",$str)) {
    if ($flag == FALSE) {$flag = TRUE;}
    $arr[$i] = "Ошибка: в пароле больше 3 спецсимволов"; $i++;
} elseif (preg_match("/[a-z]{4,}/",$str)) {
    if ($flag == FALSE) {$flag = TRUE;}
    $arr[$i] = "Ошибка: в пароле больше 3 строчных символов"; $i++;
} elseif (preg_match("/[A-Z]{4,}/",$str)) {
    if ($flag == FALSE) {$flag = TRUE;}
    $arr[$i] = "Ошибка: в пароле больше 3 прописных символов"; $i++;
} elseif (preg_match("/[0-9]{4,}/",$str)) {
    if ($flag == FALSE) {$flag = TRUE;}
    $arr[$i] = "Ошибка: в пароле больше 3 цифр"; $i++;
}

foreach ($arr as $a) {
    echo $a. " ";
}





