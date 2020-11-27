#!/usr/bin/env php
<?php

$pe = $argv[1];
$grow = $argv[2];

$profitBase = 1 / $pe;
$profit = 0;
$year = 1;
do {
    $profitBase *= (1 + $grow);
    $profit += $profitBase;
    if ($profit >= 1) {
        break;
    }
    $year++;
} while (true);

echo $year, "\n";

