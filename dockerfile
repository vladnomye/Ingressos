FROM php:8.4-fpm

ARG ENVIRONMENT=dev
ENV ENVIRONMENT=${ENVIRONMENT}

#Bibiliotecas
RUN apt-get update && apt-get install -y \ 
libicu-dev \ 
libpq-dev \ 
libzip-dev \ 
libpng-dev \ 
libjpeg-dev 

#Raiz do projeto
RUN bash
WORKDIR /var/www/ingressos

#Dependências
RUN docker-php-ext-install gd \ 
&& docker-php-ext-configure gd --with-jpeg
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-install zip
RUN docker-php-ext-install intl
RUN docker-php-ext-install opcache

#Composer
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer
COPY ./composer.json ./
RUN composer install

#Redis
RUN pecl install redis \ 
&& docker-php-ext-enable redis