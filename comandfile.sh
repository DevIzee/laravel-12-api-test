#!/bin/bash

# Création du projet Laravel 12
composer create-project laravel/laravel:^12.0 laravel-12-api-test
cd laravel-12-api-test

# Configuration SQLite
touch database/database.sqlite

# Migrations
php artisan make:migration create_personnels_table
php artisan make:migration create_products_table

# Models
php artisan make:model Personnel
php artisan make:model Product

# Resources
php artisan make:resource PersonnelResource
php artisan make:resource ProductResource
php artisan make:resource UserResource

# Requests
php artisan make:request Personnel/StorePersonnelRequest
php artisan make:request Personnel/UpdatePersonnelRequest
php artisan make:request Product/StoreProductRequest
php artisan make:request Product/UpdateProductRequest
php artisan make:request Auth/RegisterRequest
php artisan make:request Auth/LoginRequest

# Controllers
php artisan make:controller Api/PersonnelController --api
php artisan make:controller Api/ProductController --api
php artisan make:controller Api/AuthController

# Installation Sanctum
php artisan install:api

# Migrations
php artisan migrate

# Lien symbolique pour storage
php artisan storage:link

# Documentation API avec Scramble
composer require dedoc/scramble
php artisan scramble:install
php artisan vendor:publish --tag=scramble-config

# Lancer le serveur
php artisan serve