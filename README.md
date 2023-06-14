
# Bare Php MVC

A very simple web application in PHP to demonstrate base MVC principles. 
Only standard PHP libraries are used without any PHP Frameworks.

Requirements:
- The application must be developed using MVC
- The browser has a form with a single textarea field
- The user can enter anything he wants into the form
- After submitting the form, the data should be written to the mysql database under a unique identifier.
- After the data is written to the database, the same data must be selected and displayed in the browser in exactly the same form as entered by the user.
- The data must be sent by email and sent as an SMS (only the classes need to be implemented), the sending itself is not necessary
- Be sure to provide protection from SQL injection, XSS, CSRF

## Installation

Clone the application from `github`.

Run `Composer` to update dependencies and create a vendor directory

```sh
composer update
```

Create a configuration file

```sh
cp config.php.dist config.php
```

Then change in the configuration file `config.php`

## Start web application

To start the web application, run

```sh
php -S localhost:8080
```

Load localhost:8080 in your browser