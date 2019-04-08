DROP DATABASE IF EXISTS CPSC471;
CREATE DATABASE CPSC471;
USE CPSC471;

DROP TABLE IF EXISTS CPSC471.Login;
CREATE TABLE CPSC471.Login (
    personID INT AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
	  isAdmin BOOLEAN NOT NULL,
    PRIMARY KEY (personID)
) ENGINE=INNODB;

INSERT INTO CPSC471.Login (email, password, isAdmin) VALUES ('cktam@ucalgary.ca', 'password', true);
INSERT INTO CPSC471.Login (email, password, isAdmin) VALUES ('muhammad.hassan1@ucalgary.ca', 'password', true);
INSERT INTO CPSC471.Login (email, password, isAdmin) VALUES ('cole.parker@ucalgary.ca', 'password', true);

DROP TABLE IF EXISTS CPSC471.Plane;
CREATE TABLE CPSC471.Plane (
	serialNo VARCHAR(255),
	NoOfSeats INT NOT NULL,
	company VARCHAR(255) NOT NULL,
	planeType VARCHAR(10) NOT NULL,
	PRIMARY KEY(serialNo)
) ENGINE=INNODB;

DROP TABLE IF EXISTS CPSC471.Airport;
CREATE TABLE CPSC471.Airport (
	airportCode VARCHAR(255),
	city VARCHAR(255) NOT NULL,
	airportName VARCHAR(255) NOT NULL,
	PRIMARY KEY(airportCode)
) ENGINE=INNODB;

DROP TABLE IF EXISTS CPSC471.Terminal;
CREATE TABLE CPSC471.Terminal (
	terminalCode VARCHAR(255),
	terminalName VARCHAR(255) NOT NULL,
	Gates VARCHAR(255) NOT NULL,
	terminalType VARCHAR(255) NOT NULL,
	terminalStatus VARCHAR(255) NOT NULL,
	PRIMARY KEY(terminalName),
	FOREIGN KEY (terminalCode) REFERENCES Airport(airportCode)
) ENGINE=INNODB;

DROP TABLE IF EXISTS CPSC471.Flight;
CREATE TABLE CPSC471.Flight (
    flightNo INT AUTO_INCREMENT,
    flightDate DATETIME NOT NULL,
    adminID INT NOT NULL,
	duration VARCHAR(255) NOT NULL,
	DAirportCode VARCHAR(10) NOT NULL,
	AAirportCode VARCHAR(10) NOT NULL,
	scheduledAtime VARCHAR(10) NOT NULL,
	planeNo VARCHAR(10) NOT NULL,
	planeType VARCHAR(10) NOT NULL,
	PRIMARY KEY (flightNo,flightDate),
	FOREIGN KEY (adminID) REFERENCES Login(personID),
	FOREIGN KEY (DAirportCode) REFERENCES Airport(airportCode),
	FOREIGN KEY (AAirportCode) REFERENCES Airport(airportCode)
) ENGINE=INNODB;

DROP TABLE IF EXISTS CPSC471.Booking;
CREATE TABLE CPSC471.Booking (
	personID INT NOT NULL,
	seatRow INT NOT NULL,
	seatColumn INT NOT NULL,
	gateNo VARCHAR(255) NOT NULL,
	flightNo INT NOT NULL,
	flightDate DATETIME NOT NULL,
	PRIMARY KEY (seatRow, seatColumn),
	FOREIGN KEY (personID) REFERENCES Login(personID),
	FOREIGN KEY (flightNo,flightDate) REFERENCES Flight(flightNo,flightDate)
) ENGINE=INNODB;

DROP TABLE IF EXISTS CPSC471.Baggage;
CREATE TABLE CPSC471.Baggage (
	tagNo INT AUTO_INCREMENT,
	seatRow INT NOT NULL,
	seatColumn INT NOT NULL,
	flightNo INT NOT NULL,
	bagLength DOUBLE NOT NULL,
	bagHeight DOUBLE NOT NULL,
	bagWidth DOUBLE NOT NULL,
	badWeight DOUBLE NOT NULL,
	travelClass VARCHAR(255) NOT NULL,	
	PRIMARY KEY (tagNo),
	FOREIGN KEY (flightNo) REFERENCES Flight(flightNo),
	FOREIGN KEY (seatRow,seatColumn) REFERENCES Booking(seatRow,seatColumn)
) ENGINE=INNODB;

DROP TABLE IF EXISTS CPSC471.CreditCard;
CREATE TABLE CPSC471.CreditCard (
	personID INT,
	cardNumber INT NOT NULL,
	expiryDate VARCHAR(255) NOT NULL,
	FOREIGN KEY (personID) REFERENCES Login(personID)
) ENGINE=INNODB;

DROP TABLE IF EXISTS CPSC471.Fare;
CREATE TABLE CPSC471.Fare (
	personID INT,
	seatRow INT NOT NULL,
	seatColumn INT NOT NULL,
	flightNo INT NOT NULL,
	flightDate DATETIME NOT NULL,
	tax DOUBLE NOT NULL,
	price DOUBLE NOT NULL,
	FOREIGN KEY (personID) REFERENCES Login(personID),
	FOREIGN KEY (seatRow,seatColumn) REFERENCES Booking(seatRow,seatColumn),
	FOREIGN KEY (flightNo,flightDate) REFERENCES Flight(flightNo,flightDate)
) ENGINE=INNODB;