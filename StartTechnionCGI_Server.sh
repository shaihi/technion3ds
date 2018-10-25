#!/bin/bash

SCRIPT_HOME="/var/www/technion3ds-scripts";
LOG_HOME="/var/www/technion3ds-CGI";

python ${SCRIPT_HOME}/submitform.py \
    --method=prefork/threaded minspare=50 maxspare=50 maxchildren=100 \
    1>>${LOG_HOME}.log 2>>${LOG_HOME}.err;
