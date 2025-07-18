# Imagen base con PHP, Apache y extensiones necesarias
FROM php:8.2-apache

# Instala extensiones necesarias de Laravel y Composer
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    curl \
    zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Habilita mod_rewrite de Apache (para URLs amigables de Laravel)
RUN a2enmod rewrite

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia el contenido del proyecto
COPY . .

# Instala dependencias
RUN composer install --no-dev --optimize-autoloader

# Copia archivo de entorno si no existe
RUN cp .env.example .env || true

# Genera APP_KEY automáticamente (Laravel necesita esto)
RUN php artisan key:generate

# Da permisos a storage y bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Puerto a exponer
EXPOSE 80
