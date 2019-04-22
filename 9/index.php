<?php
require_once "Logger.php";
require_once "BrowserLogger.php";
require_once "FileLogger.php";
include "index.html";

if(isset($_REQUEST["type"])) {
    $type = $_REQUEST["type"];
}


if (empty($_REQUEST["text"])) {
    echo "<p style=\"color:red\">Text: </p>";
    return;
}
$textArr = explode(PHP_EOL,$_REQUEST["text"]);

$logger = null;
if ($type == "file"){
    workWithFile($textArr);
}else browser($textArr);
function workWithFile(array $textArr){
    if (empty($_REQUEST["filename"])) {
        echo "<p style=\"color:green\">File name: </p>";
        return;
    }
    $filename = $_REQUEST["filename"];
    $fileLogger = new FileLogger("$filename");
    write($fileLogger,helper($textArr));
}
function browser(array $textArr){
    $browserLogger = new BrowserLogger($_REQUEST["setting"]);
    write($browserLogger, helper($textArr));
}
function write(Logger $logger, array $textArr){
    foreach ($textArr as $str) $logger -> write($str);
}
function helper(array $teatArr):array {
    $newTextArr = [];
    $k = 0;
    foreach ($teatArr as $text){
        foreach (str_split($text) as $char){
            if (ctype_upper($char)) {
                $newTextArr[] = "Строка \"".trim($text)."\" содержит заглавные буквы";
                $k = 1;
                break;
            }
        }
        if ($k == 1) {
            $k= 0;
            continue;
        }
        $newTextArr[] = "Строка \"".trim($text)."\" не содержит заглавные буквы";
    }
    return $newTextArr;
}