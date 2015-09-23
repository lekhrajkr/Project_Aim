<?php
session_start();
require '_database/database.php';
if(isset($_SESSION['email'])){
	header("location:index.php");
}
else{
require '_database/database.php';
require 'lib/head-index.php';
require 'lib/nav-session-index.php';
require 'dist/forms/signup.php';
}
?>
