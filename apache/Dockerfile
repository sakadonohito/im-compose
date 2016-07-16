FROM php:5.6.23-apache

MAINTAINER sakadonohitio

RUN apt-get update && apt-get install -y libpq-dev && \
    docker-php-ext-install pdo_mysql pdo_pgsql mysqli mbstring

ADD conf/timezone.ini /usr/local/etc/php/conf.d/99_timezone.ini
RUN chown root:staff /usr/local/etc/php/conf.d/99_timezone.ini
