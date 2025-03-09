# Download Composer installer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

# Verify the installer (replace HASH_FROM_COMPOSER_WEBSITE with the actual hash)
php -r "if (hash_file('sha384', 'composer-setup.php') === 'HASH_FROM_COMPOSER_WEBSITE') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

# Install Composer globally
php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Verify the installation
composer --version

# Clean up
php -r "unlink('composer-setup.php');"