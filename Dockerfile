FROM php:7.4-fpm-alpine AS api_php

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /srv/api

COPY composer.json  ./
RUN composer install --prefer-dist --no-dev --no-scripts --no-progress --no-suggest;

COPY src src/
COPY tests tests/

CMD ["php-fpm"]
