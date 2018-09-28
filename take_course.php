<?php require "db_connection.php"; ?>
<?php require "functions.php"; ?>
<?php $id = $_GET['id']; ?>
<?php 
     
     // $check = "SELECT user_course.user_id,user_course.course_id,courses.course_id,courses.course_name FROM user_course INNER JOIN courses ON user_course.user_id = '$id' AND user_course.course_id = courses.course_id";
    
      
     //  $run_check = mysqli_query($conn,$check);
     ?>
     <form method="post" action="">
     <label>Chose Course</label>
      <select name="course_name">
     
   <?php  
   // display only not selected Course
        $query = "SELECT * FROM courses WHERE courses.course_id NOT IN ( SELECT user_course.course_id FROM user_course INNER JOIN courses ON user_course.course_id = courses.course_id where user_course.user_id = '$id')";
        $run = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($run))
        {
            $course = $row['course_name'];
            echo "<option>$course</option>";
        }

   // $teacher = "Select users.user_id from users where user_role = 'Teacher'";
   // $users = "select users.user_id from users where user_role = 'Student'";
   // $course_belongs_to_teacher = "select courses.course_id as Course, courses.user_id as Teacher_id from courses";
   // $course_belongs_to_user = "select courses.course_id from courses,users where user_course.user_id = '$users'";
       // $check = "SELECT course_id FROM user_course WHERE user_id = '$id'";
       // $run_check = mysqli_query($conn,$check);

       
       // while($result = mysqli_fetch_assoc($run_check))
       // {
       //  $course_id = $result['course_id'];
       //  echo "$course_id <br />";
       //    $query = "SELECT course_name,course_id FROM courses WHERE course_id !='$course_id'";
       //    $run = mysqli_query($conn,$query);
       //   while($row = mysqli_fetch_assoc($run))
       //   {
       //      $course = $row['course_name'];
       //      $course_id = $row['course_id'];
       //      echo "<option>$course_id <br> $course </option>";
       //    }

          

       // }exit;

   
     
       //     while($row = mysqli_fetch_assoc($run))
       //  {          
       //      $course = $row['course_name'];
       //      echo "<option>$course</option>";
       //  // $check = "SELECT user_course.user_id,user_course.course_id,courses.course_id,courses.course_name ,courses.course_id FROM user_course INNER JOIN courses ON user_course.user_id != courses.course_id AND user_course.user_id = '$id' AND user_course.course_id = courses.course_id"; 
       //  //        $run_check = mysqli_query($conn,$check);
       //   //  echo "1 $course <br>";
       //    //   while($check_row = mysqli_fetch_assoc($run_check))
       //    // {
          

       //    //    $check_name = $check_row['course_name']; 
      
       //    // //  echo "2 $check_name <br>"; 
       //    //     if($course == $check_name)
       //    //     {
       //    //       echo "3 $course<br>";
               

                
       //        } 
              
        // } 

        
      
           // } 
             // exit;
     ?>
    </select>
    <input type="submit" name="take" value="Take Course">
    </form>
    <?php 
       if(isset($_POST['take']))
    {
    	$course = clear($_POST['course_name']);
    	// print_r($course);exit;
    	$query = "SELECT course_id FROM courses WHERE course_name = '$course'";
    	$run = mysqli_query($conn,$query);
    	$row = mysqli_fetch_assoc($run);
    	$course_id = $row['course_id'];
    	$query_1 = "INSERT INTO user_course(user_id,course_id) VALUES ('$id','$course_id')";
    	$run_1 = mysqli_query($conn,$query_1);
    	if($run_1)
    	{
    		echo "<script>
            alert('Course added to your list');
            window.location.href='welcome_student.php?id=$id';
            </script>";
           // header("Location:welcome_student.php?id=$id");
    	}
    	else
    	{
    		echo "Error ".mysqli_error($conn);
    	}
       }
    ?>