<?php
// Get the Url of the External Temp Probe IF Enable
// and display it in bash style: 
//    exttenable=1 (enable)
//		extturl=http://192.168.1.202:40405/stats/4/temperature/latest
//
// For Debug Purpose: Set debug parameter to 1
//
// BE CAREFUL : idThConfig should be set to 0 in thermostatconfig table
//
require_once("inc/inc_bddcx.php");
$err=0;
$debug=0;

if (isset($argv[1])){
	$_GET['debug']= $argv[1];
	}

// Get Input Param (Debug)
if (isset($_GET['debug']) && !empty($_GET['debug'])){
			$debug=1;
			}


//Get UseExtTempProbe Value in the Default Config
$sql_result=mysql_query("SELECT * FROM ThermostatConfig AS thconfig, TempProbe AS tp WHERE tp.idTempProbe = thconfig.TempProbe_idTempProbe AND idThConfig=0",$connection)	or exit("Sql Error".mysql_error());
$sql_num=mysql_num_rows($sql_result);


while($sql_row=mysql_fetch_array($sql_result))
{
	$exttenable=$sql_row["UseExtTempProbe"];
	$exttprobeurl = $sql_row["TempProbeCmd"];
}

if (isset($exttenable)){
			echo "exttenable=$exttenable;";
			echo "exttprobeurl=$exttprobeurl";
			}
			else
			{ // Error var $zoneenable NOT Set
			echo "exttenable=E";
			}
?>
