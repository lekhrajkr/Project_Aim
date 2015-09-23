<div class="row">
  <div class=" col-xs-6 col-md-4">
  <div class="thumbnail ">
  <img width="150" height="150" class="img-circle" src="_userfiles/profile/<?php echo $row['pro_pic'];?>"></img>
  </div>
  <div class="back pad15 l-box">
  <h3><?php echo $row['first_name']; echo $row['last_name']; ?></h3><br>
  
  </div>
  </div>
  
  <div class="col-xs-12 col-md-8 ">
  <div class="back pad10 l-box">
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
$sql = "SELECT pro_pic, post_image, id, first_name, user_name, post_status, post_time FROM user_post";
$result = $database->query($sql);
$row = $result->fetch_assoc();

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         
		 ?>
		 
		 <div class="">
		 <div class="pad10 l-box-post col-xs-6 col-md-4">
		 <div class="text-info row">
		 <h4><a class="col-md-1" href="profile.php?user=<?php echo $row['user_name'];?>&post_id=<?php echo $row['id']; ?>"><?php echo $row['first_name']; ?></a></h4></div>
		 <small><h4>
		 <?php echo $row['post_status']; ?>
		 </small></h4><div class="thumbnail">
		 <a href="post.php?post_id=<?php echo $row['id'];?>&post_user=<?php echo $row['user_name'];?>&post_content=<?php echo $row['post_image'];?>&content=display#largescreen" class="thumbnail"><img width="280px" height="280px" src="_userfiles/posts/<?php echo $row['post_image'];?>"></img></a>
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
  
  
  
</div>
