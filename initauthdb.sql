DROP DATABASE IF EXISTS Auth;
CREATE DATABASE Auth;

DROP TABLE IF EXISTS Auth.Login;
CREATE TABLE Auth.Login (
    personID INT AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
	isAdmin BOOLEAN NOT NULL,
    PRIMARY KEY (personID)
) ENGINE=INNODB;

INSERT INTO Auth.Login (email, password, isAdmin) VALUES ('cktam@ucalgary.ca', 'password', true);
INSERT INTO Auth.Login (email, password, isAdmin) VALUES ('muhammad.hassan1@ucalgary.ca', 'password', true);
INSERT INTO Auth.Login (email, password, isAdmin) VALUES ('cole.parker@ucalgary.ca', 'password', true);