#!/bin/bash

echo Installing dependecies from project...
composer install -o -a --apcu-autoloader --no-dev && php artisan optimize
composer  dump-autoload

echo Running migration
php artisan migrate:fresh --seed

echo Generate a key application
php artisan cache:clear
php artisan key:generate
php artisan config:cache

chown -R www-data:www-data storage