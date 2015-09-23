<div class="container">
<div class="center l-box ">
<form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post" class="form-signin">
        <h2 class="form-signin-heading">Login </h2><hr>
		<?php
		if(isset($_GET["redirect"])){
			if($_GET["request"] == "login" && $_GET["status"] == "failed")
			{
				echo '<div class="alert alert-danger" id="NoAcc">No Details found</div>';
			}
		}
		?>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
        <div class="checkbox">
          <label>
          <input type="checkbox" value="remember-me"> Remember me
          </label><br>
		  
        </div>
        <input class="btn btn-lg btn-primary btn-block" name="login_button" value="Login in" type="submit">
      </form>
	  <center><a href="index.php?request=forgot&redirect=homepage&stype=basic&view=1#forgot">Forgot password?</a></center><br>
	  <center><a href="index.php?request=signup&redirect=homepage#signup">Create an account</a></center>
</div>
</div>
