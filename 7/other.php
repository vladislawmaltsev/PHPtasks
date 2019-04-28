<?php
function ping($ip){
    exec( "ping ".$ip, $output, $retVar);
    if($retVar == 0):
        $percent = 100-(int)preg_match( '/[0-9.]+%/m',array_pop($output));
        echo "<b>$ip</b><br>Процент успешных запросов: $percent %";
        return true;
    else :
        echo "The IP address, $ip, is dead";
        return false;
    endif;
}
function tracert($ip){
    exec( "tracert ".$ip, $output, $retVar);
    if($retVar == 0) {
        echo "Список адресов на пути: <br> ";
        foreach ($output as $item) {
            echo $item."<br>";
            $item = explode(" ", trim($item));
            if (isset($item[2]) && $item[2] != "*")
                echo $item[2] . "<br>";
        }
        return true;
    }else {
        echo "The IP address, $ip, is dead";
        return false;
    }
}
function getIP($url){
    if(strpos($url, 'http') !== FALSE)  $url = parse_url($url)['host'];
    $ip = gethostbyname($url);
    if($ip == $url) $ip = FALSE;
    return $ip;
}
