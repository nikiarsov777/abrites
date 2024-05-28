#!/bin/bash
php artisan optimize
php artisan migrate

php artisan config:clear
php artisan db:seed --class=DatabaseSeeder
php artisan queue:work --queue=verifymail &
php artisan queue:work --queue=codemail &