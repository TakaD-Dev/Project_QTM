FROM php:8.0-apache

# Cài đặt thư viện mysqli để PHP kết nối được với Database
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy toàn bộ code vào thư mục web
COPY . /var/www/html/

# Phân quyền cho thư mục web
RUN chown -R www-data:www-data /var/www/html