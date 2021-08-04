FROM node:alpine AS node

WORKDIR /usr/app
COPY package.json tailwind.config.js webpack.mix.js ./
RUN npm install
COPY resources ./resources
RUN mkdir -p public/css public/js
RUN npm run production

FROM composer:latest as vendor
WORKDIR /src
COPY . ./
RUN composer install --optimize-autoloader --no-dev && rm -rf /root/.composer

 
FROM php:7.4-alpine
# working directory
WORKDIR /var/www/localhost/htdocs/
RUN apk add --update --no-cache php-common \
    php-fpm php-pdo php-opcache php-zip zip libzip-dev php-phar \
    php-iconv php-cli php-curl php-openssl \
    php-mbstring php-tokenizer php-fileinfo php-json \
    php-xml php-xmlwriter php-simplexml php-dom \
    php-pdo_sqlite php-tokenizer php7-pecl-redis \
    && docker-php-ext-install mysqli pdo pdo_mysql zip \
    && rm  -rf /tmp/* /var/cache/apk/*

# copy files
COPY --from=vendor /src/ ./
COPY --from=node /usr/app/public ./public
#USER www-data
RUN php artisan cache:clear && \
    php artisan config:clear && \
    php artisan route:clear
CMD php artisan config:cache && php artisan serve --host=0.0.0.0 --port=80
