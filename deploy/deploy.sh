#!/bin/sh
rm -f app.tgz
mkdir -p -m 775 ./storage/app/public ./storage/framework/cache ./storage/framework/sessions ./storage/framework/testing ./storage/framework/views ./storage/logs  
(chgrp -R www-data storage ; true)
(chmod -R g+rwX storage ; true)
(chmod 775 builddbServer.sh; true)
npm update
composer update
