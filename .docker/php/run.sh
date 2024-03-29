#!/bin/bash

echo Installing dependecies from project...
composer install -o -a --apcu-autoloader --no-dev && php artisan optimize
composer  dump-autoload

echo Running migration
php artisan migrate:fresh --seed

echo Generate a key application
php artisan key:generate

echo Caching
php artisan optimize

chown -R www-data:www-data storage