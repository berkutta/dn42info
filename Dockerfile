FROM php:7.2.12-apache
MAINTAINER Benjamin Marty

COPY . /var/www/html/

COPY docker-entrypoint.sh /docker-entrypoint.sh

RUN chmod +x /docker-entrypoint.sh

ENTRYPOINT ["/docker-entrypoint.sh"]


