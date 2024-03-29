@echo_off;
git pull
php artisan migrate:refresh
composer update
exit
