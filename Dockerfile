
# Usar la imagen oficial de PHP 7.4 con Apache
FROM php:7.4-apache

# Instalar Composer y extensiones necesarias
RUN apt-get update && apt-get install -y unzip     && docker-php-ext-install pdo pdo_mysql

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos del proyecto
COPY . /var/www/html/

# Instalar dependencias con Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer     && composer install --no-dev --optimize-autoloader

# Exponer el puerto 80
EXPOSE 8080

# Iniciar Apache en primer plano
CMD ["apache2-foreground"]
