<div class="container l-box">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data" id="UploadForm">
<div class="row">
<div class="col-lg-6">
<label>Choose Profile Picture</label>
<a class="thumbnail">
<img class="img-responsive" src="_userfiles/profile/<?php echo $row['pro_pic']; ?>"></img></a>
<input name="ImageFile" type="file" id="UploadFile">
<br><label>Country</label>
<input name="country" type="text" value="India" class="form-control input input-sm">
<label>State</label>
<input name="state" type="text" value="Kerala" class="form-control input input-sm">
</div>
<div class="col-lg-6">
<label>Mobile</label>
<input type="number" name="mobile" placeholder="+91 **********" class="form-control input input-sm" autofocus required>
<br><legend>Choose a Username</legend>
<input type="text" name="user_name" class="form-control input-sm" placeholder="Projectaim.com/user=" required>
</div>

</div><br><br><div class="form-group">
<center><input type="submit" class="btn btn-lg btn-primary" name="submit" value="Next"></center></div>
</form>
</div>
