## laravel-12-api-test

Simple REST API built with Laravel 12 using SQLite. Includes full CRUD, authentication, proper HTTP status codes, and API documentation for the Product resource.

### Setup

```shell
PHP8.2.13+
COMPOSER
```

### Install

```shell
composer install
php artisan key:generate
php artisan migrate:fresh
```

### Optimisation

```shell
composer dump-autoload
php artisan optimize:clear
php artisan config:cache
```

### Local

```shell
php artisan serve
php artisan storage:link
```
