<?php
require_once "Logger.php";
class FileLogger extends Logger{
    private $fileName;
    private $handler;
    public function __construct(string $filename)
    {
        $this->fileName = $filename;
        $this->handler = fopen($filename,'a');
    }
    function write(string $str){
        fwrite($this->handler, $str."\n");
    }
    public function __destruct()
    {
        fclose($this->handler);
    }
}