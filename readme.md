<p align="center">
<img src="https://pavement.engineering.asu.edu/wp-content/uploads/2012/12/Holbrook-Asphalt-logo2-300x126.png">
</p>

# User Manager Pro

A web application used to manage users

## Overview
This application is designed to help companies better handler their interactions with clients and employees equally.

## Requirements
To run this application, you need to have the following: 
 - [composer](https://getcomposer.org/download/) installed on your machine and a server. 
 - A local [web server](http://www.wampserver.com/en/) can also be good for development. 
 - It is probably a good idea to also have a command line tool, e.g. [git](https://git-scm.com/)

## Installation
Either download using the button above or use the command line to clone this to your application environment:
- git clone https://github.com/theHilkiah/user-manager.git
Then, make sure you run the composer update to get all the vendor packages
    ````composer update```
After that, you should generate an ecnryption key for the application:
    ```php artisan key:generate```
Finally, run all the migrations to build the databases
    ```php artisan migrate --seed && php artisan module:make```
Lastly, if you are on your local machine, intiate the server
    ```php artisan serve --port=8888```

## License

User Manager Pro is an open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
