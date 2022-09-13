# Laravue 
This is a simple test application to simulate a shopp with two user types (seller and buyer).
The frontend and backend are together and can be build at same time with one command, but in cases of adjustes can be build separately.

## Tenologies
- [Laravel](https://laravel.com)
- [VueJs + Vite](https://vuejs.org/guide/quick-start.html#with-build-tools)
- [PostgreSQL](https://www.postgresql.org/)
- [Boostrap 5](https://getbootstrap.com/)

## Requirements
A web server like [nginx](https://www.nginx.com/) or [Apache](https://httpd.apache.org/).

PHP 7.3 or higher with configurations for [Laravel 8](https://laravel.com/docs/8.x/installation).

A [PostgreSQL](https://www.postgresql.org/) server for database;

And [NodeJs](https://nodejs.org/en/) to install VueJs dependencies and deploy.

## Install
This application can be installed using git command
```sh
git clone https://github.com/rocassis/laravue.git
```

To install dependencies (Laravel and VueJs) and deploy, execute the following command on project root folder

```sh
composer install
```
After the install dependencies and deploy, configure '.env' to point database and if necessary adjustes the 'APP_URL' value.

The run the artisan migration command
```sh
php artisan migrate
```
Now is just access the application!

## Maintenance
In case of maintenance in frontend the VueJs application is 'resources/views/loja-vue'.

The dist folder must be moved after built to 'public/dist' to be accessible.

The blade file 'resources/views/page.blade.php' point to 'public/dist/index.html' to load application pages.