<?php 
  // if(isset($_POST['register']))
  // {
  // 	$name = $_POST['name'];
  // 	$email = $_POST['email'];

  // }
session_start();
   if(isset($_SESSION['email']) && isset($_SESSION['role']) && isset($_SESSION['id'])){
  
    $role = $_SESSION['role'];
   
    
    $id = $_SESSION['id'];
  
    switch($role)
    {
      case 'Teacher':
      header("Location:welcome_teacher.php?id=$id");
      break;
      case 'Student':
      header("Location:welcome_student.php?id=$id");
      break;
      
    }
   }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>
       <form method="post" action="signup_handler.php">
       	<label>
       		Name :
       	</label>
       	<input type="text" name="name" placeholder="Your Name" value="<?php if(isset($_POST['register'])) echo $_POST['name']; ?>"><br /><br />
       	<label>
       		Email :
       	</label>
       	<input type="email" name="email" placeholder="example@gmail.com" value="<?php if(isset($_POST['register'])) echo $_POST['email']; ?>"><br /><br />
       	<label>
       		Password : 
       	</label>
       	<input type="password" name="password" placeholder="*******"><br /><br />
       	<label>
       	Confirm	Password : 
       	</label>
       	<input type="password" name="confirm_password" placeholder="*******"><br /><br />
       	<label>
       		Gender :
       	</label>
       	<input type="radio" name="gender" value="male">Male <input type="radio" name="gender" value="female">Female <br /><br />
       	<label>
       		Role : 
       	</label>
       	<select name="role">
       		<option>Student</option>
       		<option>Teacher</option>
       	</select><br /><br />
       	<input type="submit" name="register" value="Register">
       </form>
</body>
</html>