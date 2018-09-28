<?php require "db_connection.php"; ?>
<?php 
  session_start();
  session_destroy();
  header("Location:login.php");
  ?>