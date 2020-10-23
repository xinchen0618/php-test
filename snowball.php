#!/usr/bin/env php
<?php

$pb = $argv[1];
$market = $argv[2];
$grow = $argv[3];

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

