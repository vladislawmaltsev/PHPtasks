<?php
namespace dir;
use \exceptions\Exception1;
use \exceptions\Exception2;
use \exceptions\Exception3;
use \exceptions\Exception4;
use \exceptions\Exception5;

class helper
{
    public function f1(int $a) {
        if ($a>=0){
            throw new Exception1("Больше нуля или ноль!"."\n");
        }else throw new Exception2("Меньше нуля!"."\n");
    }
    public function f2(int $a){
        if ($a%2==0){
            throw new Exception3("Четно!"."\n");
        }else throw new Exception4("Нечетно!"."\n");
    }
    public function f3(int $a){
        if ($a%3==0){
            throw new Exception5("Делится на три!"."\n");
        }else throw new Exception1("Не делится на три!"."\n");
    }
    public function f4(int $a){
        if ($a%5==0){
            throw new Exception2("Делится на пять!"."\n");
        }else throw new Exception3("Не делится на пять!"."\n");
    }
}