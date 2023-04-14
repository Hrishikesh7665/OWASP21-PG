#!/bin/bash

# Set options for error handling and undefined variables
set -e
set -u

# Define colors for output
GREEN=$(tput setaf 2)
RED=$(tput setaf 1)
BLUE=$(tput setaf 4)
NC=$(tput sgr0) # No Color

# Check for sudo privileges
if [[ $EUID -ne 0 ]]; then
    echo -e "${RED}This script must be run with sudo privileges.${NC}" 
    exit 1
fi

# Fetch the default network interface name
DEFAULT_INTERFACE=$(ip route | grep default | awk '{print $5}')

# Check if default interface is not empty
if [ -z "$DEFAULT_INTERFACE" ]; then
  echo -e "${RED}Failed to fetch default network interface${NC}"
  exit 1
fi

# Fetch the IP address of the default interface
IP_ADDRESS=$(ip addr show "$DEFAULT_INTERFACE" | grep -oP '(?<=inet\s)\d+(\.\d+){3}')

# Check if IP address is not empty
if [ -z "$IP_ADDRESS" ]; then
  echo -e "${RED}Failed to fetch IP address of $DEFAULT_INTERFACE${NC}"
  exit 1
fi


# Update package lists
echo -e "${GREEN}Updating package lists...${NC}"
sudo apt update

# Install required packages
echo -e "${GREEN}Installing net-tools, git, nano, openssl, apache2, php, python3 and python3-pip...${NC}"
sudo apt install -y net-tools git nano openssl apache2 php python3 python3-pip

# Clone GitHub repository
echo -e "${GREEN}Cloning GitHub repository...${NC}"
if [ -d "OWASP21-PG" ]; then
  echo "${RED}Directory 'OWASP21-PG' already exists. Removing...${NC}"
  rm -rf OWASP21-PG
fi
git clone https://github.com/Hrishikesh7665/OWASP21-PG.git
cd OWASP21-PG/


# Copy repository contents to Apache document root
echo -e "${GREEN}Copying repository contents to Apache document root...${NC}"
sudo cp -r . /var/www/html
sudo chown -R www-data:www-data /var/www/html

# Backup current Apache configuration
echo -e "${GREEN}Backup current Apache configuration...${NC}"
sudo cp /etc/apache2/apache2.conf /etc/apache2/apache2.conf.owasp21pg_bak

# Configure Apache to allow .htaccess overrides
echo -e "${GREEN}Configuring Apache to allow .htaccess overrides...${NC}"
sudo sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Enable SSL module
echo -e "${GREEN}Enabling SSL module...${NC}"
sudo a2enmod ssl

# Generate self-signed SSL certificate
echo -e "${GREEN}Generating SSL certificate...${NC}"
sudo openssl req -x509 -nodes -days 365 -newkey rsa:4096 -keyout /etc/ssl/private/owasp21PG.key -out /etc/ssl/certs/owasp21PG.crt -subj "/C=IN/ST=West-Bengal/L=Kolkata"
sudo cp /etc/ssl/certs/owasp21PG.crt .
sudo cp /etc/ssl/certs/owasp21PG.crt /var/www/html

# Configureing SSL
echo -e "${GREEN}Configuring SSL...${NC}"
sudo cp ./configs/owasp21PG.conf /etc/apache2/sites-available/

# Configure Apache VirtualHost for HTTP to HTTPS redirect
echo -e "${GREEN}Configuring Apache VirtualHost for HTTP to HTTPS redirect...${NC}"
sudo sed -i "s/<IP>/$IP_ADDRESS/g" /etc/apache2/sites-available/owasp21PG.conf


# Enabling owasp21PG.conf site...
echo -e "${GREEN}Enabling owasp21PG.conf site...${NC}"
sudo a2ensite owasp21PG.conf

# Restart Apache service
echo -e "${GREEN}Restarting Apache service...${NC}"
sudo service apache2 restart

# complete 
echo -e "${GREEN}Installation and configuration completed successfully!${NC}"

echo -e "${BLUE}If you want you can use owasp21PG.crt to your browser visit https://${IP_ADDRESS}/owasp21PG.crt to download certificate ${NC}"
echo -e ${NC}
echo -e "${BLUE}OWASP21-PG up and running on https://${IP_ADDRESS}${NC}"
echo -e ${NC}

# Check if python3 is available
echo -e "${GREEN}Checking python version...${NC}"
if command -v python3 > /dev/null 2>&1; then
    echo "${GREEN}Python3 found... Installing aiosmtpd${NC}"
    python3 -m pip install aiosmtpd
    echo "${GREEN}Starting fake SMTP Server${NC}"
    python3 /var/www/html/bugs/12PHPMailer_vulnerableComponent/smtp.py
elif command -v python > /dev/null 2>&1; then
    echo "${GREEN}Python found... Installing aiosmtpd${NC}"
    python -m pip install aiosmtpd
    echo "${GREEN}Starting fake SMTP Server${NC}"
    python /var/www/html/bugs/12PHPMailer_vulnerableComponent/smtp.py
fi
