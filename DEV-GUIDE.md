Development Guide
=================

## Generate Model and Migration from Schema
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
