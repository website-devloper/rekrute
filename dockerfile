# ============================================
# Stage 1 - Build Frontend Assets (Vite)
# ============================================
FROM node:18-alpine AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# ============================================
# Stage 2 - Production (PHP 8.2 + Nginx)
# ============================================
FROM php:8.2-fpm-alpine

# Install system dependencies + PostgreSQL + Nginx + Supervisor
RUN apk add --no-cache \
    nginx \
    supervisor \
    git \
    curl \
    unzip \
    libpq-dev \
    oniguruma-dev \
    libzip-dev \
    zip \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo \
        pdo_pgsql \
        pgsql \
        mbstring \
        zip \
        gd \
        opcache

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy composer files first (for Docker cache)
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts --no-interaction

# Copy the rest of the application
COPY . .

# Run composer scripts after full copy
RUN composer dump-autoload --optimize

# Copy built frontend assets from Stage 1
COPY --from=frontend /app/public/build ./public/build

# Copy Nginx config as template (PORT gets substituted at runtime)
COPY docker/nginx.conf /etc/nginx/http.d/default.conf.template

# Copy Supervisor config
COPY docker/supervisord.conf /etc/supervisord.conf

# Copy entrypoint script
COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Set proper permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Create nginx pid directory
RUN mkdir -p /run/nginx

# Railway injects PORT dynamically
EXPOSE ${PORT:-8080}

ENTRYPOINT ["/entrypoint.sh"]
