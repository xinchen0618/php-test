<?php

$a = '9781644721452
9781644721469
9781644721476
9781644721483
9781644721490
9781644721506
9781792265297
9781792265303
9781792265310
9781792265327
9781792265334
9781792265341';
$a = str_replace(['"', '	', ','], ['', '', "\n"], $a);  // CSV, XLS并列
$a = explode("\n", $a);

echo '[', implode(', ', $a), ']';  // 整型
echo "\n\n";
echo "['", implode("', '", $a), "']";  // 字符串
