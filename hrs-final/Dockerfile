FROM composer:latest
COPY . /usr/src/bank/
WORKDIR /usr/src/bank/
RUN docker-php-ext-install pdo pdo_mysql
CMD ["php", "artisan", "serve","--host=0.0.0.0"]