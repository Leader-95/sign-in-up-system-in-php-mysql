Simple sign-up system in PHP and MySQL
This repository contains a simple sign-up system in PHP and MySQL. It allows users to create an account on a website by entering their name, email, and password. The system validates the inputs and ensures that the password and repeat password match. If all of the inputs are valid, the system creates a new user account in the database.

Setting up the database
To set up the database, you will need to create a new database called user_data and import the following SQL script:

You can use Mamp,Xamp,Wamp or OpenServer as a localhost. I prefer to use Mamp.
Setup  includes PDO not MySQLi.

MySQL
CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL UNIQUE,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

