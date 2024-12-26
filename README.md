# Web Application with Simple API

Runs a simple web application with an api made using php

## Running Full Program From Docker
### Apache Setup
The project may require SSL certificates to work properly. To this end, it is recommended to use **mkcert** to set up certification keys.
 Many steps of this process are also outlined in the guide from [dockerwebdev.com](https://dockerwebdev.com/tutorials/docker-php-development).

#### Steps
Run mkcert to create certificate files for the domain localhost
```bash
mkcert localhost 127.0.0.1 ::1
```

Rename the generated files, using ```cert.pem``` for the SSL certificate, and ```cert-key.pem``` for the SSL certificate key. Both files should be then moved to the **phpapi/apache** directory.

### Running Program
Enter the root directory.

Run from the command line terminal
```
docker-compose up -d
```

## Running Vue Application
To be added.

## Running API Program
Run the command line terminal from the `/phpSide` directory.

```bash
composer test
```

## Running Database
**NOTE:** The following project uses mySQL for it's main database and has only been tested with such.

To be added.