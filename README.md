# API Skeleton Framework
This is a very simple API structure that uses Json Web Token (JWT) authentication.

# Configuration
Add your own database credentials into settings.php file localated in ```src/ ```

``` php
// database connection details
"db" => [
    "host" => "localhost",
    "dbname" => "YourDatabaseName",
    "user" => "root",
    "pass" => "YourPassword"
],
```
# Endpoints
You can easily create new endpoints in the ``` /src/routes.php ``` .

Find below the ready-to-use endpoints:
* /    - ``` home ```
* /api - ``` That is a protected area ```
* /login - ``` Method Allowed: post ['email', 'password'] ``` 

# Directory Structure

``` bash
|-- Application
	|-- logs
		|-- app.log
	|-- public
		|-- .htaccess
		|-- index.php
    |-- SQL
        |-- Sql.sql
    |-- src
		|-- dependencies.php
		|-- middleware.php
		|-- routes.php
		|-- settings.php
	|-- templates
		|-- index.phtml
	|-- tests

  ```
