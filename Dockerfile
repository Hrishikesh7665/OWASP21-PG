# Use the Ubuntu 22.04 LTS base image
FROM ubuntu:22.04
ENV TZ=Asia/Kolkata \
    DEBIAN_FRONTEND=noninteractive

# Update the package lists and install Apache, PHP, and HTTPd
RUN apt-get update && \
    apt-get install -y tzdata apache2 php python3 supervisor

# Set up the Apache virtual host for the website
COPY configs/owasp21-PG.conf /etc/apache2/sites-available/owasp21-PG.conf
RUN ln -s /etc/apache2/sites-available/owasp21-PG.conf /etc/apache2/sites-enabled/owasp21-PG.conf
RUN rm /etc/apache2/sites-enabled/000-default.conf

# Enable .htaccess
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/sites-available/owasp21-PG.conf

# Copy the components folder and index.php file into the container
COPY bugs /var/www/html/bugs
COPY components /var/www/html/components
COPY bugs.html /var/www/html
COPY gratitude.html /var/www/html
COPY index.html /var/www/html
COPY online.html /var/www/html
COPY error.html /var/www/html
COPY .htaccess /var/www/html

# Copy the supervisor configuration file
COPY configs/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expose ports 80 and 443 for HTTP and HTTPS traffic
EXPOSE 80
EXPOSE 443
# Expose ports 1025 for smtp
EXPOSE 1025

# Start supervisord to run Apache and Python
CMD ["/usr/bin/supervisord"]