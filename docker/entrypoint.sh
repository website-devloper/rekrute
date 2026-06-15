#!/bin/sh
set -e

cd /var/www

# Generate app key if not set
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

# Cache configuration for performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
php artisan migrate --force

# Create storage link
php artisan storage:link 2>/dev/null || true

echo "==> Application is ready! Starting services..."

# Start Supervisor (Nginx + PHP-FPM)
exec /usr/bin/supervisord -c /etc/supervisord.conf
