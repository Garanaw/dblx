#!/bin/bash

FILE=.env
if [ ! -f "$FILE" ]; then
    cp .env.example .env
    echo "Your environment file is not configured. I have copied it for you"
    echo "To proceed with the installation, please configure your database credentials"
    exit 0
fi

echo "Installing Composer packages..." && sleep 2
composer install
echo "Composer packages have been installed"

echo "Now installing Node modules" && sleep 2
npm install
echo "Node modules have been installed"

echo "Now we will migrate and seed your database" && sleep 2

php artisan migrate --step
