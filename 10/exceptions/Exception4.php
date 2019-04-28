<?php
namespace exceptions;
class Exception4 extends Exception3
{
    public function myFunc() {
        echo "Сработало четвертое исключение\n"."<br>";
    }
}