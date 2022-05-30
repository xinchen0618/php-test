<?php

$counts = 0;

for ($i = 1; $i <= 23; $i++) {
    $interval = fib($i);
    if ($interval >= 3600) {
        echo "interval:\t",  round($interval / 3600, 2), ' h', "\n";
    } elseif ($interval >= 60) {
        echo "interval:\t", round($interval / 60, 2), ' i', "\n";
    } else {
        echo "interval:\t", $interval, ' s', "\n";
    }

    $counts += $interval;
}

echo "counts:\t\t", round($counts / 3600, 2), ' h', "\n";


function fib(int $n) {
    if (0 === $n || 1 === $n) {
        return $n;
    }

    return fib($n - 1) + fib($n - 2);
}