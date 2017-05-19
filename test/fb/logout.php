<?php

require 'facebook.php';

$facebook = new Facebook(array(
	'appId' => '860767077309038',
	'secret' => 'a79b9ca8cf57384899cc23912f7e5532'
));

$facebook->destroySession();
header('Location: index.php');
?>