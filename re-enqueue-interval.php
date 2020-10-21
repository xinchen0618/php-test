<?php

$counts = 0;

for ($i = 1; $i <= 24; $i++) {
    $interval = $i ** 3;
    if ($interval >= 3600) {
        echo round($interval / 3600, 2), ' h', "\n";
    } elseif ($interval >= 60) {
        echo round($interval / 60, 2), ' i', "\n";
    } else {
        echo $interval, ' s', "\n";
    }

    $counts += $interval;
}

echo round($counts / 3600, 2), ' h', "\n";
