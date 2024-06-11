FROM php:8.3-fpm

ARG UID
ARG GID

WORKDIR /var/www

RUN apt-get update \
    && apt-get install -y gnupg curl wget ca-certificates unzip lsb-release libpng-dev libjpeg-dev

RUN apt-get install -y \
        libicu-dev \
        libpq-dev \
        libzip-dev \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install intl pdo pdo_mysql mysqli zip bcmath pcntl exif gd \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \

RUN apt-get -y autoremove \
    && apt-get clean

RUN deluser www-data \
    && addgroup --gid $GID www-data \
    && adduser --uid $UID --gid $GID --shell /bin/bash www-data

RUN chown -R www-data:www-data /var/www

USER www-data
