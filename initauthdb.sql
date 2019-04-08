DROP DATABASE IF EXISTS CPSC471;
CREATE DATABASE CPSC471;

DROP TABLE IF EXISTS CPSC471.Login;
CREATE TABLE CPSC471.Login (
    personID INT AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
	  isAdmin BOOLEAN NOT NULL DEFAULT false,
    PRIMARY KEY (personID)
) ENGINE=INNODB;

INSERT INTO CPSC471.Login (email, password, isAdmin) VALUES ('cktam@ucalgary.ca', 'password', true);
INSERT INTO CPSC471.Login (email, password, isAdmin) VALUES ('muhammad.hassan1@ucalgary.ca', 'password', true);
INSERT INTO CPSC471.Login (email, password, isAdmin) VALUES ('cole.parker@ucalgary.ca', 'password', true);
