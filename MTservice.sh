#! /bin/sh
# chkconfig 345 85 60
# description: startup script for MTDeamon.sh
# processname: MTDeamon.sh

NAME=MTDeamon
DIR=/home/philippe/MonThermostat/
EXEC=MTDeamonWithLog.sh
DAEMON_ARGS=1
PID_FILE=/home/philippe/MonThermostat/MTDeamon.pid
#PID_FILE=/var/run/foo.pid
IEXE=/home/philippe/MonThermostat/MTDeamon.sh
RUN_AS=philippe
LOGFILE=/home/philippe/MonThermostat/MTlog.log


### BEGIN INIT INFO
# Provides:          foo
# Required-Start:    $remote_fs $syslog
# Required-Stop:     $remote_fs $syslog
# Default-Start:     5
# Default-Stop:      0 1 2 3 6
# Description:       Starts the foo service
### END INIT INFO

if [ ! -f $DIR/$EXEC ]
then
        echo "$DIR/$EXEC not found."
        exit
fi

case "$1" in
  start)
        echo -n "Starting $NAME"
    cd $DIR
    start-stop-daemon -d $DIR --start --background --pidfile $PID_FILE --make-pidfile --exec $EXEC $IEXE $DAEMON_ARGS $LOGFILE
        echo "$NAME are now running."
        ;;
  stop)
    echo -n "Stopping $NAME"
        kill -TERM `cat $PID_FILE`
    rm $PID_FILE
        echo "$NAME."
        ;;
  force-reload|restart)
        $0 stop
        $0 start
        ;;
  *)
        echo "Use: /etc/init.d/$NAME {start|stop|restart|force-reload}"
        exit 1
    ;;
esac
exit 0
