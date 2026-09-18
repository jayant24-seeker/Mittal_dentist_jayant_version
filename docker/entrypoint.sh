#!/bin/sh
set -e

: "${PORT:=10000}"
export PORT

# Only $PORT gets substituted — nginx's own $uri/$document_root/etc.
# must survive untouched, so the variable list is explicit.
envsubst '${PORT}' < /etc/nginx/templates/default.conf.template > /etc/nginx/sites-enabled/default

php artisan migrate --force
php artisan db:seed --force
php artisan config:cache
php artisan route:cache
php artisan view:cache

php-fpm -D
exec nginx -g "daemon off;"
