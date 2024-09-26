<?php

$sum = 0;
$j = 1;
$m = 60;
for ($i = $m; $i > 0; $i--) {
    echo ($i * 10000) . " * x, $j", "\n";
    $sum += $i * 10000;
    $j++;
}

echo "interest: ($m * 10000) * (0.18 / 100) * $m" . "\n";
$interest = ($m * 10000) * (0.18 / 100) * $m;

$r = $interest / $sum * 100;
echo $r . "%\n";
echo $r*12 . "%\n";
