php -S localhost:8080
sudo service mysql start
sudo systemctl enable mysql
sudo mysqld_safe --skip-grant-tables --skip-network
mysql -u root -p
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root';
