use university;


Delimiter $$

CREATE TRIGGER event_remove_trigger
            Before DELETE on eventsTable
            for EACH ROW BEGIN
            DELETE FROM eventAttendance WHERE eventAttendance.eventID=OLD.eventID;
            END $$

            
 