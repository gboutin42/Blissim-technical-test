# Blissim-technical-test
Technical test for Blissim


# PHP Part
Edit the file config/database.php and set the following variable:
```
$DB_NAME		= "your_database_name";
$DB_DSN_LIGHT	= "mysql:host=hostname:port_number";
$DB_DSN			= $DB_DSN_LIGHT . ";dbname=" . $DB_NAME;
$DB_USER		= "user_name";
$DB_PWD			= "password";
```