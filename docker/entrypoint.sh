#!/bin/sh
set -eu

cd /var/www/html

if [ ! -f .env ]; then
    echo 'The .env file is required before starting the application.' >&2
    exit 1
fi

php artisan config:clear
php artisan migrate --force

if [ ! -L public/storage ]; then
    php artisan storage:link
fi

chown -R www-data:www-data storage bootstrap/cache
chmod -R ug+rw storage bootstrap/cache

exec apache2-foreground
