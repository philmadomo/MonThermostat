<?php
#Microtime
function get_microtime(){
list($tps_usec, $tps_sec) = explode(" ",microtime());
return ((float)$tps_usec + (float)$tps_sec);
}

$tps_start = get_microtime();


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
array(6,10,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,30,23,20,23,32,23,20,23,34,23,20,23,36,23,20,23,38,23,20,23,40,23,20,23,42,23,20,23,44,23,20,23,46,23,20,23,48,23,20,23,50,23,20,23,52,23,20,23,0),
array(0,12,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,0),
array(6,9,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,0),
array(0,12,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,30,23,20,23,32,23,20,23,34,23,20,23,36,23,20,23,38,23,20,23,40,23,20,23,42,23,20,23,44,23,20,23,46,23,20,23,48,23,20,23,50,23,20,23,52,23,20,23,0),
array(6,8,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,0),
array(0,12,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,0),
array(6,7,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,30,23,20,23,32,23,20,23,34,23,20,23,36,23,20,23,38,23,20,23,40,23,20,23,42,23,20,23,44,23,20,23,46,23,20,23,48,23,20,23,50,23,20,23,52,23,20,23,0),
array(0,12,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,0),
array(5,11,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,0),
array(0,12,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,30,23,20,23,32,23,20,23,34,23,20,23,36,23,20,23,38,23,20,23,40,23,20,23,42,23,20,23,44,23,20,23,46,23,20,23,48,23,20,23,50,23,20,23,52,23,20,23,0),
array(5,10,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,21,22,0),
array(0,13,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,20,23,0),
array(0,0,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,0),
array(3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,4)
);

$tabsetpoint=array(20,20,20,20,20,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,20,20,20,20,20,20,20,20);


# functions
function display_ColCadredeb($sizetaby)
{
	print("<tr><td height=\"10\" width=\"15\">
<img src=\"img/blHG.png\" width=\"15\" height=\"15\"></td></tr>\n");
	print("<tr><td><img style=\"width: 15px; height: 10px;\" src=\"img/t2.png\"></td></tr>\n");
	print("<tr><td height=\"10\" width=\"15\"></td></tr><tr><td height=\"10\" width=\"15\"></td></tr><tr><td height=\"10\" width=\"15\"></td></tr>\n");
	print("<tr><td><img style=\"width: 15px; height: 10px;\" src=\"img/t2.png\"></td></tr>\n");
	print("<tr><td height=\"10\" width=\"15\"></td></tr><tr><td height=\"10\" width=\"15\"></td></tr><tr><td height=\"10\" width=\"15\"></td></tr>\n");
	print("<tr><td><img style=\"width: 15px; height: 10px;\" src=\"img/t2.png\"></td></tr>\n");
	print("<tr><td height=\"10\" width=\"15\"></td></tr><tr><td height=\"10\" width=\"15\"></td></tr><tr><td height=\"10\" width=\"15\"></td></tr>\n");
	print("<tr><td><img style=\"width: 15px; height: 10px;\" src=\"img/t2.png\"></td></tr>\n");
	print("<tr><td height=\"10\" width=\"15\"></td></tr><tr><td height=\"10\" width=\"15\"></td></tr><tr><td height=\"10\" width=\"15\"></td></tr>\n");
	print("<tr><td><img style=\"width: 15px; height: 10px;\" src=\"img/t1.png\"></td></tr>");
	print("<tr><td height=\"10\" width=\"15\"></td></tr><tr><td height=\"10\" width=\"15\"></td></tr><tr><td height=\"10\" width=\"15\"></td></tr>\n");
	print("<tr><td><img style=\"width: 15px; height: 10px;\" src=\"img/t1.png\"></td></tr>\n");
	print("<tr><td height=\"10\" width=\"15\"></td></tr><tr><td height=\"10\" width=\"15\"></td></tr>\n");
	print("<tr><td height=\"10\" width=\"15\">
<img src=\"img/blBG.png\" width=\"15\" height=\"15\"></td></tr>\n");
}

function display_cellval($tabx,$taby,$value)
{
	print("<td height=\"10\" width=\"15\"");
	switch ($value) {
	case 1:
		print("><img src=\"img/blHG.png\" width=\"15\" height=\"15\">");
	break;
	case 2:
		print("><img src=\"img/blHD.png\" width=\"15\" height=\"15\">");
	break;
	case 3:
		print("><img src=\"img/blBG.png\" width=\"15\" height=\"15\">");
	break;
	case 4:
		print("><img src=\"img/blBD.png\" width=\"15\" height=\"15\">");
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
		print(" style=\"background: rgb(204, 204, 204)\" id=\"tdx".$tabx."y".$taby."\" onmouseover=\"javascript:HighLightRoW_(".$tabx.",".$taby.");\">");
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
	print("</td>\n");
}

function display_tabtiles($tabarray,$tabsizex,$tabsizey)
{
	for($y=0; $y<=(24); $y++)
	{
		print("<tr>\n");
		for($x=0; $x<=($tabsizex-1); $x++)
		{
			display_cellval($x,$y,$tabarray[$y][$x]);
		}
		print("</tr>\n");
	}
}

echo ("<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n");
echo ("<html>\n<head>\n<title>Test TAB</title>\n</head>\n<body>\n");

echo ("<table bgcolor=\"$bgcolorval\" border=0 cellpadding=0 cellspacing=0>\n<tbody>\n");

#display_ColCadredeb($sizetaby);
display_tabtiles($tiledline1,$sizetabx+3,$sizetaby+3);

echo ("</tbody>\n</table>\n");

$tps_end = get_microtime();
$tps = $tps_end - $tps_start;

printf("%2.3f",$tps);

echo ("</body></html>\n");
?>
