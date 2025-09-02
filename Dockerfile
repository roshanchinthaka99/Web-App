# Use official PHP with Apache
FROM php:8.1-apache

# Install mysqli and pdo_mysql extensions for TiDB/MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy all project files into Apache web root
COPY care compass hospital/ /var/www/html/


# Expose Render’s port
EXPOSE 10000

# Start Apache
CMD ["apache2-foreground"]
