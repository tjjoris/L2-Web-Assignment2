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
PRIMARY KEY (id));

CREATE TABLE IF NOT EXISTS threads
( id int(11) NOT NULL AUTO_INCREMENT,
thread_name varchar(200) NOT NULL,
CONSTRAINT threads_pk PRIMARY KEY(id));

CREATE TABLE IF NOT EXISTS posts
( id INT(11) NOT NULL AUTO_INCREMENT,
thread_id int(11) NOT NULL,
login_id INT(11) NOT NULL,
post_time DATETIME NOT NULL,
message VARCHAR (3000),
CONSTRAINT posts_pk PRIMARY KEY (id),
CONSTRAINT posts_login_id FOREIGN KEY (login_id)
REFERENCES logins (id),
CONSTRAINT posts_thread_id FOREIGN KEY (thread_id)
REFERENCES threads (id));