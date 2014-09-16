#!/bin/bash
#Module purpose
#==============
#
# Check if the SetPoint is reached.
#
#Implements
#==========
# Options: debugmode=1
#
#@author: DomoPhil <philmadomo <AT> free.fr >
#@license:
#@organization: http://madomotique.wordpress.com
#
# Input:
#        $1 : Debug   $2 : UseExtTempProbe (Mode: 0-> Simple 1->Precalcul)
#        $3 : TempExt $4 : TempInt $5 : HeaterStat  $6: Priority
#        $7 : ACMode  $8 : WarmupCalc ? $9 : CorrectInt $10 : CorrectExt
#        $11 : SetPointTab  $12 : SetPointTabTomo
#
# Output:
#         0 : SetPoint NOT Reach
#         1 : SetPoint Reach
# 
function convertminutes(){
        if [ $1 -gt 29 ]; then
                echo "1"
        else
                echo "0"
        fi
}

if [ "${1}" ]; then
	debugmode=${1}
fi
if [ "${2}" ]; then
        UseExtTempProbe=${2}
fi
if [ "${3}" ]; then
        TempExt=${3}
fi
if [ "${4}" ]; then
        TempInt=${4}
fi
if [ "${5}" ]; then
        HeaterStat=${5}
fi
if [ "${6}" ]; then
        Priority=${6}
fi
if [ "${7}" ]; then
        ACMode=${7}
fi
if [ "${8}" ]; then
        WarmupCalc=${8}
fi
if [ "${9}" ]; then
        CorrectInt=${9}
fi
if [ "${10}" ]; then
        CorrectExt=${10}
fi
if [ "${11}" ]; then
        SetPointTab=(${11})
fi
if [ "${12}" ]; then
        SetPointTabTomo=(${12})
fi

#
# Hours & Minutes
# date +%k +%M
timehours=$(date +%k)
timeminute=$(date +%M)

if [ "$debugmode" = "1" ]; then
	echo "--SetPointReach------------"
	echo "Time: $timehours : $timeminute"
	echo "Inputs:  UseExtTempProbe=$UseExtTempProbe TempExt=$TempExt TempInt=$TempInt HeaterStat=$HeaterStat"
	echo "         Priority=$Priority ACMode=$ACMode WarmupCalc=$WarmupCalc Correction=$CorrectInt"
	echo "         SetPointTab=$SetPointTab"
	echo "         SetPointTabTomo=$SetPointTabTomo"
	echo "------------SetPointReach--"
fi
indextabSPT=$((timehours*2+$(convertminutes $timeminute)))
#SPTarray=($SetPointTab)


if [ "$UseExtTempProbe" = "1" ] && [ "$ACMode" = "0" ];then
	if [ "$debugmode" = "1" ]; then
		echo "Mode UseExtTempProbe TabX=$indextabSPT"
	fi
	echo 0 #SetPoint NOT reach
else
	UseExtTempProbe="0" # Force UseExtTempProbe to 0 if ACMode = 1
	if [ "$debugmode" = "1" ]; then
                echo "Simple Mode"
		echo "SetPointTemp[$indextabSPT]=${SetPointTab[$indextabSPT]};"
	fi
	if [ "$ACMode" = "1" ]; then
		if [ "$debugmode" = "1" ]; then
			echo "-ACMode Enable-"
			echo "T:$TempInt+$CorrectInt"
		fi
		realtemp=$(echo $TempInt+$CorrectInt | bc)
		if [ $(echo "$realtemp > ${SetPointTab[$indextabSPT]}" | bc) -eq 1 ]; then
			#TempInt greater than SetPoint -> Need to start AC
			if [ "$debugmode" = "1" ]; then
		                echo "AC temp Greater than SetPoint"
		        fi
			echo 0 #SetPoint NOT reach	
		else
			if [ "$debugmode" = "1" ]; then
                                echo "AC temp Lower than SetPoint"
                        fi
			echo 1 #SetPoint reach
		fi
	else
		if [ "$debugmode" = "1" ]; then
                        echo "-HeaterMode Enable-"
                        echo "T:$TempInt+$CorrectInt"
                fi
                realtemp=$(echo $TempInt+$CorrectInt | bc)
                if [ $(echo "$realtemp < ${SetPointTab[$indextabSPT]}" | bc) -eq 1 ]; then
                        #TempInt lower than SetPoint -> Need to start Heater
                        if [ "$debugmode" = "1" ]; then
                                echo "Heater Temp Lower than SetPoint"
                        fi
                        echo 0 #SetPoint NOT reach
                else
                        if [ "$debugmode" = "1" ]; then
                                echo "Heater Temp greater than SetPoint"
                        fi
                        echo 1 #SetPoint reach
                fi		
	fi
fi

