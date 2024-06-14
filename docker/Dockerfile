FROM php:8.1-fpm
# Copy virtual host into container
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
# Enable rewrite mode
RUN a2enmod rewrite

# Install necessary packages
RUN apt-get update && \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    curl \
    zip \
    apt-get install \
    libzip-dev \
    libxml2-dev \
    wget \
    git \
    unzip \
    -y --no-install-recommends

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP Extensions
RUN docker-php-ext-install zip pdo_mysql soap pcntl bcmath gd

# RUN pecl install -o -f xdebug-3.1.3 \
#     && rm -rf /tmp/pear

# Copy composer installable
COPY ./install-composer.sh ./

# Copy php.ini
COPY ./php.ini /usr/local/etc/php/

# Cleanup packages and install composer
RUN apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \
    && rm -rf /tmp/* \
    && sh ./install-composer.sh \
    && rm ./install-composer.sh
RUN curl -fsSL https://bun.sh/install | bash
# Change the current working directory
WORKDIR /var/www
CMD bun install
CMD composer install
COPY --chown=www-data:www-data . /var/www

USER www-data

EXPOSE 9000
CMD ["php-fpm"]