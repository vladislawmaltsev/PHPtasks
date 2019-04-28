<?php
namespace exceptions;
class Exception3 extends Exception1
{
    public function myFunc() {
        echo "Сработало третье исключение\n"."<br>";
    }
}