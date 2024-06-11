# Use the official PHP image as a base image
FROM php:7.4-apache


# Copy application source code to the /var/www/html directory
COPY . /var/www/html/

# Set the working directory
WORKDIR /var/www/html

# Install necessary PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expose port 80 to the outside world
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
