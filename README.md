# The Yummy Pizza Backend Server


A backend server for simple pizza delivery web application built with Laravel.

### [Demo](https://the-yummy-pizza.web.app/)
*** Important Notes: The demo only include Munich city in deliver coverage area.

## Features
  
  - Pizza ordering system.
  - JWT Auth via [Laravel Sanctum](https://laravel.com/docs/master/sanctum)
  - RESTful API

TODO:
  - Improve API logic.
  - Add admin dashboard.
  - Any other useful features.
  
## Tech

The Yummy Pizza uses a number of open source technologies that are good for rapid prototyping at minimum cost:

* [Angular 9](https://angular.io/) - Front end framework.
* [Ionic](https://ionicframework.com/) - Make HMTL easier.
* [Laravel](https://laravel.com/) - Server side logic.



## Development

Composer and Yarn/NPM package manager are required

Via Git

-   Fork, then Clone

```bash
git clone https://github.com/ljieyao/the-yummy-pizza-laravel.git

cd the-yummy-pizza-laravel

composer install --no-interaction
npm install
```

-   Edit `.env` and set your database connection details

```bash
cp .env.example .env
```

-   Generate application keys and migrate tables

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```

## Deploying to Heroku

[Read through this article](https://medium.com/swlh/how-to-host-your-laravel-application-for-free-on-heroku-4789688d444b) to get your site up and running in minutes.

Note that you can use any hosting service you'd like to deploy The Yummy Pizza backend server, you don't need to use Heroku.

### Companion apps

These are the other components associated with this project.

| App | Repo |
| ------ | ------ |
| Frontend Web Application | https://github.com/ljieyao/the-yummy-pizza-ionic |


License
----
MIT
