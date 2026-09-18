# `php artisan serve` (used in earlier builds of this Dockerfile) is
# Laravel's own dev server and is explicitly documented as unfit for
# production — it was the source of a recurring "headers already sent"
# crash on every deploy. This build runs the real thing: nginx in front
# of PHP-FPM, same as any standard Laravel production deployment.
#
# composer.lock was resolved on PHP 8.5 (the local dev machine's
# version), which pulled in symfony/http-foundation v8.1.7 — that
# package requires PHP >=8.4.1, so this image must be at least 8.4 even
# though composer.json itself only declares "^8.3".
FROM php:8.5-fpm-bookworm AS app
WORKDIR /var/www/html

RUN apt-get update && apt-get install -y --no-install-recommends \
        curl \
        gnupg \
        nginx \
        gettext-base \
        libpq-dev \
        libsqlite3-dev \
        libzip-dev \
        unzip \
        git \
    && docker-php-ext-install pdo_pgsql pgsql pdo_sqlite zip bcmath \
    && curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y --no-install-recommends nodejs \
    && rm -rf /var/lib/apt/lists/* /etc/nginx/sites-enabled/default

COPY docker/production.ini /usr/local/etc/php/conf.d/zz-production.ini
COPY docker/nginx.conf.template /etc/nginx/templates/default.conf.template
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress \
    && npm ci \
    && npm run build \
    && rm -rf node_modules \
    && mkdir -p storage/framework/{cache,sessions,testing,views} storage/logs \
    && touch database/database.sqlite \
    && chown -R www-data:www-data storage bootstrap/cache database/database.sqlite \
    && chmod -R 775 storage bootstrap/cache database/database.sqlite \
    && chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 10000
CMD ["/usr/local/bin/entrypoint.sh"]
