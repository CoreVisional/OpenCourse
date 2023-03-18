# OpenCourse

A simple e-learning platform for sharing courses and learning new skills.

## Getting Started

### Setup:
* Clone the repository `git clone https://github.com/CoreVisional/OpenCourse.git`
* Run `compose install` to install all dependencies.
* Run `php artisan key:generate` to generate the application key.
* Run `php artisan migrate` to create the database tables.
* Run `php artisan db:seed` to seed the database with some dummy data.
* Run `cp .env.example .env` to create the environment file.
* Configure your database connection in the `.env` file:
```
DB_DATABASE=
DB_USERNAME=root
DB_PASSWORD=
```
* Configure your mail server in the `.env` file:
```
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
```
* Run `npm install` to install node dependencies.
* Run `npm run dev` to compile the assets.
* Run `php artisan serve` to start the development server [Optional].

### Third-Party Packages
* [giggsey/libphonenumber-for-php](https://github.com/giggsey/libphonenumber-for-php)
* [laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)
