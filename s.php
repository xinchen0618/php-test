#!/usr/bin/env php
<?php

$market = $argv[1];
$pe = $argv[2];
$grow = $argv[3];

$profitBase = $market / $pe;
$profit = 0;
$year = 1;
do {
    $profitBase *= (1 + $grow);
    $profit += $profitBase;
    echo $year, "\t", $profit, "\n";
    if ($profit >= $market) {
        break;
    }
    $year++;
} while (true);

