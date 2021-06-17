#!/usr/bin/env php
<?php

$pe = $argv[1] ?? '';
$grow = $argv[2] ?? '';

if ('' === $pe || '' === $grow) {
    exit;
}

$profitBase = 1 / $pe;
$profit = 0;
$year = 1;
do {
    $profitBase *= (1 + $grow);
    $profit += $profitBase;
    echo $year,"\t", var_export($profit, true), "\n";
    if ($profit >= 1) {
        break;
    }
    $year++;
} while (true);
