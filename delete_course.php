<?php require "db_connection.php" ?>
<?php $id = $_GET['delete']; 
    // print_r($id);exit;
    $temp = "SELECT user_role FROM users WHERE user_id = '$id'";
    $r = mysqli_query($conn,$temp);
    $result = mysqli_fetch_assoc($r);
    $user_role = $result['user_role'];
   // print_r($user_role);exit;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Course</title>
</head>
<body>
<form method="post" action="delete_handler.php">
     <label>
     	Your Courses :
     </label>
	<select name="delete_course">
	<?php
	switch($user_role){
		case 'Student':
		$query = "SELECT user_course.user_id,user_course.course_id,courses.course_name,courses.course_teacher FROM user_course INNER JOIN courses ON user_course.course_id = courses.course_id WHERE user_course.user_id = '$id'";
		break;
		case 'Teacher':
		$query = "SELECT course_name,course_id FROM courses WHERE user_id = '$id'";
		break;
	}
	
	session_start();
	$_SESSION['id'] = $id; 
	$_SESSION['course_id'] = $course_id;
	$_SESSION['user_role'] = $user_role;
	$run = mysqli_query($conn,$query);

	while($row = mysqli_fetch_array($run))
	{
		$course = $row['course_name'];
	

	?>
		<option><?php echo $course; ?></option>
		<?php } ?>
	</select>
	<input type="submit" name="delete" value="Delete Course">
</form>
</body>
</html>