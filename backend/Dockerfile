# Taken from: https://dev.to/veevidify/docker-compose-up-your-entire-laravel-apache-mysql-development-environment-45ea
FROM php:8.2-apache

ENV ACCEPT_EULA=Y

# 1. Install development packages and clean up apt cache.
RUN apt-get update && apt-get install -y \
    curl \
    cron \
    g++ \
    git \
    gnupg2 \
    libbz2-dev \
    libfreetype6-dev \
    libicu-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libpng-dev \
    libonig-dev \
    libreadline-dev \
    sudo \
    nano \
    supervisor \
    unzip \
    libzip-dev \
    zip \
 && rm -rf /var/lib/apt/lists/*

# 2. Apache configs + document root.
RUN echo "ServerName laravel-app.local" >> /etc/apache2/apache2.conf

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 3. mod_rewrite for URL rewrite and mod_headers for .htaccess extra headers like Access-Control-Allow-Origin-
#RUN a2enmod rewrite headers
RUN cp /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/

# 4. Start with base PHP config, then add extensions.
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN docker-php-ext-install \
    bcmath \
    bz2 \
    calendar \
    iconv \
    intl \
    opcache \
    pdo_mysql \
    pdo \
    zip

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

#Add repository ODBC and Install the Microsoft ODBC driver for SQL Server
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
    && curl https://packages.microsoft.com/config/ubuntu/22.04/prod.list > /etc/apt/sources.list.d/mssql-release.list \
    && apt-get update \
    && apt-get install -y unixodbc-dev \
    && ACCEPT_EULA=Y apt-get install -y msodbcsql18 \
    && ACCEPT_EULA=Y apt-get install -y mssql-tools \
    && apt-get install -y gcc musl-dev make

# Install the PHP drivers for Microsoft SQL Server
RUN curl -O https://pear.php.net/go-pear.phar \
     && php go-pear.phar

RUN pecl channel-update pecl.php.net \
    && pecl install sqlsrv pdo_sqlsrv \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv\
    && pecl clear-cache \
    && rm -rf /tmp/* /var/tmp/*

# 5. Composer.
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html/

# 6. We need a user with the same UID/GID as the host user
# so when we execute CLI commands, all the host file's permissions and ownership remain intact.
# Otherwise commands from inside the container would create root-owned files and directories.
RUN useradd -G www-data,root -u 1000 -d /home/devuser devuser
RUN mkdir -p /home/devuser/.composer && \
    chown -R devuser:devuser /home/devuser && \
    chown -R www-data:www-data * 
    # chown -R www-data:www-data ./storage && \
    # chmod -R 775 ./storage


EXPOSE 8000
EXPOSE 443