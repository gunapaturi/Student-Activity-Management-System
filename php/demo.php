<?php

  session_start();
 
   
?>

<!DOCTYPE html>
<html>
<body>
<meta charset="UTF-8">
 <script src="index.js"></script>
 <style type="text/css">
    div.your-wrapper a { color:blue; }
</style>


<form method="POST">
<div><p>"welcome <?php echo $_SESSION['username']; ?> </p></div>
<div class="your-wrapper">
    <a href="logout.php">Logout</a>
    
</div>

</form>
</body>
</html>



