<p align="center">
  <img src="https://github.com/Hrishikesh7665/OWASP21-PG/raw/resources/images/OWASP21-PG-Logo.png" width="300" height="300" alt="OWASP21-PG Logo">
</p>

# OWASP21 - PG: OWASP Top 10 for 2021 Practice Ground

OWASP21-PG (OWASP Top 10 for 2021 Practice Ground) is a practical lab designed to equip security enthusiasts, developers, and students with the necessary skills to identify and prevent web vulnerabilities, particularly those in the OWASP Top 10 list for 2021. This project builds on the foundation of bWAPP, a free and open-source deliberately insecure web application, but takes it to the next level by providing a comprehensive practical lab that covers all categories in the OWASP Top 10. With OWASP21-PG, you can have fun while gaining the necessary skills to protect your digital world.

## Table of Contents
- [Features](#features)
- [Installation](#installation)
  - [Installing From Sources](#installing-from-sources)
  - [Installing using Docker Image](#installing-using-docker-image)
- [Lab Overview](#lab-overview)
  - [A01:2021-Broken Access Control](#a012021--broken-access-control)
  - [A02:2021-Cryptographic Failures](#a022021--cryptography-failure)
  - [A03:2021-Injection](#a032021--injection)
  - [A04:2021-Insecure Design](#a042021--insecure-design)
  - [A05:2021-Security Misconfiguration](#a052021--security-misconfiguration)
  - [A06:2021-Vulnerable and Outdated Components](#a062021--vulnerable--outdated-components)
  - [A07:2021-Identification and Authentication Failures](#a072021--identification--authentication-failure)
  - [A08:2021-Software and Data Integrity Failures](#a082021--software-and-data-integrity-failures)
  - [A09:2021-Security Logging and Monitoring Failures](#a092021--security-logging-and-monitoring-failures)
  - [A10:2021-Server-Side Request Forgery](#a102021--server-side-request-forgery-ssrf)
  - [A08:2021 + A09: *Special Lab*](#special-lab-software-and-data-integrity-failure--security-logging-and-monitoring-failure)
- [Credits](#credits)
- [Disclaimer](#disclaimer)
- [License](#license)

## Features
- Covers all categories in the OWASP Top 10 for 2021
- Based on bWAPP, a deliberately insecure web application
- Provides a comprehensive practical lab for learning web application security
- Available as a PHP application that can be hosted on Linux/Windows with Apache/IIS
- Easy to install with WAMP or XAMPP

## Installation
### Installing From Sources
1. Clone the repository to your local machine using the following command:
```
https://github.com/Hrishikesh7665/OWASP21-PG.git
```
Alternatively, You can Download The Zip

`Direct Download Zip` [Click Here](https://github.com/Hrishikesh7665/OWASP21-PG/archive/refs/heads/main.zip)

2. Install the necessary software, such as Apache/IIS and PHP, or use a pre-built package like WAMP or XAMPP.
3. Configure your web server to host the OWASP21 - PG application.
4. Start the lab and begin learning!

### Installing using Docker Image

1. Clone the repository to your local machine using the following command:
```
https://github.com/Hrishikesh7665/OWASP21-PG.git
```

2. Build the docker image from Dockerfile using

```
docker build -t owasp21-pg .
```

3. Run the docker image
```
docker run -it -p 80:80 -p 443:443 -p 1025:1025 --name owasp21-pg owasp21-pg
```
4. Browse to http://127.0.0.1

## Lab Overview

### A01:2021 – Broken Access Control
- LAB-1 Vertical Privilege Escalation
- LAB-2 Horizontal Privilege Escalation

### A02:2021 – Cryptography Failure
- LAB-1 Insecure storage of sensitive data
- LAB-2 Man in the Middle (MitM)

### A03:2021 – Injection
- LAB-1 XML Injection
- LAB-2 XSS Injection

### A04:2021 – Insecure Design
- LAB-1 Captcha Bypass
- LAB-2 OTP Bypass

### A05:2021 – Security Misconfiguration
- LAB-1 Cross-Origin Resource Sharing (CORS)
- LAB-2 XML External Entity Injection (XXE) for Security Misconfiguration

### A06:2021 – Vulnerable & Outdated Components
- LAB-1 Unrestricted File Saver
- LAB-2 PHP Contact Form (PHPMailer Vulnerability)

### A07:2021 – Identification & Authentication Failure
- LAB-1 Vulnerable Password Reset Mechanism
- LAB-2 Insecure JWT Authentication

### A08:2021 – Software and Data Integrity Failures
- LAB-1 File Integrity Checks

### A09:2021 – Security Logging and Monitoring Failures
- LAB-1 Unprotected Log

### A10:2021 – Server-Side Request Forgery (SSRF)
- LAB-1 Server Internal File Downloading
- LAB-2 Server Internal File Downloading (By Exploiting Image Downloading Functionality)

### *Special Lab (Software and Data Integrity Failure + Security Logging and Monitoring Failure)*
- LAB By Exploiting Data Integrity Failure Unlock Server Internal Logs

### Credits
**I would like to express my gratitude to the following individuals and organizations for their significant contributions to this project:**

- [CodePen Community](https://codepen.io/) for providing templates and resources that helped me create an efficient website that reflects the objectives of the OWASP Top 10.
- [bWAPP](https://github.com/ethicalhack3r/bWAPP) for their guidance and expertise in making my project meaningful for cybersecurity education. Their dedication to open-source resources has inspired me and other aspiring cybersecurity enthusiasts to learn and discover.
- [OWASP]() for their invaluable work in improving software security and promoting cybersecurity awareness.
- [Bing AI](https://www.bing.com/create) For the awsome logo.

## Disclaimer
OWASP21 - PG is designed for web application security testing and educational purposes only. Please do not use it for any malicious activity.

## License
OWASP21 - PG is licensed under the [MIT License](LICENSE).
