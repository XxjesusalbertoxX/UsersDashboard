# Dockerfile (raíz de tu Laravel)
FROM php:8.3-apache

# 1) Instala dependencias, habilita módulos y limpia cache
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
      openssl \
      libzip-dev zip unzip git \
    && docker-php-ext-install pdo pdo_mysql zip \
    && a2enmod rewrite ssl headers \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# 2) Copia tu configuración de Apache con los VirtualHosts HTTP/HTTPS
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Activa tu sitio (reemplaza al default si fuera necesario)
RUN a2ensite 000-default.conf

# 3) Instala Composer (imagen oficial) y configura safe.directory para Git
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN git config --global --add safe.directory /var/www/html

# 4) Copia el código de tu proyecto
WORKDIR /var/www/html
COPY . /var/www/html

# Ajusta permisos Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 5) Instala dependencias PHP de Laravel
RUN composer install --no-dev --optimize-autoloader

# 6) Expone ambos puertos HTTP y HTTPS
EXPOSE 80 443

# 7) Arranca Apache en primer plano
CMD ["apache2-foreground"]
