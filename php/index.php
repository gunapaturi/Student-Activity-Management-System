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
        <style>

            body{
                margin-left:auto;
                margin-right:auto;
                max-width: 800px;
                background: #F7F7F7;
                padding: 25px 15px 25px 10px;
                border:1px solid #E4E4E4;
                 color: #888;
             font-family:'Raleway';
                border:2px solid black;
                border-radius: 10px;
            }   

            input[type=text], select,input[type=textarea],input[type=Date],input[type=Time] {
                border: 1px solid #DADADA;
                color: #888;
                height: 30px;
                margin-bottom: 16px;
                margin-right: 6px;
                margin-top: 2px;
                outline: 0 none;
                padding: 3px 3px 3px 5px;
                width: 70%;
                font-size: 12px;
                line-height:15px;
                box-shadow: inset 0px 1px 4px #ECECEC;
                -moz-box-shadow: inset 0px 1px 4px #ECECEC;
                -webkit-box-shadow: inset 0px 1px 4px #ECECEC;
 
               /* width: 200px;
                height: 50px
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;*/
            }

            input[type=submit] {
                width: 200px;
                background-color: #000;
                color: white;
                margin: 8px 50px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                padding: 10px 25px 10px 25px;
            }

            input[type=textarea] {
                padding: 5px 3px 3px 5px;
                height:100px;
            }

            input[type=submit]:hover {
                background-color: #333;
            }

            div {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
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
             padding-left: 5px;
        }
            </style>
    </head>
    <body>
        <?php 
        include 'db.php';
          if(isset($_GET['id']))
          {
              echo "<a href='logout.php'><img src='exit_icon.png' style='margin-left: 775px;height: 37px;width: 30px;padding-bottom: 7px;margin-top: -20px;'/></a>";
               echo "<h2 class='content'>Update Event</h2>";
              $id=$_GET['id'];
              $getselect=mysql_query("SELECT * FROM eventsTable WHERE eventID='$id'");
              while($profile=mysql_fetch_array($getselect))
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
             echo "<form action='insertEvent.php?id=<?php echo $id;?>' method='post'>";
            }
            else {
                echo "<a href='logout.php'><img src='exit_icon.png' style='margin-left: 775px;height: 37px;width: 30px;padding-bottom: 7px;margin-top: -20px;'/></a>";
               echo "<h2 class='content'>Add Event</h2>";
               echo "<form action='insertEvent.php' method='post'>";
            }
        ?>        
             
            <label>Event Name:</label>
            <input type="text" name="event_name" value="<?php if(!empty($name))echo $name; ?>"><br><br>
            <label>Event Description:</label>
            <input type="textarea" name="event_Desc" value="<?php if(!empty($desc)) echo $desc; ?>"><br><br>
            <label>Event Location:</label>
            <input type="text" name="event_loc" value="<?php if(!empty($loc)) echo $loc; ?>"><br><br>
            <label>Event Start Date:</label>
            <input type="Date" name="start_date" value="<?php if(!empty($startDate)) echo $startDate; ?>"><br><br>
            <label>Event End Date:</label>
            <input type="Date" name="end_date" value="<?php if(!empty($endDate)) echo $endDate; ?>"><br><br>
            <label>Event Start Time:</label>
            <input type="Time" name="start_time" value="<?php if(!empty($startTime)) echo $startTime; ?>"><br><br>
            <label>Event End Time:</label>
            <input type="Time" name="end_time" value="<?php if(!empty($endTime)) echo $endTime; ?>"><br><br>
        
            <?php
                include 'db.php';
               // you just fetching here (Event_Name) take all the values from the database or 
                $sql = "SELECT CategoryName,CategoryId FROM Category";
                $result = mysql_query($sql);

                echo "<label>Event Category:</label><select name='Category_Name'>";
                while ($row = mysql_fetch_array($result)) {
                    if($row["CategoryId"]==$category)
                        echo '<option value="'.$row["CategoryId"].'" selected>'.$row["CategoryName"].'</option>';
                    else
                        echo '<option value="'.$row["CategoryId"].'">'.$row["CategoryName"].'</option>';
                }
                echo "</select><br>";
                
                $sql_1 = "SELECT DeptName,DeptId FROM Department";
                $result_1 = mysql_query($sql_1);

                echo "<label>Department:</label><select name='Dept_Name'>";
                while ($row = mysql_fetch_array($result_1)) {
                        if($row["DeptId"]==$dept)
                            echo '<option value="'.$row["DeptId"].'" selected>'.$row["DeptName"].'</option>';
                        else
                            echo '<option value="'.$row["DeptId"].'">'.$row["DeptName"].'</option>';
                }
                echo "</select><br><br>";
            ?>

            <label>&nbsp;</label>
            <?php 
              if(isset($_GET['id'])){
                echo "<input type='submit' name='update' value='Update Event'><br>";
              }
              else{
                echo "<input type='submit' name='addEvent' value='Add Event'><br>";
              }
            ?>
        </form>
    </body>
</html>
