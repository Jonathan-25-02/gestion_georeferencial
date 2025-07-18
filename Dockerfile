# Usa una imagen oficial con PHP 8.1 + Apache
FROM php:8.1-apache

# Instala extensiones necesarias de PHP
RUN docker-php-ext-install pdo pdo_mysql

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Habilita mod_rewrite en Apache
RUN a2enmod rewrite

# Copia todo tu proyecto al contenedor
COPY . /var/www/html

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Establece el DocumentRoot de Apache a /public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Da permisos correctos (solución común para Laravel)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Instala dependencias PHP (sin desarrollo)
RUN composer install --optimize-autoloader --no-dev

# Expone el puerto estándar de Apache
EXPOSE 80

# Comando por defecto: iniciar Apache
CMD ["apache2-foreground"]
