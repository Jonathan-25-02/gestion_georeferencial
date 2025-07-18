# Usa una imagen oficial PHP con Apache
FROM php:8.1-apache

# Instala dependencias necesarias para Laravel y extensiones PHP
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git \
    && docker-php-ext-install pdo_mysql zip

# Habilita mod_rewrite para Apache (necesario para Laravel)
RUN a2enmod rewrite

# Copia el código de tu proyecto al contenedor
COPY . /var/www/html

# Da permisos correctos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala dependencias de PHP con Composer
RUN composer install --optimize-autoloader --no-dev

# Expone el puerto 80 para acceso HTTP
EXPOSE 80

# Inicia Apache en primer plano
CMD ["apache2-foreground"]
