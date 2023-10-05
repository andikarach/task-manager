# Task Manager

Simple apps to manage Task. User can create, edit or delete Task whenerever they want and another user cannot check task from other users.

## Instalasi

Here are the steps to install this project on your local environment.

- PHP               : 7.3 or higher
- Laravel Framework : 8.83.27
- Composer          : version 2.2.7
- Database          : MySQL

### Instalation Steps

# 1. Clone this project's repository to your computer:
    run this command in specific directory
    command : git clone https://github.com/andikarach/task-manager.git

# 2. Navigate to the Project Directory:
    command :  cd your-laravel-project

# 3. Install Composer Dependencies:
    command : composer install

# 4. Create .env File: 
    Make a copy of the .env.example file and rename it to .env
    Configuration : 

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=db_app_tasks
    DB_USERNAME= {yourusername, default root}
    DB_PASSWORD= {yourpassword, default '' / empty}

    Update the .env file with your database configuration and other environment-specific settings.

# 5 Generate Application Key:
    Generate a unique application key to secure your application
    command : php artisan key:generate

# 6. Create database mysql on your computer
    database name : db_app_tasks

# 7. Run Database Migrations and Seeders:
    Run the database migrations to create the necessary database tables, 
    command : php artisan migrate

# 8. Run the seeders
    command : php artisan db:seed

# 7 Serve the Application: 
    command : php artisan serv

Laravel application should now be accessible at http://localhost:8000 in your web browser.

You can login use default user or you can register new user.
- Admin 
    myadmin@gmail.com / admin123
- User
    alexander@gmail.com / alexander3