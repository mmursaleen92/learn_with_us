<?php require"db_connection.php" ?>
<?php
    session_start();
   if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['id'])){
   //	header("Location:welcome.php");
  // 	print_r($_SESSION['email']);exit;
   	$role = $_SESSION['role'];
   //	print_r($role);exit;
   	
   	$id = $_SESSION['id'];
  // 	print_r($id);exit;
   	switch($role)
   	{
   		case 'Teacher':
   		header("Location:welcome_teacher.php?id=$id");
   		break;
   		case 'Student':
   		header("Location:welcome_student.php?id=$id");
   		break;
   		// default:
   		// header("Location:login.php");
   		// break;
   	}
   }
  // else
  //  {
  //  //	header("Location:login.php");
  // // 	exit;
  //  }
   // else
   // {
   // 	header("Location:login.php");
   // 	exit;
   // }
?>


<!DOCTYPE html>
<html>
<head>
	<title>LogIn</title>
</head>
<body>
<form method="post" action="login_handler.php">
	<label>
		Email : 
	</label>
	<input type="email" name="email" placeholder="example@gmail.com"><br /> <br />
	<label>
		Password : 
	</label>
	<input type="password" name="password" placeholder="*******"> <br /><br />
	<input type="submit" name="login" value="LogIn">
</form><a href="forgot_pass.php"><button>Forgot Password</button></a><br />
<a href="signup.php"><button>SignUp</button></a>
</body>
</html>