
<?php

use App\Repository\QuoteRepository;


$first_game = 1930;
$start = 2000;
$end = 2100;
while ($first_game < $end){
    if ($first_game > $start){
        echo $first_game, " Year\n";
    }
    $first_game +=4;
}
function index1(
    QuoteRepository $quoteRepository
    ){
    $objectVars = get_object_vars($quoteRepository->findAll()[1]);
    foreach ($objectVars as $key => $value) {
        echo $value;

    }
}
index1();



