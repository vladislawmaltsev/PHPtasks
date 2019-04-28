<?php
namespace exceptions;
class Exception2 extends Exception1
{
    public function myFunc() {
        echo "Сработало второе исключение\n"."<br>";
    }
}