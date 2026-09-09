FROM php:8.2-cli

WORKDIR /var/www/html

RUN docker-php-ext-install pdo_mysql

COPY . /var/www/html/

RUN chmod -R 755 /var/www/html/public \
    && chmod -R 755 /var/www/html/runtime

EXPOSE 10000

CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-10000} -t public"]
