 <?php 
    ini_set("display_errors",1);
    if(isset($_POST)){
		 session_start();
    $temp=$_SESSION['email'];
        require '../_database/database.php';
        $Destination = '../_userfiles/posts';
        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= "sorry.jpg";
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            
            
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
		$ppic=$_POST['p'];
		$f_name=$_POST['f'];
		$u_name=$_POST['l'];
		$post_status=$_POST['post_status'];
        $sql5="INSERT INTO user_post ( pro_pic, email, post_image, first_name, user_name, post_status, post_time) VALUES ( '$ppic', '$temp', '$NewImageName', '$f_name', '$u_name', '$post_status', CURRENT_TIMESTAMP);";
       
                mysqli_query($database,$sql5)or die(mysqli_error($database));
                header("location:../index.php?status=Success");
            
        } 
  
  ?>
