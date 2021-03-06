<?php
require_once("inc/inc_bddcx.php");

$fullbgcolor="black";
$gtvwhite="rgb(240, 240, 240)";
$fullnoselcolor="rgb(51, 51, 51)";


// Vars Sel or Not
$zoneselected=2;
$confselcolor=$fullnoselcolor;
$zonecolor0=$fullnoselcolor;
$zonecolor1=$fullnoselcolor;
$zonecolor2=$fullnoselcolor;
$zonecolor3=$fullnoselcolor;
$zonecolor4=$fullnoselcolor;
$zonecolor5=$fullnoselcolor;
$zonecolor6=$fullnoselcolor;
$zonecolor7=$fullnoselcolor;

function return_zoneiselected($zonesel, $nbzone)
{
	if ($nbzone==$zonesel) {
	        return "1";
        }
        else
        {
                return "0";
        }
}

function return_zonecolor($zonesel, $nbzone)
{
	$fullnoselcolor="rgb(51, 51, 51)";
	$fullselcolor="rgb(240, 240, 240)";
	if ($nbzone==$zonesel) {
		return $fullselcolor;
	}
	else
	{
		return $fullnoselcolor;
	}
}


function display_configcase($configname, $link, $selectconf)
{
	$bgcolor="#808080";
	if ($selectconf==0) {
		$imgHG="img/greHG.png";
                $imgHD="img/greHD.png";
                $imgBG="img/greBG.png";
                $imgBD="img/greBD.png";
	}else{
		$imgHG="img/whHG.png";
		$imgHD="img/whHD.png";
		$imgBG="img/whBG.png";
		$imgBD="img/whBD.png";
	}
        echo '
	<table style="width: 150px; height: 150px;" bgcolor="'.$bgcolor.'" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr><td><table style="width: 100%; height: 20px;" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr><td><img style="border: 0px solid ; width: 20px; height: 20px;" alt="" src="'.$imgHG.'" hspace="0" vspace="0"></td>
	<td style="height: 20px; width: 110px;"></td><td><img style="border: 0px solid ; width: 20px; height: 20px;" alt="" src="'.$imgHD.'" hspace="0" vspace="0"></td>
	</tr></tbody></table></td></tr><tr><td>
	<table style="height: 100px; width: 100%;" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td><center>	
	<img style="width: 100px; height: 100px;" src="img/config.png">
	</center></td></tr></tbody></table></td></tr><tr><td><table style="width: 150px; height: 100%;" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr><td style="vertical-align: bottom;"><h3 style="border-width: 0px; font-size: 0px;"><img style="border: 0px none ; width: 20px; height: 20px;" alt="" src="'.$imgBG.'" hspace="0" vspace="0"></h3></td>
	<td style="width: 110px; height: 20px;"><center style="height: 30px;">
	<a href="'.$link.'" style="text-shadow: 0.005em 0.005em 0.1em black; border: 0px solid ; color: black; height: 32px; font-weight: bold; font-style: normal; text-align: center; font-size: 1.3em; text-transform: none; text-decoration: none;">'.$configname.'
	</a></center></td><td style="vertical-align: bottom;"><h3 style="border-width: 0px; font-size: 0px;"><img style="border: 0px solid ; width: 20px; height: 20px;" alt="" src="'.$imgBD.'" hspace="0" vspace="0"></h3></td></tr>
	</tbody></table></td></tr></tbody></table>
	';
}


function display_zonecase($enable, $zonename, $temp, $setpoint, $heaterstat, $acmode, $link, $selectconf)
{
	$bgcolor="#3CBD03"; // Blue : #0000FF , Red : #FF0000 , Green : #3CBD03 , Grey : #808080
	if ($selectconf==0) {
                $imgHG="img/greHG.png";
                $imgHD="img/greHD.png";
                $imgBG="img/greBG.png";
                $imgBD="img/greBD.png";
        }else{
                $imgHG="img/whHG.png";
                $imgHD="img/whHD.png";
                $imgBG="img/whBG.png";
                $imgBD="img/whBD.png";
        }
	if ($enable==0) { //Zone Disable
		$bgcolor="#808080";
		$temp="N/A";
		$heaterstat=0;
	}
	else { // Zone Enable
		if ($heaterstat==0) {
			$bgcolor="#3CBD03";
		} else {
			if ($acmode==0){ // Heater Working
				$bgcolor="#FF0000";
			} else { // AC Mode
				$bgcolor="#0000FF";
			}
		}
	}
	echo '
	<table style="width: 150px; height: 150px;" bgcolor="'.$bgcolor.'" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr><td><table style="width: 100%; height: 20px;" border="0" cellpadding="0" cellspacing="0">
	<tbody><tr><td><img style="border: 0px solid ; width: 20px; height: 20px;" alt="" src="'.$imgHG.'" hspace="0" vspace="0"></td>
<td style="height: 20px; width: 110px;"></td><td><img style="border: 0px solid ; width: 20px; height: 20px;" alt="" src="'.$imgHD.'" hspace="0" vspace="0"></td>
	</tr></tbody></table></td></tr><tr><td>
<table style="height: 100px; width: 100%;" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td><center>';
	if ($heaterstat==0) {
		echo '
	<h4 style="text-shadow: 0.015em 0.015em 0.1em black; border: 0px solid ; font-weight: bold; line-height: 0.8em; font-size: 40px; text-align: center; margin-top: 30px; height: 17px;">'.$temp.'&#8451</h4>';
	}else{
		echo '
	<h4 style="text-shadow: 0.007em 0.007em 0.1em black; border: 0px solid ; font-weight: bold; line-height: 0.8em; font-size: 36px;; text-align: center; margin-top: 30px; height: 17px;">'.$temp.'&#8451 to '.$setpoint.'&#8451</h4>';
	}
	echo '
	</center></td></tr></tbody></table></td></tr><tr><td><table style="width: 150px; height: 100%;" border="0" cellpadding="0" cellspacing="0">
<tbody><tr><td style="vertical-align: bottom;"><h3 style="border-width: 0px; font-size: 0px;"><img style="border: 0px none ; width: 20px; height: 20px;" alt="" src="'.$imgBG.'" hspace="0" vspace="0"></h3></td>
<td style="width: 110px; height: 20px;"><center style="height: 30px;">

	<a href="'.$link.'" style="text-shadow: 0.005em 0.005em 0.1em black; border: 0px solid ; color: black; height: 32px; font-weight: bold; font-style: normal; text-align: center; font-size: 1.3em; text-transform: none; text-decoration: none;">'.$zonename.'
	</a></center></td><td style="vertical-align: bottom;"><h3 style="border-width: 0px; font-size: 0px;"><img style="border: 0px solid ; width: 20px; height: 20px;" alt="" src="'.$imgBD.'" hspace="0" vspace="0"></h3></td></tr>
</tbody></table></td></tr></tbody></table>
	';
}

function get_setpointtime($hournum, $minnum, $setpointarray)
{
	// 0: 0h 1: 0h30 2: 1h .... 47: 23h30
	if ( 30 > intval($minnum)) {
		$indexval=(intval($hournum)*2+1);
		} else {
		$indexval=intval($hournum)*2;
	}
	$setpointunserial=unserialize($setpointarray);
	return $setpointunserial[$indexval];
}

//echo exec("date +%w"); // Get the Number of the day in the weekend (server Time !)
$hournow=date("G");
$minutenow=date("i");
$daynumber=date("N");
$NbrLigne = 3;

$sql_result=mysql_query("SELECT ThZoneName,ZoneEnable,ZoneLastHeaterStats,ZoneLasttemp,HeaterACMode,SPDTabTime FROM  ThZone, Heater, WeekTimeLine, SetPointDay  WHERE ThZone.`Heater_idHeater` = Heater.`idHeater` AND ThZone.`WeekTimeLine_idWeekTimeLine` = WeekTimeLine.`idWeekTimeLine` AND WeekTimeLine.`SetPointDay_idSetPointDay$daynumber` = SetPointDay.`idSetPointDay` ORDER BY idThZone ASC;",$connection)	or exit("Sql Error".mysql_error());
//$sql_result=mysql_query("SELECT ThZoneName,ZoneEnable,ZoneLastHeaterStats,ZoneLasttemp,HeaterACMode FROM  ThZone, Heater WHERE ThZone.`Heater_idHeater` = Heater.`idHeater` ORDER BY idThZone ASC;",$connection)        or exit("Sql Error".mysql_error());
$NbreData=mysql_num_rows($sql_result);

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
<?php mysql_close(); // deconnexion de la BD ?>
<html><head><meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
        <title>All Zone Config</title>
        </head><body style="border-width: 0px; background-color: <?php echo $fullbgcolor; ?>; font-size: 0px;">

<?php
if ($NbreData != 0) {
	$i = 0;
	$NbrCol = 0;
?>

<h4 style="border-width: 0px; font-size: 0px;">

<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td style="width: 190px;"><center>
<table style="width: 190px; height: 190px;" border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 8); ?>;"><img style="width: 20px; height: 20px;" alt="" src="img/blHG.png"></td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 8); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 8); ?>;"><img style="width: 20px; height: 20px;" alt="" src="img/blHD.png"></td>
</tr>
<tr>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 8); ?>;"></td>
<td style="background-color: <?php echo return_zonecolor($zoneselected, 8); ?>; height: 150px; width: 150px;">
<?php
        display_configcase("Config","#config",return_zoneiselected($zoneselected, 8));
?>
</td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 8); ?>;"></td>
</tr>
<tr>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 8); ?>;"><img style="width: 20px; height: 20px;" alt="" src="img/blBG.png"></td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 8); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 8); ?>;"><img style="width: 20px; height: 20px;" alt="" src="img/blBD.png"></td>
</tr>
</tbody></table></center>
</td>
<td style="width: 950px;">
<table style="width: 950px; height: 190px;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 0); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blHG.png"></h4>
</td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 0); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 0); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blHD.png"></h4>
</td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 1); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blHG.png"></h4>
</td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 1); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 1); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blHD.png"></h4>
</td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 2); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blHG.png"></h4>
</td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 2); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 2); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blHD.png"></h4>
</td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 3); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blHG.png"></h4>
</td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 3); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 3); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blHD.png"></h4>
</td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 4); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blHG.png"></h4>
</td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 4); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 4); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blHD.png"></h4>
</td>
</tr>
<tr>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 0); ?>;"></td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 0); ?>;">
<center style="width: 150px;">
<?php
$k = 0;
display_zonecase($zoneenable[$k], $zonename[$k],round($Zonelasttemp[$k],1), get_setpointtime($hournow,$minutenow,$SPDTabTime[$k]), $ZoneheaterStat[$k], $Acmode[$k], "#zone".$k,return_zoneiselected($zoneselected, $k));
?>
</center>
</td>
<td style="height: 150px; width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 0); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 1); ?>;"></td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 1); ?>;">
<center style="width: 150px;">
<?php
$k = 1;
display_zonecase($zoneenable[$k], $zonename[$k],round($Zonelasttemp[$k],1), get_setpointtime($hournow,$minutenow,$SPDTabTime[$k]), $ZoneheaterStat[$k], $Acmode[$k], "#zone".$k,return_zoneiselected($zoneselected, $k));
?>
</center>
</td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 1); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 2); ?>;"></td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 2); ?>;">
<center style="width: 150px;">
<?php
$k = 2;
display_zonecase($zoneenable[$k], $zonename[$k],round($Zonelasttemp[$k],1), get_setpointtime($hournow,$minutenow,$SPDTabTime[$k]), $ZoneheaterStat[$k], $Acmode[$k], "#zone".$k,return_zoneiselected($zoneselected, $k))
?>
</center>
</td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 2); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 3); ?>;"></td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 3); ?>;">
<center style="width: 150px;">
<?php
$k = 3;
display_zonecase($zoneenable[$k], $zonename[$k],round($Zonelasttemp[$k],1), get_setpointtime($hournow,$minutenow,$SPDTabTime[$k]), $ZoneheaterStat[$k], $Acmode[$k], "#zone".$k,return_zoneiselected($zoneselected, $k));
?>
</center>
</td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 3); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 4); ?>;"></td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 4); ?>;">
<center style="width: 150px;">
<?php
$k = 4;
display_zonecase($zoneenable[$k], $zonename[$k],round($Zonelasttemp[$k],1), get_setpointtime($hournow,$minutenow,$SPDTabTime[$k]), $ZoneheaterStat[$k], $Acmode[$k], "#zone".$k,return_zoneiselected($zoneselected, $k));
?>
</center>
</td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 4); ?>;"></td>
</tr>
<tr>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 0); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blBG.png"></h4>
</td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 0); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 0); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/whBD.png"></h4>
</td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 1); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/whBG.png"></h4>
</td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 1); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 1); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/whBD.png"></h4>
</td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 2); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/whBG.png"></h4>
</td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 2); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 2); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/whBD.png"></h4>
</td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 3); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/whBG.png"></h4>
</td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 3); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 3); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/whBD.png"></h4>
</td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 4); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/whBG.png"></h4>
</td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 4); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 4); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blBD.png"></h4>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td style="width: 190px;">
<table style="width: 190px; height: 570px;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td style="height: 20px; width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 5); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blHG.png"></h4>
</td>
<td style="height: 20px; width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 5); ?>;"></td>
<td style="height: 20px; width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 5); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blHD.png"></h4>
</td>
</tr>
<tr>
<td style="height: 150px; width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 5); ?>;"></td>
<td style="height: 150px; width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 5); ?>;">
<?php
$k = 5;
display_zonecase($zoneenable[$k], $zonename[$k],round($Zonelasttemp[$k],1), get_setpointtime($hournow,$minutenow,$SPDTabTime[$k]), $ZoneheaterStat[$k], $Acmode[$k], "#zone".$k,return_zoneiselected($zoneselected, $k));
?>
</td>
<td style="height: 150px; width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 5); ?>;">
</td>
</tr>
<tr>
<td style="width: 20px; height: 20px; background-color: <?php echo return_zonecolor($zoneselected, 5); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blBG.png"></h4>
</td>
<td style="width: 150px; height: 20px; background-color: <?php echo return_zonecolor($zoneselected, 5); ?>;"></td>
<td style="width: 20px; height: 20px; background-color: <?php echo return_zonecolor($zoneselected, 5); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/whBD.png"></h4>
</td>
</tr>
<tr>
<td style="width: 20px; height: 20px; background-color: <?php echo return_zonecolor($zoneselected, 6); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blHG.png"></h4>
</td>
<td style="background-color: <?php echo return_zonecolor($zoneselected, 6); ?>;"></td>
<td style="width: 20px; height: 20px; background-color: <?php echo return_zonecolor($zoneselected, 6); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/whHD.png"></h4>
</td>
</tr>
<tr>
<td style="width: 20px; height: 150px; background-color: <?php echo return_zonecolor($zoneselected, 6); ?>;"></td>
<td style="width: 150px; height: 150px; background-color: <?php echo return_zonecolor($zoneselected, 6); ?>;">
<center>
<?php
$k = 6;
display_zonecase($zoneenable[$k], $zonename[$k],round($Zonelasttemp[$k],1), get_setpointtime($hournow,$minutenow,$SPDTabTime[$k]), $ZoneheaterStat[$k], $Acmode[$k], "#zone".$k,return_zoneiselected($zoneselected, $k));
?>
</center>
</td>
<td style="width: 20px; height: 150px; background-color: <?php echo return_zonecolor($zoneselected, 6); ?>;"></td>
</tr>
<tr>
<td style="width: 20px; height: 20px; background-color: <?php echo return_zonecolor($zoneselected, 6); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blBG.png"></h4>
</td>
<td style="width: 150px; height: 20px; background-color: <?php echo return_zonecolor($zoneselected, 6); ?>;"></td>
<td style="width: 20px; height: 20px; background-color: <?php echo return_zonecolor($zoneselected, 6); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/whBD.png"></h4>
</td>
</tr>
<tr>
<td style="width: 20px; height: 20px; background-color: <?php echo return_zonecolor($zoneselected, 7); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blHG.png"></h4>
</td>
<td style="width: 150px; height: 20px; background-color: <?php echo return_zonecolor($zoneselected, 7); ?>;"></td>
<td style="width: 20px; height: 20px; background-color: <?php echo return_zonecolor($zoneselected, 7); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/whHD.png"></h4>
</td>
</tr>
<tr>
<td style="width: 20px; height: 20px; background-color: <?php echo return_zonecolor($zoneselected, 7); ?>;"></td>
<td style="width: 150px; height: 20px; background-color: <?php echo return_zonecolor($zoneselected, 7); ?>;">
<center style="height: 150px;">
<?php
$k = 7;
display_zonecase($zoneenable[$k], $zonename[$k],round($Zonelasttemp[$k],1), get_setpointtime($hournow,$minutenow,$SPDTabTime[$k]), $ZoneheaterStat[$k], $Acmode[$k], "#zone".$k,return_zoneiselected($zoneselected, $k));
?>
</center>
</td>
<td style="width: 20px; height: 20px; background-color: <?php echo return_zonecolor($zoneselected, 7); ?>;"></td>
</tr>
<tr>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 7); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blBG.png"></h4>
</td>
<td style="width: 150px; background-color: <?php echo return_zonecolor($zoneselected, 7); ?>;"></td>
<td style="width: 20px; background-color: <?php echo return_zonecolor($zoneselected, 7); ?>;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blBD.png"></h4>
</td>
</tr>
</tbody>
</table>
</td>
<td style="width: 950px;">
<table style="background-color: <?php echo $gtvwhite; ?>; width: 950px; height: 570px;" border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td style="height: 20px; width: 20px;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blHG.png"></h4>
</td>
<td style="height: 20px; width: 910px;"></td>
<td style="height: 20px; width: 20px;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blHD.png"></h4>
</td>
</tr>
<tr>
<td style="height: 530px; width: 20px;"></td>
<td style="height: 530px; width: 910px;"></td>
<td style="width: 20px; height: 530px;"></td>
</tr>
<tr>
<td style="height: 20px; width: 20px;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blBG.png"></h4>
</td>
<td style="height: 20px; width: 910px;"></td>
<td style="width: 20px; height: 20px;">
<h4 style="border-width: 0px; font-size: 0px;"><img style="width: 20px; height: 20px;" alt="" src="img/blBD.png"></h4>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</h4>


<?php
} else {
?>	pas de donné àfficher
<?php
}
?>
</body></html>

