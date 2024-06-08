FROM php:8.0-fpm

# Install necessary packages
RUN apt-get update && \
    apt-get install \
    libzip-dev \
    wget \
    git \
    unzip \ 
    libxml2-dev \
    -y --no-install-recommends

# Install PHP Extensions
RUN docker-php-ext-install zip pdo_mysql soap
 
# RUN pecl install -o -f xdebug-3.1.3 \
#     && rm -rf /tmp/pear

# Copy composer installable
COPY ./install-composer.sh ./

# Cleanup packages and install composer
RUN apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \
    && rm -rf /tmp/* \
    && sh ./install-composer.sh \
    && rm ./install-composer.sh
RUN curl -fsSL https://bun.sh/install | bash
# Change the current working directorysz
WORKDIR /var/www/html
RUN bun install
RUN composer install
RUN php artisan key:generate 
# Change the owner of the container document2 root
COPY --chown=www-data:www-data . /var/www/html
# Start Apache in foreground
CMD ["php-fpm"]
