FROM composer:latest AS composer

FROM php:fpm-alpine3.19

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apk add --no-cache bash\
    postgresql-dev \
    && docker-php-ext-install pdo_pgsql

WORKDIR /app

COPY /.docker/php/run.sh .

RUN chmod +x run.sh

EXPOSE 8000