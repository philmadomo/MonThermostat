<?php
// Get the status of the zone number in the database
// and display it : 
//    1 (enable)
//		0 (disable)
//		E (in Error)
//
// For Debug Purpose: Set debug parameter to 1
//
//
require_once("inc/inc_bddcx.php");
$err=0;
$debug=0;

if (isset($argv[1])){
	$_GET['debug']= $argv[1];
	}

if (isset($argv[2])){
	$_GET['zonenb']= $argv[2];
	}

// Get Input Param (Debug & Zone Number)

if (isset($_GET['debug']) && !empty($_GET['debug'])){
			$debug=1;
			}

if (isset($_GET['zonenb']) && !empty($_GET['zonenb'])){
			$zonenb=$_GET['zonenb'];
			if (str_replace(' ','',$zonenb)==''){
				if($debug == 1)
				{
					echo "No Zone Number: Set to Default Zone (0)\n";//debug
				}
				$zonenb="0";
			}
		}else{
			if($debug == 1)
				{
				echo "No Zone Number: Set Zone Number To 0\n";//debug
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
	$err=1;
	$zonenb="0";
}


//Get ZoneEnable for ZoneNumber
$sql_result=mysql_query("SELECT ZoneEnable FROM ThZone WHERE idThZone=$zonenb",$connection)	or exit("Sql Error".mysql_error());
$sql_num=mysql_num_rows($sql_result);

while($sql_row=mysql_fetch_array($sql_result))
{
	$zoneenable=$sql_row["ZoneEnable"];
}

if (isset($zoneenable)){
			if ($err == 0)
				{
					echo "$zoneenable"; // 1=OK 0=NOK
				}
				else
				{ // Error Zone number
					echo "E";
				}
			}
			else
			{ // Error var $zoneenable NOT Set
			echo "E";
			}
?>
