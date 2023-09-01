## Clone the repository
git clone https://github.com/Jahir-chowdhury/room_booking_backend_laravel.git

## Install project dependencies
composer install

## Create a .env file by copying .env.example and configure your database settings
cp .env.example .env

## Update the following database configuration variables in your .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

## Generate an application key
php artisan key:generate

## Migrate and seed the database
php artisan migrate --seed

## Start the development server:
php artisan serve

## Start the development server in port 8000 for frontend dependency
