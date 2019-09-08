# Laravel-Transport-System
Conversion of my previous transport system core php to laravel.

![Admin Panel](/lara_tos.png)


### Requrements
* Php CLI >= 7.1.3
* Mysql = 8.0
* Bower Package manager
* Php Composer

* BCMath PHP Extension
* Ctype PHP Extension
* JSON PHP Extension
* Mbstring PHP Extension
* OpenSSL PHP Extension
* PDO PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

### Install
1. Rename ".env.example" file to ".env"
2. run "php artisan key:generate" command in project folder
> Laravel-Transport-System/php artisan key:generate
3. Create database "tos_db".
4. Change database settings in ".env" file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tos_db
DB_USERNAME=YOUR USERNAME
DB_PASSWORD=YOUR PASSWORD
```
5. run "php artisan migrate" command in project folder
> Laravel-Transport-System/php artisan migrate
6. run "php artisan db:seed" command in project folder
> Laravel-Transport-System/php artisan db:seed
7. run “php composer.phar install” command in project folder to install dependencies
> Laravel-Transport-System/php composer.phar install
8. run "bower install" command in project folder/public
> Laravel-Transport-System/public/bower install
9. run "php artisan serve" command for starting development server.
> Laravel-Transport-System/php artisan serve

#### Login details
> Email: root@laravel.com
> Password: password

#### NOTE 
If you face any error realted to user login try to register user through "php tinker"

*STILL IN DEVELOPMENT*
