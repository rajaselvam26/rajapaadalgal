<?php 
date_default_timezone_set('America/Los_Angeles');
?>
<div style="background:#FFF; border:solid 1px #CCC; padding-left: 10px; font-family: Helvetica; padding-top: 5px;  border-radius:5px;  width: 385px;"> 
<form action="" method="post" enctype="multipart/form-data" name="form1">
	<div align="left" class="txt-login-header">I am a returning user</div>

	<?php 
      if($msg == 2) {
		echo "<span height='40'><font style='font-size: 12px; margin-left: 1px; color='#FF0000; margin-bottom: 15px;'>Username Or Password Is Invalid</font> </span>";
      } else if($msg == 3) {
        echo "<span height='40'><font style='font-size: 12px; margin-left: 1px; color='#FF0000; margin-bottom: 15px;'>Login to view lyrics</font> </span>";
      } else {
		//echo "<span height='40'><font style='font-size: 12px; margin-left: 1px; color='#FF0000; margin-bottom: 15px;'>Login to view lyrics</font> </span>";
	  }
	?>
	
    <div align="left" style="height: 25px; padding-top: 10px;">
			<div style="float:left" class="txt-login">Email Address: </div>
			<div style="float:right; margin-right: 50px;"><input class="txtInput" type="text" name="uname" id="uname" required="required" /></div>
	</div>
    
	<div align="left"  style="height: 25px; padding-top: 20px;"> 
		<div style="float:left" class="txt-login">Password :</div>
		<div style="float:right; margin-right: 50px;"><input type="password" class="txtInput" name="pwd" id="pwd"  required="required" /></div>
	</div>
	
	<div align="left" style="margin-bottom: 7px;">      
      <span id="rep"></span></div>
		<div style="margin-bottom: 7px; margin-top: 10px;"> 
			<input name="sub" class="mybutton" type="submit" value="Login" />
		</div>
		
		<?php 
			$enable_fb_login = 0;
			$vConfigQuery = "SELECT config_status from tbl_config where config_var='enable_fb_login'";
			$conRes = mysql_query($vConfigQuery, $con);
			while ($con_row = mysql_fetch_object($conRes)){
				$enable_fb_login = $con_row->config_status;
			}
			if($enable_fb_login == 1) {
				
		?>
		<div align="left" style="margin-bottom: 7px;width: 350px;margin-top: 20px;">
		<fieldset>
		<legend>Or use another service</legend>
		<?php 
			if($facebook->getUser() == 0){
				$vReDirectURI = "http://rajapaadalgal.com/demo/raja/$vReDirectURI";
				//$loginUrl = $facebook->getLoginUrl(array("scope" => "email,user_education_history,user_work_history",
				//'redirect_uri' => $vReDirectURI));
				$loginUrl = $facebook->getLoginUrl();
			} else {
				$loginUrl = "";
			}
		?>
			<a href="<?php echo $loginUrl; ?>"><img src = "img/fb_official_signin.png"></a><br />
		
		</fieldset>
	</div>
			<?php } ?>
	</div> 
	
  </div>
 </form>	
</div>
