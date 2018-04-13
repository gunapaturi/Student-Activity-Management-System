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
        <style type="text/css">
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
            .content{
        	margin-top: 10dp;
            background-color: #2A3336;
            color:white;
            padding-bottom: 3px;
         font-family:'Fjalla One';
         border-radius: 1px;
         z-index: 1;
         width: 800px;
         height: 30px;
         margin-top: 0px;
    padding-left: 5px;
        }
        </style>
    </head>

    <body>

	<?php 
		include 'db.php';
      if(isset($_GET['id']))
      {
          $id=$_GET['id'];
          $sql="SELECT * FROM eventsTable where eventID=$id LIMIT 1";    
          $data=mysql_query($sql);
          while($profile=mysql_fetch_array($data)) 
              {
		         $name=$profile['eventName'];
		         $desc=$profile['description'];
		         $loc=$profile['location'];
		         $startDate=$profile['startDate'];
		         $endDate=$profile['endDate'];
		         $startTime=$profile['startTime'];
		         $endTime=$profile['endTime'];
		         $category=$profile['catID'];
		         $dept=$profile['deptID'];
     		}		
     }
    ?>
<a href="logout.php"><img src="exit_icon.png" style="margin-left: 775px;height: 37px;width: 30px;padding-bottom: 7px;"/></a>

    <h2 class="content">Event Details</h2>
    <label>Event Name:</label>
    <label><?php if(!empty($name))echo $name; ?></label><br><br>
    <label>Event Description:</label>
    <label><?php if(!empty($desc)) echo $desc; ?></label><br><br>
    <label>Event Location:</label>
    <label><?php if(!empty($loc)) echo $loc; ?></label><br><br>
    <label>Event Date:</label>
    <label><?php if(!empty($startDate)) echo $startDate; ?></label><br><br>
    <label>Participants:</label>
    <?php
        include 'db.php';
        $sql = "SELECT p.firstName,p.lastName,p.id FROM person p inner join eventattendence ea on p.id=ea.studentID
       where eventID=$id";
        $result = mysql_query($sql);

        if(count($result)>0){
            echo "<ul name='participants' class='list-group'>";
            while ($row = mysql_fetch_array($result)) {
                echo "<li class='list-group-item justify-content-between' value='".$row["id"]."'>".$row["firstName"].$row["lastName"]."</li>";
            }
            echo "</ul><br>";
    	}
    	else{
    		echo "<div>No participants!</div>";
    	}
    ?>
    </body>
</html>