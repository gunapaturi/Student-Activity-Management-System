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
          $sql="CALL studentInfo($id)";    
          $data=mysql_query($sql);

          $profile=mysql_fetch_array($data);
          $advisorId=$profile['advisorID'];
         $courseName=$profile['courseName'];
         $deptName=$profile['deptName'];
         
     }
    ?>
    <a href="logout.php"><img src="exit_icon.png" style="margin-left: 775px;height: 37px;width: 30px;padding-bottom: 7px;"/></a>
    <h2 class="content">Student Details</h2>
    <label>Advisor:</label>
    <label>Jane Smith</label><br><br>
    <label>Department:</label>
    <label><?php if(!empty($deptName)) echo $deptName; ?></label><br><br>
    <label>Major:</label>
    <label><?php if(!empty($courseName)) echo $courseName; ?></label><br><br>
    </body>
</html>