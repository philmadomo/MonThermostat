<?php
// Set the info : ExtLasttemp Value
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
	$_GET['extlasttemp']= $argv[3];
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

if (isset($_GET['extlasttemp']) && !empty($_GET['extlasttemp'])){
			$extlasttemp=$_GET['extlasttemp'];
			if (str_replace(' ','',$extlasttemp)==''){
				if($debug == 1)
				{
					echo "extlasttemp is not set: Default Value > 0\n";
				}
				$extlasttemp="0";
			}
		}else{
			if($debug == 1)
				{
				echo "extlastemp to default > 0\n";//debug
				}
			$extlasttemp="0";
		}

//test lasttemp  (String to Int function) and ONLY a Number
if (is_numeric($extlasttemp))
{
	if ($maxtemp <= intval($extlasttemp))
		{
			$err=1;
			$extlasttemp="0";
		}
}
else
{ 
	$err=1;
	$extlasttemp="0";
}


if($debug == 1)
	{
	echo "Params: zonenb=$zonenb extlasttemp=$extlasttemp\n";
	}
	
// Set ExtLastemp
//
//  UPDATE `thzone` SET `ExtLastTemp` = '20',
// `ZoneLastHeaterStats` = '1',
// `ZoneLastOpenSStats` = '1' WHERE `thzone`.`idThZone` =0;
//
if ($err==0)
{
	$sql_result=mysql_query("UPDATE `ThZone` SET `ExtLastTemp` = $extlasttemp
	WHERE `ThZone`.`idThZone` =$zonenb;
	",$connection)	or exit("Sql Error".mysql_error());
	echo "0"; // OK
}
else
{
	echo "1"; // NOK
}						
?>
