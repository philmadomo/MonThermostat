#!/bin/bash
#Module purpose
#==============
#
# Daemon
#
#Implements
#==========
# Options: debugmode=1
#
#@author: DomoPhil <philmadomo <AT> free.fr >
#@license:
#@organization: http://madomotique.wordpress.com
#------------------------------------------------
#
# STATIC VAR:
maxzone=8
debugmode=0
scriptdir=/home/philippe/MonThermostat
# FreeWheel Ext Temp Value
ExttempFreeW=15
# In case of Wrong value in GetValue Temp: Use with Virtual Temp Probe
# Should be set in the Database in future
GettempFailSafe=( 18 18 18 18 18 18 18 18 18 18 18 18 20 22 20 22 20 22 20 22 20 22 20 22 20 22 20 22 20 22 20 22 20 22 20 22 20 22 20 22 20 22 18 18 18 18 18 18 )
#-----------------------------------------------
zonenb=0
trap "interuptMT" EXIT

interuptMT() {
    echo "MTDeamon Exiting..."
}

function convertlowhightobin(){
	if [ "$1" = "high" ]; then
		echo "1"
	else
		echo "0"
	fi
}

function convertOpenStobin(){
	if [ "$1" = "NO" ]; then
		echo "0"
	else
		echo "1"
	fi
}

function retdaynumber(){
	day=$(date +%u)
	if [ $day = 0 ];then
		day=7
		echo $day
	else
		echo $day
	fi
}


daynumber=$(retdaynumber) # 1=Monday ... 7=Sunday

if [ "${1}" ]; then
        debugmode=1
	echo "daynumb=$daynumber"
fi

while true; do
	daynumber=$(date +%u) # 1=Monday ... 7=Sunday
	hberror=0
	zonenb=0
	if [ "$(php5 -f $scriptdir/setheartbeat.php 0 $(date +%s))" = "1" ]; then
		if [ "$debugmode" = "1" ]; then
	               	echo "-Ext-HeartBeat-PHPSET-Error"
		fi
		hberror=2 #Set HeartbeatError	
	fi
	while [  $zonenb -lt $maxzone ]; do
		if [ "$(php5 -f $scriptdir/testzone.php 0 $zonenb)" = "1" ]; then
			zoneerror=0
			if [ "$debugmode" = "1" ]; then
				echo "--[Zone_$zonenb]-------------------------------------------"
			fi
			eval $(php5 $scriptdir/getzoneinfo.php 0 $zonenb $daynumber) #Get Zone Info
			if [ "$debugmode" = "1" ]; then
				echo "HeaterCmdCheck:$HeaterCmdCheck"
				echo "TempProbeCmd:$TempProbeCmd"
				echo "OSid:$OSid"
				echo "UseExtTempProbe:$UseExtTempProbe"
			fi
			# MTgettemp.sh External if needed !
			if [ "$UseExtTempProbe" = "1" ]; then #Ext Probe Temp Enable
		        	if [ "$debugmode" = "1" ]; then
	         	       		echo "-Ext-Begin----"
	                		echo "TempProbeCmdExt:$TempProbeCmdExt"
	        		fi
	        		nowtempext=$($scriptdir/MTgettemp.sh $TempProbeCmdExt)
	        		if [ "$(printf "$nowtempext" | cut -b "1")" = "E" ]; then #test Error
	                		if [ "$debugmode" = "1" ]; then
	                        		echo "GetExttemp Error"
	                		fi
	                        exterror=1
	                        nowtempext=$ExttempFreeW # Set Ext Temp Value to Free Wheel Value
	        		fi
				if [ "$(php5 -f $scriptdir/setexttemp.php 0 $zonenb $nowtempext)" = "1" ]; then
		                	if [ "$debugmode" = "1" ]; then
		                        	echo "-Ext-Temp-PHPSET-Error"
		                	fi
	                	exterror=2 #Set Temp Ext Error
		        	fi
		        	if [ "$debugmode" = "1" ]; then
		                	echo "nowtempext=$nowtempext with correction : $(echo $nowtempext+$TempProbeCorExt | bc)"
		               		echo "-Ext-End------"
		        	fi
			else
				nowtempext=$ExttempFreeW # Set Ext Temp Value to Free Wheel Value
			fi
			#MTgetrelay.sh   MTgetswitch.sh  and MTgettemp.sh!
			#nowtemp=$($scriptdir/MTgettemp.sh $TempProbeCmd)
			nowtemp=$($TempProbeCmd)
			if [ "$(printf "$nowtemp" | cut -b "1")" = "E" ]; then #test Error
				if [ "$debugmode" = "1" ]; then
					echo "Gettemp Error"
				fi
				zoneerror=1
			fi
			#nowheater=$($scriptdir/MTgetrelay.sh $HeaterCmdCheck)
			nowheater=$($HeaterCmdCheck)
        	        if [ "$(printf "$nowheater" | cut -b "1")" = "E" ]; then #test Error
                	        if [ "$debugmode" = "1" ]; then
	                                echo "GetHeater Error"
	                        fi
	                        zoneerror=1
	                fi
			if [ "$ZoneEnableOS" = "1" ]; then
				#nowopensensor=$($scriptdir/MTgetswitch.sh $OSid)
				nowopensensor=$($OSid)
				if [ "$(printf "$nowopensensor" | cut -b "1")" = "E" ]; then #test Error
					if [ "$debugmode" = "1" ]; then
        	                	        echo "GetOS Error"
	               	        	fi
       	        	        	zoneerror=1
				fi
				if [ "$debugmode" = "1" ]; then
					echo "Open Sensor Enable"
				fi
			else
				nowopensensor=NO # Not Open
			fi
			if [ "$debugmode" = "1" ]; then #display SetPointReach in DebugMode
				echo $($scriptdir/MTSetPointReach.sh 1 $UseExtTempProbe $nowtempext $nowtemp $(convertlowhightobin $nowheater) $ZonePriority $HeaterACMode $HeaterWarmupCalc $TempProbeCor $TempProbeCorExt "${SetPointDay[*]}" "${SetPointTomo[*]}")
			fi
			if [ $($scriptdir/MTSetPointReach.sh 0 $UseExtTempProbe $nowtempext $nowtemp $(convertlowhightobin $nowheater) $ZonePriority $HeaterACMode $HeaterWarmupCalc $TempProbeCor $TempProbeCorExt "${SetPointDay[*]}" "${SetPointTomo[*]}") = "0" ];then #Computing
				#means start Heater/AC
				if [ "$nowheater" = "low" ];then
	                                if [ "$debugmode" = "1" ]; then
	                                        echo "Set Heater to [High]"
	                                fi
					#GCERBUFFER update
					#if [ $($scriptdir/MTsetrelay.sh $HeaterCmdOn) = "OK" ];then
	                                if [ $($HeaterCmdOn) = "OK" ];then
	                                        if [ "$debugmode" = "1" ]; then
	                                                echo "OK Heater Set to [High]"
	                                        fi
	                                        nowheater="high" # new value
	                                else
	                                        if [ "$debugmode" = "1" ]; then
	                                                echo "Error Heater NOT Set to [High] with $HeaterCmdOn"
	                                        fi
	                                fi
				else
	                                if [ "$debugmode" = "1" ]; then
	                                        echo "No Change on Heater Stat[High]"
	                                fi
	                        fi			
			else
				#Return 1 -> Setpoint Reach means stop heater/AC
				if [ "$nowheater" = "high" ];then
					#GCERBUFFER update
					#if [ $($scriptdir/MTsetrelay.sh $HeaterCmdOff) = "OK" ];then
					if [ $($HeaterCmdOff) = "OK" ];then
						if [ "$debugmode" = "1" ]; then
	                                                echo "OK Heater Set to [Low]"
	                                        fi
						nowheater="low" #new value
					else
						if [ "$debugmode" = "1" ]; then
							echo "Error Heater NOT Set to [Low] with $HeaterCmdOff"
						fi
					fi
				else
					if [ "$debugmode" = "1" ]; then
	                                        echo "No Change on Heater Stat[Low]"
	                                fi
				fi
			fi
			
			if [ "$(php5 -f $scriptdir/setheaterstattemp.php 0 $zonenb $(echo $nowtemp+$TempProbeCor | bc) $(convertlowhightobin $nowheater) $(convertOpenStobin $nowopensensor))" = "1" ]; then
	                	if [ "$debugmode" = "1" ]; then
	                	        echo "-Temp-HerterStatus-PHPSET-Error"
	                	fi
	                	zoneerror=2 #Set Temp Heater opensensor PHP-SET Error
	        	fi
			echo "HeaterStatus=$nowheater"
			echo "NowTemp=$nowtemp with Correction $(echo $nowtemp+$TempProbeCor | bc)"
			echo "NowOpenS=$nowopensensor"
			echo "ZoneError=$zoneerror"
			
			if [ "$debugmode" = "1" ]; then
	                        echo "------------------------------------------[Zone_$zonenb]---"
	                fi
		else
			if [ "$debugmode" = "1" ]; then
				echo "Zone_$zonenb is disable"
			fi
		fi
		zonenb=$((zonenb+1))
	done
	sleep 60
done

