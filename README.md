# API Skeleton Framework
This is a very simple API structure that uses Json Web Token (JWT) authentication.

# Configuration
Add your own database credentials into settings.php file localated at src/

``` php
// database connection details
"db" => [
    "host" => "localhost",
    "dbname" => "YourDatabaseName",
    "user" => "root",
    "pass" => "YourPassword"
],
```

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
