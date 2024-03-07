#!/bin/sh
rm -f app.tgz 
cp ../env/.env .
mkdir -p -m 775 ./storage/app/public ./storage/framework/cache ./storage/framework/sessions ./storage/framework/testing ./storage/framework/views ./storage/logs  
(chgrp -R www-data storage ; true)
(chmod -R g+rwX storage ; true)
php artisan migrate
php artisan config:cache
php artisan route:cache
php artisan view:cache   
#XD