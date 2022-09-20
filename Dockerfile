# syntax=docker/dockerfile:1

FROM php:8.0-apache

RUN a2enmod rewrite
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

WORKDIR /var/www/html
COPY htdocs/ .
COPY po/*.po ./engine/languages/

RUN chown -R www-data:www-data .

EXPOSE 80