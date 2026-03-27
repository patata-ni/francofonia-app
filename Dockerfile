FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip \
    libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . /app

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /app
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080

CMD sh -c "php artisan config:clear && php artisan cache:clear && php artisan migrate --force && php -S 0.0.0.0:8080 -t public"