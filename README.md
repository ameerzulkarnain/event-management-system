## Pre Installation
1. change .env.example to .env. Then set the config as you wanted.
2. create db as you set in .env

## Installation
1. composer install
2. composer require laravel/passport
3. php artisan migrate
4. php artisan passport:install
5. php artisan db:seed