@echo_off
ipconfig
start "" http://localhost:8000
php -S 0.0.0.0:8000 -t public/

