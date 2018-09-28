<?php include "db_connection.php" ?>
<?php include "functions.php" ?>
<?php
       if(isset($_POST['email']))
          {

   	$email = clear($_POST['email']);
   	$password = clear($_POST['password']);
   	if(empty($email) || empty($password)) // check for empty field
   	{ 
   		echo 'Please Enter E-mail or Password';
   	}
   	else // if everythin all right run query to get user data
   	{
   		$password = md5($password);
   		$password = sha1($password);
   		$query = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";
   		$run = mysqli_query($conn,$query);
   		// print_r($query);break;
   		$row = mysqli_fetch_assoc($run);
   		$count = count($row);
   		if(!empty($row))
   		{
   			session_start();
            // $_SESSION['email'] = $row['user_email'];
           // $_SESSION['role'] = $role;
           
   			$id = $row['user_id'];
   			// $email = $row['user_email'];
            $_SESSION['email'] = $row['user_email'];
   			$_SESSION['role'] = $row['user_role'];
             $_SESSION['id'] = $id;
           // print_r($_SESSION['role']);exit;
          //  $_SESSION['user_info'] = $row;
   			switch($_SESSION['role']) // if user_exist take action according to user_role
   			{
   				case 'Teacher':
   				header("Location:welcome_teacher.php?id=$id");
   				break;
   				case 'Student':
   				header("Location:welcome_student.php?id=$id");
   				break;
   				default:
   				header("Location:login.php");
   				break;
   			}
   		}
   		else
   		{
   			echo 'Incorrect E-mail or Password';
   		}

   	}
   }

?>