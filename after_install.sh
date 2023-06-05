#!/bin/bash
sudo -i
sudo chown -R ubuntu:ubuntu /var/www/html/test/storage /var/www/html/test/bootstrap/
sudo chmod -R 775 /var/www/html/test/storage /var/www/html/test/bootstrap/

# Generate application key
php artisan key:generate
