# User Manager Pro

<p style="text-center">
<img src="//placehold.it/128X128?text=UsrMgrPro">
</p>

A web application used to manage users

## Overview
This application is designed to help companies better handler their interactions with clients and employees equally.

## Requirements
To run this application, you need to have the following: 
 - [composer](https://getcomposer.org/download/) installed on your machine and a server. 
 - A local [web server](http://www.wampserver.com/en/) can also be good for development. 
 - It is probably a good idea to also have a command line tool, e.g. [git](https://git-scm.com/)
 - You need to have php 7+ and a mysql server running on your server/machine
 - You should also have [nodejs](https://nodejs.org/en/download/) installed on your server/machine

## Installation

Either download using the button above or use the command line to clone this to your application environment:

    `git clone https://github.com/theHilkiah/user-manager.git`

Then, make sure you run the composer update to get all the vendor packages

    `composer update`

And, if you are using any node packages, or intend to run npm the do:

    `npm i npm@latest -g && npm install`

After that, you should generate an ecnryption key for the application:

    `php artisan key:generate`

Now, make sure your database is created here based on the database config file,Finally, run all the migrations to build the databases

    `php artisan migrate --seed && php artisan module:seed`

Lastly, if you are on your local machine, intiate the server

    `php artisan serve --port=8888`

### Summary
Copy the following chunk of code and run (paste) it where you want to create this application
    mv user-manager user-manager-copy &&
    git clone https://github.com/theHilkiah/user-manager.git &&
    cd user-manager &&
    composer update &&
    npm i npm@latest -g && npm install &&
    php artisan key:generate &&
Make sure the database here is created according to the config/database.php or .env file. Then copy and run the following:
    php artisan migrate --seed && php artisan module:seed &&
    php artisan serve --port=8888
    start "http://127.0.0.1:888"
    
## License
User Manager Pro is an open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
