<?php
    session_start();
    include '../../_database/database.php';
	
	function step2 ()
	{
		include '../../_database/database.php';
        $email=$_POST["email"];
		$gender=$_POST["gender"];
		$dob=$_POST["dob"];
        $first_name=$_POST["first_name"];
        $last_name=$_POST["last_name"];
        $password=$_POST["password"];
		if($gender == "Male"){
			$pro_pic="Male.jpg";
		}
		else if($gender == "Female"){
			$pro_pic="Female.jpg";
		}
        $sql="INSERT INTO user_details(first_name,last_name,email,password,join_date,pro_pic,gender,dob) VALUES('$first_name','$last_name','$email','$password',CURRENT_TIMESTAMP,'$pro_pic','$gender','$dob')";
		mysqli_query($database,$sql) or die(mysqli_error($database));
        $_SESSION['email'] = $email;
        header('Location:../../step2_form.php?ref=signup&status=success&id='.$email);
    }
	if(isset($_POST["signup_button"]))
	$password=$_POST["password"];
	$password2=$_POST["password2"];
	if( $password = $password2 )
	{
	header("location:../../register.php?redirect=hompage&request=password&status=error#PasswordError");
	}
	else
	{
		step2();
	}
?>
