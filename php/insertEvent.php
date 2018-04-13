


 <?php
 include 'db.php';
  $name=$_POST['event_name'];
 $desc=$_POST['event_Desc'];
 $loc=$_POST['event_loc'];
 $startDate=$_POST['start_date'];
 $endDate=$_POST['end_date'];
 $startTime=$_POST['start_time'];
 $endTime=$_POST['end_time'];
 $category=$_POST['Category_Name'];
 $dept=$_POST['Dept_Name'];
if(isset($_GET['id']))
    {
      $id=$_GET['id'];
      if(isset($_POST['update']))
      {      
        $updated=mysql_query("UPDATE eventsTable SET 
            eventName='$name', description='$desc', location='$loc',eventName='$name', endDate='$endDate', startDate='$startDate',
            endTime='$endTime',startTime='$startTime', catID='$category', deptID='$dept' WHERE eventID=7009");	      

	      if($updated)
	      {
	      $msg="Successfully Updated!!";
	      header('Location:Home.php');
	      }
	    }
    }  //update ends here

else{
	if(isset($_POST['addEvent'])){
		$newId= mysql_fetch_array(mysql_query("SELECT max(eventID) as newId from eventsTable"));
	$event_id=$newId["newId"]+1;
	 $insert=mysql_query("insert into eventstable(eventID,eventName,description,location,startDate,endDate,startTime,endTime,catID,deptID)
		values	('$event_id','$name','$desc','$loc','$startDate','$endDate','$startTime','$endTime','$category','$dept')");
	 if($insert)
      {
	      $msg="Successfully added!!";	    
	      header('Location:Home.php');
      }
	}
}

?>
