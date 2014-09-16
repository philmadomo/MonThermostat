<?php
/* 	
 Page de Test MonThermostat
 Configuration d'un JOUR 23 (5°C -> 28°C) sur 48 Unitéde temps : 0h, 0h30, 1h, 1h30,...
 
*/

$sizetabx = 48;
$sizetaby = 23;
$tabsetpoint = array(20,20,20,20,20,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,20,20,20,20,20,20,20,20);

function display_RowOnClick($Posiy,$sizetabx)
{
	print("<td height=\"10\" width=\"10\"></td>");
	for($x=1; $x<=$sizetabx; $x++)
			{
				print("<td height=\"10\" width=\"10\" id=\"tdx".$x."y".$Posiy."\" onMouseOver=\"javascript:HighLightRoW_(".$x.",".$Posiy.");\">
    		</td>
				");
			}
}

function display_LigneOnClick($Posiy,$sizetabx)
{
	print("<td height=\"10\" width=\"10\"></td>"); /*bordure*/
	if($Posiy==1)
	{
		$x=1;
		print("<td height=\"10\" width=\"10\" id=\"tdx".$x."y".$Posiy."\" onMouseOver=\"javascript:HighLightRoW_(".$x.",".$Posiy.");\">
		<img src=\"img/blHD.png\" width=\"10\" height=\"10\">	
    		</td>
				");
	}
	for($x=2; $x<=$sizetabx; $x++)
			{
				print("<td height=\"10\" width=\"10\" id=\"tdx".$x."y".$Posiy."\" onMouseOver=\"javascript:HighLightRoW_(".$x.",".$Posiy.");\">
    		</td>
				");
			}
}

function display_LigneCadredeb($sizetabx)
{
	print("<td height=\"15\" width=\"15\">
				<img src=\"img/blHG.png\" width=\"15\" height=\"15\">
    		</td>
				");
	for($x=1; $x<=($sizetabx); $x++)
			{
				print("<td height=\"15\" width=\"15\">
    		</td>
				");
			}
	print("<td height=\"15\" width=\"15\">
				<img src=\"img/blHD.png\" width=\"15\" height=\"15\">
    		</td>
				");
}

function display_LigneCadrefin($sizetabx)
{
	print("<td height=\"15\" width=\"15\">
				<img src=\"img/blBG.png\" width=\"15\" height=\"15\">
    		</td>
				");
	for($x=1; $x<=($sizetabx); $x++)
			{
				print("<td height=\"15\" width=\"15\">
    		</td>
				");
			}
	print("<td height=\"15\" width=\"15\">
				<img src=\"img/blBD.png\" width=\"15\" height=\"15\">
    		</td>
				");
}


function display_FullTabOnClick($XSize,$sizetabx)
{
		for($x=1; $x<($XSize+1); $x++)
			{
    		print("<tr align=\"center\" >");
				display_RowOnClick($x,$sizetabx);
				print("</tr>");
			}
}

echo("<html><head>");
// en JS:
//var SetPointTab = new Array(20,20,20,20,20,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,12,20,20,20,20,20,20,20,20);
print('
<script language="JavaScript">
    var bgcolorSelected = "#808080";
    var bgnotselect = "#CCCCCC";
    var bgselect = "#808080";
    var bgtableau = "#808080";
    var maxtb = 23;
    var prefixeid = "tdx"
    var postfixid = "y"
    var sizetabx = '.$sizetabx.'
    var SetPointTab = new Array('.implode (',',$tabsetpoint).');
    
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
   
    function HLOneNotSelectimg(el){
        document.getElementById(el).style.backgroundImage = "url(img/t2h.png)";
    }
 
    function HighLightRoW_(Pox,Poy){
    
    var i=Poy;
    var j=Poy;
		while (j>0)
  	{
  	HLOneNotSelectimg(prefixeid.concat(Pox,postfixid).concat(j));
  	j--;
  	}
		while (i<=maxtb)
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
    	javascript:HighLightRoW_(i,tab[i-1]);
    	i++;
    	}
    }
    
    
    </script>
');


echo("</head><body onload=\"javascript:LoadTabSetPoint(SetPointTab,sizetabx);\">");
print("<form name=\"myform\" action=\"\" method=\"POST\">
    <table STYLE=\"background-image: url(img/fond.png)\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#808080\">");

display_LigneCadredeb($sizetabx);

display_FullTabOnClick($sizetaby,$sizetabx);

display_LigneCadrefin($sizetabx);

echo("</table><BR><input type=\"submit\" name=\"submit\" value=\"Valide\"></form>");

echo("<form name=\"resetab\" action=\"javascript:LoadTabSetPoint(SetPointTab,sizetabx);\" method=\"POST\"><input type=\"submit\" name=\"Reset\" value=\"Reset\"></form></body></html>");

?>
