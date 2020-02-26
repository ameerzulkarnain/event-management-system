## Pre Installation
1. change .env.example to .env. Then set the config as you wanted.
2. create db as you set in .env

## Installation
1. composer install
2. php artisan key:generate
2. php artisan migrate
3. php artisan db:seed