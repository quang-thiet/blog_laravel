# Laravel Blog

A simple blog for demonstration purpose. Based on Laravel 9.0

## Requirements

- Laravel 9.0


## Installation

git clone https://github.com/quang-thiet/blog_laravel.git
cd blog
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
```

If you want dummy data, then run this-

```
php artisan db:seed --class=
```
