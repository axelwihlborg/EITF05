CREATE DATABASE IF NOT EXISTS user_registration;
USE user_registration;

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS login;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS items;
DROP TABLE IF EXISTS commonpasswords;

SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE login (
  username varchar(50),
  password varchar(255) NOT NULL,
  adress varchar(255) NOT NULL,
  PRIMARY KEY(username)
);

CREATE TABLE items (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  code varchar(255) NOT NULL,
  image text NOT NULL,
  price double(10,2) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE orders (
  orderid int NOT NULL AUTO_INCREMENT,
  id int NOT NULL,
  username varchar(50) NOT NULL,
  ordertime DATETIME NOT NULL,
  PRIMARY KEY(orderid),
  FOREIGN KEY(id) REFERENCES items(id),
  FOREIGN KEY(username) REFERENCES login(username)
);

 CREATE TABLE commonpasswords (
   id int NOT NULL AUTO_INCREMENT,
   password varchar(255) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE reviews (
  ID int NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  timedate DATETIME NOT NULL,
  subject varchar(100) NOT NULL,
  comment varchar(300) NOT NULL,
  PRIMARY KEY(ID),
	FOREIGN KEY(username) REFERENCES login(username)
);


INSERT INTO items(name, code, image, price) VALUES
('Table', 'Table', 'product-images/table.jpg', 1500.00),
('Chair', 'Chair', 'product-images/chair.jpg', 800.00),
('Armchair', 'Armchair', 'product-images/armchair.jpg', 300.00),
('Desk', 'Desk', 'product-images/desk.jpg', 800.00),
('Salas', 'Salas', 'product-images/salas.jpg', 8000.00);

INSERT INTO login(username, password, adress)
VALUES ("DaMan", "PASSWORD", "Funkytown"),
("NolleG", "PASSWORD", "Teknolog");

INSERT INTO Reviews(username, timedate, subject, comment)
VALUES( "Bertil","2018-10-05","Tried stuff","Tried to hack site, notin happen"),
	( "Kalle","2019-09-07","Great webpage.","Best site ever, stuffs are soso."),
	( "Kerrigan","2007-09-29","It was ok", "Not dark nuff");
