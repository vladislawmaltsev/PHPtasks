<?php

use \exceptions\Exception1;
use \exceptions\Exception2;
use \exceptions\Exception3;
use \exceptions\Exception4;
use \exceptions\Exception5;
spl_autoload_register(function ($class) {
    $str =  $class;
    include_once __DIR__."\\".$class.".php";
});
$myClass = new \dir\helper();
for ($i = 1; $i<5; $i++){
    $fname = "f".$i;
    $m = rand(-10,10);
    try {
        echo "\n".$m."\n";
        $myClass->$fname($m);
    } catch (Exception5 $exception){
        echo $exception->getMessage()."\n";
        $exception->myFunc();
    }   catch (Exception4 $exception){
        echo $exception->getMessage()."\n";
        $exception->myFunc();
    }   catch (Exception3 $exception){
        echo $exception->getMessage()."\n";
        $exception->myFunc();
    }   catch (Exception2 $exception){
        echo $exception->getMessage()."\n";
        $exception->myFunc();
    }   catch (Exception1 $exception){
        echo $exception->getMessage()."\n";
        $exception->myFunc();
    }
}
