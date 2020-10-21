<?php

$enum = '1-2~3岁,2-3~4岁,3-4~5岁,4-5~6岁,5-6~7岁,6-7~8岁';
$enum = explode(',', $enum);

$arr = [];
foreach ($enum as $item) {
    $item  = trim($item);
    [$key, $value] = explode('-', $item);
    $arr[] = "{$key} => '{$value}'";
}

echo '[', implode(', ', $arr), ']';
