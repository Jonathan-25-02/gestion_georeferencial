# Usa la imagen oficial de PHP con Apache
FROM php:8.2-apache

# Instala dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    curl \
    && docker-php-ext-install pdo_mysql zip

# Habilita mod_rewrite para Laravel
RUN a2enmod rewrite

# Instala Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Define la carpeta del proyecto
WORKDIR /var/www/html

# Copia solo lo necesario primero (para aprovechar caché en builds)
COPY composer.json composer.lock ./

# Instala dependencias de Laravel (sin dev, optimizado)
RUN composer install --no-dev --optimize-autoloader

# Luego copia el resto del proyecto
COPY . .

# Permisos recomendados
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 storage bootstrap/cache

# Configura Apache para servir Laravel desde /public
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf
