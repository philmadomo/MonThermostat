<?php

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

?>
