DROP DATABASE IF EXISTS CPSC471;
CREATE DATABASE CPSC471;
USE CPSC471;

DROP TABLE IF EXISTS CPSC471.Person;
CREATE TABLE CPSC471.Person (
	personID INT AUTO_INCREMENT,
	firstName VARCHAR(255) NOT NULL,
	middleName VARCHAR(255),
	lastName VARCHAR(255) NOT NULL,
	phone VARCHAR(15) NOT NULL,
	passportNo VARCHAR(255) NOT NULL,
	PRIMARY KEY (personID)
) ENGINE=INNODB;

INSERT INTO CPSC471.Person (firstName, lastName, phone, passportNo) VALUES ('Joan','Tam','123456789','HD123');
INSERT INTO CPSC471.Person (firstName, lastName, phone, passportNo) VALUES ('Umer','Hassan','123456780','HD456');
INSERT INTO CPSC471.Person (firstName, lastName, phone, passportNo) VALUES ('Cole','Parker','23456789','HD789');
INSERT INTO CPSC471.Person (firstName, lastName, phone, passportNo) VALUES ('Bob','Bobby','987654321','HD111');
INSERT INTO CPSC471.Person (firstName, lastName, phone, passportNo) VALUES ('Rob','Robby','098765432','HD222');
INSERT INTO CPSC471.Person (firstName, lastName, phone, passportNo) VALUES ('Todd','Toddy','9876543','HD333');

DROP TABLE IF EXISTS CPSC471.Admin;
CREATE TABLE CPSC471.Admin (
	personID INT NOT NULL,
	email VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	PRIMARY KEY (personID),
	FOREIGN KEY (personID) REFERENCES Person(personID),
	UNIQUE(email)
) ENGINE=INNODB;

INSERT INTO CPSC471.Admin (personID, email, password) VALUES ('1', 'cktam@ucalgary.ca', 'pw');
INSERT INTO CPSC471.Admin (personID, email, password) VALUES ('2', 'muhammad.hassan1@ucalgary.ca', 'pw');
INSERT INTO CPSC471.Admin (personID, email, password) VALUES ('3', 'cole.parker@ucalgary.ca', 'pw');

DROP TABLE IF EXISTS CPSC471.Member;
CREATE TABLE CPSC471.Member (
	personID INT NOT NULL,
	email VARCHAR(255) UNIQUE,
	password VARCHAR(255) NOT NULL,
	PRIMARY KEY (personID),
	FOREIGN KEY (personID) REFERENCES Person(personID),
	UNIQUE(email)
) ENGINE=INNODB;

INSERT INTO CPSC471.Member (personID,email, password) VALUES ('4','test@email.com','pw');
INSERT INTO CPSC471.Member (personID,email, password) VALUES ('5','email@test.com','pw');
INSERT INTO CPSC471.Member (personID,email, password) VALUES ('6','hi@emails.com','pw');

DROP TABLE IF EXISTS CPSC471.Guest;
CREATE TABLE CPSC471.Guest (
	personID INT NOT NULL,
	PRIMARY KEY (personID),
	FOREIGN KEY (personID) REFERENCES Person(personID)
) ENGINE=INNODB;

DROP TABLE IF EXISTS CPSC471.Plane;
CREATE TABLE CPSC471.Plane (
	serialNo VARCHAR(255),
	NoOfSeats INT NOT NULL,
	OccupiedSeats INT NOT NULL DEFAULT 0,
	company VARCHAR(255) NOT NULL,
	planeType VARCHAR(10) NOT NULL,
	PRIMARY KEY(serialNo)
) ENGINE=INNODB;

INSERT INTO CPSC471.Plane(serialNo, NoOfSeats, company, planeType) VALUES ('ABC123',525,'Airbus','A380');
INSERT INTO CPSC471.Plane(serialNo, NoOfSeats, company, planeType) VALUES ('DEC456',200, 'Boeing','777X');
INSERT INTO CPSC471.Plane(serialNo, NoOfSeats, company, planeType) VALUES ('GHI789',375,'Bombardier','Q400');

DROP TABLE IF EXISTS CPSC471.Airport;
CREATE TABLE CPSC471.Airport (
	airportCode VARCHAR(255),
	city VARCHAR(255) NOT NULL,
	airportName VARCHAR(255) NOT NULL,
	PRIMARY KEY(airportCode)
) ENGINE=INNODB;

INSERT INTO CPSC471.Airport(airportCode,city,airportName) VALUES ('YYC','Calgary','Calgary International Airport');
INSERT INTO CPSC471.Airport(airportCode,city,airportName) VALUES ('YVR','Vancouver','Vancouver International Airport');
INSERT INTO CPSC471.Airport(airportCode,city,airportName) VALUES ('NRT','Tokyo','Narita International Airport');
INSERT INTO CPSC471.Airport(airportCode,city,airportName) VALUES ('AAA','Aaana','Aana Airport');
INSERT INTO CPSC471.Airport(airportCode,city,airportName) VALUES ('YWG','Winnipeg','Winnipeg International Airport');
INSERT INTO CPSC471.Airport(airportCode,city,airportName) VALUES ('YYJ','Victoria','Victoria International Airport');

DROP TABLE IF EXISTS CPSC471.Terminal;
CREATE TABLE CPSC471.Terminal (
	airportCode VARCHAR(255),
	Gate VARCHAR(255) NOT NULL,
	terminalType VARCHAR(255) NOT NULL,
	terminalStatus VARCHAR(255) NOT NULL,
	PRIMARY KEY(Gate),
	FOREIGN KEY (airportCode) REFERENCES Airport(airportCode)
) ENGINE=INNODB;

INSERT INTO CPSC471.Terminal(airportCode,Gate,terminalType,terminalStatus) VALUES ('YYC','C10','Domestic','Boarding');
INSERT INTO CPSC471.Terminal(airportCode,Gate,terminalType,terminalStatus) VALUES ('YVR','D58','International','Arrived');
INSERT INTO CPSC471.Terminal(airportCode,Gate,terminalType,terminalStatus) VALUES ('NRT','J77','International','Departed');
INSERT INTO CPSC471.Terminal(airportCode,Gate,terminalType,terminalStatus) VALUES ('AAA','D10','Domestic','Boarding');
INSERT INTO CPSC471.Terminal(airportCode,Gate,terminalType,terminalStatus) VALUES ('YWG','D18','International','Arrived');
INSERT INTO CPSC471.Terminal(airportCode,Gate,terminalType,terminalStatus) VALUES ('YYJ','J37','International','Departed');

DROP TABLE IF EXISTS CPSC471.Flight;
CREATE TABLE CPSC471.Flight (
    flightNo INT AUTO_INCREMENT,
    flightDate DATE NOT NULL,
    adminID INT NOT NULL,
	duration VARCHAR(255) NOT NULL,
	DAirportCode VARCHAR(10) NOT NULL,
	AAirportCode VARCHAR(10) NOT NULL,
	scheduledDtime VARCHAR(10) NOT NULL,
	scheduledAtime VARCHAR(10) NOT NULL,
	planeNo VARCHAR(10) NOT NULL,
	planeType VARCHAR(10) NOT NULL,
	PRIMARY KEY (flightNo,flightDate),
	FOREIGN KEY (adminID) REFERENCES Admin(personID),
	FOREIGN KEY (DAirportCode) REFERENCES Airport(airportCode),
	FOREIGN KEY (AAirportCode) REFERENCES Airport(airportCode)
) ENGINE=INNODB;

INSERT INTO CPSC471.Flight(flightDate,adminID,duration,DAirportcode,AAirportCode,scheduledDtime,scheduledAtime,planeNo,planeType) VALUES ('2019-04-08','1','1h 19m','YYC','YVR','08:30','10:30','ABC123','A380');
INSERT INTO CPSC471.Flight(flightDate,adminID,duration,DAirportcode,AAirportCode,scheduledDtime,scheduledAtime,planeNo,planeType) VALUES ('2019-04-09','2','9h 12m','YVR','NRT','13:25','10:31','DEF456','A380');
INSERT INTO CPSC471.Flight(flightDate,adminID,duration,DAirportcode,AAirportCode,scheduledDtime,scheduledAtime,planeNo,planeType) VALUES ('2019-04-05','3','10h 45m','YYC','NRT','17:05','11:12','GHI789','777X');
INSERT INTO CPSC471.Flight(flightDate,adminID,duration,DAirportcode,AAirportCode,scheduledDtime,scheduledAtime,planeNo,planeType) VALUES ('2019-04-10','1','1h 19m','YYC','AAA','08:30','10:30','ABC123','A380');
INSERT INTO CPSC471.Flight(flightDate,adminID,duration,DAirportcode,AAirportCode,scheduledDtime,scheduledAtime,planeNo,planeType) VALUES ('2019-04-09','2','9h 12m','YVR','YWG','13:25','10:31','DEF456','A380');
INSERT INTO CPSC471.Flight(flightDate,adminID,duration,DAirportcode,AAirportCode,scheduledDtime,scheduledAtime,planeNo,planeType) VALUES ('2019-04-05','3','10h 45m','YYC','YYJ','17:05','11:12','GHI789','777X');


DROP TABLE IF EXISTS CPSC471.Booking;
CREATE TABLE CPSC471.Booking (
	personID INT NOT NULL,
	seatRow INT NOT NULL,
	seatColumn INT NOT NULL,
	gateNo VARCHAR(255) NOT NULL,
	flightNo INT NOT NULL,
	flightDate DATE NOT NULL,
	travelClass VARCHAR(255) NOT NULL,
	PRIMARY KEY (seatRow, seatColumn),
	FOREIGN KEY (personID) REFERENCES Member(personID),
	FOREIGN KEY (flightNo,flightDate) REFERENCES Flight(flightNo,flightDate)
) ENGINE=INNODB;

INSERT INTO CPSC471.Booking(personID,seatRow,seatColumn,gateNo,flightNo,flightDate, travelClass) VALUES ('4','5','1','D58','1','2019-04-08','Economy');
INSERT INTO CPSC471.Booking(personID,seatRow,seatColumn,gateNo,flightNo,flightDate, travelClass) VALUES ('5','28','3','C10','2','2019-04-09','Business');
INSERT INTO CPSC471.Booking(personID,seatRow,seatColumn,gateNo,flightNo,flightDate, travelClass) VALUES ('6','12','2','J77','3','2019-04-05','Economy');

DROP TABLE IF EXISTS CPSC471.Baggage;
CREATE TABLE CPSC471.Baggage (
	tagNo INT AUTO_INCREMENT,
	seatRow INT NOT NULL,
	seatColumn INT NOT NULL,
	flightNo INT NOT NULL,
	bagLength DOUBLE NOT NULL,
	bagHeight DOUBLE NOT NULL,
	bagWidth DOUBLE NOT NULL,
	bagWeight DOUBLE NOT NULL,
	PRIMARY KEY (tagNo),
	FOREIGN KEY (flightNo) REFERENCES Flight(flightNo),
	FOREIGN KEY (seatRow,seatColumn) REFERENCES Booking(seatRow,seatColumn)
) ENGINE=INNODB;

INSERT INTO CPSC471.Baggage(seatRow,seatColumn,flightNo,bagLength,bagHeight,bagWidth,bagWeight) VALUES ('5','1','1','10','10','10','20.998');
INSERT INTO CPSC471.Baggage(seatRow,seatColumn,flightNo,bagLength,bagHeight,bagWidth,bagWeight) VALUES ('28','3','2','20','20','20','30.034');
INSERT INTO CPSC471.Baggage(seatRow,seatColumn,flightNo,bagLength,bagHeight,bagWidth,bagWeight) VALUES ('12','2','3','30','10','15','15.789');

DROP TABLE IF EXISTS CPSC471.Fare;
CREATE TABLE CPSC471.Fare (
	personID INT,
	seatRow INT NOT NULL,
	seatColumn INT NOT NULL,
	flightNo INT NOT NULL,
	flightDate DATE NOT NULL,
	tax DOUBLE NOT NULL,
	price DOUBLE NOT NULL,
	FOREIGN KEY (personID) REFERENCES Member(personID),
	FOREIGN KEY (seatRow,seatColumn) REFERENCES Booking(seatRow,seatColumn),
	FOREIGN KEY (flightNo,flightDate) REFERENCES Flight(flightNo,flightDate)
) ENGINE=INNODB;

INSERT INTO CPSC471.Fare(personID,seatRow,seatColumn,flightNo,flightdate,tax,price) VALUES ('4','5','1','1','2019-04-08','26.345','200.89');
INSERT INTO CPSC471.Fare(personID,seatRow,seatColumn,flightNo,flightdate,tax,price) VALUES ('5','28','3','2','2019-04-09','90.23','800.97');
INSERT INTO CPSC471.Fare(personID,seatRow,seatColumn,flightNo,flightdate,tax,price) VALUES ('6','12','2','3','2019-04-05','100.03','1005.81');

DROP TABLE IF EXISTS CPSC471.CreditCard;
CREATE TABLE CPSC471.CreditCard (
	personID INT,
	cardNumber VARCHAR(12) NOT NULL,
	expiryDate DATE NOT NULL,
	FOREIGN KEY (personID) REFERENCES Member(personID)
) ENGINE=INNODB;

INSERT INTO CPSC471.CreditCard(personID,cardNumber,expiryDate) VALUES ('4','1234','2020-04-08');
INSERT INTO CPSC471.CreditCard(personID,cardNumber,expiryDate) VALUES ('5','45983495','2021-04-09');
INSERT INTO CPSC471.CreditCard(personID,cardNumber,expiryDate) VALUES ('6','3904832904','2022-04-10');
