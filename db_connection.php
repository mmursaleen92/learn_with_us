<?php

define('host','localhost');
define('user','root');
define('password','');
define('db','learn_with_us');

  $conn = mysqli_connect(host,user,password,db) or die(mysqli_error());
  // if($conn)
  // {
  // 	echo 'Connection Establish';
  // }
  // else
  // {
  // 	echo 'Error';
  // }

?>