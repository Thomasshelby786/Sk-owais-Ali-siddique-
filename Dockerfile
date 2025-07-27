# Use official PHP 8.1 image with Apache
FROM php:8.1-apache

# Install mysqli and other useful extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && docker-php-ext-install mysqli

# Enable Apache mod_rewrite (for .htaccess, optional)
RUN a2enmod rewrite

# Copy all files into Apache's root directory
COPY . /var/www/html/

# Give correct permissions
RUN chown -R www-data:www-data /var/www/html

# Expose default HTTP port
EXPOSE 80
