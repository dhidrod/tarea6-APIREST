FROM php:8.2-apache

# 1) Instala dependencias base
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    libonig-dev \
    libpng-dev \
    && docker-php-ext-install zip

# 2) Instala PDO y el driver de MySQL
RUN docker-php-ext-install pdo pdo_mysql

# 3) Instala Xdebug
RUN pecl install xdebug \
 && docker-php-ext-enable xdebug

RUN echo 'xdebug.mode=debug' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo 'xdebug.start_with_request=yes' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo 'xdebug.client_host=host.docker.internal' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo 'xdebug.client_port=9003' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
 && echo 'xdebug.idekey=PHPSTORM' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# 4) Habilita mod_rewrite de Apache
RUN a2enmod rewrite

WORKDIR /var/www/html
