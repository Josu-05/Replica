FROM php:8.2-apache

RUN docker-php-ext-install mysqli

COPY . /var/www/html

RUN a2enmod rewrite

RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

EXPOSE 80
