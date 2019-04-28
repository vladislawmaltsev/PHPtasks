<?php
namespace exceptions;
use Exception;
class Exception1 extends Exception
{

    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
    public function myFunc() {
        echo "Сработало первое исключение\n"."<br>";
    }
}