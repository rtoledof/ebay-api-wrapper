FROM php:7.4-fpm-alpine3.12

RUN apk add --update --no-cache --virtual .build-dependencies $PHPIZE_DEPS \
    && apk add --no-cache mysql-dev \
    && docker-php-ext-install pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./ /app

WORKDIR /app

RUN  cd /app && pwd && composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist