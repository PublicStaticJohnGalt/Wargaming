FROM php:7.2-apache-stretch

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get -y update --fix-missing --no-install-recommends
RUN apt-get -y upgrade

# Install redis
RUN pecl install redis-4.0.1
RUN docker-php-ext-enable redis

# Enable apache modules
RUN a2enmod rewrite headers
