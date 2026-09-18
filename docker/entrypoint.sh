#!/bin/sh
set -e

: "${PORT:=10000}"
export PORT

echo "[entrypoint] rendering nginx config for port $PORT"
# Only $PORT gets substituted — nginx's own $uri/$document_root/etc.
# must survive untouched, so the variable list is explicit.
envsubst '${PORT}' < /etc/nginx/templates/default.conf.template > /etc/nginx/sites-enabled/default

echo "[entrypoint] running migrations"
php artisan migrate --force

echo "[entrypoint] seeding database"
php artisan db:seed --force

echo "[entrypoint] caching config"
php artisan config:cache

echo "[entrypoint] caching routes"
php artisan route:cache

echo "[entrypoint] caching views"
php artisan view:cache

# Everything above ran as root, so anything it created (the SQLite file on
# a fresh disk, WAL sidecars, cached config) is root-owned. PHP-FPM serves
# as www-data, so hand it back before the first request arrives.
echo "[entrypoint] fixing runtime ownership"
chown -R www-data:www-data database storage bootstrap/cache

echo "[entrypoint] starting php-fpm"
php-fpm -D

echo "[entrypoint] starting nginx"
exec nginx -g "daemon off;"
