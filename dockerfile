# syntax=docker/dockerfile:1
ARG PHP_VERSION=8.3
FROM php:${PHP_VERSION}-fpm

LABEL language="php"
LABEL type="custom-mvc"

ENV APP_ENV=production
ENV APP_DEBUG=false

WORKDIR /var/www

# PHP extension installer
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions

# System dependencies
RUN apt update && apt install -y \
    nginx \
    curl \
    git \
    unzip \
    libicu-dev \
    && rm -rf /var/lib/apt/lists/*

# PHP extensions + Composer
RUN install-php-extensions \
    @composer \
    curl \
    openssl \
    apcu \
    bcmath \
    gd \
    intl \
    mysqli \
    opcache \
    pcntl \
    pdo_mysql \
    sysvsem \
    zip \
    ffi

# Enable FFI extension
RUN echo "extension=ffi.so" > /usr/local/etc/php/conf.d/docker-php-ext-ffi.ini && \
    echo "ffi.enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-ffi.ini

# Nginx config
RUN cat <<'EOF' > /etc/nginx/sites-enabled/default
server {
    listen 8080;
    server_name _;
    root /var/www/public;

    index index.php;
    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        fastcgi_param DOCUMENT_ROOT $realpath_root;
    }

    location ~ /\. {
        deny all;
    }

    access_log /dev/stdout;
    error_log /dev/stderr;
}
EOF

# Copy project
COPY . /var/www

# Create vendor directory with proper permissions
RUN mkdir -p /var/www/vendor && chown -R www-data:www-data /var/www

# Composer home
ENV COMPOSER_HOME=/tmp/composer
RUN mkdir -p /tmp/composer && chown -R www-data:www-data /tmp/composer

# Install PHP dependencies as root first, then fix permissions
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Fix final permissions
RUN chown -R www-data:www-data /var/www

EXPOSE 8080

CMD ["sh", "-c", "nginx && php-fpm"]
