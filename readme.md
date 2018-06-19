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

### Quick Install
If you love the command prompt, and you have git installed and all the requirements above; then, copy the following chunk of code and run (paste) it where you want to create this application:
NOTE: You can change the mysql database username in `-u'root'` to `-u'yourusername'` and if you use a password, change it to `-u'yourusername' -p'yourpassword'`

    mv user-manager user-manager-copy || true &&
    git clone https://github.com/theHilkiah/user-manager.git &&
    cd user-manager &&
    composer update &&
    npm i npm@latest -g &&
    npm install &&
    npm run dev &&
    echo "drop database usrmngrdb01" | mysql -u'root' &&
    echo "create database usrmngrdb01" | mysql -u'root' &&
    php artisan key:generate &&
    php artisan migrate:refresh --seed &&
    php artisan module:seed &&
    php artisan config:clear &&
    php artisan storage:link &&
    start "" "http://127.0.0.1:8888" &&
    php artisan serve --port=8888

If this doesn't work, you can break it down like so:

    mv user-manager user-manager-copy || true &&
    git clone https://github.com/theHilkiah/user-manager.git &&
    cd user-manager &&
    composer update &&
    npm i npm@latest -g &&
    npm install &&
    npm run dev 

Make sure the database here is created according to the config/database.php or .env file.

    echo "create database usrmngrdb01" | mysql -u'root' -p''

NOTE: If you have a you can change your username from 'root' to your own and (add -p password) if you have a password to match your settings on your mysql

Then copy and run the following:

    php artisan key:generate &&
    php artisan migrate:refresh --seed &&
    php artisan module:seed &&
    php artisan config:clear &&
    php artisan storage:link &&
    start "" "http://127.0.0.1:8888" &&
    php artisan serve --port=8888
    
### Step-by-step Install
Either download using the button above or use the command line to clone this to your application environment:

    git clone https://github.com/theHilkiah/user-manager.git

Then, make sure you run the composer update to get all the vendor packages

    composer update

And, if you are using any node packages, or intend to run npm the do:

    npm i npm@latest -g && npm install

After that, you should generate an ecnryption key for the application:

    php artisan key:generate

Now, make sure your database is created here based on the database config file,Finally, run all the migrations to build the databases

    php artisan migrate --seed && php artisan module:seed

Lastly, if you are on your local machine, intiate the server

    php artisan serve --port=8888

.... More information to come ...


## License
User Manager Pro is an open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
