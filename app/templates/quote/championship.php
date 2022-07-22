
<?php

use App\Repository\QuoteRepository;


$first_game = 1930;
$start = 2000;
$end = 2100;
while ($first_game < $end){
    if ($first_game > $start){
        //echo $first_game, " Year\n";
    }
    $first_game +=4;
}
$str = 'asd asds-asda_asdasd';
$result = str_replace(['-','_',' '], '', ucwords($str, " -_\t\r\n\f\v'"));
$arr = [1,2,3,4,5];
array_push($arr, 6);
print_r($arr);


