

 
 
 <?php
 /*$dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "united567@";
 $db = "University";
 $connection = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $connection -> error);*/
 include 'db.php';

      
 if( isset($_POST['login_btn'])){
      session_start();
      $rowSQL = mysql_query("SELECT MAX(id) AS max FROM users;");
      $row = mysql_fetch_array( $rowSQL );
    $largestNumber = $row['max'];
    $largestNumber=$largestNumber+1;
 //taking input


    $username = $_POST['Username'];
    $password = $_POST['password'];
    if( $username==null or $password==null)
    {
      echo"enter credentials";
   }
   else
   {         $sql="select u.id,u.password,u.username,p.ptype  from users u 
                  join person p on p.id=u.id
                  where username='$username' AND password='$password'";
             $result   = mysql_fetch_array((mysql_query($sql)));
            $no_rows= mysql_num_rows(mysql_query($sql));
            $studentId=$result["id"];
            if ($no_rows==1) {
          
             $_SESSION['message']="you are now logged";
            $_SESSION['username']=$username;
            if($result["ptype"]==Student)
               header("location:studentHome.php?id=\"".$studentId."\"");
             else if($result["ptype"]==Faculty)
               header("location:Home.php?id=\"".$studentId."\"");
            }

                  else
                  {
                    echo"enter credentials";
                  }
      
  
            $message = "Signup Sucessfully!!";
        
}
 }
   ?>

<!doctype html>
<html>
<head>

<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="Login.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>

 <style type="text/css">
     a { color:black;
     margin-left:80px;
      }
      a:hover{
        text-decoration: underline;
        color:white;
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
</style>
  <script src="index.js"></script>
</head>
<body>
  <div class="content">
    <div class=headgroup>
    <h2>Login</h2>
  </div>

  <form  method="post"  action="login.php">

  
   
    <div class="group">
      <input type="text" id="username" name="Username"><span class="highlight"></span><span class="bar"></span>
      <label>Username</label>
    </div>
    <div class="group">
      <input type="password"  id="password", name="password"><span class="highlight"></span><span class="bar"></span>
      <label>Password</label>
    </div>
  <div>
      <!--<p><input type="submit"  name="login_btn" value="Login"  /></p> -->
      <button type="submit"  name="login_btn" class="button buttonBlue">Login</button>
      <!-- <div class ="ripples buttonRipples"><span class="ripplesCircles"></span></div>
      </div> -->
<a class="button buttonBlue" href="Signup.php" style="font-size:1.7em;color: white !important;">Sign Up </a>
</div>


  </form>
</body>
</html>

 