#!/bin/bash

echo Installing dependecies from project...
composer install -o -a --apcu-autoloader --no-dev
composer  dump-autoload

php artisan optimize:clear
echo Running migration
php artisan migrate:fresh --seed

echo Generate a key application
php artisan key:generate

echo Caching
php artisan optimize

chown -R www-data:www-data storage