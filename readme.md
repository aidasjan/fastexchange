# FastExchange

FastExchange is a multipurpose university exchange system that allows to speed up course selecting, English language assessment and university reviewing processes for every student

## Technology stack
* PHP 7.3
* Laravel framework 6.8
* MySQL database 8+
* Eloquent ORM
* Blade

## Installing
1. To install all dependencies run ```composer install```
2. Setup MySQL database, then run migrations by using ```php artisan migrate:fresh```
3. Rename ```.env.example``` file to ```.env``` and run ```php artisan key:generate```. Make sure that your database credentials match information stored in ```.env``` file
4. Entry point for application is ```/public/index.php```