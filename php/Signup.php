
 <?php
 /*$dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "united567@";
 $db = "University"; */

 include 'db.php';
 
 if( isset($_POST['signup_btn'])){
      session_start();
  
 //taking input

    $username = $_POST['Username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $city = $_POST['city'];
    $state= $_POST['state'];
    $phone= $_POST['phone'];
    $degreetype= $_POST['degreetype'];
   $type= $_POST['type'];
      $position= $_POST['position'];


      if( $username==null or $password==null or $firstname==null or $lastname==null or $city==null or $state==null or $phone==null or $degreetype==null or $type==null or $position==null)
    {
      echo"enter details";

    }
    else
    { 
     if($type='Student')
        {
            $rowSQL = mysql_query("SELECT MAX(id) AS max FROM `users`;" );
            $row = mysql_fetch_array( $rowSQL );
           $largestNumber = $row['max'];
           $largestNumber=$largestNumber+1;
           $sql="insert into  users(id,username,password) values('$largestNumber','$username','$password')";
            mysql_query($connection,$sql);
              $sqlperson="insert into  Person(id,firstName,lastName,phone,ssn,ptype,city,state,country,dob) values('$largestNumber','$firstname','$lastname','$phone','50-56-600','Student','$city','$state','United states of america','1992-09-27')";
            mysql_query($connection,$sqlperson);

             $sqlstudent="insert into  student(studentID,syear,housing,majorID,minorID,advisorID) values('$largestNumber','$degreetype','yes','101','201','9010')";
            mysql_query($connection,$sqlstudent);
            header("location:login.php");
            $message = "Signup Sucessfully!!";

          }
         else if($type="Faculty")
       {
          $rowSQL = mysql_query( $connection,"SELECT MAX(id) AS max FROM `users`;" );
            $row = mysql_fetch_array( $rowSQL );
           $largestNumber = $row['max'];
           $largestNumber=$largestNumber+1;
           $sql="insert into  users(id,username,password) values('$largestNumber','$username','$password')";
            mysql_query($connection,$sql);
              $sqlperson="insert into  Person(id,firstName,lastName,phone,ssn,ptype,city,state,country,dob) values('$largestNumber','$firstname','$lastname','$phone','50-56-600','$type','$city','$state','United states of america','1992-09-27')";
            mysql_query($connection,$sqlperson);

             $sqladmin="insert into  faculty(facultyID,degree,position,deptID) values('$largestNumber','PhD',$position,'1111')";
            mysql_query($connection,$sqladmin);
            header("location:login.php");
          }


 }

}

else if( isset($_POST['login_userbtn'])){
   header("location:login.php");
  }
   ?>

<!doctype html>
<html>
<head>

<meta charset="UTF-8">
<title>Sign up</title>
<link rel="stylesheet" href="loginuse.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>



<script src="index.js"></script>
<style>
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
</style>
</head>
<body>

  <div class="content">
    <div class=headgroup>
    <h2>SIGN UP</h2>
  </div>
  <form  method="post"  >
  <div>
  <select  class="form-control" style="font-family:'Fjalla One';margin-bottom: 30px;" name="type" > 
  <option>Choose one</option>
  <option value="Student">Student</option>
  <option value="Faculty">Faculty</option>
</select>
</div>
    <div class="group">
      <input type="text"   id="firstname"  name="firstname" ><span class="highlight"></span><span class="bar"></span>
      <label>FirstName</label>
    </div>
      <div class="group">
      <input type="text"   id="lastname" name="lastname"><span class="highlight"></span><span class="bar"></span>
      <label>LastName</label>
    </div>
    <div class="group">
      <input type="text" id="username" name="Username"><span class="highlight"></span><span class="bar"></span>
      <label>Username</label>
    </div>
    <div class="group">
      <input type="password"  id="password", name="password"><span class="highlight"></span><span class="bar"></span>
      <label>Password</label>
    </div>
   
    <div class="group">
      <input type="text" id="city"  name="city"><span class="highlight"></span><span class="bar"></span>
      <label>city</label>
    </div>
    <div class="group">
     <input type="text" id="state"  name="state"><span class="highlight"></span><span class="bar"></span>
      <label>state</label>
</div>
    <div class="group">
  <input type="text" id="phone"  name="phone"><span class="highlight"></span><span class="bar"></span>
  <label>Phone</label>
</div>

   <div class="group">
     <input type="text" id="position"  name="position"><span class="highlight"></span><span class="bar"></span>
      <label>Position</label>
</div>
    
   <div>
 <select class="form-control" style="font-family:'Fjalla One'" name="degreetype" >
 <option>Choose one </option>
  <option value="Sophomore">Sophomore</option>
  <option value="Freshmen">Freshmen</option>
  <option value="Senior">Senior</option>
</select>
</div>
   <!--  <div name="button_sun">
      <p><input type="submit"  name="signup_btn" value="Signup"  /></p>
      <p><input type="submit"  name="login_userbtn" value="Login"  /></p>
     </div> -->
     <div>
<button type="submit" name="signup_btn" class="button buttonBlue" style="font-family: 'Fjalla One'">Sign up
     <!-- <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div> -->
    </button>
    </div>
    <div>
    <button type="submit" name="login_userbtn" class="button buttonBlue" style="font-family: 'Fjalla One'">Log in
      <!--<div class="ripples buttonRipples"><span class="ripplesCircle"></span></div> -->
    </button>
    </div>
  </form>



</body>
</html>

 