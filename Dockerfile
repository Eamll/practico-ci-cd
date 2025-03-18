FROM elrincondeisma/php-for-laravel:8.3.7

WORKDIR /app

# Install PostgreSQL dependencies
RUN apk add --no-cache postgresql-dev \
    && docker-php-ext-install pdo_pgsql

# Define build arguments for database configuration
ARG DB_CONNECTION
ARG DB_HOST
ARG DB_PORT
ARG DB_DATABASE
ARG DB_USERNAME
ARG DB_PASSWORD

# Set environment variables from build arguments
ENV DB_CONNECTION=${DB_CONNECTION} \
    DB_HOST=${DB_HOST} \
    DB_PORT=${DB_PORT} \
    DB_DATABASE=${DB_DATABASE} \
    DB_USERNAME=${DB_USERNAME} \
    DB_PASSWORD=${DB_PASSWORD}

# Copy all project files to the container
COPY . .

# Install Composer dependencies
RUN if command -v composer > /dev/null; then \
    composer install --no-dev --optimize-autoloader; \
    else \
    echo "Composer not installed"; \
    fi

# Create and configure .env file
RUN cp .env.example .env && \
    php artisan key:generate && \
    echo "DB_CONNECTION=${DB_CONNECTION}" >> .env && \
    echo "DB_HOST=${DB_HOST}" >> .env && \
    echo "DB_PORT=${DB_PORT}" >> .env && \
    echo "DB_DATABASE=${DB_DATABASE}" >> .env && \
    echo "DB_USERNAME=${DB_USERNAME}" >> .env && \
    echo "DB_PASSWORD=${DB_PASSWORD}" >> .env

# Create necessary directories and set permissions
RUN mkdir -p storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Expose port 8000
EXPOSE 8000

# Start Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]