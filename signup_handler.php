<?php include "db_connection.php" ?>
<?php include "functions.php" ?>
<?php 
      if(isset($_POST['register'])) // take form data and clear it
      {
      	$name = clear($_POST['name']);
       	$email = clear($_POST['email']);
       	$password = clear($_POST['password']);
       	$confirm_password = clear($_POST['confirm_password']);
       	$gender = clear($_POST['gender']);
       	$role = clear($_POST['role']);
       	if(empty($name) || empty($email) || empty($password) || empty($confirm_password) || empty($gender) || empty($role)) // check form field are empty
       	{
       		die('Form data did not fill Correctly');
       	}
       	else // if not empty data 
       	{
       	if($password !== $confirm_password) // verify password are same
       	{
       		die("Password did not Match");
       	}
       	elseif(strlen($password) < 6) // if password strength less
       	{
       		die('Password Must be 6 Character Long');
       	}
       	else  // if everythin ok encrypt password and insert into Database
       	{
       		$password = md5($password);
       		$password = sha1($password);
       		$query = "INSERT INTO users (user_name,user_email,user_password,user_gender,user_role,user_time) ";
       		$query .= "VALUES ('$name','$email','$password','$gender','$role',now())";
       		$run = mysqli_query($conn,$query);
       		if($run) // check query working
       		{
       			echo "<script>
       			alert('Registration Successfully');
       			window.location.href='login.php';
       						   </script>";
       			     	  
       		}
       		else // if query fail to run
       		{
       			echo 'Query Failed '.mysqli_error($conn);
       		}
       	}
       }
      }
?>      