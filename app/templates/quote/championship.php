<?php
$first_game = 1930;
$start = 2000;
$end = 2100;
while ($first_game < $end){
    if ($first_game > $start){
        echo $first_game, " Year\n";
    }
    $first_game +=4;
}


