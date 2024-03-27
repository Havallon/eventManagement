FROM composer:latest AS composer

FROM php:fpm-alpine3.19

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apk add --no-cache bash\
    postgresql-dev \
    && docker-php-ext-install pdo_pgsql

WORKDIR /app