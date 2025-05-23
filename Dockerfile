FROM php:8.3-apache

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    libpq-dev \
    unzip \
    zip \
    git \
    nano \
    libzip-dev \
    && docker-php-ext-install pdo_pgsql 

# Habilitar mod_rewrite y SSL
RUN a2enmod rewrite ssl

# Copiar configuración personalizada de Apache
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Copiar Composer desde imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar todo el proyecto
COPY . /var/www/html

# Instalar dependencias Laravel
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Ajustar permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80 443

# CMD modificado para generar sitemap
CMD php artisan config:clear && \
    if ! grep -q "^APP_KEY=" .env; then \
        php artisan key:generate --force; \
    fi && \
    php artisan migrate --force && \
    php artisan sitemap:generate && \
    apache2-foreground
