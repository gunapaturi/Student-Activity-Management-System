delimiter $$
DROP PROCEDURE IF EXISTS `UpdateEvent` 
$$
delimiter $$
CREATE PROCEDURE UpdateEvent(
        IN  iD	         INT, 
        IN name         Varchar(20),
		IN  location  	  Varchar(20),
        IN  deptID		INT,
        IN  startTime	TIME,
        IN endTime		TIME,
        IN startDate	DATE,
        IN endDate		DATE,
	     IN description	 Varchar(20),
        IN catID		INTEGER
        )
BEGIN 
    UPDATE eventsTable
    SET eventName  = name, location=location,  deptID=deptID  , startTime=startTime,  endTime= endTime ,startDate=startDate,endDate=endDate,description = description,catID=catID
    WHERE  eventID =   iD;
END 
$$
call UpdateEvent(7000,'Pic','Woodward ',1000,'0.5208333','0.041666','2017-01-14','2017-01-19','Eat hello',2000);
$$

select * from eventsTable;


