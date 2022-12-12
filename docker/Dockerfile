# syntax = docker/dockerfile:1.2

FROM php:8.1.12-fpm

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
    && apt-get install -y curl tzdata wget gnupg git zip mariadb-server \
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

ENV NODE_VERSION=18.12.1
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.2/install.sh | bash
ENV NVM_DIR=/root/.nvm
RUN . "$NVM_DIR/nvm.sh" && nvm install ${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm use v${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm alias default v${NODE_VERSION}
ENV PATH="/root/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"
RUN npm install && npm run build
