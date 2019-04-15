<?php
function rrange($textarr, $intarr, $sum, $count) {
    $a = 0;
    while ($a<$count) {
        $a++;
        $rand = rand(1, $sum);
        $rum = 0;
        $jkj = 1;
        foreach ($intarr as $key => $item) {
            if ($jkj){
                $rum+=$item;
                if ($rum >= $rand  ) {
                    $jkj = 0;
                    yield $textarr[$key];
                }
            }
        }
    }
}
function check($textarr, $intarr){
    if (!isset($textarr) || !isset($intarr)) return;

    $realLife = [];
    $count = 10000;

    foreach ($textarr as $item){
        $realLife[$item] = 0;
    }
    $newSum = 0;

    foreach ($intarr as &$integer){
        $integer = round($integer*100);
        $newSum += $integer;
    }
    foreach (rrange($textarr, $intarr, $newSum,$count) as $item){
        foreach ($textarr as $value){
            if ($item == $value){
                $realLife[$item]++;
                break;
            }
        }
    }
    for($i = 0; $i<count($textarr); $i++){
        $data[] = [
            "text" => $textarr[$i],
            "count" => $realLife[$textarr[$i]],
            "probability" => $intarr[$i]/100
        ];
    }
    print_r(json_encode($data, JSON_UNESCAPED_UNICODE));
}