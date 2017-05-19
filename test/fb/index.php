<?php

require 'facebook.php';

$facebook = new Facebook(array(
	'appId' => '860767077309038',
	'secret' => 'a79b9ca8cf57384899cc23912f7e5532'
));

if($facebook->getUser() == 0){
	$loginUrl = $facebook->getLoginUrl();
	echo "<a href = '$loginUrl'>Login With Facebook</a>";
}
else{
	
	$api = $facebook->api('me');
	echo "Hi " . $api[name];
	
	echo "<br><a href ='logout.php'>Logout</a>";
	
}

?>