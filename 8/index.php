<?php
include "indexxx.html";
$dateTime = new DateTime();
if (!isset($_REQUEST['month'])) return;
//echo date("w", $dateTime->getTimestamp());
