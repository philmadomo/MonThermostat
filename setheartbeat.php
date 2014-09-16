<?php
// Set of the Timestamp Value in Database (Heartbeat purpose)
// and Output OK or NOK: 
//    1 // OK
//		or
//		0 // NOK
//
// For Debug Purpose: Set debug parameter to 1
//
// BE CAREFUL : idThConfig should be set to 0 in thermostatconfig table
//
require_once("inc/inc_bddcx.php");
$err=0;
$debug=0;

// Get Input Argv method
if (isset($argv[1])){
	$_GET['debug']= $argv[1];
	}

if (isset($argv[2])){
	$_GET['HBTimeStamp']= $argv[2];
	}

// Get Input Param GET method (Debug & exttemp & timestamp)
if (isset($_GET['debug']) && !empty($_GET['debug'])){
			$debug=1;
			}

if (isset($_GET['HBTimeStamp']) && !empty($_GET['HBTimeStamp'])){
			$HBTimeStamp=$_GET['HBTimeStamp'];
			if (str_replace(' ','',$HBTimeStamp)==''){
				if($debug == 1)
				{
					echo "HBTimeStamp is not set: Default Value > 0\n";
				}
				$HBTimeStamp="0";
				$err=1;
			}
		}else{
			if($debug == 1)
				{
				echo "HBTimeStamp to default > 0\n";//debug
				}
			$err=1;
			$HBTimeStamp="0";
		}

//test HBTimeStamp and ONLY a Number
if (!is_numeric($HBTimeStamp))
{
	$err=1;
	$HBTimeStamp="0";
}


if($debug == 1)
	{
	echo "Params: HBTimeStamp=$HBTimeStamp err=";
	}

// Set HeartBeat TimeStamp : (-1) et TS:1233455343
// UPDATE `thermostatconfig` SET `ExtLastTemp` = $exttemp,
// `HBTimeStamp` = $HBTimeStamp WHERE `thermostatconfig`.`idThConfig` =0;
//
// Set ExtTempProbe Value + Timestamp in the Default Config
if ($err==0)
{
	$sql_result=mysql_query("UPDATE `ThermostatConfig` SET 
	`HBTimeStamp` = $HBTimeStamp WHERE `ThermostatConfig`.`idThConfig` =0;
	",$connection)	or exit("Sql Error".mysql_error());
	echo "0"; // OK
}
else
{
	echo "1"; // NOK
}

?>
