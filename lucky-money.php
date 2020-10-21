<?php

$money = 100;
$population = 5;

$a = luckyMoney($money, $population);
var_export($a);


function luckyMoney(string $money, int $population): array
{
    $money = sprintf('%.2F', $money);

    // 金额不足或人数不足
    if ($money <= 0 || $population < 1) {
        return [];
    }

    // 一个人
    if (1 == $population) {
        return [$money];
    }

    $luckMoneys = [];

    // 恰好每人一分
    $cents  = $money * 100;
    if ($cents == $population) {
        return array_pad($luckMoneys, $population, '0.01');
    }

    // 随机分配
    $seeds = [];
    $allowZeroCent = $cents < $population;
    $min = $allowZeroCent ? 0 : 1;
    $max = $allowZeroCent ? $cents : $cents - 1;
    do {
        $seed = random_int($min, $max);
        if ($allowZeroCent) {
            $seeds[] = $seed;
        } else {
            $seeds[$seed]= 1;
        }
    } while (count($seeds) < $population - 1);
    $seeds = $allowZeroCent ? $seeds : array_keys($seeds);
    sort($seeds);
    for ($i = 0; $i < $population; $i++) {
        $curSeed = $seeds[$i] ?? $cents;
        $preSeed = $seeds[$i -1] ?? 0;
        $luckMoneys[] = bcdiv($curSeed - $preSeed, 100, 2);
    }

    return $luckMoneys;
}
