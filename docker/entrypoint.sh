#!/bin/sh
set -eu

cd /var/www/html

if [ -z "${APP_KEY:-}" ]; then
    echo 'APP_KEY is required before starting the application.' >&2
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
