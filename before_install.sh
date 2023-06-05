#!/bin/bash
cd /var/www/html/test
sudo -i
composer install --no-dev --optimize-autoloader
