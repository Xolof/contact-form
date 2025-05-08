#!/usr/bin/bash
./vendor/bin/pint
./vendor/bin/rector app routes tests
./vendor/bin/phpstan analyse  --memory-limit=1G
php artisan config:clear --ansi
php artisan test --coverage --min=4
