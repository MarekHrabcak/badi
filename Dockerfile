# Use the official PHP with Apache image as the base image
FROM php:apache AS builder

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Set working directory
WORKDIR /var/www/html

# Copy your application files
COPY src/ /var/www/html/

# Copy Apache configuration files
COPY apache/conf/ /etc/apache2/sites-enabled/

# Copy SSL certificates
COPY apache/ssl-certs/ /etc/apache2/ssl/

# Stage 2: Import MySQL dump
FROM mysql:latest AS importer

# Copy MySQL import file
COPY src/tmp0_15042022.sql /docker-entrypoint-initdb.d/

# Set permissions for MySQL import file
RUN chmod 644 /docker-entrypoint-initdb.d/tmp0_15042022.sql

# Install MySQL client
RUN apt update && apt install -y default-mysql-client

# Set environment variables for MySQL
ENV MYSQL_ROOT_PASSWORD=root \
    MYSQL_DATABASE=badi \
    MYSQL_USER=badi \
    MYSQL_PASSWORD=badi

# Start MySQL service and import dump
RUN ["docker-entrypoint.sh", "mysqld", "--datadir", "/initialized-db"]

# Final PHP application image
FROM php:apache

# Enable Apache modules
RUN a2enmod rewrite

# Install any extensions you need
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli && docker-php-ext-install pdo_mysql
# SSL conf
RUN a2enmod rewrite && a2enmod ssl && a2enmod socache_shmcb
RUN a2ensite default-ssl


# Copy application files from the builder stage
COPY --from=builder /var/www/html /var/www/html

# Set Apache debug logging
RUN sed -i 's/LogLevel warn/LogLevel debug/' /etc/apache2/apache2.conf \
    && touch /var/log/apache2/debug.log \
    && chmod 777 /var/log/apache2/debug.log \
    && ln -sf /dev/stdout /var/log/apache2/debug.log

# Expose port 80
EXPOSE 80

# Start Apache service
CMD ["apache2-foreground"]
