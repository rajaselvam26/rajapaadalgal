<?php
ob_start();
include_once("includes/config.php");
require_once 'includes/class_password.php';  
require 'fb/fb_config.php';
require 'fb/facebook.php';

$facebook = new Facebook(array(
	'appId' => $APP_ID,
	'secret' => $APP_SECRET
));

$access_token = $facebook->getAccessToken();
if($facebook->getUser() != 0) {
	$api = $facebook->api('me');	
}
$cPwd = new Password(); 

$msg 	= 0;
$count 	= -1;
extract($_REQUEST);
$fid 	= @$_GET['fid'];
$sid 	= @$_GET['sid'];
$ch 	= @$_GET['ch'];
$m 		= @$_GET['m'];

if (@$_REQUEST['redirect_reason'] == "session_not_present") {
    $msg = 3;
}

$vReDirectURI = ($fid != "" ) ? "lyricstamil.php?fid=$fid&sid=$sid&ch=$ch&m=$m&ch=$ch" : "index.php";

if(@$create_account_val != 1 || (isset($api))) {
	
	if (isset($uname) && ($uname != "")) {
		$vQuery = "select * from users where email='$uname' and flag=1";
		$record_set = 	mysql_query($vQuery, $con);
		while($row	=	mysql_fetch_array($record_set)){
			$db_password  	= $row['password'];
			$hash = $cPwd->re_hash($db_password, $pwd ); 
			if( $hash === $db_password ) {
				$count = 1;
			} else {
				$count = 0;
			}
		}
	}
	
	if ($count > 0 || (isset($api))) {
		session_start();
		$_SESSION['uname'] = (isset($api[name])) ? $api[name] : $uname;
		
		if ($fid != "") {
			header("location:$vReDirectURI");
		} else {
			header("location:$vReDirectURI");
			exit;
		}
	} else {
		if($count == 0)
			$msg = 2;
	}
} else {
	$emailQuery = "select * from users where email='$email'";
	$email_record_set = mysql_query($emailQuery, $con);
	$count = mysql_num_rows($email_record_set);
	if ($count == 0) {
		$user_password = $password; //password provided by user 
		$hash_password = $cPwd->hash($user_password); //hash the password
		
		mysql_query("insert into users(name,uname,email,phno,password,dat,flag) values('".$firstname."','".$lastname."','".$email."','".$phno."','".$hash_password."',now(),1)");
		$msg = 5;
	} else {
		$msg = 4;
	}
}

include_once('header.php');
?>
<table width="998" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td height="333" colspan="2" valign="top" bgcolor="#F3EDDD"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="112" height="265" valign="top">
                        <table width="112" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-left:-7px;">
                            <tr>
                                <td width="112" height="76" valign="top">
                                    <?php include_once('search_by_letter.php'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="33"><table width="112" border="0" align="left" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td  align="left" height="14" valign="bottom"><img src="raja-images/lett-bg1.png"  style="margin-left: -1px;" width="112" height="13" /></td>
                                        </tr>
                                        <tr>
                                            <td height="168" valign="top" class="ltr-bg2">               
                                                <?php include("side.php"); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="raja-images/lett-bg3.png" width="112" height="9" style="margin-left: -1px; margin-bottom: 3px;" /></td>
                                        </tr>
                                    </table></td>
                            </tr>
                        </table></td>
                    <td width="827" valign="top">

                        <table width="860" border="0" align="center" cellpadding="0" cellspacing="0">
                            <table width="860" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <?php
                                    $_SESSION['title_name'] = 'Song Lyrics';
                                    include('content_title.php');
                                    ?>
                                    <td width="660" valign="top">
                                        <?php
                                        include_once("search_box.php");
                                        ?>
                                    </td>
                                    <td width="29" valign="top">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="3" valign="top" background="raja-images/side-bg-under.png" style="background-repeat:no-repeat;">&nbsp;</td>
                                </tr>
                            </table>
                            <!--- Table Container - Starts -->        
                            <table width = "100%" border = "0"  style="margin-left: 5px; margin-top: 8px;" align = "center" cellpadding = "5" cellspacing = "5">
                                <tr>
									<td align = "left" valign = "top">
                                        <?php include_once("login_form.php"); ?>
                                    </td>
									<td align = "right" valign = "top">
                                        <?php 
											$enable_register = 0;
											$vConfigQuery = "SELECT config_status from tbl_config where config_var='enable_register_account'";
											$conRes = mysql_query($vConfigQuery, $con);
											while ($con_row = mysql_fetch_object($conRes)){
												$enable_register = $con_row->config_status;
											}
											if(@$_SESSION['uname'] == ""  && $enable_register == 1) {
												include_once("register_user.php"); 
											}
										?>
                                    </td>
								</tr>
                            </table>
                            <!-- Table Container - Ends --> 
                        </table>            

                    </td>
                </tr>
            </table></td>
    </tr>

</table></td>

</tr>
</table></td>
</tr>
</table>
<?php
include("footer.php");
ob_flush();
?>