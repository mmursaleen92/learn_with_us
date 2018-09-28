<?php require "db_connection.php" ?>
<?php require "functions.php" ?>
<?php 
    session_start();
    $id = $_SESSION['id'];
    $role = $_SESSION['role'];
     if(isset($_POST['update']))
     {
     	$name = clear($_POST['name']);
     	$image = $_FILES['image']['name'];
     	$image = strtolower($image);
     	$image = str_replace(" ","_",$image);
     	$image_loc = $_FILES['image']['tmp_name'];
     	if(empty($image))
     	{
     		$query = "UPDATE users SET user_name = '$name' ";
     		$query .="WHERE user_id = '$id'";
     		$run = mysqli_query($conn,$query);
     		if($run)
     		{
     			echo "<script>
     			alert('Update Successfully...!');
     			   </script>";
     			   switch($role)
     			   {
     			   	case 'Teacher':
     			   	header("Location:welcome_teacher.php?id=$id");
     			   	break;
     			   	case 'Student':
     			   	header("Location:welcome_student.php?id=$id");
     			   	break;
     			   	default:
     			   	header("Location:login.php");
     			   }
     		}
     		else
     		{
     			echo 'Update Query Failed with Image';
     		}
     	}
     	elseif(!empty($image))
     	{   
     		if(move_uploaded_file($image_loc,"images/$image"))
     	{
     		$query = "UPDATE users SET user_name = '$name',";
     		$query .=" user_image = '$image' WHERE user_id = '$id'";
     		$run = mysqli_query($conn,$query);
     		if($run)
     		{
     			echo "<script>
     			      alert('Update Successfully...');
     			      </script>";
     			      switch($role)
     			   {
     			   	case 'Teacher':
     			   	header("Location:welcome_teacher.php?id=$id");
     			   	break;
     			   	case 'Student':
     			   	header("Location:welcome_student.php?id=$id");
     			   	break;
     			   	default:
     			   	header("Location:login.php");
     			   }
     		}
     		else
     		{
     			echo 'Update Query Failed With Image';
     		}
     		
     	}
     	else
     	{
     		echo 'Image Upload Failed Check Your Image Size';
     	}
     }
     else
     		{
     			echo 'Update Query Failed Image has Issue'.mysqli_error($conn);
     		}
     	}