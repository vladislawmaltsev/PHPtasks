<?php
require "ht4.html";

if (isset($_REQUEST['area1'])) {

    $allStr = $_REQUEST['area1'];

    $arr = explode(PHP_EOL, $allStr);

    $sumOfInt = 0;
    $intArr = [];

    foreach ($arr as &$str) {
        $i = 0;
        $int = 0;

        while (is_numeric(substr(trim($str), $i - 1))){
            $i--;
            $int = substr(trim($str), $i);
        }

        $str = explode(" ", trim($str));
        array_pop($str);

        $str = implode(" ", $str);
        $intArr[] = $int;
        $sumOfInt += $int;
    }
    $probabArr = [];
    foreach ($intArr as $item) {
        if ($sumOfInt)
            $probabArr[] = $item / $sumOfInt;
        else $probabArr[] = $item / 1;

    }
    $data = [];

    for($i = 0; $i<count($arr); $i++){
        $data[] = [
            "text" => $arr[$i],
            "weight" => $intArr[$i],
            "probability" => $probabArr[$i]
        ];
    }
    $json1 = [
        "sum" => $sumOfInt,
        "data" => $data
    ];
    print_r(json_encode($json1, JSON_UNESCAPED_UNICODE));
    include "ht4.php";
    echo "\n<br>";
    echo "\n<br>";
    check($arr, $probabArr);
}