<?php
$motor = "disel";
$capacity = 2000;
$year = 2008;
$price = 5500;
$motor_type = (object) array('disel' => 75.0,
    'benzyn' => 50.0);
if ($year < 1970 or $year > 2022 or gettype($year) != "integer"){
    echo "wrong year";
    exit;
}


if (gettype($capacity) != "integer" or $capacity <= 0){
    echo "wrong capacity";
    exit;
}
if (gettype($price) != "integer" or $price <= 0){
    echo "wrong price";
    exit;
}
$age_k = (int)date("Y") - $year -1;
if ($age_k <= 0)
    $age_k = 1;


$akciz = $motor_type -> {$motor} * $age_k * ($capacity/1000);
echo "Вартість акцизи: ", $akciz, "\nПовна вартість автомобіля: ", $price+$akciz;


