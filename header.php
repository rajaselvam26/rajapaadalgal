<?php 
	include("includes/config.php");
	include("includes/common_fns.php");
	session_start();
	require_once 'fb/fb_config.php';
require_once 'fb/facebook.php';

$facebook = new Facebook(array(
	'appId' => $APP_ID,
	'secret' => $APP_SECRET
));

$access_token = $facebook->getAccessToken();
if($facebook->getUser() != 0) {
	$api = $facebook->api('me');
	$fb_user_name = $api[name];
}

?>

<!------------------- Common code Starts -->
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Rajapadalgal.com | Ilayaraja Songs | Tamil Songs | Best Ilayaraja Songs | Ilayaraja Movie Songs.</title>
  
  <link rel="stylesheet" type="text/css" href="css/raja_paadal.css" />
  <link rel="stylesheet" type="text/css" href="ddsmoothmenu.css" />
  <link rel="stylesheet" type="text/css" href="ddsmoothmenu-v.css" />
  
  <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
  <script type="text/javascript" src="ddsmoothmenu.js"></script>
  
  <script type="text/javascript">
  
  ddsmoothmenu.init({
      mainmenuid: "smoothmenu1", //menu DIV id
      orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
      classname: 'ddsmoothmenu', //class added to menu's outer DIV
      //customtheme: ["#1c5a80", "#18374a"],
      contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
  })
  
  ddsmoothmenu.init({
      mainmenuid: "smoothmenu2", //Menu DIV id
      orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
      classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
      method: 'hover', // set to 'hover' (default) or 'toggle'
      arrowswap: true, // enable rollover effect on menu arrow images?
      //customtheme: ["#804000", "#482400"],
      contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
  })
  
  
  </script>
  </head>
  
  <body>
  <?php include("float.php"); ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style=" margin:0 auto;">
    <tr>
      <td height="977" valign="top"><table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
      <td height="977" style="width:990" valign="top" bgcolor="#FFFFFF">


<!------------------------- Common Code Ends -->

	<table width="990" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td bgcolor="#FFFFFF">
				<table width="998" border="0" align="right" cellpadding="0" cellspacing="0">
					<tr>
						<td width="391" height="128" valign="top" bgcolor="#F3EDDD">
							<img src="raja-images/raja-paadalgal-logo.png" width="380" height="126" />
						</td>
						<td width="599" colspan="-1" valign="top" bgcolor="#F3EDDD">
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td width="77%" height="50">&nbsp;</td>
								</tr>
								<tr>
									<td height="41" colspan="2">
										<li style="list-style:none;">
											<iframe src="test/index-key.php" width="387" scrolling="yes" style="overflow: hidden;position: absolute;top: -10px; border:none; right:14px; height: 102px; ">
											</iframe>
										</li>
									</td>
								</tr>
						<?php  if(isset($_SESSION['uname']) || !empty($_SESSION['uname'])) {
								$vl		=	mysql_query("select * from users where email='".$_SESSION['uname']."'");
								$fet	=	mysql_fetch_object($vl);
						?>
							</table>
							<table style="float:right; color:#841619; border-radius:5px;font-family: sans-serif; font-weight:bold; font-size: 18px;">
								<tr style="float:center;">
									<td style="padding-left: 71px; text-decoration: none;font-size: 12px;color: #662117;padding: 0 8px 0 0">Welcome 
									<?php if($fet) { ?>
										<a style="text-decoration:none; color:#662117;" href="myaccount.php">
											<?php echo $fet->name;?>&nbsp;<?php echo $fet->uname; ?>
										</a>
									<?php }  else { ?>
										<?php echo $fb_user_name;?>
									<?php } ?>
									</td>
									<td>(<a  style="text-decoration:none; color:#662117;font-size: 12px;" href="logout.php">Logout</a>)</td>
								</tr>
							</table>
						<?php }else {?>
                    </table>
                    <table style="float:right; color:#841619; border-radius:5px;font-family: sans-serif; font-weight:bold; font-size: 18px;">
                        <tr style="float:right;">
                            <td><a style="text-decoration:none; font-size: 12px; color:#662117; padding:0 8px 0 0;" href="login1.php">Login</a></td>
                            <td style="font-size:15px; padding:0 4px 0 0;">&nbsp;|&nbsp;</td>
                            <td><a style="text-decoration:none; font-size: 12px; color:#662117;" href="register.php">Create Account</a></td>
                            <td style="font-size:15px;"></td>
                        </tr>
                    </table>
                    <?php }?>
				</td>
			</tr>
			<tr align="center">
			<td height="50" colspan="2" align="center" valign="top" bgcolor="#F3EDDD">
					<?php include_once('menu.php');?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>