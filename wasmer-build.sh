#!/bin/bash
set -e

# Instala dependencias de Node.js
npm ci

# Compila los assets de Vite
npm run build

# Instala dependencias de PHP
composer install --optimize-autoloader --no-scripts --no-interaction
