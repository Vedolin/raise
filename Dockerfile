FROM php:7.2-fpm

WORKDIR /vendor/

ADD composer.json .

RUN apt update \
    && apt install -y git zip

RUN curl -s --show-error https://getcomposer.org/installer | php

RUN mv composer.phar /usr/local/bin/composer

RUN composer install --no-dev

RUN apt install -y wget gnupg \
    && wget -O /etc/apt/sources.list.d/couchbase.list http://packages.couchbase.com/ubuntu/couchbase-ubuntu1404.list \
    && wget -O ~/couchbase.key http://packages.couchbase.com/ubuntu/couchbase.key \
    && apt-key add ~/couchbase.key \
    && apt update \
    && wget -O ~/libssl.deb http://ftp.us.debian.org/debian/pool/main/o/openssl/libssl1.0.0_1.0.1t-1+deb8u7_amd64.deb \
    && dpkg --install ~/libssl.deb \
    && apt install -y libssl1.0.0 libcouchbase2-libevent libcouchbase2-libevent libcouchbase2-core libcouchbase-dev libcouchbase2-bin build-essential \
    && apt install -y zlib1g-dev


RUN pecl install pcs-1.3.3
RUN pecl install igbinary
RUN pecl install couchbase

RUN docker-php-ext-enable igbinary
RUN docker-php-ext-enable pcs
RUN docker-php-ext-enable couchbase

RUN echo "register_argc_argv = true" >> /usr/local/etc/php/php.ini

EXPOSE 9000

WORKDIR /app

RUN cp -R /vendor/vendor /app