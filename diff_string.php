<?php

$all = "2294174,2255108,2649104,754821,40012,1527823,1290983,710808,2228274,1179738,1382701,2649515,121085,1735625,2649105,2291505,2522469,2608243,1240225,427942,2596354,2649510";
$part = "2294174, 2255108, 2649104, 754821, 1290983, 710808, 2228274, 2649515, 1735625, 2649105, 2291505, 2522469, 2608243, 1240225, 2596354, 2649510";

$all = str_replace(["'", ' '], '', $all);
$all = explode(',', $all);
echo 'all counts: ', count($all), "\n";

$part = str_replace(["'", ' '], '', $part);
$part = explode(',', $part);
echo 'part counts: ', count($part), "\n";

$short = array_diff($all, $part);
echo "short counts: ", count($short), "\n";
echo 'short: ', implode(', ', $short), "\n";
