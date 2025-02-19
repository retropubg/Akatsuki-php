FROM php:8.1-apache

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev zip unzip git && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd mysqli pdo pdo_mysql && \
    docker-php-ext-enable mysqli pdo_mysql

# Configurar error_reporting para evitar errores de variables no definidas
RUN echo "error_reporting = E_ALL & ~E_NOTICE & ~E_WARNING" >> /usr/local/etc/php/conf.d/error_reporting.ini

# Copiar archivos del bot al contenedor
WORKDIR /var/www/html
COPY . .

# Establecer permisos correctos
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Exponer el puerto 80
EXPOSE 80

# Comando de inicio
CMD ["apache2-foreground"]
