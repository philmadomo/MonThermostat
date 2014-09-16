<?php

# Vars
$bgcolorval="#808080";
$sizetabx=48;#+3
$sizetaby=23;#+3
# Tab Creator
# Blank : 0
# Corners : 1 2
#           3 4
# grad : 
#    1 -> 5   2 -> 6  0 -> 7  2 -> 8  4 -> 9  6 -> 10  8 -> 11
#    tcd -> 12  tcv -> 13  tcb -> 14 tcbd -> 15
# middle : 
#    thaut -> 21  chdroi -> 22  tdroi -> 23 vide -> 20
#    0 -> 30  2 -> 32  4 -> 34  6 -> 36  8 -> 38
#   10 -> 40 12 -> 42 14 -> 44 16 -> 46 18 -> 48
#   20 -> 50 22 -> 52 

$tiledline1=array( 
array(1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2),
array(6,9,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,30,23,20,23,32,23,20,23,34,23,20,23,36,23,20,23,38,23,20,23,40,23,20,23,42,23,20,23,44,23,20,23,46,23,20,23,48,23,20,23,50,23,20,23,52,23,20,23,0),
array(0,12,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,0),
array(6,8,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,0),
array(0,12,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,30,23,20,23,32,23,20,23,34,23,20,23,36,23,20,23,38,23,20,23,40,23,20,23,42,23,20,23,44,23,20,23,46,23,20,23,48,23,20,23,50,23,20,23,52,23,20,23,0),
array(6,7,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,0),
array(0,12,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,0),
array(5,11,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,30,23,20,23,32,23,20,23,34,23,20,23,36,23,20,23,38,23,20,23,40,23,20,23,42,23,20,23,44,23,20,23,46,23,20,23,48,23,20,23,50,23,20,23,52,23,20,23,0),
array(0,12,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,0),
array(5,10,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,0),
array(0,12,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,30,23,20,23,32,23,20,23,34,23,20,23,36,23,20,23,38,23,20,23,40,23,20,23,42,23,20,23,44,23,20,23,46,23,20,23,48,23,20,23,50,23,20,23,52,23,20,23,0),
array(5,9,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,0),
array(0,0,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,0),
array(3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,4)
);

//$tabsetpoint=array(22,20,20,20,20,22,22,22,22,14,14,14,14,14.5,15,15.5,16,16.5,17,17,17,17,17,17,17,17,17.5,18,18,18,17.5,17,15,15,15,15,13.5,24,16,16,20,20,20,20,20,20,20,20);
# 1: en Haut 22: Max en bas
# 1-> 24C    22 -> 13.5
# 2 -> 23.5 3 -> 23 ...

# functions

function return_indexval_ifdayok($hourval,$minval,$dayval,$nowday)
{
	if ( $dayval == $nowday)
	{
		// 0: 0h 1: 0h30 2: 1h .... 47: 23h30
        	if (intval($minval)>30) {
        	        $indexval=(intval($hourval)*2+1);
        	        } else {
        	        $indexval=(intval($hourval)*2);
		}
	}
	else
	{
		$indexval=48; // NOT GOOD
	}
        return $indexval;
}

function display_cellval($tabx,$taby,$value,$indexval)
{
	print("<td height=\"10\" width=\"15\"");
	switch ($value) {
	case 1:
		print("><img src=\"img/whHG.png\" width=\"15\" height=\"15\">");
	break;
	case 2:
		print("><img src=\"img/whHD.png\" width=\"15\" height=\"15\">");
	break;
	case 3:
		print("><img src=\"img/whBG.png\" width=\"15\" height=\"15\">");
	break;
	case 4:
		print("><img src=\"img/whBD.png\" width=\"15\" height=\"15\">");
	break;
        case 5:
		print("><img src=\"img/t1.png\" width=\"15\" height=\"10\">");
        break;
	case 6:
		print("><img src=\"img/t2.png\" width=\"15\" height=\"10\">");
	break;
	case 7:
		print("><img src=\"img/tc0.png\" width=\"15\" height=\"10\">");
	break;
	case 8:
		print("><img src=\"img/tc2.png\" width=\"15\" height=\"10\">");
	break;
	case 9:
		print("><img src=\"img/tc4.png\" width=\"15\" height=\"10\">");
	break;
	case 10:
		print("><img src=\"img/tc6.png\" width=\"15\" height=\"10\">");
	break;
	case 11:
		print("><img src=\"img/tc8.png\" width=\"15\" height=\"10\">");
	break;
	case 12:
		print("><img src=\"img/tcd.png\" width=\"15\" height=\"10\">");
	break;
	case 13:
		print("><img src=\"img/tcv.png\" width=\"15\" height=\"10\">");
	break;
	case 14:
		print("><img src=\"img/tcb.png\" width=\"15\" height=\"10\">");
	break;
	case 15:
		print("><img src=\"img/tcbd.png\" width=\"15\" height=\"10\">");
	break;
	case 20:
		print(" style=\"background-image: url(img/tvide.png); background-repeat: no-repeat;\" id=\"tdx".$tabx."y".$taby."\" onmouseover=\"javascript:HighLightRoW_(".$tabx.",".$taby.");\">");
	break;
	case 21:
		print(" style=\"background-image: url(img/thaut.png); background-repeat: no-repeat;\" id=\"tdx".$tabx."y".$taby."\" onmouseover=\"javascript:HighLightRoW_(".$tabx.",".$taby.");\">");
	break;
	case 22:
		print(" style=\"background-image: url(img/chdroi.png); background-repeat: no-repeat;\" id=\"tdx".$tabx."y".$taby."\" onmouseover=\"javascript:HighLightRoW_(".$tabx.",".$taby.");\">");
	break;
	case 23:
		print(" style=\"background-image: url(img/tdroi.png); background-repeat: no-repeat;\" id=\"tdx".$tabx."y".$taby."\" onmouseover=\"javascript:HighLightRoW_(".$tabx.",".$taby.");\">");
	break;
	case 30:
	case 32:
	case 34:
	case 36:
	case 38:
	case 40:
	case 42:
	case 44:
	case 46:
	case 48:
	case 50:
	case 52:
		print(" style=\"background-image: url(img/t".($value-30)."h.png); background-repeat: no-repeat;\" id=\"tdx".$tabx."y".$taby."\" onmouseover=\"javascript:HighLightRoW_(".$tabx.",".$taby.");\">");
	break;
	default:
		print(">");
	}
	if ($indexval<50){
	if ($tabx==$indexval && $taby>0 && $taby<23){
		print("<img src=\"img/selectedtr.png\" width=\"15\" height=\"10\">");
	}
	}	
	print("</td>\n");
}

function display_tabtiles($tabarray,$tabsizex,$tabsizey,$indexval)
{
	for($y=0; $y<=(23); $y++)
	{
		print("<tr>\n");
		for($x=0; $x<=($tabsizex-1); $x++)
		{
			display_cellval($x,$y,$tabarray[$y][$x],$indexval+2);
		}
		print("</tr>\n");
	}
}

function display_lastlinetabtiles($bgcolorval,$tabarray,$tabsizex)
{
	echo ("<table bgcolor=\"$bgcolorval\" border=0 cellpadding=0 cellspacing=0>\n<tbody>\n");
	print("<tr>\n");
	for($x=0; $x<=($tabsizex-1); $x++)
	{
		display_cellval($x,24,$tabarray[24][$x],48);
	}
	print("</tr>\n");
	echo ("</tbody>\n</table>\n");
}

function display_daylinebuttons($bgcolorval, $tabdayname, $dayselected, $link)
{
	$colorMon="black";
	$colorTue="black";
	$colorWed="black";
        $colorThu="black";
	$colorFri="black";
        $colorSat="black";
	$colorSun="black";
	switch ($dayselected) {
        case 1:
		$colorMon="white";
	break;
	case 2:
		$colorTue="white";
	break;
	case 3:
		$colorWed="white";
	break;
	case 4:
		$colorThu="white";
	break;
	case 5:
		$colorFri="white";
	break;
	case 6:
		$colorSat="white";
	break;
	default:
		$colorSun="white";	
        }
	echo ("<table bgcolor=\"$bgcolorval\" border=0 cellpadding=0 cellspacing=0>\n<tbody>\n");
	print("<tr>\n");
	display_cellval(0,0,0,48);
	display_cellval(0,0,0,48);
	echo '<td style="width: 100px; height: 20px;"><center style="height: 26px;">
        <a href="'.$link.'=1" style="text-shadow: 0.005em 0.005em 0.1em '.$colorMon.'; border: 0px solid ; color: '.$colorMon.'; height: 32px; font-weight: bold; font-style: normal; text-align: center; font-size: 1.3em; text-transform: none; text-decoration: none;">'.$tabdayname["Mon"].'</a></center></td>';
	echo '<td style="width: 100px; height: 20px;"><center style="height: 26px;">
        <a href="'.$link.'=2" style="text-shadow: 0.005em 0.005em 0.1em '.$colorTue.'; border: 0px solid ; color: '.$colorTue.'; height: 32px; font-weight: bold; font-style: normal; text-align: center; font-size: 1.3em; text-transform: none; text-decoration: none;">'.$tabdayname["Tue"].'</a></center></td>';
	echo '<td style="width: 101px; height: 20px;"><center style="height: 26px;">
        <a href="'.$link.'=3" style="text-shadow: 0.005em 0.005em 0.1em '.$colorWed.'; border: 0px solid ; color: '.$colorWed.'; height: 32px; font-weight: bold; font-style: normal; text-align: center; font-size: 1.3em; text-transform: none; text-decoration: none;">'.$tabdayname["Wed"].'</a></center></td>';
	echo '<td style="width: 101px; height: 20px;"><center style="height: 26px;">
        <a href="'.$link.'=4" style="text-shadow: 0.005em 0.005em 0.1em '.$colorThu.'; border: 0px solid ; color: '.$colorThu.'; height: 32px; font-weight: bold; font-style: normal; text-align: center; font-size: 1.3em; text-transform: none; text-decoration: none;">'.$tabdayname["Thu"].'</a></center></td>';
	echo '<td style="width: 101px; height: 20px;"><center style="height: 26px;">
        <a href="'.$link.'=5" style="text-shadow: 0.005em 0.005em 0.1em '.$colorFri.'; border: 0px solid ; color: '.$colorFri.'; height: 32px; font-weight: bold; font-style: normal; text-align: center; font-size: 1.3em; text-transform: none; text-decoration: none;">'.$tabdayname["Fri"].'</a></center></td>';
	echo '<td style="width: 101px; height: 20px;"><center style="height: 26px;">
        <a href="'.$link.'=6" style="text-shadow: 0.005em 0.005em 0.1em '.$colorSat.'; border: 0px solid ; color: '.$colorSat.'; height: 32px; font-weight: bold; font-style: normal; text-align: center; font-size: 1.3em; text-transform: none; text-decoration: none;">'.$tabdayname["Sat"].'</a></center></td>';
	echo '<td style="width: 101px; height: 20px;"><center style="height: 26px;">
        <a href="'.$link.'=7" style="text-shadow: 0.005em 0.005em 0.1em '.$colorSun.'; border: 0px solid ; color: '.$colorSun.'; height: 32px; font-weight: bold; font-style: normal; text-align: center; font-size: 1.3em; text-transform: none; text-decoration: none;">'.$tabdayname["Sun"].'</a></center></td>';
	display_cellval(0,0,0,48);
        display_cellval(0,0,0,48);
	print("</tr>\n");
	echo ("</tbody>\n</table>\n");
}


function display_javascriptfunction_forsetpoint($sizetabx,$tabsetpoint,$tiledline1)
{
	print('
    var bgcolorSelected = "#808080";
    var bgnotselect = "#CCCCCC";
    var bgselect = "#808080";
    var bgtableau = "#808080";
    var maxtb = 23;
    var prefixeid = "tdx"
    var postfixid = "y"
    var sizetabx = '.$sizetabx.'
    var SetPointTab = new Array('.implode (',',$tabsetpoint).');
    var SetPointnew = new Array('.implode (',',$tabsetpoint).');
    var Tabdesign = new Array();
    Tabdesign[0] = new Array('.implode (',',$tiledline1[1]).');
    Tabdesign[1] = new Array('.implode (',',$tiledline1[2]).');
    Tabdesign[2] = new Array('.implode (',',$tiledline1[4]).');
    var Tabcompo = new Array(0,1,0,2,0,2,0,1,0,2,0,2,0,1,0,2,0,2,0,1,0,2,0);
    
    function GetImageValue(tilevalue){
	switch(tilevalue)
	{
		case 21:
			return "url(img/thaut.png)";
		case 22:
			return "url(img/chdroi.png)";
		case 23:
			return "url(img/tdroi.png)";
		case 30:
        	case 32:
        	case 34:
        	case 36:
        	case 38:
        	case 40:
        	case 42:
        	case 44:
        	case 46:
        	case 48:
        	case 50:
        	case 52:
			var urlstrg = "url(img/t";
			var pngstrg = "h.png)";
                	return urlstrg.concat(tilevalue-30).concat(pngstrg);
		default:
			return "url(img/tvide.png)";
	}
    }
     
    function HLOneSelect(el){
	document.getElementById(el).style.background = bgselect;
    }
    
    function HLOneNotSelect(el){
	document.getElementById(el).style.background = bgnotselect;
    }

    function returngoodimgbg(imgval){
        var imgname = "url(img/t2h.png)";
        return imgname;
    }

    function HLOneNotSelectimg(el,Pox,Poy){
	document.getElementById(el).style.backgroundImage = GetImageValue(Tabdesign[Tabcompo[Poy]][Pox]);
    }

    function HighLightRoW_(Pox,Poy){

    var i=Poy;
    var j=Poy;
    SetPointnew[Pox-2] = (49-Poy)/2;
                while (j>0)
        {
        HLOneNotSelectimg(prefixeid.concat(Pox,postfixid).concat(j),Pox,j-1);
        j--;
        }
                while (i<maxtb)
        {
        HLOneSelect(prefixeid.concat(Pox,postfixid).concat(i));
        i++;
        }
    }
    
    function LoadTabSetPoint(tab,sizex)
    {
    var i=1;
    while (i<=sizex)
	{
		HighLightRoW_(i+1,-2*tab[i-1]+49);
		i++;
        }
    }

	');
}


function display_SaveSetPointJS($jsvarname,$textconfirmDelete)
{
	// VarJS SetPointnew
	// elements = [1, 2, 9, 15].join(',')
	print ('
function setValue(){
	document.FormSave.SPDTabTimeNew.value = '.$jsvarname.'.join(\',\');
	document.forms["FormSave"].submit();
}

function setCreate(){
	document.FormCreate.SPDTabTimeNew.value = '.$jsvarname.'.join(\',\');
        document.forms["FormCreate"].submit();
}

function setLoad(){
        document.forms["FormLoad"].submit();
}

function setDelete(){
	if(confirm("'.$textconfirmDelete.'")){
		document.FormLoad.DeleteSpd.value = 1;
		document.forms["FormLoad"].submit();
	}
	else
	{ 
		alert("Not Delete!");
	}
}
	');
}



function display_SaveButtons($bgcolorval,$zonenb,$daynb,$spdid,$link,$savebttext)
{
	echo ("<table bgcolor=\"$bgcolorval\" border=0 cellpadding=0 cellspacing=0>\n<tbody>\n");
	print("<tr>\n");
	display_cellval(0,0,1,48);
	display_cellval(0,0,0,48);
	display_cellval(0,0,2,48);
	print("</tr><tr>\n");
	display_cellval(0,0,0,48);
	echo '<td style="width: 60px; height: 20px;"><center style="height: 26px;">
        <form id="FormSave" name="FormSave" method="POST" action="'.$link.'">
	<input type="hidden" name="ThZoneNb" value="'.$zonenb.'">
	<input type="hidden" name="DayNb" value="'.$daynb.'">
	<input type="hidden" name="SetPointDayId" value="'.$spdid.'">
	<input type="hidden" name="SPDTabTimeNew" id="SPDTabTimeNew" value="">
	<a href="#" onclick="setValue();" style="text-shadow: 0.005em 0.005em 0.1em black; border: 0px solid ; color: black; height: 32px; font-weight: bold; font-style: normal; text-align: center; font-size: 1.3em; text-transform: none; text-decoration: none;">'.$savebttext.'</a></form></center></td>';
	display_cellval(0,0,0,48);
	print("</tr><tr>\n");
	display_cellval(0,0,3,48);
	display_cellval(0,0,0,48);
	display_cellval(0,0,4,48);
	print("</tr>\n");
	echo ("</tbody>\n</table>\n");
}

function display_ResetButtons($bgcolorval,$zonenb,$daynb,$jsvar,$resetbttext)
{
        echo ("<table bgcolor=\"$bgcolorval\" border=0 cellpadding=0 cellspacing=0>\n<tbody>\n");
        print("<tr>\n");
        display_cellval(0,0,1,48);
        display_cellval(0,0,0,48);
        display_cellval(0,0,2,48);
        print("</tr><tr>\n");
        display_cellval(0,0,0,48);
        echo '<td style="width: 60px; height: 20px;"><center style="height: 26px;">
        <a href="#" onclick="LoadTabSetPoint('.$jsvar.',sizetabx);" style="text-shadow: 0.005em 0.005em 0.1em black; border: 0px solid ; color: black; height: 32px; font-weight: bold; font-style: normal; text-align: center; font-size: 1.3em; text-transform: none; text-decoration: none;">'.$resetbttext.'</a></center></td>';
        display_cellval(0,0,0,48);
        print("</tr><tr>\n");
        display_cellval(0,0,3,48);
        display_cellval(0,0,0,48);
        display_cellval(0,0,4,48);
        print("</tr>\n");
        echo ("</tbody>\n</table>\n");
}

function display_LoadButtons($bgcolorval,$zonenb,$daynb,$link,$idSPDarray,$SPDnamearray,$loadbttext,$Deletbttest,$spdidselect)
{
        echo ("<table bgcolor=\"$bgcolorval\" border=0 cellpadding=0 cellspacing=0>\n<tbody>\n");
        print("<tr>\n");
        display_cellval(0,0,1,48);
        display_cellval(0,0,0,48);
        display_cellval(0,0,2,48);
        print("</tr><tr>\n");
        display_cellval(0,0,0,48);
        echo '<td style="width: 230px; height: 20px;"><center style="height: 26px;">
        <form id="FormLoad" name="FormLoad" method="POST" action="'.$link.'">
        <input type="hidden" name="ThZoneNb" value="'.$zonenb.'">
        <input type="hidden" name="DayNb" value="'.$daynb.'">
        <input type="hidden" name="DeleteSpd" value="0">
	<select size="1" width="100" style="width: 100px" name="SetPointDayId">';
	foreach ($idSPDarray as $key => $idSPD) {
		echo '<option value="'.$idSPDarray[$key].'"';
		if ( intval($idSPDarray[$key]) == intval($spdidselect) ){
			echo ' selected=""';
		}
		echo '>'.$SPDnamearray[$key].'</option>';
	}
	echo '
	</select>&nbsp;
	<a href="#" onclick="setLoad();" style="text-shadow: 0.005em 0.005em 0.1em black; border: 0px solid ; color: black; height: 32px; font-weight: bold; font-style: normal; text-align: center; font-size: 1.3em; text-transform: none; text-decoration: none;">'.$loadbttext.'</a>
&nbsp;
<a href="#" onclick="setDelete();" style="text-shadow: 0.005em 0.005em 0.1em black; border: 0px solid ; color: black; height: 32px; font-weight: bold; font-style: normal; text-align: center; font-size: 1.3em; text-transform: none; text-decoration: none;">'.$Deletbttest.'</a>
</form></center></td>';
        display_cellval(0,0,0,48);
        print("</tr><tr>\n");
        display_cellval(0,0,3,48);
        display_cellval(0,0,0,48);
        display_cellval(0,0,4,48);
        print("</tr>\n");
        echo ("</tbody>\n</table>\n");
}

function display_CreateButtons($bgcolorval,$zonenb,$daynb,$link,$SPDnamenew,$creabttext)
{
        echo ("<table bgcolor=\"$bgcolorval\" border=0 cellpadding=0 cellspacing=0>\n<tbody>\n");
        print("<tr>\n");
        display_cellval(0,0,1,48);
        display_cellval(0,0,0,48);
        display_cellval(0,0,2,48);
        print("</tr><tr>\n");
        display_cellval(0,0,0,48);
        echo '<td style="width: 250px; height: 20px;"><center style="height: 26px;">
        <form id="FormCreate" name="FormCreate" method="POST" action="'.$link.'">
        <input type="hidden" name="ThZoneNb" value="'.$zonenb.'">
	<input type="hidden" name="DayNb" value="'.$daynb.'">
	<input type="hidden" name="SetPointDayId" value="0">
	<input type="hidden" name="SPDTabTimeNew" id="SPDTabTimeNew" value="">';
	echo '<input maxlength="20" size="20" name="SPDNameNew" value="'.$SPDnamenew.'">';
        echo '
        &nbsp;
        <a href="#" onclick="setCreate();" style="text-shadow: 0.005em 0.005em 0.1em black; border: 0px solid ; color: black; height: 32px; font-weight: bold; font-style: normal; text-align: center; font-size: 1.3em; text-transform: none; text-decoration: none;">'.$creabttext.'</a></form></center></td>';
        display_cellval(0,0,0,48);
        print("</tr><tr>\n");
        display_cellval(0,0,3,48);
        display_cellval(0,0,0,48);
        display_cellval(0,0,4,48);
        print("</tr>\n");
        echo ("</tbody>\n</table>\n");
}

function display_MessageWindows($bgcolorval,$statMTH,$secondsince,$loadtime)
{
	if ($statMTH == 1)
	{
		$statMTHmsg = "OK";
		$msgcolor="green";
	}
	else
	{
		$msgcolor="red";
		$statMTHmsg = "NOK";
	}
        echo ("<table bgcolor=\"$bgcolorval\" border=0 cellpadding=0 cellspacing=0>\n<tbody>\n");
        print("<tr>\n");
        display_cellval(0,0,1,48);
        display_cellval(0,0,0,48);
        display_cellval(0,0,2,48);
        print("</tr><tr>\n");
        display_cellval(0,0,0,48);
        echo '<td style="width: 280px; height: 20px;"><center style="height: 20px;">';
        echo '<h5 style="text-shadow: 0.005em 0.005em 0.1em '.$msgcolor.'; border: 0px solid ; color: '.$msgcolor.'; height: 26px; font-weight: bold; margin-top: 0px; font-style: normal; font-size: 1.0em; text-transform: none; text-decoration: none;">MonThermostat Service: '.$statMTHmsg.' ('.$secondsince.')</h5>';
	display_cellval(0,0,0,48);
	print("</tr><tr>\n");
        display_cellval(0,0,0,48);
        echo '<td style="width: 250px; height: 20px;"><center style="height: 20px;">';
	echo '<h5 style="text-shadow: 0.005em 0.005em 0.1em black; border: 0px solid ; color: black; height: 26px; font-weight: bold; margin-top: 0px; font-style: normal; font-size: 1.0em; text-transform: none; text-decoration: none;">Page Loaded in '.$loadtime.'s</h5></center></td>';
        display_cellval(0,0,0,48);
        print("</tr><tr>\n");
        display_cellval(0,0,3,48);
        display_cellval(0,0,0,48);
        display_cellval(0,0,4,48);
        print("</tr>\n");
        echo ("</tbody>\n</table>\n");
}

?>
