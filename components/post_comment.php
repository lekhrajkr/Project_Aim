<?php
		session_start();
		 require '../_database/database.php';
		$post_id=$_POST['post_id'];
		$user_name=$_POST['user_name'];
		$first_name=$_POST['first_name'];
		$post_comment=$_POST['post_comment'];
		$post_content=$_POST['post_content'];
        $sql="INSERT INTO post_comment ( post_id, first_name, post_content, user_name, comment, comment_time) VALUES ( '$post_id', '$first_name', '$post_content', '$user_name', '$post_comment', CURRENT_TIMESTAMP);";
       
                mysqli_query($database,$sql)or die(mysqli_error($database));
                header("location:../post.php?post_user=$user_name&post_id=$post_id&post_content=$post_content&status=success");
            
			
			?>
