FROM php:8.3

RUN apt-get update -y && \
    apt-get install -y openssl zip unzip git libonig-dev default-mysql-client

RUN docker-php-ext-install pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/backend






# composer

COPY composer.json composer.lock ./

RUN composer install --no-scripts --verbose

COPY . .

# user permissions

ARG uid=1000
RUN useradd -G www-data,root -u $uid -d /home/devuser devuser

RUN mkdir -p /home/devuser/.composer && \
    mkdir -p ./storage && \
    chown -R devuser:devuser /home/devuser && \
    chown -R www-data:www-data ./storage && \
    chmod -R 775 ./storage

RUN chown -R www-data:www-data ./storage/logs && \
    chown -R www-data:www-data ./storage/framework/views

# go

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

