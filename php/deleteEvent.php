<?php
 include 'db.php';
 if(isset($_GET['id']))
  {
	  $delete=$_GET['id'];
	  $deleteQuery=mysql_query("DELETE FROM eventsTable WHERE eventID=$delete");
	  if($deleteQuery)
	  {
	      header("Location:Home.php");
	  }
	  else
	  {
	      echo mysql_error();
	  }
}
 ?>