<?php
session_start();
require '_database/database.php';
if(isset($_SESSION['email'])){
$temp=$_SESSION['email'];
$sql = "SELECT * from user_details where email='$temp'";
$result = $database->query($sql);
$row = $result->fetch_assoc();
require '_database/database.php';
require 'lib/head-index.php';  
require 'lib/nav-session-index.php';
require 'dist/forms/step2_form.php';
	if(isset($_POST["submit"])){
	ini_set("display_errors",1);
    $temp=$_SESSION['email'];
    
        require '/_database/database.php';
        $Destination = '_userfiles/profile';
        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= $row['pro_pic'];
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            $RandomNum   = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        $sql5="UPDATE user_details SET pro_pic='$NewImageName' WHERE email = '$temp'";
        $sql6="INSERT INTO user_details (pro_pic) VALUES ('$NewImageName') WHERE email = '$temp'";
        $result = mysqli_query($database,"SELECT * FROM user_details WHERE email = '$temp'");
    		if( mysqli_num_rows($result) > 0) {
            if(!empty($_FILES['ImageFile']['name'])){
                mysqli_query($database,$sql5)or die(mysqli_error($database));
                
            }	
        }
			 
        else {
            mysqli_query($database,$sql6)or die(mysqli_error($database));
            
        }  
        $country=$_REQUEST['country'];
        $state=$_REQUEST['state'];
        $mobile=$_REQUEST['mobile'];
        $user_name=$_REQUEST['user_name'];
        $sql3="UPDATE user_details SET country='$country',state='$state',mobile='$mobile',user_name='$user_name' WHERE email = '$temp'";
            mysqli_query($database,$sql3)or die(mysqli_error($database));
            header("location:index.php?user_email=$temp&request=profile-update&status=success");
     
}  

}

?>
