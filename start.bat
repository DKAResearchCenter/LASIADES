@echo_off
for /f "delims=[] tokens=2" %%a in ('ping -4 -n 1 %ComputerName% ^| findstr [') do set NetworkIP=%%a
echo Network IP: %NetworkIP%
start "" http://localhost:8000
php -S 0.0.0.0:8000 -t public/

