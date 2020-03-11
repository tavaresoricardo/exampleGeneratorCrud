# Crud Produtos

This project use a crud generator 

## Requirements
* PHP 7.2+
* Node

## Install
1. Clone this repository `git clone asdasd`
1. Run composer install
1. Build assets `npm install && npm run dev`
1. Copy dot env file `cp .env.example .env`
1. Generate app key `php artisan key:generate`
1. Set database conf in .env
1. Run migrations `php artisan migrate`
1. Start serve `php artisan serve`
1. Populate tables [optional]:
```shell script
$ php artisan tinker

>>> factory(App\Post::class, 50)->create();
```
## Recommendations
1. Be happy!
2. Give the repository a star: [laravelha/generator](https://github.com/laravelha/generator)
