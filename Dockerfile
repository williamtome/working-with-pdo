FROM php:latest
COPY . /usr/src/pdo-php
WORKDIR /usr/src/pdo-php
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql pdo_sqlite