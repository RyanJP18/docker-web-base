FROM php:8.4-fpm-alpine

# install packages
RUN apk --no-cache add \
    bash shadow \
    && docker-php-ext-install pdo pdo_mysql

# # copy over files
WORKDIR /var/www/backend
COPY . .

# composer setup
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

# # user permissions and file ownership
RUN mkdir -p ./storage/logs ./bootstrap/cache
RUN groupadd -g 1000 devgroup && useradd -m -u 1000 -g devgroup devuser
RUN chown -R devuser:devgroup ./ && chmod -R 775 ./storage ./bootstrap/cache
USER devuser

# start
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

