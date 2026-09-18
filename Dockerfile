# --- Stage 1: build frontend assets (Tailwind CSS + JS) ---
FROM node:22-alpine AS assets
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY resources resources
COPY vite.config.js ./
RUN npm run build

# --- Stage 2: PHP application ---
# composer.lock was resolved on PHP 8.5 (the local dev machine's version),
# which pulled in symfony/http-foundation v8.1.7 — that package requires
# PHP >=8.4.1, so this image must be at least 8.4 even though composer.json
# itself only declares "^8.3".
FROM php:8.5-cli-bookworm AS app
WORKDIR /var/www/html

RUN apt-get update && apt-get install -y --no-install-recommends \
        libpq-dev \
        libsqlite3-dev \
        libzip-dev \
        unzip \
        git \
    && docker-php-ext-install pdo_pgsql pgsql pdo_sqlite zip bcmath \
    && rm -rf /var/lib/apt/lists/*

COPY docker/production.ini /usr/local/etc/php/conf.d/zz-production.ini
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .
COPY --from=assets /app/public/build ./public/build

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress \
    && mkdir -p storage/framework/{cache,sessions,testing,views} storage/logs \
    && touch database/database.sqlite \
    && chmod -R 775 storage bootstrap/cache database/database.sqlite

# Render provides $PORT at runtime; migrate + cache config on boot since
# secrets (APP_KEY, DB_URL) only exist as real values at container start,
# not at build time.
CMD php artisan migrate --force \
    && php artisan db:seed --force \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && php artisan serve --host=0.0.0.0 --port="${PORT:-10000}"
