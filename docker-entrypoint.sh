    #!/bin/sh
    set -e

    # Generate app key if it doesn't exist
    if [ ! -f ".env" ]; then
        echo "Creating env file"
        cp .env.example .env
        php artisan key:generate
    fi

    # Run database migrations
    php artisan migrate --force

    # Start PHP-FPM and Nginx
    php-fpm &
    nginx -g 'daemon off;'

    exec "$@"
    
