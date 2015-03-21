<?php

require 'facebook.php';
require 'fb/fb_config.php';
require 'fb/facebook.php';

$facebook = new Facebook(array(
	'appId' => $APP_ID,
	'secret' => $APP_SECRET
));


$facebook->destroySession();
header('Location: index.php');
?>