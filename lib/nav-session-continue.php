    <nav class="shadow navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Project Aim</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
		   
        
            <img class="img-circle navbar-brand" src="_userfiles/profile/<?php echo $row['pro_pic']?>"></img>
            <li><a href="profile.php?user=<?php echo $row['user_name'];?>&stype=basic&view=1#profile"><span class="img-circle"></span><?php echo $row['first_name']?></a></li>
			<li><a href="notification.php?user=<?php echo $row['user_name'];?>&id=<?php echo $row['id'];?>&stype=basic&view=1#notification"><span class="glyphicon glyphicon-bullhorn"></span>Notification</a></li>
            <li><a href="message.php?user=<?php echo $row['user_name'];?>&id=<?php echo $row['id']; ?>&stype=basic&view=1#message"><span class="glyphicon glyphicon-envelope"></span>Message</a></li>
			<li><a class="" href="components/logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
			</ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
