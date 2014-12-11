#find /var/www -type f -exec chmod 664 {} \;
#find /var/www -type d -exec chmod 775 {} \;
#chown -R www-data:www-data /var/www
echo "Composer initialization"
wget -N https://getcomposer.org/composer.phar --no-check-certificate
php composer.phar update
echo "Creating database .."
mysql -uroot < resources/sql/schema/tables.sql
echo "Update database data .."
mysql -uroot < resources/sql/data/dump.sql
