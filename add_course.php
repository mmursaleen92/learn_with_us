<?php require "db_connection.php"; ?>
<?php require "functions.php"; ?>
<?php  $id = $_GET['add']; 
   $query = "SELECT user_name FROM users WHERE user_id = '$id'";
   $run = mysqli_query($conn,$query);
   $row = mysqli_fetch_assoc($run);
   $teacher_name = $row['user_name'];
      ?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Course</title>
</head>
<body>
<form method="post" action="">
	<input type="text" name="course"> 
	<input type="submit" name="add" value="Add Course">
</form>
</body>
</html>
  <?php 
    if(isset($_POST['add']))
    {
    	$course = clear($_POST['course']);
    	if(empty($course))
    	{
    		die("You don't added any Course");
    	}
    	else
    	{
    		$query_1 = "INSERT INTO courses(user_id,course_name,course_teacher) ";
    		$query_1 .="VALUES ('$id','$course','$teacher_name')";
    		$run_1 = mysqli_query($conn,$query_1);    		
    		if($run_1)
    		{
    			echo "<script>
    			alert('Course added Successfully');
                window.location.href='welcome_teacher.php?id=$id';
    			     </script>";
    			     // $query_2 = "SELECT course_id FROM courses WHERE course_name = '$course' AND course_teacher = '$teacher_name'";
    // $run_2 = mysqli_query($conn,$query_2);
    // $row_2 = mysqli_fetch_assoc($run_2);
    // $course_id = $row_2['course_id'];
    //print_r($course_id);exit;
    // $query_3 = "INSERT INTO user_course(user_id,course_id) VALUES ('$id','$course_id')";
    // $run_3 = mysqli_query($conn,$query_3);
    		}

    	}
    }
    ?>
    <?php
    mysqli_close($conn);
    ?>