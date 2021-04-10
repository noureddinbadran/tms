<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About The Project

This project is a simple task management system, where the user could filter his task by project, and change their priorities

## Dependencies
You need to have on your local machine the following things:

- **composer** to build the project and download the needed packages
you can download it easily from this site: https://getcomposer.org/

- **npm** Node package Manager to install all needed packages
You can download it easily from this site: https://nodejs.org/en/download/



## Installation instructions
Clone the project to your local machine and put it into your server directory like (WAMP or XAMP) for example in "www" folder

## Establishing the Database for the project
You need to create an empty database called "tms" for example

## Build he project
After you cloned the project you should access to the project directory and run the following command using command prompt, and be patient because this step would take awhile

- **composer install** to install all necessary packages for laravel
- **npm install** to install all necessary packages to vueJS
- **php artisan migrate --seed** to migrate all tables to your database and fill them by some prepared data in the seek of testing

## Run the project
Now, to run the project you need to run the following command in project directory using command prompt

- **php artisan serv** to run the project


## Project details
To browse the projects you need to visit
- **http://localhost:8000/projects**

## Testing
You can run the unit test for update tasks priorities endpoint by the following:
- **php artisan test


## NOTES:
- **You will not need to be authenticated to use the system in this iteration**
- **The tasks designed as a vue-component**
