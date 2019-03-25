<?php

require 'ht3.html';

$allStr = "";

if (isset($_POST["area1"])){
    $allStr = $_POST["area1"];
}

$separator = "\n";
$sep2 = " ";
$strs = explode($separator,$allStr);
$secStrs = $strs;

for ($i = 0; $i < count($secStrs); $i++) {
    $arr = explode($sep2,$secStrs[$i]);
    shuffle($arr);
    $secStrs[$i] = implode(" ",$arr);
}

$finalArr = array_merge($secStrs,$strs);

uasort($finalArr, function ($val1, $val2) {
    if (count(explode(" ", $val1)) > 1 && count(explode(" ", $val2)) > 1) {
        return explode(" ", $val1)[1] <=> explode(" ", $val2)[1];
    } else if (count(explode(" ", $val1)) == count(explode(" ", $val2))) {
        return explode(" ", $val1)[0] <=> explode(" ", $val2)[0];
    } else {
        return count(explode(" ", $val1)) <=> count(explode(" ", $val2));
    }
});

foreach ($finalArr as $a) {
    echo $a . "\n</br>";
}
