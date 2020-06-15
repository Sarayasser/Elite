<p align="center"><img src="https://scontent-hbe1-1.xx.fbcdn.net/v/t1.0-9/104201572_113806590370955_6935300005558562720_o.jpg?_nc_cat=103&_nc_sid=e3f864&_nc_ohc=wcO-DeJIp5EAX_DgOyt&_nc_ht=scontent-hbe1-1.xx&oh=7db7557f4b014f66296757e23fd141bc&oe=5F0DED37" width="400"></p>


## About Elite

Elite is an online learning platform mainly for robotics.

## Tech/framework used
<b>Built with</b>
- [Laravel 7.x](https://laravel.com)

## Features
- Parental monitoring
- Integration with zoom for online lessons
- Real-time notifications
- Students Progress and achievements
- Online courses

## Installation
Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/7.x/installation#installation)

Clone the repository

    git clone https://github.com/Sarayasser/Elite.git
    
Switch to the repo folder

    cd Elite

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate 
    
Create a symbolic link, you may use the storage:link Artisan command:

    php artisan storage:link

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/Sarayasser/Elite.git
    cd Elite
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan storage:link
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

## Database seeding

Run the database seeder and you're done

    php artisan db:seed

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh

***Warning***⚠️ :Don't forget to clear the cache whenever you make any changes add or remove badges by running
   
   ```php artisan cache:forget gamify.badges.all. ```


# Code overview

## Dependencies

- [Laravel-Backpack](https://github.com/Laravel-Backpack) - A collection of packages to create custom admin panels in hours, not days.
- [cohensive/embed](https://github.com/cohensive/embed) - For displaying videos with just URL
- [laravel/socialite](https://github.com/laravel/socialite) - For OAuth authentication with social media accounts
- [macsidigital/laravel-zoom](https://github.com/macsidigital/laravel-zoom) - For integration with zoom
- [pusher/pusher-php-server](https://github.com/pusher/pusher-php-server) - For real-time notifications
- [qcod/laravel-gamify](https://github.com/qcod/laravel-gamify) - For progress points and acheivements

## Folders

- `app`and `app/models` - Contains all the Eloquent models
- `app/Http/Controllers` - Contains all the controllers
- `app/Http/Controllers/admin` - Contains admin crud controllers
- `app/Http/Requests` - Contains all the form requests
- `app/Gamify` - Contains the files implementing the progress points and achievments badges
- `config` - Contains all the application configuration files
- `database/migrations` - Contains all the database migrations
- `database/seeds` - Contains the database seeder
- `routes` - Contains all the routes defined in web.php file

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.
 
# Authentication
 
This applications uses laravel/ui for authentication.
 
- https://laravel.com/docs/7.x/authentication#introduction
