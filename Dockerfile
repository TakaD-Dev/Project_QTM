FROM php:7.4-apache

# Lệnh cài đặt driver mysqli để PHP kết nối được với MySQL
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy toàn bộ code vào thư mục của Apache
COPY . /var/www/html/

# Mở cổng 80
EXPOSE 80