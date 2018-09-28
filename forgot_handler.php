<?php require "db_connection.php" ?>
<?php require "functions.php" ?>
<?php 
    if(isset($_POST['recover']))
    {
    	$email = clear($_POST['email']);
    	if(empty($email))
    	{
    		die("E-mail Not Entered");
    	}
    	else
    	{
    		$query = "SELECT user_id,user_email FROM users WHERE user_email = '$email'";
    		$run = mysqli_query($conn,$query);
    		$row = mysqli_fetch_assoc($run);
    		if($row)
    		{
                $random = random_string(50);
                session_start();
                $_SESSION['string'] = $random;
                $_SESSION['id'] = $row['user_id'];
                $to = $email;
            $subject = 'Recover Your Password';
            $sender = 'mmursaleen92@gmail.com';
         
            $message = "<b>Here is Recover Link</b>";
            $message .= "<h1><a href='localhost/learn_with_us/new_pass.php?recover=$random'>Recover Password</a></h1>";
         
            $header = "From:$sender; \r\n";
            $header .= "Cc:$email \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
            $query = "UPDATE users SET user_token = '$random' WHERE user_email = '$email'";
            $run = mysqli_query($conn,$query);
         }else {
            echo "Message could not be sent...";
         }
    		}
    		else
    		{
    			die("Email Not Exist");
    		}
    	}
    }
?>