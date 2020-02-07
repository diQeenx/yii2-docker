#!/bin/sh

if [ ! -e "/var/www/src/composer.phar" ]; then
  docker-php-composer-install.sh;
fi