FROM php:8.1-apache
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
# Install necessary packages
RUN apt-get update && \
    apt-get install \
    libzip-dev \
    wget \
    git \
    unzip \ 
    libxml2-dev \
    openssl \
    -y --no-install-recommends

# Install PHP Extensions
RUN docker-php-ext-install zip pdo_mysql soap
 
# RUN pecl install -o -f xdebug-3.1.3 \
#     && rm -rf /tmp/pear

# Copy composer installable
COPY ./install-composer.sh ./
COPY ./php.ini /usr/local/etc/php/

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
CMD bun install && bun run build 
CMD composer install
# Change the owner of the container document2 root
COPY --chown=www-data:www-data . /var/www/html
CMD php artisan key:generate 
RUN chmod -R 775 /var/www/html
CMD ["apache2-foreground"]
