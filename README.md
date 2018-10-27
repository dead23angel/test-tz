You have to install :
* MySQL 5.6
* php 7.1

For install this project

`git clone https://github.com/dead23angel/test-tz`

* `composer install`
* `cp .env.example .env`
* `php artisan key:generate`

Setup mysql config in .env file
`nano .env`
 
Start server
`php artisan serve`


Site will be available at http://localhost:8000