<?php require "db_connection.php" ?>
<?php session_start();
  $id = $_SESSION['id'];
  $role = $_SESSION['user_role'];
       if(isset($_POST['delete']))
     {
     	$delete_course = $_POST['delete_course'];
 
     		if($role == 'Teacher')
     		{
     			$query = "DELETE FROM courses WHERE course_name = '$delete_course'";
     			$run = mysqli_query($conn,$query);
     			if($run)
     			{
     				echo "<script>
     		alert('DELETE SUCCESS');
     		window.location.href='welcome_teacher.php?id=$id';
     		</script>"; 
     			}
     			else
     		{
     			echo 'Query Failed '.mysqli_error($conn);
     		}
     		    			
     		}
     		elseif($role == 'Student')
     		{
     			$take = "SELECT course_id FROM courses WHERE course_name = '$delete_course'";
     			$take_run = mysqli_query($conn,$take);
     			$r = mysqli_fetch_assoc($take_run);
     			$course_id = $r['course_id'];
     			$temp = "DELETE FROM user_course WHERE course_id = '$course_id' AND user_id = '$id'";
     	$temp_del = mysqli_query($conn,$temp);   	
     	   if($temp_del)
     	   {
     	   	echo "<script>
     	   
     		alert('DELETE SUCCESS');
     		window.location.href='welcome_student.php?id=$id';
     		</script>";
     	   }
     	   else
     		{
     			echo 'Query Failed '.mysqli_error($conn);
     		}
     			
     		}
     		else
     		{
     			echo 'Query Failed '.mysqli_error($conn);
     		}
     		
     	
     	
     }
  ?>