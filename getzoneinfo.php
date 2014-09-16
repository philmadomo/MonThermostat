<?php
// Get the info : LastVal + URLs + 2 TabConsign (Today + Tomorrow) and ExtTemp if enable 
// of the zone number in the database + and the day number (Monday=1, ... sunday=7)
// and display it in bash style with ";" between value: 
//    zonepriority=1;zoneenableos=0;...
//		
//  ! HeaterWarmupCalc
// For Debug Purpose: Set debug parameter to 1
//
// if(isset($argv[1]) {
//	$_GET['varname']= $argv[1];
//	}
//
//
require_once("inc/inc_bddcx.php");
$err=0;
$debug=0;

// Get Input Param argv method (Debug & Zone Number & daynumber)
if (isset($argv[1])){
	$_GET['debug']= $argv[1];
	}

if (isset($argv[2])){
	$_GET['zonenb']= $argv[2];
	}

if (isset($argv[3])){
	$_GET['daynumber']= $argv[3];
	}


// Get Input Param GET method (Debug & Zone Number & daynumber)
if (isset($_GET['debug']) && !empty($_GET['debug'])){
			$debug=1;
			}

if (isset($_GET['zonenb']) && !empty($_GET['zonenb'])){
			$zonenb=$_GET['zonenb'];
			if (str_replace(' ','',$zonenb)==''){
				$err=1;
				if($debug == 1)
				{
					echo "No Zone Number: to Default Zone (0)\n";//debug
				}
				$zonenb="0";
			}
		}else{
			$err=1;
			if($debug == 1)
				{
				echo "No Zone Number: Zone Number To 0\n";//debug
				}
			$zonenb="0";
		}

//test Zone Number  (String to Int function) and ONLY a Number IF NOT ZoneNb is Set to 0
if (is_numeric($zonenb))
{
	if ($maxzone <= intval($zonenb) ||  0 > intval($zonenb))
		{
			$zonenb="0";
		}
}
else
{
	$zonenb="0";
}

if (isset($_GET['daynumber']) && !empty($_GET['daynumber'])){
			$daynumber=$_GET['daynumber'];
			if (str_replace(' ','',$daynumber)==''){
				$err=1;
				if($debug == 1)
				{
					echo "No Day Number: to Default Day Number (1)\n";//debug
				}
				$daynumber="1";
			}
		}else{
			$err=1;
			if($debug == 1)
				{
				echo "No Day Number: Day Number To 1\n";//debug
				}
			$daynumber="1";
		}

//test Day number  (String to Int function) and ONLY a Number IF NOT daynumber is Set to 1
if (is_numeric($daynumber))
{
	if (7 < intval($daynumber) ||  1 > intval($daynumber))
		{
			$daynumber="1";
		}
}
else
{
	$daynumber="1";
}

// create Day Number Tomorrow (Thermostat on 1 week only !) 1,2,3,4,5,6,7,1,2...
$daytomorrownb=(intval($daynumber)+1);
if(7<$daytomorrownb)
	{
		$daytomorrownb=1;
	}


if($debug == 1)
	{
	echo "Params: daynumber=$daynumber, daytomorrow=$daytomorrownb, zonenb=$zonenb\n";
	}


// Get SELECT UseExtTempProbe,ExtLastTemp FROM thermostatconfig WHERE idThConfig=0
// Get 
//Get ZoneEnable for ZoneNumber
$sql_result=mysql_query("SELECT HeaterCmdCheck, HeaterCmdOn, HeaterCmdOff, HeaterACMode, TempProbeCmd, TempProbeCor, ZoneLasttemp, ZoneLastHeaterStats, ZoneLastOpenSStats, ZonePriority, ZoneEnableOS, HeaterWarmupCalc, OSid, UseExtTempProbe, ExtLastTemp
FROM `ThZone` AS zone, `Heater` AS ht, `TempProbe` AS tp, `OpeningSensor` AS os, `ThermostatConfig` AS tc
WHERE ht.`idHeater` = zone.`Heater_idHeater`
AND zone.`idThZone` =$zonenb
AND tc.`idThConfig` =0
AND tp.`idTempProbe` = zone.`TempProbe_idTempProbe`
AND os.`idOpeningSensor` = zone.`OpeningSensor_idOpeningSensor`
LIMIT 1 ",$connection)	or exit("Sql Error".mysql_error());
$sql_num=mysql_num_rows($sql_result);

while($sql_row=mysql_fetch_array($sql_result))
{
	$HeaterCmdCheck=$sql_row["HeaterCmdCheck"];
	$HeaterCmdOn=$sql_row["HeaterCmdOn"];
	$HeaterCmdOff=$sql_row["HeaterCmdOff"];
	$HeaterACMode=$sql_row["HeaterACMode"];
	$TempProbeCmd=$sql_row["TempProbeCmd"];
	$TempProbeCor=$sql_row["TempProbeCor"];
	$ZoneLasttemp=$sql_row["ZoneLasttemp"];
	$ZoneLastHeaterStats=$sql_row["ZoneLastHeaterStats"];
	$ZoneLastOpenSStats=$sql_row["ZoneLastOpenSStats"];
	$ZoneEnableOS=$sql_row["ZoneEnableOS"];
	$HeaterWarmupCalc=$sql_row["HeaterWarmupCalc"];
	$OSid=$sql_row["OSid"];
	$ZonePriority=$sql_row["ZonePriority"];
	$UseExtTempProbe=$sql_row["UseExtTempProbe"];
	$ExtLastTemp=$sql_row["ExtLastTemp"];	
}

// If the Exterior Temp Probe is Use
// The Deamon should get the URL/CmdLine to Get the Temp
if ($UseExtTempProbe == 1)
{
	$sql_result=mysql_query("SELECT TempProbeCmd,TempProbeCor
FROM `ThZone` AS zone, `TempProbe` AS tp
WHERE zone.`idThZone` =$zonenb
AND tp.`idTempProbe` = zone.`TempProbe_idTempProbeExt`
LIMIT 1 ",$connection)  or exit("Sql Error".mysql_error());
	$sql_num=mysql_num_rows($sql_result);

	while($sql_row=mysql_fetch_array($sql_result))
	{
		$TempProbeCmdExt=$sql_row["TempProbeCmd"];
		$TempProbeCorExt=$sql_row["TempProbeCor"];
	}
}


// SetPointTable request in SQL
// SELECT `SPDTabTime` , `SPDName`
// FROM `thzone` AS zone, `weektimeline` AS week, `setpointday` AS spd
// WHERE zone.`WeekTimeLine_idWeekTimeLine` = week.`idWeekTimeLine`
// AND zone.`idThZone` =0
// AND week.`SetPointDay_idSetPointDay3` = spd.`idSetPointDay`
// LIMIT 1
//
// Mysql Query for Day Number: $daynumber
$sql_result=mysql_query("SELECT SPDTabTime , SPDName
FROM `ThZone` AS zone, `WeekTimeLine` AS week, `SetPointDay` AS spd
WHERE zone.`WeekTimeLine_idWeekTimeLine` = week.`idWeekTimeLine`
AND zone.`idThZone` =$zonenb
AND week.`SetPointDay_idSetPointDay$daynumber` = spd.`idSetPointDay`
LIMIT 1 ",$connection)	or exit("Sql Error".mysql_error());
$sql_row=mysql_fetch_array($sql_result);

$SPDTabDay=$sql_row["SPDTabTime"];
$SPDArrayDay=unserialize($SPDTabDay);

// Mysql Query for Day Number: $dayTomorrow
$sql_result=mysql_query("SELECT SPDTabTime , SPDName
FROM `ThZone` AS zone, `WeekTimeLine` AS week, `SetPointDay` AS spd
WHERE zone.`WeekTimeLine_idWeekTimeLine` = week.`idWeekTimeLine`
AND zone.`idThZone` =$zonenb
AND week.`SetPointDay_idSetPointDay$daytomorrownb` = spd.`idSetPointDay`
LIMIT 1 ",$connection)	or exit("Sql Error".mysql_error());
$sql_row=mysql_fetch_array($sql_result);

$SPDTabTomo=$sql_row["SPDTabTime"];
$SPDArrayTomo=unserialize($SPDTabTomo);

// Test if the first output is ok
if (isset($HeaterCmdCheck)){
			echo "HeaterCmdCheck=\"$HeaterCmdCheck\";";
			echo "HeaterCmdOn=\"$HeaterCmdOn\";";
			echo "HeaterCmdOff=\"$HeaterCmdOff\";";
			echo "HeaterACMode=$HeaterACMode;";
			echo "TempProbeCmd=\"$TempProbeCmd\";";
			echo "TempProbeCor=$TempProbeCor;";
			echo "ZoneLasttemp=$ZoneLasttemp;";
			echo "ZoneLastHeaterStats=$ZoneLastHeaterStats;";
			echo "ZoneLastOpenSStats=$ZoneLastOpenSStats;";
			echo "ZoneEnableOS=$ZoneEnableOS;";
			echo "HeaterWarmupCalc=$HeaterWarmupCalc;";
			echo "OSid=$OSid;";
			echo "ZonePriority=$ZonePriority;";
			echo "UseExtTempProbe=$UseExtTempProbe;";
			if ($UseExtTempProbe == 1)
			{
				echo "TempProbeCmdExt=\"$TempProbeCmdExt\";";
				echo "TempProbeCorExt=$TempProbeCorExt;";
			}
			else
			{
				echo "TempProbeCmdExt=none;";
				echo "TempProbeCorExt=0;";
			}
			echo "ExtLastTemp=$ExtLastTemp;";
			//echo "DayTomo=$SPDTabTomo";
			echo "SetPointDay=( ";
			foreach($SPDArrayDay as $valeur)
				{
					echo $valeur." ";
				}
			echo ");";
			
			echo "SetPointTomo=( ";
			foreach($SPDArrayTomo as $valeur)
				{
					echo $valeur." ";
				}
			echo ")";
			}
			else
			{ // Error: var $HeaterCmdCheck NOT Set
			echo "HeaterCmdCheck=E";
			}
			
//Tableau en bash mon_tableau=( 1 2 3 )
// en bash echo $(mon_tableau[*] affiche tout
// echo ${#mon_tableau[*]} // affiche nbr elements
			
?>
