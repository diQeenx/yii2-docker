FROM php:7.2-fpm-alpine

RUN set -xe apk update \
    && apk add bash \
    && apk add curl \
    && apk add wget

RUN set -xe docker-php-ext-install -j$(nproc) gd intl gettext pdo pdo_mysql zip

RUN set -xe pecl install redis

VOLUME /var/www/src/logs

COPY entrypoint.sh /usr/local/bin
COPY docker-php-composer-install.sh /usr/local/bin

RUN set -xe \
    && chmod +x /usr/local/bin/entrypoint.sh \
    && chmod +x /usr/local/bin/docker-php-composer-install.sh

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

CMD ["php-fpm"]