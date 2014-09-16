<?php

// Heartbeat Test Function 
function MTH_deamonOK($nowtimestamp,$dbtimestamp,$loopduration)
{
	$retval=1; //OK
        if ( ($nowtimestamp-$dbtimestamp) > $loopduration )
        {
		$retval=0;
        }
        
        return $retval;
}

// Get Var & Value:
// Zone Number (GET)
if (isset($_GET['ThZoneNb']) && !empty($_GET['ThZoneNb'])){
        $ThZoneNb=$_GET['ThZoneNb'];
        $viewonly=1;
	if (str_replace(' ','',$ThZoneNb)==''){
                $err="3";
        }
} else { // IF NOT SET OR =0 ERROR !
        $ThZoneNb="0";
	// ZONE Number (POST)
	if (isset($_POST['ThZoneNb']) && !empty($_POST['ThZoneNb'])){
		$ThZoneNb=$_POST['ThZoneNb'];
		if (str_replace(' ','',$ThZoneNb)==''){
			$err="3";
		}
	} else { // IF NOT SET OR =0 ERROR !
		$ThZoneNb="0";
	}
}

if ( $ThZoneNb >= 8)
{
	$configmode=1;
}

// Day Number (GET)
if (isset($_GET['DayNb']) && !empty($_GET['DayNb'])){
        $DayNb=$_GET['DayNb'];
	$viewonly=1;
        if (str_replace(' ','',$DayNb)==''){
                $err="3";
        }
} else { // IF NOT SET -> Set to Now Day Number
        $DayNb=date("N");
	// Day Number (POST)
	if (isset($_POST['DayNb']) && !empty($_POST['DayNb'])){
	        $DayNb=$_POST['DayNb'];
	        if (str_replace(' ','',$DayNb)==''){
	                $err="3";
	        }
	} else { // IF NOT SET -> Set to Now Day Number
	        $DayNb=date("N");
	}
}
// SetPointDayId
if (isset($_POST['SetPointDayId']) && !empty($_POST['SetPointDayId'])){
        $SetPointDayId=$_POST['SetPointDayId'];
        if (str_replace(' ','',$SetPointDayId)==''){
                $err="3";
        }
} else { // IF NOT SET -> SetPointDayId to 0 -> DO NONE
        $SetPointDayId=0;
}
// Confirm Delete SDP $DeleteSpd = 1
if (isset($_POST['DeleteSpd']) && !empty($_POST['DeleteSpd'])){
        $DeleteSpd=$_POST['DeleteSpd'];
        if (str_replace(' ','',$DeleteSpd)==''){
                $err="3";
        }
} else { // IF NOT SET -> SetPointDayId to 0 -> DO NONE
        $DeleteSpd=0;
}
// SPDTabTimeNew
if (isset($_POST['SPDTabTimeNew']) && !empty($_POST['SPDTabTimeNew'])){
        $SPDTabTimeNew=$_POST['SPDTabTimeNew'];
        $viewonly=0;
	if (str_replace(' ','',$SPDTabTimeNew)==''){
                $err="3";
        } else {
		$SPDTabForMysql=serialize(explode(",",$SPDTabTimeNew));
	}
} else { // IF NOT SET -> SPDTabTimeNew to 0 -> DO NONE
        $SPDTabTimeNew=0;
	$SPDTabForMysql=0;
}

// SPDNameNew
if (isset($_POST['SPDNameNew']) && !empty($_POST['SPDNameNew'])){
        $SPDNameNew=$_POST['SPDNameNew'];
        if (str_replace(' ','',$SPDNameNew)==''){
                $err="3";
        }
} else { // IF NOT SET -> SetPointDayId to 0 -> DO NONE
        $SPDNameNew=0;
}

// Get MTHDeamon Heartbeat and Test Mysql Conf
$confignb = 0; // Db Config ID = 0
$HBTimeStamp=0;
$sql_result=mysql_query("SELECT `HBTimeStamp` FROM `ThermostatConfig` WHERE `idThConfig` = $confignb LIMIT 1;",$connection) or exit("Sql Error".mysql_error());
while ($val = mysql_fetch_array($sql_result)) {
        $HBTimeStamp = $val['HBTimeStamp'];
}
mysql_close(); // deconnection DB

if ($SetPointDayId == 0)
{
	if (!isset($SPDNameNew) || $viewonly==1)
	{ // Don't switch SPD Id -- Display SetPointDay
		$swimode=0;
		
	}
	else
	{ //Create a New SPD
		$swimode=1;
		$sql_result=mysql_query("INSERT INTO `SetPointDay` ( `SPDName`, `SPDTabTime`) VALUES ('$SPDNameNew','$SPDTabForMysql');",$connection) or exit("Sql Error".mysql_error());
                //mysql_close(); // deconnection DB
		$sql_result=mysql_query("UPDATE `WeekTimeLine` SET `SetPointDay_idSetPointDay$DayNb` = LAST_INSERT_ID() WHERE `WeekTimeLine`.`idWeekTimeLine` = (SELECT `WeekTimeLine_idWeekTimeLine` FROM `ThZone` WHERE `idThZone` ='$ThZoneNb');",$connection) or exit("Sql Error".mysql_error());
		mysql_close(); // deconnection DB
	}
} else { 
	if ($SPDTabTimeNew == 0)
	{ // Change SPD Id OR Delete a SPD
		if ($DeleteSpd == 0)
		{
			$swimode=2;
			$sql_result=mysql_query("UPDATE `MonThermostat`.`WeekTimeLine` SET `SetPointDay_idSetPointDay$DayNb` = '$SetPointDayId' WHERE `WeekTimeLine`.`idWeekTimeLine` = (
SELECT `WeekTimeLine_idWeekTimeLine`FROM `ThZone` WHERE `idThZone` =$ThZoneNb);",$connection)  or exit("Sql Error".mysql_error());
			//mysql_close(); // deconnection DB
		}
		else
		{//Delete a SPD
			$swimode=3;
			// Replace all Selected SPDid to Default (0)
			$sql_result=mysql_query("UPDATE `WeekTimeLine` SET `SetPointDay_idSetPointDay1` = replace( `SetPointDay_idSetPointDay1`, $SetPointDayId, 0 );",$connection) or exit("Sql Error".mysql_error());
			$sql_result=mysql_query("UPDATE `WeekTimeLine` SET `SetPointDay_idSetPointDay2` = replace( `SetPointDay_idSetPointDay2`, $SetPointDayId, 0 );",$connection) or exit("Sql Error".mysql_error());
			$sql_result=mysql_query("UPDATE `WeekTimeLine` SET `SetPointDay_idSetPointDay3` = replace( `SetPointDay_idSetPointDay3`, $SetPointDayId, 0 );",$connection) or exit("Sql Error".mysql_error());
			$sql_result=mysql_query("UPDATE `WeekTimeLine` SET `SetPointDay_idSetPointDay4` = replace( `SetPointDay_idSetPointDay4`, $SetPointDayId, 0 );",$connection) or exit("Sql Error".mysql_error());
			$sql_result=mysql_query("UPDATE `WeekTimeLine` SET `SetPointDay_idSetPointDay5` = replace( `SetPointDay_idSetPointDay5`, $SetPointDayId, 0 );",$connection) or exit("Sql Error".mysql_error());
			$sql_result=mysql_query("UPDATE `WeekTimeLine` SET `SetPointDay_idSetPointDay6` = replace( `SetPointDay_idSetPointDay6`, $SetPointDayId, 0 );",$connection) or exit("Sql Error".mysql_error());
			$sql_result=mysql_query("UPDATE `WeekTimeLine` SET `SetPointDay_idSetPointDay7` = replace( `SetPointDay_idSetPointDay7`, $SetPointDayId, 0 );",$connection) or exit("Sql Error".mysql_error());
			$sql_result=mysql_query("DELETE FROM `MonThermostat`.`SetPointDay` WHERE `SetPointDay`.`idSetPointDay` = $SetPointDayId;",$connection) or exit("Sql Error".mysql_error());
			$sql_result=mysql_query("ALTER TABLE `SetPointDay` AUTO_INCREMENT =1;",$connection) or exit("Sql Error".mysql_error());
		}
	} else { // Save the Current SPD
		$swimode=4;
		$sql_result=mysql_query("UPDATE `MonThermostat`.`SetPointDay` SET `SPDTabTime` = '$SPDTabForMysql' WHERE `SetPointDay`.`idSetPointDay` = $SetPointDayId;",$connection) or exit("Sql Error".mysql_error());
                //mysql_close(); // deconnection DB
	}
}

// For All Page Get SPDTab + List of All SPD
$sql_result=mysql_query("SELECT `idSetPointDay` , `SPDName` , `SPDTabTime`
FROM `SetPointDay` WHERE `idSetPointDay` = (
SELECT `SetPointDay_idSetPointDay$DayNb` FROM `ThZone` AS zone, `WeekTimeLine` AS week WHERE zone.`WeekTimeLine_idWeekTimeLine` = week.`idWeekTimeLine` AND zone.`idThZone` = $ThZoneNb);",$connection) or exit("Sql Error".mysql_error());
$k=0;
while ($val = mysql_fetch_array($sql_result)) {
	$idSetPointDay[$k] = $val['idSetPointDay'];
	$SPDName[$k] = $val['SPDName'];
	$ZoneSPDTabTime[$k] = unserialize($val['SPDTabTime']);
	$k++;
}

//mysql_close(); // deconnection DB

$sql_result=mysql_query("SELECT `idSetPointDay` , `SPDName` FROM `SetPointDay` WHERE `idSetPointDay` !=0",$connection) or exit("Sql Error".mysql_error());
$k=0;
while ($val = mysql_fetch_array($sql_result)) {
        $idSetPointDayList[$k] = $val['idSetPointDay'];
        $SPDNameList[$k] = $val['SPDName'];
        $k++;
}

//mysql_close(); // deconnexion de la BD 

$sql_result=mysql_query("SELECT ThZoneName,ZoneEnable,ZoneLastHeaterStats,ZoneLasttemp,HeaterACMode,SPDTabTime FROM  ThZone, Heater, WeekTimeLine, SetPointDay  WHERE ThZone.`Heater_idHeater` = Heater.`idHeater` AND ThZone.`WeekTimeLine_idWeekTimeLine` = WeekTimeLine.`idWeekTimeLine` AND WeekTimeLine.`SetPointDay_idSetPointDay$daynumber` = SetPointDay.`idSetPointDay` ORDER BY idThZone ASC;",$connection)   or exit("Sql Error".mysql_error());
//$sql_result=mysql_query("SELECT ThZoneName,ZoneEnable,ZoneLastHeaterStats,ZoneLasttemp,HeaterACMode FROM  ThZone, Heater WHERE ThZone.`Heater_idHeater` = Heater.`idHeater` ORDER BY idThZone ASC;",$connection)        or exit("Sql Error".mysql_error());

$k=0;
while ($val = mysql_fetch_array($sql_result)) {
        $zonename[$k] = $val['ThZoneName'];
        $zoneenable[$k] = $val['ZoneEnable'];
        $ZoneheaterStat[$k] = $val['ZoneLastHeaterStats'];
        $Zonelasttemp[$k] = $val['ZoneLasttemp'];
        $Acmode[$k] = $val['HeaterACMode'];
        $SPDTabTime[$k] = $val['SPDTabTime'];
        $k++;
}

?>
