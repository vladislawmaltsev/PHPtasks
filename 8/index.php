<?php

include "helper.php";
if (!isset($_REQUEST['month'])) $month = "now";
    else $month = $_REQUEST['month'];

$fileArr = file("month.txt");
$fileArr = explode(",", $fileArr[0]);

if ($month == "now") {
    $dateTime = new DateTime();
    $dateTime->setDate(date("o", $dateTime->getTimestamp()),
        date("n", $dateTime->getTimestamp()),1);}
    else $dateTime = setDate($fileArr,$month);

$today = new DateTime();

$num = 0;
$wed = 0;
$begin = $dateTime;
$year = date("o", $dateTime->getTimestamp());
$month = date("n", $dateTime->getTimestamp());
$day = date("t", $dateTime->getTimestamp());


$end = new DateTime();
$end->setDate($year,$month,$day);
$end = $end->modify( '+1 day' );
$interval = new DateInterval('P1D');
$dateRange = new DatePeriod($begin, $interval ,$end);
$non = addElement($dateTime);
?>


<form method="get" action="index.php">
<input type="text" name="month">
<input type="submit" value="OK">
</form>

<h3><?php echo date("F", $dateTime->getTimestamp()) ?></h3>

<table>
    <tr >
        <td>Пн</td><td>Вт</td><td>Ср</td><td>Чт</td><td>Пт</td><td>Сб</td><td>Вс</td>
    </tr>
    <?php
    foreach ($non as $item){
        if (!($num%7)) echo "<tr>";
        if ($num==5||$num==6){
            echo "<td style='color: red'> </td>";
        }
        else
            echo "<td> </td>";
        $num ++;
        if (!($num%7)) echo "</tr>";
    }
    foreach($dateRange as $date){
        if (!($num%7)) echo "<tr>";
        if (date("w",$date->getTimestamp()) == 0 || date("w",$date->getTimestamp()) == 6){
            echo "<td style='color: red'>";
        }
        else
            echo "<td>";
        if (date("m", $date->getTimestamp())==date("m", $today->getTimestamp()) &&
            date("d", $date->getTimestamp())==date("d", $today->getTimestamp())){
            echo "<b>".date("j", $date->getTimestamp())."</b></td>";
        }
        else
            echo date("j", $date->getTimestamp())."</td>";
        $num ++;
        if (!($num%7)) echo "</tr>";
    }
    ?>
</table>