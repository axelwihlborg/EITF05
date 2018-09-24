FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS items;

SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE user (
  username varchar(50),
  password varchar(255) NOT NULL,
  adress varchar(255) NOT NULL,
  PRIAMRY KEY(username)
);

CREATE TABLE items (
  itemid int NOT NULL AUTO_INCREMENT,
  name varchar(50) NOT NULL,
  price int NOT NULL,
  PRIMARY KEY(itemid)
);

CREATE TABLE orders (
  ID int NOT NULL AUTO-INCREMENT,
  orderid int NOT NULL,
  itemid int NOT NULL,
  username varchar(50) NOT NULL,
  ordertime DATETIME NOT NULL,
  PRIMARY KEY(ID),
  FOREIGN KEY(ITEMID) REFERENCES items(itemid),
  FOREIGN KEY(username) REFERENCES users(username)
);


INSERT INTO items(name, price)
VALUES("Stol", 1), ("Bord", 2), ("Haxxorsservice", 300), ("Salas", 10);

INSERT INTO users(username, password, adress)
VALUES ("DaMan", "PASSWORD", "Funkytown")
("NolleG", "PASSWORD", "Teknolog");

