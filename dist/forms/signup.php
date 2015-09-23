<div class="container l-box">
<div class="row">
<?php
if(isset($_GET["redirect"])){
	if($_GET["request"]== "password")
	{
		echo '<div id="passwordError" class="alert alert-danger">';
		echo '<center>Password doesn\'t match !</center>';
		echo '</div>';
	}
	else if($_GET["request"]== "conflict"){
		echo '<div id="conflict" class="alert alert-danger">';
		echo '<center>Account already exist</center>';
		echo '</div>';
	}
}
?>
<div class="col-lg-6">
<form action="components/signup.php" method="post">
<h2>Register</h2><hr>
<label>First Name</label>
<input type="text" class="form-control" placeholder="First Name" name="first_name" required><br>
<label>Last Name</label>
<input type="text" class="form-control" placeholder="Last Name" name="last_name" required><br>
<label>Gender</label>
<div class="form-inline" required>
<input type="radio" value="Male" name="gender"> Male
<input type="radio" value="Female" name="gender"> Female
</div><br></div><div class="col-lg-6"><br>
<label>Date of Birth</label><br>
<input type="date" class="input form-control" name="dob" placeholder="Date of Birth" required><br>
<label>Email Address</label><br>
<input type="email" class="form-control input " placeholder="Email Address" name="email" required><br>

<legend>Password</legend>
<input type="password" class="form-control input " placeholder="Password" name="password" required><br>
<input type="password" class="form-control input " placeholder="Re-type Password" name="password2" required><br>
<button class="btn btn-lg btn-primary btn-block" name="signup_button" type="submit">Next</button>
</form>
</div>
</div>
