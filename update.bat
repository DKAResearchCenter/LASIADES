@echo_off;
git pull
php artisan migrate:refresh
composer update --ignore-platform-req=ext-http
exit
