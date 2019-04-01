<?php
function one(string $a){
    $a = mb_strtolower($a);
    if (preg_match('/up|1|true|yes|\+/m', $a)) return "+";
    if (preg_match('/0|null|false|no|down|-/m', $a)) return "-";
    echo "Ошибка 1";
    return false;
}
function two(string $b){
    if ($b=="+") return "+";
    elseif ($b=="-") return "-";
    echo "Ошибка 2";
    return false;
}
function three(string $c ){
    if (strlen($c) == 1) return $c;
    echo "Ошибка 3";
    return false;
}