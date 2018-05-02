#!/bin/bash


cd /var/www/html/queue/shell/
step=1 #间隔的秒数，不能大于60  
for (( i = 0; i < 60; i=(i+step) )); do

	date "+%G-%m-%d %H:%M:S"
	php ../goods.php

    sleep $step
done
exit 0