<?php require "db_connection.php" ?>
<?php 
     $id = $_GET['id'];
     // print_r($id);exit;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
<center><h1>Welcome</h1></center>
<table border="1" width="100%" align="center">
	<thead>
		<th>Name</th>
		<th>Image</th>
		<th>Update Acc.</th>
		<th>Add Course</th>
		<th>Your Courses</th>	
		<!-- <th></th>	 -->
		<th>Delete Course</th>
		<th>LogOut</th>
	</thead>
	<tbody border="1" width="100%" align="center">
	<?php 
	   $query = "SELECT * FROM users WHERE user_id = '$id'";
	   $run = mysqli_query($conn,$query);
	   $row = mysqli_fetch_assoc($run);
	   $count = count($row);
	 //  $course = 0;
	   if($count > 0)
	   {
          	$name = $row['user_name'];
          //	print_r($name);exit;
          	$image = $row['user_image'];
          	$course = '';
          		   	    
	   		?>
	   		<td><?php echo $name; ?></td>
	   		<td><img src="images/<?php echo $image ?>" height="100" width="100"></td>
	   		<td><a href="update_acc.php?edit=<?php echo $id; ?>"><button>Update</button></a></td>
	   		<td><a href="add_course.php?add=<?php echo $id; ?>"><button>Add Course</button></a></td>
	   		<?php 
	   		// print_r($name);exit;
	   		$query_1 = "SELECT course_name FROM courses WHERE user_id = '$id'";
	   		$result = mysqli_query($conn,$query_1);
	   		if($result)
	   		{	   			
	   			echo "<td>";
	   			while($row = mysqli_fetch_assoc($result))
	   			 {
	   			 	$course = $row['course_name'];
	   			 	
	   			 		echo "$course <br />";
	   			 }
	   			echo "</td>";
	   			   		
	   		}
	   		else
	   		{
	   			echo 'False'.mysqli_error($conn);
	   		}
	   		?>
	   			   		<td><a href="delete_course.php?delete=<?php echo $id; ?>"><button>Delete</button></td> 
	   		                              <?php //mysqli_close($conn); ?> 
	   		                              <td><a href="logout.php"><button>LogOut</button></a></td>
	</tbody>
	   		
	<?php    	}
	   	else
	   	{
	   		die("Something Wrong Happen!");
	   	}

	   	?>
	  
</table>
<br /><br />
<center><h1>Register Student</h1></center>
<table align="center" border="1" width="100%">

	<thead>
	<th>Name</th>
	<th>Course</th>
	</thead>
	<tbody align="center" border="1" width="100%">
		<td>
			<?php
			// echo $id;
			$sql = "SELECT user_course.user_id,user_course.course_id,users.user_id,users.user_name,courses.course_id,courses.course_name,courses.course_teacher FROM user_course INNER JOIN courses ON user_course.course_id = courses.course_id INNER JOIN users ON user_course.user_id = users.user_id WHERE courses.user_id = '$id' AND users.user_name != '$name'";
			$result = mysqli_query($conn,$sql);
		//	$count = count($result);
			// if($count > 0)
			// {
				while($array = mysqli_fetch_assoc($result))
				{


				
					$name_1 = $array['user_name'];
					echo "$name_1";
					echo "<br />";
					}
				
			// }
			// else
			// {
			// 	echo 'Error'.mysqli_error($conn);
			// }

			?>
		</td>
		<td>
		<?php
		$sql = "SELECT user_course.user_id,user_course.course_id,users.user_id,users.user_name,courses.course_id,courses.course_name,courses.course_teacher FROM user_course INNER JOIN courses ON user_course.course_id = courses.course_id INNER JOIN users ON user_course.user_id = users.user_id WHERE courses.user_id = '$id' AND users.user_name != '$name'";
			$result = mysqli_query($conn,$sql);
		//	$count = count($result);
			// if($count > 0)
			// {
				while($array = mysqli_fetch_assoc($result))
				{


				
					$course_n = $array['course_name'];
					echo "$course_n";
					echo "<br />";
					}
				
			// }
			// else
			// {
			// 	echo 'Error'.mysqli_error($conn);
			// }

			?>

		</td>
	</tbody>
</table>
</body>
</html>