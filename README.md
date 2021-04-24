# Blissim-technical-test
Technical test for Blissim

# SQL Part
Launch the query available in sql/blissim.sql. <br>
This query create the database and the tables. <br>
Then she is setting the data inner the database. <br>
And finally, at the end, they are two queries:
  - the 1st for get the firstname and lastname of the clients who are order the product with the Id 1 
  - the 2nd for get all names and quantities of the products sales on the last seven days

# PHP Part
Edit the file php/config/database.php and set the following variable:
```
$DB_NAME      = "your_database_name";
$DB_DSN_LIGHT = "mysql:host=hostname:port_number";
$DB_DSN       = $DB_DSN_LIGHT . ";dbname=" . $DB_NAME;
$DB_USER      = "user_name";
$DB_PWD       = "password";
```
Launch your server mysql with the same data of the file php/config/database.php<br>
Then move in the php directory. `cd php`<br>
Launch the following command to install the router:
```
composer install
```
Then launch your server php, or the internal php server like this, link on the public directory: 
```
php -S hostname:port_number -t public
ex: php -S localhost:8080 -t public
```
And go on your browser at the following address for install the Database for the app
```
http://hostname:port_number/install
ex: http://localhost:8080/install
```
