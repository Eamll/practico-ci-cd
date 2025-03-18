FROM elrincondeisma/php-for-laravel:8.3.7

WORKDIR /app

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

# Copia todos los archivos del proyecto al contenedor
COPY . .

# Verifica si Composer está instalado y ejecuta la instalación de dependencias
RUN if command -v composer > /dev/null; then \
    composer install --no-dev --optimize-autoloader; \
    else \
    echo "Composer no está instalado"; \
    fi

# Copia el archivo .env.example como .env y actualiza las variables de entorno
COPY .env.example .env
RUN sed -i "s#DB_CONNECTION=.*#DB_CONNECTION=${DB_CONNECTION}#" .env \
    && sed -i "s#DB_HOST=.*#DB_HOST=${DB_HOST}#" .env \
    && sed -i "s#DB_PORT=.*#DB_PORT=${DB_PORT}#" .env \
    && sed -i "s#DB_DATABASE=.*#DB_DATABASE=${DB_DATABASE}#" .env \
    && sed -i "s#DB_USERNAME=.*#DB_USERNAME=${DB_USERNAME}#" .env \
    && sed -i "s#DB_PASSWORD=.*#DB_PASSWORD=${DB_PASSWORD}#" .env

# Genera la clave de Laravel
RUN php artisan key:generate

# Crea carpetas necesarias y establece permisos
RUN mkdir -p storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Expone el puerto 8000
EXPOSE 8000

# Comando para iniciar Laravel con PHP
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"] 