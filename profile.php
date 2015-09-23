<?php
$p_id=$_GET["post_id"];
require '_database/database.php';
require	'_database/database.php';
	$coment = "SELECT * FROM post_comment WHERE post_id='$p_id'";
	$rt = $database->query($coment);
	$rw = $rt->fetch_assoc();
require 'lib/head-index.php';  
session_start();
if(isset($_SESSION['email']))
{      
$email=$_SESSION['email'];
$post_id=$_GET["post_id"];
$sql = "SELECT pro_pic, post_image, id, first_name, user_name, post_status, post_time FROM user_post WHERE id='$post_id'";
$sql2 = "SELECT * FROM user_details WHERE email='$email'";
$result2= $database->query($sql2);
$result = $database->query($sql);
$row = $result->fetch_assoc();
$row2 = $result2->fetch_assoc();
$email=$_SESSION['email'];
require 'lib/nav-session-continue.php'; 
?>
<div class="container ">
<div class="row">
<div class="col-md-8">
<img class="img-thumbnail center" width="400px" height="450px" src="_userfiles/posts/<?php echo $row['post_image']; ?>"></img>
</div>
<div class="col-md-4 back pad15">
<h2>Comments</h2><hr>
	<img class="img-circle" width="64" height="64" src="_userfiles/profile/<?php echo$row2['pro_pic']; ?>"><label><?php echo $row2['first_name'];echo $row2['last_name'];?></label></img>
  <form action="components/post_comment.php" method="post">
  <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
  <input type="hidden" name="user_name" value="<?php echo $row2['user_name']; ?>">
  <input type="hidden" name="first_name" value="<?php echo $row2['first_name'];?>">
  <input type="hidden" name="post_content" value="<?php echo $row['post_image'];?>">
  <textarea placeholder="Comment about this photo" class="form-control" rows="3" name="post_comment" required></textarea>
  <br><div  style="padding-top:1em;"><input type="submit" name="submit" value="Post" class="btn  btn-primary">
  </div>
  </form>
	<hr>
	<legend>All Comments</legend>
	<?php
	
	

	if ($rt->num_rows > 0) {
     // output data of each row
     while($rw = $rt->fetch_assoc()) {
         
		 ?>
		 <label><a class="text-info" href="profile.php?user=<?php echo $rw['user_name']; ?>"><?php echo $rw['first_name'];?></a></label><br>
		 <p><?php echo $rw['comment'];?></p>
		 <small><p><?php echo $rw['comment_time'];?></p></small>
  
		 <?php
	 }
	}
		 ?>
  </div>

</div>
</div>
<?php
}
else{
if(isset($_GET["post_content"])){
$post_id=$_GET["post_id"];
$post_content=$_GET["content"];

$sql = "SELECT * from post_comment where post_id='$post_id'";
$result = $database->query($sql);
$row = $result->fetch_assoc();
if ($result->num_rows > 0) {
require 'lib/nav-session-index.php'; 
?>
<div class="container ">
<div class="row">
<div class="col-md-8">
<img class="img-thumbnail center" width="400px" height="450px" src="_userfiles/posts/<?php echo $row['post_content']; ?>"></img>
</div>
<div class="col-md-4 back pad15">
<h2>Comments</h2><hr>
  <?php
	if ($rt->num_rows > 0) {
     // output data of each row
     while($rw = $rt->fetch_assoc()) {
         
		 ?>
		 <label><a class="text-info" href="profile.php?user=<?php echo $rw['user_name']; ?>"><?php echo $rw['first_name'];?></a></label><br>
		 <p><?php echo $rw['comment'];?></p>
		 <small><p><?php echo $rw['comment_time'];?></p></small>
  
		 <?php
	 }
	}
		 ?>
</div>
</div>
</div>

<?php}else{require 'lib/nav-session-index.php';
	?>

	<?php
}

}
}
?>
