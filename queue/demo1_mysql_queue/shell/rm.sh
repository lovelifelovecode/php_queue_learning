#!/bin/bash

cd /var/www/html/queue/shell/
rm ../log/log2.log
mv ../log/log.log ../log/log2.log
touch ../log/log.log
chmod 777 ../log/log.log