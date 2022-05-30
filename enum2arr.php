<?php

$enum = '1-店铺关停,2-解除处罚,3-补缴保证金,4-店铺冻结扣除,5-申请推广人';
$enum = explode(',', $enum);

$arr = [];
foreach ($enum as $item) {
    $item  = trim($item);
    [$key, $value] = explode('-', $item);
    $arr[] = "{$key} => '{$value}'";
}

echo '[', implode(', ', $arr), ']';
