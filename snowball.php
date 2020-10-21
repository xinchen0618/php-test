<?php

$pb = 2;
$market = 2852;
$grow = 0.12;

$base = $market / $pb;
$year = 1;
do {
    $base *= (1 + $grow);
    echo $year, "\t", $base, "\n";
    if ($base >= $market) {
        break;
    }
    $year++;
} while (true);

