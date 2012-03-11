<?php

//example script

require_once 'bijoy2unicode.php';

$demo = 'Dt 22 †deªæqvix 1969|';

//$demo = utf8_encode($demo);

//Secho $demo.'   ';

$converted = convertBijoyToUnicode($demo);

echo $converted;

?>