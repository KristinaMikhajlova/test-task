FROM php:7.2.7-fpm

RUN apt-get update && apt-get install -y \
    git \
    mysql-client \
    nano \
    librabbitmq-dev \
    libzip-dev \
    zip \
    libicu-dev \
    && apt-get clean \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-configure intl \
    && docker-php-ext-install \
           zip \
           intl \
           pdo \
           pdo_mysql \
           bcmath \
    && pecl install amqp \
    && docker-php-ext-enable amqp

RUN touch /usr/local/etc/php/conf.d/custom.ini && echo "memory_limit = 4096M;" >> /usr/local/etc/php/conf.d/custom.ini

WORKDIR /var/www/test-task

RUN chown www-data:www-data /var/www
