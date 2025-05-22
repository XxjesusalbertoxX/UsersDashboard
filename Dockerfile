FROM php:8.3-apache

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git \
    && docker-php-ext-install pdo pdo_mysql zip

# Habilitar mod_rewrite en Apache
RUN a2enmod rewrite

# Copiar configuración personalizada de Apache
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Copiar todo el proyecto
COPY . /var/www/html

# Ajustar permisos para storage y cache de Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

WORKDIR /var/www/html

RUN git config --global --add safe.directory /var/www/html
# Instalar Composer (usa la versión oficial)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


# Instalar dependencias Laravel sin dev y optimizando
RUN composer install --no-dev --optimize-autoloader

EXPOSE 80

CMD ["apache2-foreground"]
