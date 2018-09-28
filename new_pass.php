<?php require "db_connection.php"; ?>
<?php require "functions.php"; ?>
<?php
        session_start();
    if(empty($_SESSION['string']))
    {
    	die('String used already');
    }
    else
    {    	 
$url_string = $_GET['recover'];
$our_string = $_SESSION['string'];
$id = $_SESSION['id'];
if($url_string !== $our_string)
{
	die("Update link has issue");
}
    }
  
//print_r($url_string);echo"<br>";print_r($our_string);echo"<br>";print_r($id);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
</head>
<body>
<form method="post" action="">
<label>
	New Password
</label>
<input type="password" name="password" placeholder="*******">
<br /><br />
<label>
	Confirm Password
</label>
<input type="password" name="confirm_password" placeholder="*******">
<br /><br />
<input type="submit" name="update" value="Change Password">
</form>
</body>
</html>
<?php

if(isset($_POST['update']))
{
	$password = clear($_POST['password']);
	$confirm_password = clear($_POST['confirm_password']);
	if(strlen($password) < 6)
	{
		die("Password must be 6 character long");
	}
	elseif($password !== $confirm_password)
	{
		die("Password Not Match");
	}
	else
	{
		$password = md5($password);
		$password = sha1($password);
		$query = "UPDATE users SET user_password = '$password', user_token = null ";
		$query .= "WHERE user_id = '$id'";
		$run = mysqli_query($conn,$query);
		if($run)
		{
			echo "<script>
			alert('Password Update Successfully');
			window.location.href='login.php';
			</script>";

			session_destroy();
		}
		else
		{
			die('Password Update Failed').mysqli_error($conn);
		}
	}
}

?>