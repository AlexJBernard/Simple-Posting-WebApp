# Simple Posting Web Application
## About
Runs a single-page web application made using PHP, Vue, and MySQL. Allows users to post comments to a single message board under one of four preset usernames.

This project was created using the PHP-Slim skeleton and Vue's Scaffolding for Single Page Applications. 

**WARNING:** This project may be in continuous development, and as such, certain sections may be 
incomplete or outdated.

# Table of Contents
- [Simple Posting Web Application](#simple-posting-web-application)
  - [About](#about)
- [Table of Contents](#table-of-contents)
  - [Purpose](#purpose)
  - [Running Program](#running-program)
    - [Running From Docker](#running-from-docker)
      - [Settings.php (phpapp)](#settingsphp-phpapp)
      - [Apache Setup](#apache-setup)
      - [Steps](#steps)
      - [Running](#running)
    - [Running Vue Application (Front-End)](#running-vue-application-front-end)
    - [Running PHP App (Back-End)](#running-php-app-back-end)
  - [Running MySQL Database](#running-mysql-database)
  - [To-Do List](#to-do-list)
  - [Credits](#credits)

## Purpose
The following program was made for me to practice and learn more about using PHP, Vue, MySQL, and 
Docker. While the project's scope is limited, I aim to to add on features that will challenge my
current understanding of each tool over time.

During my senior year at NC State University, I was tasked with making a web application for the 
college's Computer Science department. This project made use of the school's authentication program 
Shibboleth, along with a list of existing usernames and ids for several staff members. Due to the 
potential sensitivity of this information, I beleved it was prudent to not use this project as an
example of portfolio work. However, this left me with no projects of my own to prove or
demonstrate my current proficiency with PHP, Apache, or Docker. Because of this, I opted to create
an application that makes use of several of the same techniques used on my previous project,
alongside other frameworks and practices I have not used prior. While this project serves no
pratical service, I hope it is sufficient as a demonstration of technical skill.

## Running Program
The following project can be run either by using Docker, or by running each component individually.

### Running From Docker
#### Settings.php (phpapp)
The project uses the `app/settings.php` file to store the necessary information needed to connect 
to the application's ddatabase. Due to the potential sensitivity of this information, this file has 
been excluded in the project's .gitignore file. However, a template for this file's structure can 
be seen in the `app/settings-template.php` file.<br>
*For convinience, files settings.php and settings-template.php will be referred to as the settings 
and settings template.*

To use the settings template, you must copy the file within the same directory and rename it as 
`settings.php`. The file itself contains an array of settings, describing various properites of the
associated database. To use it, the host, port, dbname, user, and password items must be changed to
match the corresponding poperties of the associated database. If the user is launching this project
from the default docker-compose file, then the fields should be named as such,
```php
'host' => 'simple_database',
'port' => '3306',
'dbname' => 'databasePhp',
'user' => 'username',
'password' => 'password',
```

#### Apache Setup
The project may require SSL certificates to work properly. To this end, it is recommended to use 
**mkcert** to set up certification keys.
 Many steps of this process are also outlined in the guide from 
 [dockerwebdev.com](https://dockerwebdev.com/tutorials/docker-php-development).

#### Steps
Run mkcert to create certificate files for the domain localhost
```bash
mkcert localhost 127.0.0.1 ::1
```

Rename the generated files, using ```cert.pem``` for the SSL certificate, and ```cert-key.pem``` 
for the SSL certificate key. Both files should be then moved to the **phpapi/apache** directory.

#### Running
Enter the root directory.

Run from the command line terminal
```bash
docker-compose up -d
```

### Running Vue Application (Front-End)
Enter the `/vueapp` directory from the command line interface and execute the following commands.
```bash
npm install
npm run dev
```

### Running PHP App (Back-End)
Enter the `/phpSide` directory from the command line interface and execute the following command.

```bash
composer test
```

## Running MySQL Database
**NOTE:** The following project uses mySQL for it's main database and has only been tested with 
such.

**(TBA)**

## To-Do List
- Add functionality for user logins
- Expand message functionality
  - Add message timestamps
  - Add message filtering
- Update documentation for PHP and MySQL setup
- Add .env files and variables to vue and php apps
- Replace files in PHP application used for database connections

## Credits
[Slim Skeleton](https://github.com/slimphp/Slim-Skeleton)

The project files DBPDO, DBPool, DBException and DBIterator.php were created by Ignacio X. Dominguez