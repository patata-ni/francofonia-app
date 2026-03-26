# Dockerfile optimizado para Laravel + Vite
FROM node:18-bullseye-slim AS node_modules
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci --include=dev

FROM composer:2.6 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-interaction --prefer-dist --optimize-autoloader

FROM php:8.2-cli-bullseye
WORKDIR /app

# Instala dependencias del sistema
RUN apt-get update \
    && apt-get install -y libpng-dev libonig-dev libxml2-dev zip unzip git curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Copia dependencias
COPY --from=vendor /app/vendor ./vendor
COPY --from=node_modules /app/node_modules ./node_modules
COPY . .

# Build de assets
RUN npm run build

# Expone el puerto por defecto de Laravel
EXPOSE 8080

# Comando de inicio
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
