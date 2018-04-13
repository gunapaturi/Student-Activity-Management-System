Drop database university;
CREATE DATABASE University;

USE University;

DROP TABLE IF EXISTS eventAttendance;
DROP TABLE IF EXISTS person;
DROP TABLE IF EXISTS student;
DROP TABLE IF EXISTS faculty;
DROP TABLE IF EXISTS department;
DROP TABLE IF EXISTS courses;
DROP TABLE IF EXISTS eventsTable;
DROP TABLE IF EXISTS category;

CREATE TABLE users (
     id 			INTEGER UNSIGNED,
    Username 	TEXT,
	password TEXT,
    PRIMARY KEY	(id)
    );



CREATE TABLE person (
     id 			INTEGER UNSIGNED,
    firstName 	TEXT,
    lastName  	TEXT,
    phone		TEXT,
    ssn			TEXT,
    ptype		TEXT,
    city		TEXT,
    state		TEXT,
	country		TEXT,
    dob			DATE,
    PRIMARY KEY	(id)
    );


CREATE TABLE student (
	studentID	INTEGER UNSIGNED,
    syear 		TEXT,
    housing  	TEXT,
    majorID		INTEGER UNSIGNED,
    minorID		INTEGER UNSIGNED,
    advisorID	INTEGER UNSIGNED,
    PRIMARY KEY	(studentID)
    );

CREATE TABLE faculty (
	facultyID	INTEGER UNSIGNED,
    degree	 	TEXT,
    position  	TEXT,
    deptID		INTEGER UNSIGNED,
    PRIMARY KEY	(facultyID)
    );

CREATE TABLE department (
	deptID 		INTEGER UNSIGNED,
    deptName 	TEXT,
    location  	TEXT,
    PRIMARY KEY	(deptID)
    );

CREATE TABLE courses (
	courseID	INTEGER UNSIGNED,
    courseName 	TEXT,
    courseType 	TEXT,
    deptID		INTEGER,
    PRIMARY KEY	(courseID)
    );

CREATE TABLE eventsTable (
	eventID		INTEGER UNSIGNED,
    eventName 	Varchar(20),
    location  	TEXT,
    deptID		INTEGER,
    startTime	TIME,
    endTime		TIME,
    startDate	DATE,
    endDate		DATE,
	description	TEXT,
    catID		INTEGER,
	PRIMARY KEY	(eventID)
    );

CREATE TABLE category(
	categoryID	INTEGER UNSIGNED,
    categoryName TEXT,
    PRIMARY KEY	(categoryID)
    );

CREATE TABLE eventAttendance (
	eventID		INTEGER UNSIGNED,
    studentID 	INTEGER UNSIGNED,
    PRIMARY KEY (eventID, studentID),
    FOREIGN KEY (eventID) 	REFERENCES eventsTable 	(eventID),
    FOREIGN KEY (studentID) REFERENCES student 		(studentID)
    );


INSERT INTO users VALUES('8010','Bob@gmail','bobpass');



INSERT INTO Person VALUES('8001','Bob','Smith','555-555-5555','15-35-345','Student','Charlotte','North Carolina','United States of America','1992-03-01');
INSERT INTO Person VALUES('8002','Rich','Nguyen','345-875-1435','23-98-765','Student','Charlotte','North Carolina','United States of America','1994-12-02');
INSERT INTO Person VALUES('8003','Tom','Holland','978-986-9854','55-55-557','Student','Raleigh','North Carolina','United States of America','1990-09-21');
INSERT INTO Person VALUES('8004','Andrew','Garfield','987-986-9865','55-55-558','Student','Durham','North Carolina','United States of America','1989-10-11');
INSERT INTO Person VALUES('8005','Hugh','Jackman','708-706-6543','55-55-559','Student','Long Island','New York','United States of America','1989-10-19');
INSERT INTO Person VALUES('8006','Ashton','Kutcher','778-263-3421','55-55-560','Student','Chapel Hill','North Carolina','United States of America','1990-10-21');
INSERT INTO Person VALUES('8007','Mila','Kunis','769-669-9072','55-55-561','Student','Asheville','North Carolina','United States of America','1990-10-21');
INSERT INTO Person VALUES('8008','Ian','Halsey','886-493-9120','55-55-562','Student','Wilmington','North Carolina','United States of America','1991-12-20');
INSERT INTO Person VALUES('8009','Jared','Leto','799-038-0632','55-55-563','Student','Spartanburg','South Carolina','United States of America','1988-05-21');
INSERT INTO Person VALUES('8010','Stan','Lee','906-654-8460','55-55-564','Student','Rock Hill','South Carolina','United States of America','1990-01-01');
INSERT INTO Person VALUES('9002','Nina','Dobrev','704-976-9854','55-55-565','Faculty','Austin','Texas','United States of America','1992-11-19');
INSERT INTO Person VALUES('9003','Lucy','Hale','986-986-9768','55-45-566','Faculty','Charlotte','North Carolina','United States of America','1990-10-10');
INSERT INTO Person VALUES('9004','Matt','Bomer','980-706-6543','55-65-567','Faculty','Huntersville','North Carolina','United States of America','1995-09-20');
INSERT INTO Person VALUES('9005','Chandrashekar','Rao','798-263-4263','55-55-568','Faculty','Raleigh','North Carolina','United States of America','1987-06-26');
INSERT INTO Person VALUES('9006','Mike','Jones','798-659-8087','55-55-569','Faculty','Spartanburg','South Carolina','United States of America','1991-09-23');
INSERT INTO Person VALUES('9007','John','Williams','886-493-3986','43-68-570','Faculty','Akron','Ohio','United States of America','1992-11-24');
INSERT INTO Person VALUES('9008','Andrew','Simon','769-038-0404','55-55-571','Faculty','Spartanburg','South Carolina','United States of America','1993-10-12');
INSERT INTO Person VALUES('9009','Maria','Brown','986-674-3024','35-55-572','Faculty','Richmond','Virginia','United States of America','1992-10-24');
INSERT INTO Person VALUES('9010','David','Johnson','704-365-6478','55-55-573','Faculty','Greensboro','North Carolina','United States of America','1995-10-24');
INSERT INTO Person VALUES('9011','Jane','Smith','980-976-9867','55-55-574','Faculty','Durham','North Carolina','United States of America','1990-10-21');


INSERT INTO Student VALUES('8001','Sophomore','Yes','100','200','9002');
INSERT INTO Student VALUES('8002','Freshmen','Yes','100','200','9003');
INSERT INTO Student VALUES('8003','Senior','No','100','200','9004');
INSERT INTO Student VALUES('8004','Freshmen','No','100','200','9005');
INSERT INTO Student VALUES('8005','Sophomore','Yes','100','200','9006');
INSERT INTO Student VALUES('8006','Freshmen','No','100','200','9007');
INSERT INTO Student VALUES('8007','Senior','yes','100','200','9008');
INSERT INTO Student VALUES('8008','Sophomore','No','100','200','9009');
INSERT INTO Student VALUES('8009','Senior','No','100','200','9010');
INSERT INTO Student VALUES('8010','Senior','Yes','100','200','9011');


INSERT INTO Faculty VALUES('9002','PhD.','Associate Chair','1000');
INSERT INTO Faculty VALUES('9003','PhD.','Assistant Professor','1001');
INSERT INTO Faculty VALUES('9004','Masters','Advisor','1001');
INSERT INTO Faculty VALUES('9005','PhD.','Postdoctoral Associate','1001');
INSERT INTO Faculty VALUES('9006','PhD.','Advisor','1000');
INSERT INTO Faculty VALUES('9007','PhD.','Adjunct faculty','1004');
INSERT INTO Faculty VALUES('9008','PhD.','Director','1000');
INSERT INTO Faculty VALUES('9009','Masters','Instructor','1005');
INSERT INTO Faculty VALUES('9010','Masters','Advisor','1005');
INSERT INTO Faculty VALUES('9011','PhD.','Advisor','1004');


INSERT INTO Department VALUES('1001','College of Nursing','Burson');
INSERT INTO Department VALUES('1002','Department of Bioinformatics and Genomics','Sycamore');
INSERT INTO Department VALUES('1003','Electrical and Computer Engineering','Cato');
INSERT INTO Department VALUES('1004','Psychology','Woodward Hall');
INSERT INTO Department VALUES('1005','Computer Science','Cato');
INSERT INTO Department VALUES('1006','Cyber Security','Sycamore');
INSERT INTO Department VALUES('1007','Business Administration','Burson');
INSERT INTO Department VALUES('1008','Chemistry','Sycamore');
INSERT INTO Department VALUES('1009','Civil Engineering','Cato');
INSERT INTO Department VALUES('1100','Department of Arts and Culture','Kennedy');


INSERT INTO Courses VALUES('1600','Introduction to Professionalism','Minor','1000');
INSERT INTO Courses VALUES('1601','Intelligent Systems','Major','1000');
INSERT INTO Courses VALUES('1602','Machine Learning','Major','1000');
INSERT INTO Courses VALUES('1603','Organic Chemistry','Major','1008');
INSERT INTO Courses VALUES('1604','Motion Based Design','Minor','1009');
INSERT INTO Courses VALUES('1605','Entreprenrship start-up','Minor','1007');
INSERT INTO Courses VALUES('1606','Embedded Systems','Major','1005');
INSERT INTO Courses VALUES('1607','Information Security and Privacy','Minor','1006');
INSERT INTO Courses VALUES('1608','Robotics','Major','1003');
INSERT INTO Courses VALUES('1609','Web Services','Major','1006');


INSERT INTO Category VALUES('2000','Outdoor Activities');
INSERT INTO Category VALUES('2001','Social');
INSERT INTO Category VALUES('2002','Career Fair');
INSERT INTO Category VALUES('2003','Media and Journalism');
INSERT INTO Category VALUES('2004','Arts');
INSERT INTO Category VALUES('2005','Religious /spiritual');
INSERT INTO Category VALUES('2006','Classroom Activities');
INSERT INTO Category VALUES('2007','Charity');
INSERT INTO Category VALUES('2008','Hackathons');
INSERT INTO Category VALUES('2009','Motivational');


INSERT INTO EventsTable VALUES('7000','Picnic','Woodward Eagle','1000','0.520833333333333','0.0416666666666667','2017-01-12','2017-01-14','Eat food','2000');
INSERT INTO EventsTable VALUES('7001','Meet n Greet','Student Union' ,'1000','0.5625','0.0833333333333333','2017-01-22','2017-01-24','Talk to people','2001');
INSERT INTO EventsTable VALUES('7002','Career Night','Atkins', '1006','0.416666666666667','0.583333333333333','2017-02-12','2017-02-19','Network w/ Corp','2002');
INSERT INTO EventsTable VALUES('7003','Baseball game','Hayes Stadium','1007','0.541666666666667','0.625','2017-02-14','2017-02-18','49ers Baseball','2003');
INSERT INTO EventsTable VALUES('7004','Art Showcase','Student Union','1100','0.770833333333333','0.833333333333333','2017-03-01','2017-03-12','Art showing','2004');
INSERT INTO EventsTable VALUES('7005','Worship Night','Student Union','1004','0.791666666666667','0.833333333333333','2017-04-11','2017-04-18','Christian worship','2005');
INSERT INTO EventsTable VALUES('7006','Writing Assistance','Cameron','1003','0.458333333333333','0.5','2017-03-10','2017-03-19','Writing help','2006');
INSERT INTO EventsTable VALUES('7007','Volunteer Week','Woodward Eagle','1001','0.395833333333333','0.541666666666667','2017-04-18','2017-04-20','Aiding Charities','2004');
INSERT INTO EventsTable VALUES('7008','NCHack','Student Union','1005','0.479166666666667','0.6875','2017-04-28','2017-04-30','Tech Project Creation','2008');
INSERT INTO EventsTable VALUES('7009','Speaker:Carlos Davis','Woodward Hall','1004','0.458333333333333','0.541666666666667','2017-05-06','2017-05-09','Self-improvement','2009');


INSERT INTO eventAttendance VALUES('7000','8001');
INSERT INTO eventAttendance VALUES('7000','8004');
INSERT INTO eventAttendance VALUES('7000','8009');
INSERT INTO eventAttendance VALUES('7001','8003');
INSERT INTO eventAttendance VALUES('7001','8004');
INSERT INTO eventAttendance VALUES('7002','8005');
INSERT INTO eventAttendance VALUES('7002','8002');
INSERT INTO eventAttendance VALUES('7002','8006');
INSERT INTO eventAttendance VALUES('7004','8003');
INSERT INTO eventAttendance VALUES('7004','8005');


 