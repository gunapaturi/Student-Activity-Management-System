<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		<style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Raleway');
                @import url('https://fonts.googleapis.com/css?family=Oswald');

        .content{
        	margin-top: 10dp;
            background-color: #2A3336;
            color:white;
            padding-bottom: 3px;
         font-family:'Fjalla One';
         border-radius: 1px;
         z-index: 1;
         width: 770px;
         height: 40px;

        }
			body{
                margin-left:auto;
                margin-right:auto;
                max-width: 800px;
                background: #F7F7F7;
                padding: 25px 15px 25px 10px;
             color: #888;
             font-family:'Raleway';
                border:2px solid black;
                border-radius: 10px;
            }  
            a{
                        	color: #888;

            }
            h4{
                float:left;
                font-weight: bold;
                font-family: 'Oswald' ; 
                margin-left: 5px;
                margin-top: 5px;               

            }
        </style>
    </head>

    <body>
    	<a href="logout.php"><img src="exit_icon.png" style="margin-left: 730px;height: 37px;width: 30px;padding-bottom: 7px;"/></a>

    	<div class="content">
    	
    	<h4 >Upcoming Events</h4>
    	        <a  href="index.php"><img src="add.png" style="margin-left:575px ; height: 33px;width: 30px;padding-top: 3px;"></img></a>
    	
    	</div>
    	<?php
                include 'db.php';
                $currentDate=date('Y-m-d');
                $sql = "SELECT eventName,eventID FROM eventstable where endDate>'".$currentDate."'";
                $result = mysql_query($sql);

                if(count($result)>0){
	                echo "<ul name='eventName' class='list-group'>";
	                while ($row = mysql_fetch_array($result)) {
	                    echo "<li class='list-group-item justify-content-between' value='".$row["eventID"]."'>".$row["eventName"]."
	                    <a href='deleteEvent.php?id=".$row["eventID"]."' onclick='return confirm('Are you sure you wish to delete this Record?');''> <img src='delete_icon.png' id='delete'/> </a><a href='index.php?id=".$row["eventID"]."'><img src='edit_icon.png' id='edit'/></a></li>";
	                }
	                echo "</ul><br>";
            	}
            	else{
            		echo "<div>No upcoming events to display!</div>";
            	}
            ?>
    	</div>
    	
		<div class="content">
    	<h4>Past Events</h4></div>
    	<?php
                include 'db.php';
                $currentDate=date('Y/m/d');
                $sql = "SELECT e.eventName,e.eventID,count(ea.studentID) as studentCount FROM eventstable e LEFT JOIN eventattendence ea ON 
                	e.eventID=ea.eventID where endDate<'$currentDate' GROUP by eventID" ;
                $result = mysql_query($sql);

                 if(count($result)>0){
	                echo "<ul name='eventName' class='list-group'>";
	                while ($row = mysql_fetch_array($result)) {
	                  echo "<li class='list-group-item justify-content-between' value='".$row["eventID"]."'><a href='eventPage.php?id=".$row["eventID"]."'>".$row["eventName"]."</a><span class='badge badge-default badge-pill'>".$row["studentCount"]."</span></li>";
	                }
	                echo "</ul><br>";
            	}
            	else{
            		echo "<div>No upcoming events to display!</div>";
            	}
            ?>
    	</div>
    </body>
</html>