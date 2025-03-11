# Simple Posting Web Application
## About
Runs a single-page web application made using PHP, Vue, and MySQL.

Was created using the PHP-Slim skeleton and Vue's Scaffolding for Single Page Applications.

## Purpose
The following program was made for me to practice and learn more about using PHP, Vue, MySQL, and Docker.

## Running Program
The following project can be run either by using Docker, or by running each component individually.

### Running From Docker


#### Apache Setup
The project may require SSL certificates to work properly. To this end, it is recommended to use **mkcert** to set up certification keys.
 Many steps of this process are also outlined in the guide from [dockerwebdev.com](https://dockerwebdev.com/tutorials/docker-php-development).

#### Steps
Run mkcert to create certificate files for the domain localhost
```bash
mkcert localhost 127.0.0.1 ::1
```

Rename the generated files, using ```cert.pem``` for the SSL certificate, and ```cert-key.pem``` for the SSL certificate key. Both files should be then moved to the **phpapi/apache** directory.

#### Running
Enter the root directory.

Run from the command line terminal
```
docker-compose up -d
```

### Running Vue Application (Front-End)
Run the command line terminal from the `/vueapp` directory.
```bash
npm install
npm run dev
```

### Running PHP App (Back-End)
Run the command line terminal from the `/phpSide` directory.

```bash
composer test
```

## Running MySQL Database
**NOTE:** The following project uses mySQL for it's main database and has only been tested with such.

**(TBA)**