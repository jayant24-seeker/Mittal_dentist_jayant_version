# Single-stage build. Tailwind's app.css scans vendor/laravel/framework's
# pagination view via @source, so npm run build must happen AFTER
# composer install (with vendor/ present) — not before, and not in a
# separate stage that never has vendor/ at all (it's .dockerignore'd).
#
# composer.lock was resolved on PHP 8.5 (the local dev machine's
# version), which pulled in symfony/http-foundation v8.1.7 — that
# package requires PHP >=8.4.1, so this image must be at least 8.4 even
# though composer.json itself only declares "^8.3".
FROM php:8.5-cli-bookworm AS app
WORKDIR /var/www/html

RUN apt-get update && apt-get install -y --no-install-recommends \
        curl \
        gnupg \
        libpq-dev \
        libsqlite3-dev \
        libzip-dev \
        unzip \
        git \
    && docker-php-ext-install pdo_pgsql pgsql pdo_sqlite zip bcmath \
    && curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y --no-install-recommends nodejs \
    && rm -rf /var/lib/apt/lists/*

COPY docker/production.ini /usr/local/etc/php/conf.d/zz-production.ini
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress \
    && npm ci \
    && npm run build \
    && rm -rf node_modules \
    && mkdir -p storage/framework/{cache,sessions,testing,views} storage/logs \
    && touch database/database.sqlite \
    && chmod -R 775 storage bootstrap/cache database/database.sqlite

# Render provides $PORT at runtime; migrate + cache config on boot since
# secrets (APP_KEY, DB_URL) only exist as real values at container start,
# not at build time. PHP_CLI_SERVER_WORKERS lets the built-in server
# handle more than one request at a time (Render's health checker polls
# /up continuously alongside real traffic).
CMD php artisan migrate --force \
    && php artisan db:seed --force \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && PHP_CLI_SERVER_WORKERS=4 php artisan serve --host=0.0.0.0 --port="${PORT:-10000}"
