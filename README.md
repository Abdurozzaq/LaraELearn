# LaraELearn
AdminLTE x Laravel E-Learning System Script

![Image of Yaktocat](https://github.com/Abdurozzaq/LaraELearn/blob/master/admin-screenshoot-1368x793.png)

Features

User Roles
Admin, Teacher,
Student.

Basic Features

Authentication, Course/Mapel, Class/Kelas,
Upload Theory/Materi (Teacher),
See Theory/Materi based on Student Class and Course.

User Manager

Create Student, Manage Student Profile,
Create Teacher,
Manage Teacher Profile.

# Installation

Create a Database Table in phpMyAdmin

Extract the LaraELearn Source Code that has been downloaded to a folder anywhere.

Open Code Editor → Terminal.

In Terminal, navigate to the extracted LaraELearn folder.
  ```$ cd LaraELearn```
  
Enter these commands one by one (without the $ sign),
  ```$ composer install
  $ cp .env.example .env
  $ php artisan key:generate
  $ php artisan storage:link
  ```
  
Edit the .env file like this,
  ```DB_CONNECTION = mysql
  DB_HOST = 127.0.0.1 // change to Host your database
  DB_PORT = 3306
  DB_DATABASE = laraelearn // change to the name of the database table that you created
  DB_USERNAME = root // change to be your database username, default root
  DB_PASSWORD = ... // change to your databse password, null default 
  ```
  
Run this command for Seed :
  ```$ php artisan migrate --seed```
  
Done 😉, to run LaraELearn enter the command below:
  ```$ php artisan serve```
  
Then open the browser, and enter the url:
  ```http://localhost:8000```
  
or if you want to run on another port, use the command:
  ```$ php artisan serve --port: 627 // e.g. the port is "627"```
  
Thank you, Good Luck ... 😁

# Export To PDF Feature 
LaraELearn is using Laravel Snappy for export Materi/Theory to PDF,
so for configuring LaraELearn for Laravel Snappy see ```https://github.com/barryvdh/laravel-snappy```
