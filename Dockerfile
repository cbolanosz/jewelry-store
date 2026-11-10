FROM composer:2 AS dependencies

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --no-progress --prefer-dist --optimize-autoloader --no-scripts

FROM php:8.4-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends libonig-dev libzip-dev unzip \
    && docker-php-ext-install mbstring pdo_mysql zip \
    && a2enmod rewrite headers \
    && rm -rf /var/lib/apt/lists/*

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf
COPY --from=dependencies /app/vendor /var/www/html/vendor
COPY . /var/www/html

WORKDIR /var/www/html

RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R ug+rw storage bootstrap/cache

COPY docker/entrypoint.sh /usr/local/bin/jewelry-store-entrypoint
RUN chmod +x /usr/local/bin/jewelry-store-entrypoint

EXPOSE 80

ENTRYPOINT ["jewelry-store-entrypoint"]
