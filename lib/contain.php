

<?php
require	'_database/database.php';
$sql = "SELECT pro_pic, post_image, id, first_name, user_name, post_status, post_time FROM user_post";
$result = $database->query($sql);
$row = $result->fetch_assoc();

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         
		 ?>
		 
		 <div class="">
		 <div class="pad10 l-box col-md-4">
		 <div class="text-info row"><a class="col-md-3 img-circle"><img style="border-style: solid;border-color: #333 #333;" width="64" height="64" class="img-thumbnail" src="_userfiles/profile/<?php echo $row["pro_pic"]?>"></img></a>
		 <h3><a class="col-md-1" href="profile.php?user=<?php echo $row['user_name'];?>&post_id=<?php echo $row['id']; ?>"><?php echo $row['first_name']; ?></a></h3></div>
		 <small><h1>
		 <?php echo $row['post_status']; ?>
		 </small></h1><div class="thumbnail">
		 <a href="post.php?post_id=<?php echo $row['id'];?>&post_user=<?php echo $row['user_name'];?>&post_content=<?php echo $row['post_image'];?>&content=display#largescreen" class="thumbnail"><img src="_userfiles/posts/<?php echo $row['post_image'];?>"></img></a>
		 </div>
		 <p><?php echo $row['post_time']; ?></p>
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
