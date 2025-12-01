#!/usr/bin/env bash
set -e

echo "Updating packages..."
sudo apt-get update -y

echo "Installing MySQL server..."
sudo apt-get install -y mysql-server

echo "Starting MySQL..."
sudo service mysql restart

echo "Setting root password..."
sudo mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root'; FLUSH PRIVILEGES;"

echo "Creating database..."
sudo mysql -uroot -proot -e "CREATE DATABASE IF NOT EXISTS burgermaster;"

echo "Installing PHP extensions..."
sudo apt-get install -y php8.3-mysql

echo "Running Composer..."
composer install

echo "Done!"
