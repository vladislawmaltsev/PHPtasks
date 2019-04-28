<?php
include "index.html";
include "other.php";
if (!isset($_REQUEST['url'])|| !isset($_REQUEST['type'])) return;

$url = $_REQUEST['url'];
$type = $_REQUEST['type'];
if (filter_var($url, FILTER_VALIDATE_IP)) $ip = $url;
else $ip = getIP($url);
if ($ip)
    switch ($type):
        case "p": ping($ip); break;
        case "t": tracert($ip); break;
    endswitch;
else echo "ip адрес не существует";