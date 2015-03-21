<?php
session_start();

require 'fb/fb_config.php';
require 'fb/facebook.php';

$facebook = new Facebook(array(
	'appId' => $APP_ID,
	'secret' => $APP_SECRET
));

@$facebook->destroySession();
session_destroy();
unset($_SESSION['uname']);
header("location:index.php");
?>