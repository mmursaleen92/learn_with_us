<?php require "db_connection.php" ?>

<?php 
     // if(isset($_SESSION['email']))
     // {
      	$id = $_GET['id'];
     	
     // }
     // else
     // {
     // 	header("Location:login.php");
     // // print_r($id);exit;
     // }
     
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
		<th>Take Course</th>
		<!-- <th>Your Courses</th> -->
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
          	$image = $row['user_image'];
          	
          		   	    
	   		?>
	   		<td><?php echo $name; ?></td>
	   		<td><img src="images/<?php echo $image ?>" height="100" width="100"></td>
	   		<td><a href="update_acc.php?edit=<?php echo $id; ?>"><button>Update</button></a></td>
	   		<td><a href="take_course.php?id=<?php echo $id; ?>"><button>Take Course</button></a></td>
	   		<!-- <td></td> -->
	   		<?php 
	   		  // $query_1 = "SELECT user_course.user_id,user_course.course_id,courses.course_name,courses.course_teacher FROM user_course INNER JOIN courses ON user_course.course_id = courses.course_id WHERE user_course.user_id = '$id'";  
	   		  // $run_1 = mysqli_query($conn,$query_1);
	   		  // echo "<td>";
	   		  // while($row_2 = mysqli_fetch_array($run_1))
	   		  // {
	   		  // 	$course = $row_2['course_name'];
	   		  // 	$name = $row_2['course_teacher'];
	   		  // 	echo $course."<b> Instructor Name </b>".$name;
	   		  // 	echo "<br />";
	   		  // }
	   		  // echo "</td>";

	   		?>
	   		<td><a href="delete_course.php?delete=<?php echo $id; ?>"><button>Delete</button></td> 
	   		                              <?php // mysqli_close($conn); ?> 
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
<center><h1>Registered Course</h1></center>
 <table align="center" border="1" width="100%">

	<thead>
	<th>Course Name</th>
	<th>instructor Name</th>
	</thead>
	<tbody align="center" border="1" width="100%">
		
			<?php 
	   		   $query_1 = "SELECT user_course.user_id,user_course.course_id,courses.course_name,courses.course_teacher FROM user_course INNER JOIN courses ON user_course.course_id = courses.course_id WHERE user_course.user_id = '$id'";  
	   		  $run_1 = mysqli_query($conn,$query_1);
	   		  echo "<td>";
	   		  while($row_2 = mysqli_fetch_array($run_1))
	   		  {
	   		  	$course = $row_2['course_name'];
	   		  	// $name = $row_2['course_teacher'];
	   		  	echo $course;
	   		  	echo "<br />";
	   		  }
	   		  echo "</td>";

	   		?>
		
		
		<?php 
	   		   $query_1 = "SELECT user_course.user_id,user_course.course_id,courses.course_name,courses.course_teacher FROM user_course INNER JOIN courses ON user_course.course_id = courses.course_id WHERE user_course.user_id = '$id'";  
	   		  $run_1 = mysqli_query($conn,$query_1);
	   		  echo "<td>";
	   		  while($row_2 = mysqli_fetch_array($run_1))
	   		  {
	   		  	// $course = $row_2['course_name'];
	   		  	 $name = $row_2['course_teacher'];
	   		  	echo $name;
	   		  	echo "<br />";
	   		  }
	   		  echo "</td>";

	   		?>
	</tbody>
</table> 

</body>
</html>
