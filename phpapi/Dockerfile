# DOCKERFILE FOR PHP APP
FROM php:8.3-apache

# Setup Apache
ENV TZ=US/Eastern

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

RUN apt-get update; \ 
  apt-get -y upgrade;
RUN apt-get install -y libzip-dev unzip libcurl4-openssl-dev libldap2-dev ssl-cert;

# Enable Apache Modules
RUN a2enmod ssl
RUN a2enmod rewrite expires headers proxy proxy_http proxy_html
RUN mkdir -p /etc/apache2/ssl
COPY ./apache/*.pem /etc/apache2/ssl 
COPY ./apache/000-default.conf /etc/apache2/sites-available/000-default.conf
#RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

#COPY ./ssl/*.pem /etc/apache2/ssl/
#COPY ./apache/000-default.conf /etc/apache2/sites-available/000-default.conf

RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install curl ldap zip

# Copy project code
WORKDIR /var/www/html/phpapi

## Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY ./composer* /var/www/html/phpapi
ENV COMPOSER_ALLOW_SUPERUSER=1 
RUN composer install

## Copy project files
COPY . /var/www/html/phpapi

# Run apache server
COPY run.sh /
RUN chmod +x /run.sh 
CMD ["/run.sh"]