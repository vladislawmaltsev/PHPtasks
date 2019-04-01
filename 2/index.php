<?php

require 'ht3.html';

if (isset($_POST["area1"])){
    $oldStr = $_POST["area1"];
}

function changeStr(string $string) : string
{   $newStr = '';
    $gen = gen($string);
    foreach ($gen as $char){
        $newStr = $newStr.$char;
    }
    echo $gen->getReturn();
    return $newStr;
}

function gen(string $string){
    static $count = 0;
    $strarray = str_split($string);
    for ($i = 0; $i<count($strarray); $i++){
        switch ($strarray[$i]) {
            case "l" :
                yield 1;
                $count++;
                break;

            case "h" :
                yield 4;
                $count++;
                break;

            case "e" :
                yield 3;
                $count++;
                break;

            case "o" :
                yield 0;
                $count++;
                break;

            default:
                yield $strarray[$i];
        }
    }
    return 'Swap count: '.$count."\n<br>";
}
echo changeStr($oldStr);