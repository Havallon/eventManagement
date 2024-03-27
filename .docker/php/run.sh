#!/bin/bash

echo Installing dependecies from project...
composer install -o -a --apcu-autoloader --no-dev && php artisan optimize

echo Running migration
php artisan migrate --seed

echo Generate a key application
php artisan key:generate

chown -R www-data:www-data storage