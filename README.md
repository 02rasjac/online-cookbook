# Online Cookbook with Mealplanner
This project is my final schoolproject in webdev and webserver-programming. The website includes CRUD-functionality to create and look up recipies, as well as both autogenerate and manually create a schedule for their meals.

## Technologies
* PHP v7.4.1
* [Laravel](https://laravel.com/) v8.29.0
* [PostgreSQL](https://www.postgresql.org/) 13
* [Vue 3](https://vuejs.org/)

## Install
Make sure you have [PHP](https://www.php.net/manual/en/install.php) and [PostgreSQL](https://www.postgresql.org/download/) installed.

Clone this repository and install all the dependencies through composer:
```bash
git clone git@github.com:02rasjac/online-cookbook.git
cd ./online-cookbook
composer install
```

Then install all JavaScript dependencies through NPM:
```bash
npm install && npm run dev
```

Then configure the `.env` file with your database credentials:
```
DB_CONNECTION=pgsqls
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=[You database-name]
DB_USERNAME=[Your username to login to database]
DB_PASSWORD=[Your password to login to database]
```

Now you can migrate:
```bash
php artisan migrate
```

And if you want to use the testdata in your database run:
```bash
php artisan db:seed
```

Now you should be able to start the server with Artisan:
```bash
php artisan serve
```

## Contact

**Name** - Rasmus Jacklin\
**Email** - rasmusjacklin2002@gmail.com