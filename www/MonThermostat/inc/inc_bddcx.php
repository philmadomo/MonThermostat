<?php

$host = "localhost";
$user = "monthermo";
$password = "monthermo";
$database = "MonThermostat";
$connection = mysql_connect($host,$user,$password) or die("Could not connect: ".mysql_error());
mysql_select_db($database,$connection) or die("Error in selecting the database:".mysql_error());

// Parameters:

?>
