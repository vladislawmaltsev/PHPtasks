<?php

require 'ht4.html';

$allStr = "";

if (isset($_POST["area1"])){
    $allStr = $_POST["area1"];
}

$separator = "\n";
$sep2 = " ";
$ves = [];
$vesInt = [];

$strs = explode($separator,$allStr);

for ($i = 0; $i < count($strs); $i++) {
    $arr = explode($sep2,$strs[$i]);
    $ves[$i] = $arr[count($arr)-1];
}


for ($i = 0; $i < count($ves); $i++) {
    $vesInt[$i] = (int) $ves[$i];
}


$sum = array_sum($vesInt);

$prob = [];


for ($i = 0; $i < count($vesInt); $i++) {
    $prob[$i] = $vesInt[$i]/$sum;
}



foreach ($prob as $a) {
    echo $a . " ";
}


echo $sum;