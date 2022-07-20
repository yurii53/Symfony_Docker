<?php
$str = "1,2,3,4,5,6,7,8,9,10,11,12,13,14,15";
$regex = "/([a-zA-Z!@#$%^&*()])/";
$arr = explode(',', $str);

if (preg_match($regex, $str) or end($arr) > 15){
    echo "wrong data";
    exit;
}
$counter = 1;
foreach ($arr as $value){
    if ($counter == $value) $counter ++;
    else{
        echo "wrong data";
        exit;
    }
    if ($counter > 15){
        echo "data is correct";
        exit;
    }

}