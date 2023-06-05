#!/bin/bash
sudo -i
chown -R ubuntu:ubuntu /var/www/html/test/storage /var/www/html/test/bootstrap/
chmod -R 775 /var/www/html/test/storage /var/www/html/test/bootstrap/

# Generate application key
php artisan key:generate
