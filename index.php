<?php

$i = 5;
$ii = 6;

function test(int $i, int $ii):bool {
    return $i >= $ii;
}

var_dump(test($i, $ii));

?>


