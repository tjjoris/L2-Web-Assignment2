CREATE DATABASE IF NOT EXISTS web_assign2;
GRANT USAGE ON *.* TO 'assign2admin'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON web_assign2.* to 'assign2admin'@'localhost';
FLUSH PRIVILEGES;
USE web_assign2;

CREATE TABLE IF NOT EXISTS logins
( id int(11) NOT NULL AUTO_INCREMENT, 
uname varchar(45) NOT NULL, 
email varchar(100) NOT NULL,
password varchar(100) NOT NULL,
PRIMARY KEY (id))