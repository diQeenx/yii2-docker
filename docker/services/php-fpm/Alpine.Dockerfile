FROM php:7.2-fpm-alpine

MAINTAINER dzmitry.danilau@innowise-group.com

RUN set -xe \
    && apk update \
    && apk add bash \
        curl \
        wget \
    #gd
        freetype-dev \
    #intl
        icu-dev \
    #gettext
        gettext-dev \
    #zip
        zlib-dev \
    #igbinary, redis
        zstd-dev \
        autoconf \
        g++ \
        make

RUN set -xe \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install -j$(nproc) intl \
    && docker-php-ext-install -j$(nproc) gettext \
    && docker-php-ext-install -j$(nproc) pdo \
    && docker-php-ext-install -j$(nproc) pdo_mysql \
    && docker-php-ext-install -j$(nproc) zip

RUN set -xe \
    && pecl install igbinary \
        redis

COPY entrypoint.sh /usr/local/bin
COPY docker-php-composer-install.sh /usr/local/bin

RUN set -xe \
    && rm -rf /var/www \
    && /usr/bin/install -m 0775 -o www-data -g www-data -d \
    /var/www/ \
    /var/www/logs \
    /var/www/src/ \
    /var/www/.composer

VOLUME ["/var/www/logs", "/var/www/.composer"]

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

CMD ["php-fpm"]