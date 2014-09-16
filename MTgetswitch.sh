#!/bin/bash
#Module purpose
#==============
# Get the switch (Opening Sensors) status from SOMEWHERE (url, cmdline, serial...)
# and return the value OP (Open) or NO (NotOpen) or Ex for Error
#
#  CAREFUL : SCRIPT NOT FINAL
#
# Error Case:
#   - Link broken (EU)
#   - Value is not what expected (EV) 
#   - No Value (ED)
#Implements
#==========
# Input: URL (ex: http://192.168.1.202:40405/stats/37/output/latest)
# Output: OP or NO or Ex
#
#@author: DomoPhil <philmadomo <AT> free.fr >
#@license:
#@organization: http://madomotique.wordpress.com
#------------------------------------------------

function returnvalueorerror()
{
	#/usr/bin/wget -O - $1 2>/dev/null | sed -e 's/[{}]/''/g' | awk -v k="text" '{n=split($0,a,","); for (i=1; i<=n; i++) print a[i]}' | while read line;
        #do
		#check VALUE
	#	relayval=$(echo -n $line | grep '"value" :' | sed 's/:/ /1' | awk -F" " '{ print $2 }')
	#	if [ -n "$relayval" ]; then
        #        	printf '%s' "$relayval"
        #	fi
	#done
		#debug send NotOpen
		printf '\"NO\"'
}

#Check the parameter ${1}
if [ "${1}" ]; then
	result=$(returnvalueorerror "${1}")
	relayval=$(printf '%s' "$result" | awk -F\" '{print $(NF-1)}')
	#printf 'result=%s\n' "$result"
	if [ -n "$relayval" ]; then
		if [ "$relayval" == "NO" -o "$relayval" == "OP" ]; then
			printf '%s' "$relayval"
		else
			#Return Value Error
			printf 'EV'
		fi
	else
		#Return Data Error
		printf 'ED'
	fi
else
	#Return Error Url
        printf 'EU'
fi

