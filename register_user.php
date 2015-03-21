
<div style="background:#FFF; border:solid 1px #CCC; padding-left: 10px; font-family: Helvetica; padding-top: 5px;  border-radius:5px;  width: 400px;"> 
	<div align="left" class="txt-login-header">Register Account</div>
	
	<?php 
      if($msg == 5) {
        echo "<div height='40' align='left'><font style='font-size: 12px; margin-left: 1px; color=#CCC; margin-bottom: 15px;'>Registration Success, Login with your email and password!!</font> </div>";
      } else if($msg == 4) {
		echo "<div height='40' align='left'><font style='color: red; font-size: 12px; margin-left: 1px; font-weight: bold; margin-bottom: 15px;'>Email address already associated with other account</font> </div>";
	  }
	?>
	
	<form action="" method="post" enctype="multipart/form-data" name="register_form" id="register_form" novalidate="novalidate">
	<?php 
      if(@$register_msg == 2) {
        echo "<span height='40'><font style='font-size: 12px; margin-left: 1px; color='#FF0000; margin-bottom: 15px;'>Username Or Password Is Invalid</font> </span>";
      } else if(@$register_msg == 3) {
        echo "<span height='40'><font style='font-size: 12px; margin-left: 1px; color='#FF0000; margin-bottom: 15px;'>Login to view lyrics</font> </span>";
      } else {
		//echo "<span height='40'><font style='font-size: 12px; margin-left: 1px; color='#FF0000; margin-bottom: 15px;'>Login to view lyrics</font> </span>";
	  }
	?>
    <div align="left" style="height: 25px; padding-top: 10px;">
			<div style="float:left" class="txt-login">First Name: </div>
			<div style="float:right; margin-right: 50px;">			
				<input class="txtInput" type="text" name="firstname" id="firstname" required="required" />
			</div>
	</div>
    
	<div align="left"  style="height: 25px; padding-top: 20px;"> 
		<div style="float:left" class="txt-login">Last Name:</div>
		<div style="float:right; margin-right: 50px;"><input type="text" class="txtInput" name="lastname" id="lastname"  required="required" /></div>
	</div>
	
	<div align="left"  style="height: 25px; padding-top: 20px;"> 
		<div style="float:left" class="txt-login">Mail Id:</div>
		<div style="float:right; margin-right: 50px;"><input type="text" class="txtInput" name="email" id="email"  required="required" /></div>
	</div>
	
	<div align="left"  style="height: 25px; padding-top: 20px;"> 
		<div style="float:left" class="txt-login">Phone No:</div>
		<div style="float:right; margin-right: 50px;">
			<input type="text" class="txtInput" name="phno" id="phno"  required="required" />
		</div>
	</div>
	
	
	<div align="left"  style="height: 25px; padding-top: 20px;"> 
		<div style="float:left" class="txt-login">Password:</div>
		<div style="float:right; margin-right: 50px;"><input type="password" class="txtInput" name="password" id="password"  required="required" /></div>
	</div>
	
	<div align="left"  style="height: 25px; padding-top: 20px;"> 
		
		<div style="float:left" class="txt-login">Confirm Password:</div>
		<div style="float:right; margin-right: 50px;">
			<input type="password" class="txtInput" name="confirm_password" id="confirm_password" required="required" />
		</div>
	</div>
	
	<div align="left" style="margin-top: 10px">
		<span id="cpwd1" style="margin-left: 50px;"></span>
	</div>
	
	<!--<div align="left"  style="height: 50px; padding-top: 20px;"> 
		<div style="float:left" class="txt-login">Captcha Image:</div>
		<div style="float:right; margin-right: 50px;">
			<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><br>
		</div>
	</div>
	
	<div align="left"  style="height: 25px; padding-top: 20px;"> 
		<div style="float:left" class="txt-login">Captcha code:</div>
		<div style="float:right; margin-right: 50px;">
			<input name="6_letters_code" type="text" class="label" id="6_letters_code" onblur="javascript: validCaptcha();">
		</div>
	</div>
	
	<div align="left" style="margin-top: 10px">
		<span id="captcha_valid" style="margin-left: 50px;"></span>
	</div>
	
	<div align="left"  style="height: 25px; padding-top: 20px;"> 
		<div style="float:left" class="txt-login">Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</div>
		
	</div>
	-->
	<div align="left" style="margin-bottom: 7px;">      
      <span id="rep"></span>		
		<div style="margin-bottom: 7px; margin-top: 10px;"> 
			
			<button class="mybutton" id="sub_button" name="sub_button"  type="button" onclick="javascript: register_account();" ><span>Create Account</span></button>
			<input type="hidden" class="txtInput" name="create_account_val" id="create_account_val"  />
		</div>
	</div> 
  </div>
 </form>	
</div>

<script src="js/jquery.validate.js" type="text/javascript"></script>
<script>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
function validPasswd(){
		var new_pass = $("#register_form #password").val();
		var confirm_pass = $("#register_form #confirm_password").val();
		if( new_pass != confirm_pass) {
			document.getElementById('cpwd1').innerHTML="<img src='raja-images/s_error.png'> *Password missmatch";
			$( "#cpwd1" ).addClass( "passMismatch" );
		} else {
			document.getElementById('cpwd1').innerHTML ="";
			document.getElementById('cpwd1').innerHTML="<img src='raja-images/s_success.png'>";
		}
}
function validCaptcha() {

}

function register_account() {

	$("#register_form").validate({
			rules: {
				firstname: "required",
				lastname: "required",
				username: {
					required: true,
					minlength: 2
				},
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				phno: {
					required: true,
					minlength: 10,
					number: true
				},
				email: {
					required: true,
					email: true
				}
			},
			messages: {
				firstname: "<br />Please enter your firstname",
				lastname: "<br />Please enter your lastname",
				username: {
					required: "<br />Please enter a username",
					minlength: "<br />Your username must consist <br/> of at least 2 characters"
				},
				password: {
					required: "<br />Please provide a password",
					minlength: "<br />Your password must be at least <br/> 5 characters long"
				},
				confirm_password: {
					required: "<br />Please provide a password",
					minlength: "<br />Your password must be at least 5 <br/> characters long",
					equalTo: "<br />Please enter the same password <br/> as above"
				},
				phno: {
					required: "<br />Please provide a phone number",
					minlength: "<br />Your phone number must be <br/> at least 10 characters long",
					number: "<br />Please enter valid number"
				},
				email: "<br />Please enter a valid email address"
			}
		});

	$("#register_form #create_account_val").val(1);
	$("#register_form").submit();
}
	

</script>