<?php require "db_connection.php" ?>
<?php 
      $edit = $_GET['edit'] ;
      // print_r($edit);exit;
      ?>
      <!DOCTYPE html>
      <html>
      <head>
      	<title>Update Your Account</title>
      </head>
      <body>
      <form method="post" action="update_handler.php" enctype="multipart/form-data"> 
      <?php 
         $query = "SELECT * FROM users WHERE user_id = '$edit'";

        // print_r($query);exit;
         $run = mysqli_query($conn,$query);
        // print_r($run);exit;
         $row = mysqli_fetch_assoc($run);
         session_start();
         $_SESSION['id'] = $row['user_id'];
         $_SESSION['role'] = $row['user_role'];
         $name = $row['user_name'];
         $image = $row['user_image'];
         $role = $row['user_role'];
        // print_r($name);exit;

         ?>
      	<label>
      		Name :
      	</label>
      	<input type="text" name="name" value="<?php echo $name; ?>"><br /><br />
      	<img src="images/<?php echo $image; ?>" height="100" width="100"><br /><br />
      	<label>
      		Change Image : 
      	</label>
      	<input type="file" name="image" ><br />
      	<input type="submit" name="update" value="Update Account">
      </form>
      </body>
      </html>
      <?php mysqli_close($conn); ?>