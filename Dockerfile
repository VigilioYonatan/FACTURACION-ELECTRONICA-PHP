FROM php:8.1-fpm
# Install necessary packages
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
# Install PHP Extensions
RUN docker-php-ext-install zip pdo_mysql soap pcntl bcmath gd

# RUN pecl install -o -f xdebug-3.1.3 \
#     && rm -rf /tmp/pear

# Copy composer installable
COPY ./docker/install-composer.sh ./

# Copy php.ini
COPY ./docker/php.ini /usr/local/etc/php/

# Cleanup packages and install composer
RUN apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \
    && rm -rf /tmp/* \
    && sh ./install-composer.sh \
    && rm ./install-composer.sh
RUN curl -fsSL https://bun.sh/install | bash
# Change the current working directory
CMD bun install
CMD composer install
WORKDIR /var/www
COPY ./ /var/www
# Set permissions
RUN chown -R www-data:www-data /var/www
RUN chmod -R 755 /var/www/storage
RUN chmod -R 755 /var/www/bootstrap/cache

CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000