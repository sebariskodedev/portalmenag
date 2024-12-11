FROM oberd/php-8.2-apache

USER root

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        zip \
        curl \
        unzip \
        git \
        nano \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-ext-install bcmath \
    && docker-php-source delete

RUN curl -s https://deb.nodesource.com/setup_16.x | bash

RUN apt install nodejs -y

COPY ./docker/virtualhost.conf /etc/apache2/sites-available/laravel_project.conf

RUN a2dissite 000-default.conf

RUN cd /etc/apache2/sites-available

RUN a2ensite laravel_project

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite