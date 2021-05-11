create database registarion;
use registration
create TABLE users(
id INT(10) PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(50),
email VARCHAR(100),
password VARCHAR(100),
role enum('user','admin'),
image VARCHAR(100);

create TABLE product(
id INT(10) PRIMARY KEY AUTO_INCREMENT,
productname VARCHAR(50),
price INT(10),
image VARCHAR(200)

);

