<?php
session_start();
		require '../_database/database.php';
        $username=  $_POST['email'];
        $password=  $_POST['password'];
        $sql="SELECT email,password FROM user_details WHERE email='$username'AND password='$password'";
        $result=mysqli_query($database,$sql) or die(mysqli_errno());
        $trws= mysqli_num_rows($result);
			if($result->num_rows > 0 ) { 
			$rws=  mysqli_fetch_array($result);
            $_SESSION['email']=$rws['email'];
            $_SESSION['password']=$rws['password'];
			header("location:../index.php?user=$username&request=login&status=success"); 
			} 
			else {
                header("location:../login.php?redirect=homepage&request=login&status=failed#NoAcc");
			}
?>
