<html>
<body>
<form action="index.php" method="POST">
    <textarea name="2" id="" cols="30" rows="10"></textarea>
    <input name="1" type="text">
</form>
</body>
</html>


<?php
$inputData = '';
$source = '';
$output = '';
    
$arr = [];
$cell = -1;
$brackets = 0;

if (isset($_POST["2"])){
    $source = $_POST["2"];
}
if (isset($_POST["1"])){
    $inputData = $_POST["1"];
}
$source = array_values(array_filter(preg_split('//', $source)));

for($i=0; $i<count($source); ++$i) {
    switch($source[$i]) {
        case "+" :
            $arr[$cell]++;
            break;

        case "-" :
            $arr[$cell]--;
            break;

        case "." :
            $str = chr($arr[$cell]);
            $output = $output.$str;
            break;

        case "," :
            $arr[$cell] = ord($inputData[$cell]);
            break;

        case ">" :
            $cell++;
            if(!isset($arr[$cell])) {
                $arr[$cell] = 0;
            }
            break;
        case "<" :
            $cell--;
            if(!isset($arr[$cell])) {
                $arr[$cell] = 0;
            }
            break;

        case "[" :
            if(!$arr[$cell]) {
                $brackets = 1;
                while($brackets) {
                    $i++;
                    if($source[$i] == "[") {
                        $brackets++;
                    } else if($source[$i] == "]") {
                        $brackets--;
                    }
                }
            }
            break;

        case "]" :
            if($arr[$cell]) {
                $brackets = 1;
                while($brackets) {
                    $i--;
                    if($source[$i] == "]") {
                        $brackets++;
                    } else if($source[$i] == "[") {
                        $brackets--;
                    }
                }
            }
            break;
    }
}

echo "Result: ".$output;


