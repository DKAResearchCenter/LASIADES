@echo_off
ipconfig
php -S 0.0.0.0:8000 -t public/
start "" http://localhost:8000
