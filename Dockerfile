# Usa PHP con Apache
FROM php:8.3-apache

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar proyecto
COPY . /var/www/html

# Configurar Apache para Laravel
RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www/html

# Instalar dependencias de Laravel
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Permisos
RUN chmod -R 775 storage bootstrap/cache

# Puerto
EXPOSE 80

# Comando inicial
CMD php artisan migrate --force && apache2-foreground