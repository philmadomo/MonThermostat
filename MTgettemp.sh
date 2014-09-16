#!/bin/bash
#Module purpose
#==============
# Get the temperature from SOMEWHERE (url, cmdline, serial...)
# and return the value or E for Error
# 
# Error Case:
#   - Link broken
#   - Weird temp Value 
#   - Old temp Value (Domogik temp request feature only)
#Implements
#==========
# Input: URL (ex: http://192.168.1.202:40405/stats/4/temperature/latest)
# Output: 17,5 or E
#
#@author: DomoPhil <philmadomo <AT> free.fr >
#@license:
#@organization: http://madomotique.wordpress.com
#------------------------------------------------
# Vars
#------
# Interval Offset (default 5 minutes)
intvaloff=5*100

function returnvalueorerror()
{
	#printf 'param=[%s]\n' "$1"
	/usr/bin/wget -O - $1 2>/dev/null | sed -e 's/[{}]/''/g' | awk -v k="text" '{n=split($0,a,","); for (i=1; i<=n; i++) print a[i]}' | while read line;
        do
		#check VALUE
		tempval=$(echo -n $line | grep '"value" :' | sed 's/:/ /1' | awk -F" " '{ print $2 }')
		if [ -n "$tempval" ]; then
                	printf '%s' "$tempval"
        	fi
		#printf 'value=[%s]\n' "$(echo -n $line | grep '"value" :' | sed 's/:/ /1' | awk -F" " '{ print $2 }')"
		#local tempval=$(checktempvalue "$(echo -n $line | grep '"value" :' | sed 's/:/ /1' | awk -F" " '{ print $2 }')")
		#check TIMESTAMP
		timestvalue=$(echo -n $line | grep '"timestamp" :' | sed 's/:/ /1' | awk -F" " '{ print $2 }' | tr -d '\n');
		if [ -n "$timestvalue" ]; then
			printf '%s' "$timestvalue"
		fi
		#local timestampval=$(checktimestamp "$line")
	done
}

#Check the parameter ${1}
if [ "${1}" ]; then
	result=$(returnvalueorerror "${1}")
	timestamp=${result%%\"*}
	tempval=$(printf '%s' "$result" | awk -F\" '{print $(NF-1)}')
	#printf 'result=%s\n' "$result"
	if [ -n "$tempval" -a -n "$timestamp" ]; then
		currentTS=$(date +%s)
		if [ "$timestamp" -ge "$(($currentTS - $intvaloff))" -a "$timestamp" -le "$currentTS" ]; then
			#return temperature
			printf '%s' "$tempval"
		else
			#Return Error Time
			printf 'ET'
		fi
	else
		#Return Data Error
		printf 'ED'
	fi
else
	#Return Error Url
        printf 'EU'
fi

#if [ -n "$tempval" -a -n "$timestamp" ]; then
#	#printf '[OK]'
#	currentTS=$(date +%s)
#	#printf 'TS is should be btw %s and %s ' "$(($currentTS - $intvaloff))" "$currentTS"
#	if [ "$timestamp" -ge "$(($currentTS - $intvaloff))" -a "$timestamp" -le "$currentTS" ]; then
#		#return temperature
#		printf '%s' "$tempval"
#	else
#		#Return Error Time
#		printf 'ET'
#	fi
#else
#	#Return Data Error
#	printf 'ED'
#fi

