FROM php:7.4-apache

# Copy tất cả file vào container
COPY . /var/www/html/

# Đặt quyền cho apache (www-data)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80