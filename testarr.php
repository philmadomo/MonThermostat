<?php
/* 	
 Page de Test MonThermostat
 Configuration d'un JOUR 23 (5°C -> 28°C) sur 48 Unitéde temps : 0h, 0h30, 1h, 1h30,...
 
*/

$SPDtab = array(20,20,20,20,20,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,20,20,20,20,20,20,20,20);

$count = count($SPDtab);
for ($i = 0; $i < ($count-1); $i++) {
	echo $SPDtab[$i].",";
}
echo $SPDtab[$i]."\n";


$serialize_array = serialize($SPDtab);

echo "SerilizeA:".$serialize_array."\n";
$unserialized_array = unserialize($serialize_array);

echo "UnSerilizeA:";
$count = count($unserialized_array);
for ($i = 0; $i < ($count-1); $i++) {
        echo $unserialized_array[$i].",";
}
echo $unserialized_array[$i]."\n";

?>
