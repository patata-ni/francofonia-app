FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip \
    libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip \
    && a2dismod mpm_event || true \
    && a2dismod mpm_worker || true \
    && a2enmod mpm_prefork \
    && a2enmod rewrite \
    && sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . /var/www/html

RUN composer install --no-dev --optimize-autoloader
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 80

CMD sh -c "php artisan config:clear && php artisan cache:clear && php artisan migrate --force && apache2ctl -D FOREGROUND"