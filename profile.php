<?php

require '_database/database.php';
require 'lib/head-index.php';  
session_start();
if(isset($_SESSION['email']))
{      
$email=$_SESSION['email'];
$sql = "SELECT * from user_details where email='$email'";
$result = $database->query($sql);
$row = $result->fetch_assoc();
$email=$_SESSION['email'];
require 'lib/nav-session-continue.php'; 
?>
<div class="container">
<div class="row ">
  
  <div class="col-md-9 col-md-push-3 ">
  <div class="back pad10 pad15">
  <div class="pull-right">
  <br><span class="glyphicon glyphicon-pencil"></span><b><a href="settings.php?user=<?php echo $row['user_name'] ?>&id=<?php echo $row['id'] ?>#edit">Edit your profile</a></b>
  </div>
  <h2><?php echo $row['first_name']; echo $row['last_name']; ?></h2><br>
  </div>
  <div class="back pad10 pad15">
  <p><b>Post your photos here...</b></p>
  <form class="form" action="components/post.php" method="post" enctype="multipart/form-data" id="UploadForm">
  <input type="hidden" name="f" value="<?php echo $row ['first_name'];?>">
  <input type="hidden" name="l" value="<?php echo $row ['user_name'];?>">
  <input type="hidden" name="p" value="<?php echo $row ['pro_pic'];?>">
  <input type="hidden" name="e" value="<?php echo $_SESSION['email'];?>">
  
  <b>About photo</b></p>
  <textarea placeholder="Describe about your photo..." class="form-control" rows="3" name="post_status" required></textarea>
  <br><input name="ImageFile" type="file" id="uploadFile" required><div  style="padding-top:1em;"><input type="submit" name="submit" value="Post" class="btn  btn-primary">
  </div>
  </div>
  
  <?php
require	'_database/database.php';
$u_n=$row['user_name'];
$sql = "SELECT pro_pic, post_image, id, first_name, user_name, post_status, post_time FROM user_post WHERE user_name='$u_n'";
$result = $database->query($sql);
$row2 = $result->fetch_assoc();
?>
<div class="pad10 row back  pad15">
  <legeld><b>Your posts</b></legend><hr><?php
if ($result->num_rows > 0) {
     // output data of each row
     while($row2 = $result->fetch_assoc()) {
         
		 ?>
		 <div class="back col-md-4">
		 <div class="text-info row">
		 <h3><a class="col-md-1" href="profile.php?user=<?php echo $row2['user_name'];?>&post_id=<?php echo $row['id']; ?>"><?php echo $row['first_name']; ?></a></h3></div>
		 <small><h3>
		 <?php echo $row2['post_status']; ?>
		 </small></h4><div class="thumbnail">
		 <a href="post.php?post_id=<?php echo $row2['id'];?>?post_user=<?php echo $row2['user_name'];?>&post_content=<?php echo $row2['post_image'];?>&content=display#largescreen" class="thumbnail"><img src="_userfiles/posts/<?php echo $row2['post_image'];?>"></img></a>
		 </div>
		 <p><?php echo $row2['post_time']; ?></p>
		 </div>
		 
		 <?php
     }
} else {
     echo "0 results";
}

$database->close();
?>  
  </div>
  </div>
  <div class="col-md-3 col-md-pull-9">
  <div class="thumbnail pad10">
  <img class="img-circle" src="_userfiles/profile/<?php echo $row['pro_pic'];?>"></img>
  </div>
  <div class="back pad10 pad15">
  <b><a class="pull-right" href="settings.php?user=<?php echo $row['user_name'] ?>&id=<?php echo $row['id'] ?>#edit">Edit</a><span class="glyphicon glyphicon-pencil pull-right"></span><br></b>
  <label>Gender</label><p><?php echo $row['gender']; ?></p>
  <label>Date of Birth</label><p><?php echo $row['dob']; ?></p>
  <label>Mobile</label><p><?php echo $row['mobile']; ?></p>
  <label>Email - ID</label><p><?php echo $row['email']; ?></p>
  <label>Username</label><p><?php echo $row['user_name']; ?></p>
  <label>Join Date</label><p><?php echo $row['join_date']; ?></p>
  
  
  
  </div>
  </div>

</div>
</div>
<?php
}
else{
if(isset($_GET["user"])){
$user_name=$_GET["user"];
$sql = "SELECT * from user_details where user_name='$user_name'";
$result = $database->query($sql);
$row = $result->fetch_assoc();
if ($result->num_rows > 0) {
require 'lib/nav-session-index.php'; 
?>
<div class="container">
<div class="row ">
  
  <div class="col-md-9 col-md-push-3 ">
  <div class="back pad10 pad15">
  
  <h2><?php echo $row['first_name']; echo $row['last_name']; ?></h2><br>
  </div>
  
  
  <?php
require	'_database/database.php';
$u_n=$row['user_name'];
$sql = "SELECT pro_pic, post_image, id, first_name, user_name, post_status, post_time FROM user_post WHERE user_name='$u_n'";
$result = $database->query($sql);
$row2 = $result->fetch_assoc();
?>
<div class="pad10 row back  pad15">
  <legeld><b>Posts by <?php echo$row['first_name']; echo $row['last_name']?></b></legend><hr><?php
if ($result->num_rows > 0) {
     // output data of each row
     while($row2 = $result->fetch_assoc()) {
         
		 ?>
		 <div class="back col-md-4">
		 <div class="text-info row">
		 <h4><a class="col-md-1" href="profile.php?user=<?php echo $row2['user_name'];?>&post_id=<?php echo $row2['id']; ?>"><?php echo $row['first_name'];echo $row['last_name']; ?></a></h4></div>
		 <small><h3>
		 <?php echo $row2['post_status']; ?>
		 </small></h4><div class="thumbnail">
		 <a href="post.php?post_id=<?php echo $row2['id'];?>&post_user=<?php echo $row2['user_name'];?>&post_content=<?php echo $row2['post_image'];?>&content=display#largescreen" class="thumbnail"><img src="_userfiles/posts/<?php echo $row2['post_image'];?>"></img></a>
		 </div>
		 <p><?php echo $row2['post_time']; ?></p>
		 </div>
		 
		 <?php
     }
} else {
     echo "0 results";
}
}
else{
	require 'lib/nav-session-index.php';
	?>
	
	<div class="center l-box">
	<h1>404 Error</h1>
	<p>There are no user on the above given address</p>
	<a class="btn btn-primary" href="register.php">Register</a>
	<a class="btn btn-default" href="login.php">Login</a>
	</div>
	<?php
}
$database->close();
?>  
  </div>
  </div>
  <div class="col-md-3 col-md-pull-9">
  <div class="thumbnail pad10">
  <img class="img-circle" src="_userfiles/profile/<?php echo $row['pro_pic'];?>"></img>
  </div>
  <div class="back pad10 pad15">
  
  <label>Gender</label><p><?php echo $row['gender']; ?></p>
  <label>Date of Birth</label><p><?php echo $row['dob']; ?></p>
  <label>Mobile</label><p><?php echo $row['mobile']; ?></p>
  <label>Email - ID</label><p><?php echo $row['email']; ?></p>
  <label>Username</label><p><?php echo $row['user_name']; ?></p>
  <label>Join Date</label><p><?php echo $row['join_date']; ?></p>
  
  
  
  </div>
  </div>

</div>
</div>
<?php
}}
?>
