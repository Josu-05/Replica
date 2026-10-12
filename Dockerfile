FROM php:8.2-apache

RUN apt-get update && apt-get install -y git unzip zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN docker-php-ext-install mysqli

COPY . /var/www/html

WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

RUN a2enmod rewrite

RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80
