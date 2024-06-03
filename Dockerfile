FROM php:8.3.6-fpm
RUN apt-get update -y && apt-get install -y openssl zip unzip git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . /app

RUN composer install
RUN chown -R www-data:www-data /app/storage /app/bootstrap/* /app/public/* /app/public/build
CMD php artisan key:generate
CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181