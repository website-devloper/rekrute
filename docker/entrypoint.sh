#!/bin/sh
set -e

cd /var/www

# Default port if not set by Railway
export PORT="${PORT:-8080}"

# Substitute the PORT variable into nginx config
envsubst '${PORT}' < /etc/nginx/http.d/default.conf.template > /etc/nginx/http.d/default.conf

echo "==> Starting on port $PORT"

# Generate app key if not set
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

# Cache configuration for performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations (we add || true so it doesn't crash the container if DB is missing)
php artisan migrate --force || echo "==> Migrations failed (maybe DB is not connected yet), continuing anyway..."

# Create storage link
php artisan storage:link 2>/dev/null || true

echo "==> Application is ready! Starting services..."

# Start Supervisor (Nginx + PHP-FPM)
exec /usr/bin/supervisord -c /etc/supervisord.conf
