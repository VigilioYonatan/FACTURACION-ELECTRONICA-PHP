# Utiliza una imagen base de PHP
FROM php:8.1-fpm

# Instala las extensiones y utilidades necesarias de PHP
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    curl \
    zip \
    unzip \
    git \
    wget \
    libzip-dev \
    libxml2-dev \
    --no-install-recommends && rm -rf /var/lib/apt/lists/*

# Instala extensiones de PHP
RUN docker-php-ext-install zip pdo_mysql soap pcntl bcmath gd

# Establece el directorio de trabajo
WORKDIR /var/www

# Copia el archivo php.ini personalizado si existe
COPY ./docker/php.ini /usr/local/etc/php/

# Copia todos los archivos del proyecto
COPY . .

# Cambia el propietario de los archivos al usuario www-data
RUN chown -R www-data:www-data /var/www

# Instala Composer como root
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Cambia al usuario www-data
USER www-data

# Instala las dependencias de PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Expon el puerto 9000
EXPOSE 8000

# Comando para iniciar el servidor de PHP
CMD ["php-fpm"]
