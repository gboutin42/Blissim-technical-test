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
Edit the file config/database.php and set the following variable:
```
$DB_NAME      = "your_database_name";
$DB_DSN_LIGHT = "mysql:host=hostname:port_number";
$DB_DSN       = $DB_DSN_LIGHT . ";dbname=" . $DB_NAME;
$DB_USER      = "user_name";
$DB_PWD       = "password";
```
