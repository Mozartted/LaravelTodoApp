#LaravelTodoApp
>A Laravel task management application implementing Ajax, Jquery and LaravelTodoApp

###Project Descriptions
The project emulates a simple task management application and features heavy use of Ajax in combination with laravel.

###Installation
####Setting up project
* Clone or download the project
* Composer is required to run or test this project. if you don't have composer installed, check out [the composer site](https://getcomposer.org)
* Run the following commands in the terminal or command prompt, in the projects directory
```shell
    composer install --no-scripts
```
This shpould install the nessecary packages required in the composer.json file.
* This project comes with a sample database in sqlite, looking to switch the database?,
  * create your database via mySQL or SQLite
  * edit the app/config/database.php file and set the database default to your database type
  * edit the ENV variables appropraitely
    * Setting DB_CONNECTION to your database type
    * Setting DB_HOST to your host
    * Setting DB_DATABASE to your database name
    * Setting DB_USERNAME to your username
    * Setting DB_PASSWORD to your database password
  * Run the Migration to create the database tables and fields
  ```shell
    php artisan migrate
  ```

* Run the following command to start the server to demo the project.
```shell
    php artisan serve
```

## Contributions
Looking to contribute to this project, simply fork or clone the project, please report issues on the issue tracker, thanks
