FROM php:8.2-apache

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get -y install libzip-dev libicu-dev

RUN docker-php-ext-install mysqli zip intl pdo pdo_mysql

RUN  apt install zip unzip

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug