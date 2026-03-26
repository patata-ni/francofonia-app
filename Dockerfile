# syntax=docker/dockerfile:1.7-labs
FROM debian:trixie-slim AS build

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
        build-essential gcc make autoconf libtool bison \
        dpkg-dev pkg-config re2c locate \
        libmariadb-dev libmariadb-dev-compat libpq-dev \
        libvips-dev default-libmysqlclient-dev libmagickwand-dev \
        libicu-dev libxml2-dev libxslt-dev libyaml-dev \
        sudo curl ca-certificates unzip git \
    && rm -rf /var/lib/apt/lists/*

SHELL ["/bin/bash", "-o", "pipefail", "-c"]
ENV MISE_DATA_DIR="/mise"
ENV MISE_CONFIG_DIR="/mise"
ENV MISE_CACHE_DIR="/mise/cache"
ENV MISE_INSTALL_PATH="/usr/local/bin/mise"
ENV PATH="/mise/shims:$PATH"

RUN curl https://mise.run | sh
RUN mkdir -p /app
RUN mise use --global "ubi:adwinying/php@8.3.29"
RUN curl -L --output /usr/bin/composer https://github.com/composer/composer/releases/download/2.9.2/composer.phar && chmod +x /usr/bin/composer
RUN mise use --global "node@22"
RUN mise use --global "npm"
ENV COMPOSER_HOME=/tmp COMPOSER_FUND=0 COMPOSER_ALLOW_SUPERUSER=1
WORKDIR /app

# Copia los archivos necesarios de Node y Composer
COPY package.json package.json
COPY package-lock.json package-lock.json
COPY composer.json composer.json
COPY composer.lock composer.lock
COPY artisan artisan

RUN composer install --optimize-autoloader --no-scripts --no-interaction
ENV CI=true NODE_ENV=production NPM_CONFIG_FUND=false
RUN npm ci

# Copia el resto del código
COPY . .
RUN npx vite build

FROM scratch
COPY --from=build /app /app
