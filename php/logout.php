<?php
session_start();
session_destroy();
unset($_SESSION['username']);
$_SESSION[message]="you are logged out";
header("location:login.php")

?>