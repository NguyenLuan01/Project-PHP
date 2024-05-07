# Use the official PHP image with Apache pre-installed
FROM php:8.0-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the website's source code to the container's web directory
COPY ./  /var/www/html  

# Expose port 80 to the host machine
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]



