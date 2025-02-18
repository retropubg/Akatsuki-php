# Usar PHP 7.4 con FPM
FROM php:7.4-fpm

# Instalar Composer y extensiones necesarias
RUN apt-get update && apt-get install -y unzip nginx \
    && docker-php-ext-install pdo pdo_mysql

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos del proyecto
COPY . /var/www/html/

# Instalar dependencias con Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader

# Configurar Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Exponer el puerto 80
EXPOSE 8080

# Iniciar PHP-FPM y Nginx
CMD service nginx start && php-fpm
