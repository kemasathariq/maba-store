    # Use the official Render PHP image with the desired PHP version
    FROM render/php:8.2-fpm-nginx

    # Set working directory
    WORKDIR /var/www/html

    # Install PHP extensions required by Laravel
    RUN apt-get update && apt-get install -y \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        zip \
        unzip \
        git \
        curl \
        libpq-dev \ # Needed for PostgreSQL driver
        && docker-php-ext-configure gd --with-freetype --with-jpeg \
        && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql zip bcmath exif \
        && apt-get clean && rm -rf /var/lib/apt/lists/*

    # Install Composer globally
    COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

    # Copy application code
    COPY . .

    # Install application dependencies
    RUN composer install --no-interaction --optimize-autoloader --no-dev

    # Set permissions for storage and bootstrap cache
    RUN chown -R www-data:www-data storage bootstrap/cache \
        && chmod -R 775 storage bootstrap/cache

    # Copy Nginx configuration
    COPY nginx.conf /etc/nginx/sites-available/default

    # Copy entrypoint script and make it executable
    COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
    RUN chmod +x /usr/local/bin/docker-entrypoint.sh

    # Expose port 80 for Nginx
    EXPOSE 80

    # Set entrypoint
    ENTRYPOINT ["docker-entrypoint.sh"]

    # Default command to start PHP-FPM and Nginx
    CMD ["php-fpm"]
    
