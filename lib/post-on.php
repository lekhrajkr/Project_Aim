<div class="container">

<div class="row">
<?php
require	'_database/database.php';
$sql = "SELECT pro_pic, post_image, id, first_name, user_name, post_status, post_time FROM user_post";
$result = $database->query($sql);
$row = $result->fetch_assoc();
?>
<div class="pad10 row  pad15">
  <legeld><h1>Popular Photos</h1></legend><hr></div><?php
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         
		 ?>
		 
		 <div class="">
		 <div class="col-md-3 l-box pad10 ">
		 <b>Posted by</b><div class="text-info row">
		 <h3><a target="blank" class="col-md-1" href="profile.php?user=<?php echo $row['user_name'];?>&post_id=<?php echo $row['id']; ?>"><?php  echo $row['first_name']; ?></a></h3></div>
		 <small><h3>
		 <?php echo $row['post_status']; ?>
		 </small></h3><div class="thumbnail">
		 <a href="post.php?post_id=<?php echo $row['id'];?>?post_user=<?php echo $row['user_name'];?>&post_content=<?php echo $row['post_image'];?>&content=display#largescreen" class="thumbnail"><img src="_userfiles/posts/<?php echo $row['post_image'];?>"></img></a>
		 </div>
		 <p><b>Posted on :</b><?php echo $row['post_time']; ?></p>
		 </div>
		 </div>
		 <?php
     }
} else {
     echo "0 results";
}

$database->close();
?>  

</div>
