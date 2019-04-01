<?php

include "helper.php";

$iniArr = parse_ini_file("index.ini", true, INI_SCANNER_NORMAL);
$textArr = file($iniArr["main"]["filename"]);
$symbArr = [];

foreach ($iniArr as $item)
    if (isset($item["symbol"]))
        $symbArr[] = $item["symbol"];

$ruleArr = [];
$ruleArr[] = one($iniArr["first_rule"]["upper"]);
$ruleArr[] = two($iniArr["second_rule"]["direction"]);
$ruleArr[] = three($iniArr["third_rule"]["delete"]);

foreach ($textArr as &$str) {
    if (strpos($str, $symbArr[0]) === 0){
        $str = substr($str, strpos($str, " ") + 1);
        if ($ruleArr[0] == "+") $str = mb_strtoupper($str);
        elseif ($ruleArr[0] == "-") $str = mb_strtolower($str);
    }
    if (strpos($str, $symbArr[1]) === 0) {
        $str = substr($str, strpos($str, " ") + 1);
        $newstr = str_split($str);
        switch ($ruleArr[1]) {
            case "+":
                foreach ($newstr as &$second) {
                    if (preg_match('/[0-9]/m', $second)){
                        if ($second == 9) $second = 0;
                        else $second++;
                    }
                }
                break;

            case "-" :
                foreach ($newstr as &$second) {
                    if (preg_match('/[0-9]/m', $second)) {
                        if ($second == 0) $second = 9;
                        else $second--;
                    }
                }
                break;
        }
        $str = implode($newstr);
    }
    if (strpos($str, $symbArr[2]) === 0) {
        $str = substr($str, strpos($str, " ") + 1);
        if ($ruleArr[2] !== false) {
            $str = substr($str, strpos($str, " ") + 1);
            $str = explode($ruleArr[2], $str);
            $str = implode($str);
        }
    }
}
foreach ($textArr as $value) echo $value;

echo "\n\n";