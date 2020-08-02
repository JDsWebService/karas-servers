#!/bin/bash

# Run Composer Update
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev

# Run NPM Install/Update
npm install --only=prod
npm run prod

# Run Any Migrations We Might Have
php artisan migrate --force

# Clear & Cache the Config Files
php artisan config:cache