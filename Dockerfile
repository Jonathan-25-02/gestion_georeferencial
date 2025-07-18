FROM php:8.1-apache

# Instala extensiones necesarias
RUN docker-php-ext-install pdo pdo_mysql

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia archivos del proyecto
COPY . /var/www/html

# Establece directorio de trabajo
WORKDIR /var/www/html

# Establece DocumentRoot de Apache a /public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Asegúrate de que Apache cargue el index.php desde public/
RUN echo "<IfModule dir_module>\n    DirectoryIndex index.php index.html\n</IfModule>" > /etc/apache2/mods-enabled/dir.conf

# Habilita mod_rewrite
RUN a2enmod rewrite

# Da permisos correctos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Instala dependencias
RUN composer install --optimize-autoloader --no-dev || true

# Exponer puerto
EXPOSE 80

CMD ["apache2-foreground"]
