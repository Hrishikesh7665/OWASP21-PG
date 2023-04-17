# Use the Ubuntu 22.04 LTS base image
FROM ubuntu:22.04
ENV TZ=Asia/Kolkata \
    DEBIAN_FRONTEND=noninteractive

# Update the package lists and install Apache, PHP, and HTTPd
RUN apt-get update && \
    apt-get install -y tzdata net-tools nano git openssl apache2 php python3 python3-pip supervisor

# Clone GitHub repository
RUN git clone https://github.com/Hrishikesh7665/OWASP21-PG.git /var/www/html/OWASP21-PG

# Copy repository contents to Apache document root
RUN cp -r /var/www/html/OWASP21-PG/. /var/www/html \
    && chown -R www-data:www-data /var/www/html

# Configure Apache to allow .htaccess overrides
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Enable SSL module
RUN a2enmod ssl

# Generate self-signed SSL certificate
RUN openssl req -x509 -nodes -days 365 -newkey rsa:4096 -keyout /etc/ssl/private/owasp21PG.key -out /etc/ssl/certs/owasp21PG.crt -subj "/C=IN/ST=West-Bengal/L=Kolkata" \
    && cp /etc/ssl/certs/owasp21PG.crt /var/www/html

# Copy owasp21PG.conf to Apache sites-available directory
RUN cp /var/www/html/OWASP21-PG/configs/owasp21PG.conf /etc/apache2/sites-available/

# Configure Apache VirtualHost for HTTP to HTTPS redirect
RUN sed -i "s/<IP>/localhost/g" /etc/apache2/sites-available/owasp21PG.conf

# Copy the supervisor configuration file
RUN cp /var/www/html/OWASP21-PG/configs/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Enable owasp21PG.conf site
RUN a2ensite owasp21PG.conf

# Restart Apache service
RUN service apache2 restart

# Install aiosmtpd for Python
RUN python3 -m pip install aiosmtpd

# Expose ports for Apache and SMTP
EXPOSE 80 443 1025

# Start supervisord to run Apache and Python
CMD ["/usr/bin/supervisord"]
