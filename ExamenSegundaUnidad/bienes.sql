create database bienesraices3

CREATE TABLE sellers (
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	name VARCHAR(32) NOT NULL,
	email VARCHAR(32) NOT NULL,
	phone VARCHAR(10)
)

CREATE TABLE properties (
	id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	title VARCHAR(64) NOT NULL,
	price DECIMAL(10, 2) NOT NULL,
	image VARCHAR(128),
	description LONGTEXT,
	rooms INT(1),
	wc INT(1),
	garage INT(1),
	timestamp DATE,
	id_seller INT NOT NULL,
	FOREIGN KEY (id_seller) REFERENCES sellers(id)
)
