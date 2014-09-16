<?php
// Set the info : Lasttemp + HeaterStatus + OpenSensors Status 
// of the zone number in the database
// and Output OK or NOK: 
//    1 // OK
//		or
//		0 // NOK
//
// For Debug Purpose: Set debug parameter to 1
// 
//
require_once("inc/inc_bddcx.php");
$err=0;
$debug=0;

// Get Param argv method
if (isset($argv[1])){
	$_GET['debug']= $argv[1];
	}

if (isset($argv[2])){
	$_GET['zonenb']= $argv[2];
	}

if (isset($argv[3])){
	$_GET['lasttemp']= $argv[3];
	}

if (isset($argv[4])){
	$_GET['heaterstat']= $argv[4];
	}

if (isset($argv[5])){
	$_GET['opensensorstat']= $argv[5];
	}

// Get Input Param GET method (Debug & Zone Number & LastTemp & Heaterstat & OpenSensorsStat)

if (isset($_GET['debug']) && !empty($_GET['debug'])){
			$debug=1;
			}

if (isset($_GET['zonenb']) && !empty($_GET['zonenb'])){
			$zonenb=$_GET['zonenb'];
			if (str_replace(' ','',$zonenb)==''){
				if($debug == 1)
				{
					echo "No Zone Number: to Default Zone (0)\n";//debug
				}
				$zonenb="0";
			}
		}else{
			if($debug == 1)
				{
				echo "No Zone Number: Zone Number To \n";//debug
				}
			$zonenb="0";
		}

//test Zone Number  (String to Int function) and ONLY a Number IF NOT ZoneNb is Set to 0
if (is_numeric($zonenb))
{
	if ($maxzone <= intval($zonenb) ||  0 > intval($zonenb))
		{
			$err=1;
			$zonenb="0";
		}
}
else
{
	$zonenb="0";
}

if (isset($_GET['lasttemp']) && !empty($_GET['lasttemp'])){
			$lasttemp=$_GET['lasttemp'];
			if (str_replace(' ','',$lasttemp)==''){
				if($debug == 1)
				{
					echo "lasttemp is not set: Default Value > 0\n";
				}
				$lasttemp="0";
			}
		}else{
			if($debug == 1)
				{
				echo "lastemp to default > 0\n";//debug
				}
			$lasttemp="0";
		}

//test lasttemp  (String to Int function) and ONLY a Number
if (is_numeric($lasttemp))
{
	if ($maxtemp <= intval($lasttemp))
		{
			$err=1;
			$lasttemp="0";
		}
}
else
{ 
	$err=1;
	$lasttemp="0";
}


if (isset($_GET['heaterstat']) && !empty($_GET['heaterstat'])){
			$heaterstat=$_GET['heaterstat'];
			if (str_replace(' ','',$heaterstat)==''){
				if($debug == 1)
				{
					echo "heaterstat is not set: Default Value > OFF\n";
				}
				$heaterstat="0"; // OFF
			}
		}else{
			if($debug == 1)
				{
				echo "heaterstat to default > OFF\n";//debug
				}
			$heaterstat="0";
		}

//test heaterstat  (String to Int function) and ONLY a Number
if (is_numeric($heaterstat))
{
	if (intval($heaterstat) <= 0)
		{
			$heaterstat="0"; // OFF
		}
		else
		{
			$heaterstat="1"; // ON
		}
}
else
{ 
	$err=1;
	$heaterstat="0"; // OFF Default
}


if (isset($_GET['opensensorstat']) && !empty($_GET['opensensorstat'])){
			$opensensorstat=$_GET['opensensorstat'];
			if (str_replace(' ','',$opensensorstat)==''){
				if($debug == 1)
				{
					echo "opensensorstat is not set: Default Value > OFF/CLOSED\n";
				}
				$opensensorstat="0"; // OFF/CLOSED
			}
		}else{
			if($debug == 1)
				{
				echo "opensensorstat to default > OFF\n";//debug
				}
			$opensensorstat="0"; // OFF/CLOSED
		}

//test opensensorstat and ONLY a Number
if (is_numeric($opensensorstat))
{
	if (intval($opensensorstat) <= 0)
		{
			$opensensorstat="0"; // OFF / CLOSED
		}
		else
		{
			$opensensorstat="1"; // ON / OPENED
		}
}
else
{ 
	$err=1;
	$opensensorstat="0"; // OFF / CLOSED
}


if($debug == 1)
	{
	echo "Params: zonenb=$zonenb lasttemp=$lasttemp heaterstat=$heaterstat opensensorstat=$opensensorstat\n";
	}
	
// Set Lastemp & HeaterStatus & OpenSensors Status
//
//  UPDATE `thzone` SET `ZoneLasttemp` = '20',
// `ZoneLastHeaterStats` = '1',
// `ZoneLastOpenSStats` = '1' WHERE `thzone`.`idThZone` =0;
//
if ($err==0)
{
	$sql_result=mysql_query("UPDATE `ThZone` SET `ZoneLasttemp` = $lasttemp,
	`ZoneLastHeaterStats` = $heaterstat,
	`ZoneLastOpenSStats` = $opensensorstat WHERE `ThZone`.`idThZone` =$zonenb;
	",$connection)	or exit("Sql Error".mysql_error());
	echo "0"; // OK
}
else
{
	echo "1"; // NOK
}						
?>
