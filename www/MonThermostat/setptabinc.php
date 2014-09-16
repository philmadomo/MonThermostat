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

$tabsetpoint=array(22,20,20,20,20,22,22,22,22,14,14,14,14,14.5,15,15.5,16,16.5,17,17,17,17,17,17,17,17,17.5,18,18,18,17.5,17,15,15,15,15,13.5,24,16,16,20,20,20,20,20,20,20,20);
# 1: en Haut 22: Max en bas
# 1-> 24C    22 -> 13.5
# 2 -> 23.5 3 -> 23 ...

# functions

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


#            Javascript Part
#echo ('<script language="JavaScript">');
#display_javascriptfunction_forsetpoint($sizetabx,$tabsetpoint,$tiledline1);
#echo ("</script>\n");


#             TEST PURPOSE !!! ONLOAD !!!
#echo ("<title>Test TAB</title>\n</head>\n<body onload=\"javascript:LoadTabSetPoint(SetPointTab,sizetabx);\">\n");

#             Display HTML Tab + CSS
#echo ("<table bgcolor=\"$bgcolorval\" border=0 cellpadding=0 cellspacing=0>\n<tbody>\n");
#display_tabtiles($tiledline1,$sizetabx+3,$sizetaby+3);
#echo ("</tbody>\n</table>\n");

?>
