# syntax = docker/dockerfile:1.2

FROM php:8.1.12-fpm

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
    && apt-get install -y curl gnupg tzdata wget gnupg git zip \
    && echo "UTC" > /etc/timezone \
    && dpkg-reconfigure -f noninteractive tzdata

RUN mkdir /data

WORKDIR /data

COPY . .

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer --version=2.3.5

RUN composer install \
        --ignore-platform-reqs \
        --no-interaction \
        --no-scripts \
        --prefer-dist \
        --no-dev

RUN --mount=type=secret,id=LARAVEL_ENV_ENCRYPTION_KEY,dst=/etc/secrets/laravel \
    php artisan env:decrypt --env=production --key=$(cat /etc/secrets/laravel) --force

RUN mv .env.production .env
