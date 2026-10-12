FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libicu-dev

RUN docker-php-ext-install mysqli intl

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

RUN mkdir -p /var/www/html/writable/cache
RUN chmod -R 777 /var/www/html/writable

WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

RUN a2enmod rewrite && a2dismod mpm_event

RUN sed -i 's!/var/www/html!/var/www/html/public!g' \
    /etc/apache2/sites-available/000-default.conf

EXPOSE 80
