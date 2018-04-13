<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

 <?php 
    include 'db.php';

    global $studentId,$img;
      if(isset($_GET['id']))
      {
          $studentId=$_GET['id'];
          $img="register.png";      
          if (isset($_GET['eventId'])) {
            $eventId=$_GET['eventId'];
            echo $eventId;
            $sql=mysql_query("INSERT INTO eventAttendence(eventID,studentID) values('$studentId','$eventId');");
            echo $sql;
            $img="registered.png";
        }
      }      
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		<style type="text/css">
			body{
                margin-left:auto;
                margin-right:auto;
                max-width: 800px;
                background: #eee;
                padding: 25px 15px 25px 10px;                
                color: #888;
                border:1px solid #E4E4E4;
                font-family: 'Fjalla One';
                font-family:'Raleway';
                border:2px solid black;
                border-radius: 10px;
                /*font-family: 'Fjalla One';
                background: #eee;
                -webkit-font-smoothing: antialiased;
                z-index:2;*/
            }  
            a{
            	color: #888;
            }
             .content{
          margin-top: 10dp;
            background-color: #2A3336;
            color:white;
            padding-bottom: 3px;
         font-family:'Fjalla One';
         border-radius: 1px;
         z-index: 1;
         width: 770px;
         height: 30px;
        padding-left: 5px;
        }
        </style>
    </head>

    <body>
    	<div>
    	<a href='studentInfo.php?id=<?php echo $studentId;?>'><img src="info_icon.png" style="width:30px;height:30px;margin-left: 700px"></img></a>
      <a href="logout.php"><img src="exit_icon.png" style="margin-left: 750px;height: 37px;width: 30px;padding-bottom: 7px;margin-top: -50px;"/></a>
    	<h5 class="content">Upcoming Events</h5>
    	<?php
            include 'db.php';
            $currentDate=date('Y-m-d');
            $sql = "CALL studentHome($studentId)";
            $result = mysql_query($sql); 

            if(count($result)>0){
                echo "<ul name='eventName' class='list-group'>";
                while ($row = mysql_fetch_array($result)) {
                  if(!$row["sp"])
                    echo "<li class='list-group-item justify-content-between' value='".$row["eventID"]."'>".$row["eventName"]."
                    <a href='studentHome.php?eventId=".$row["eventID"]."&id=$studentId'><img src='$img' style='width:30px;height:30px' id='register'/></a></li>";
                  else
                    echo "<li class='list-group-item justify-content-between' value='".$row["eventID"]."'>".$row["eventName"]."
                    <img src='registered.png' style='width:30px;height:30px' id='edit'/></li>";
                }
                echo "</ul><br>";
        	}
        	else{
        		echo "<div>No upcoming events to display!</div>";
        	}
        
        	echo "</div>";        	
    		  echo "<div>";
        ?>
    	</div>
    </body>
</html>