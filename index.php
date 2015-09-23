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
echo '<div class="container ">';
require 'lib/post.php';

echo '</div>';
}
else{
require '/lib/nav-session-index.php'; 
require '/lib/post-on.php'; 
}
require 'lib/foot-end.php';

?>


 
