Development Guide
=================

## Generate Model and Migration from Schema
- https://laravel.com/docs/11.x/eloquent-relationships#updating-belongs-to-relationships
- https://laravel.com/docs/11.x/eloquent-relationships#updating-many-to-many-relationships
```shell
composer require --dev kitloong/laravel-migrations-generator
php artisan migrate:generate --tables="contact_group,contact"

composer require reliese/laravel --dev
php artisan vendor:publish --tag=reliese-models
php artisan config:clear
php artisan code:models
php artisan code:models --table=contact_group
php artisan code:models --table=contact
```

## Implement Jquery, Bootstrap
- We install libraries using npm
- Using vite to build the frontend
```shell
- Install dependencies libraries
```shell
npm i --save-dev @rollup/plugin-inject vite-plugin-static-copy sass
npm i --save bootstrap jquery @popperjs/core @fortawesome/fontawesome-free
```
- For every changes in the frontend, we need to build the frontend
```shell
npm run build
```

## Validation
- https://laravel.com/docs/11.x/validation
```shell
php artisan make:request ContactGroupRequest
```

### References
- PHP Fpm Official https://hub.docker.com/_/php
- PHP Easy Install Extensions https://morioh.com/p/cfb07d581669
- https://github.com/thecodingmachine/docker-images-nodejs/blob/master/Dockerfile.18-bullseye
- https://github.com/savanihd/Laravel-11-REST-API-using-Sanctum
- https://getbootstrap.com/docs/5.2/getting-started/introduction/
- https://fontawesome.com/search
