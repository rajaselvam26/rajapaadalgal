<?php 
include_once("includes/config.php");
//var_dump($_REQUEST);
$primary_key_id = $_SESSION['song_id'];
$song_language 	= $_SESSION['song_language'];
?>
<script src="jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
 $("#comment_content").mCustomScrollbar({
    autoHideScrollbar:true,
    theme:"light-thin"
    });
$(function() {
	$("#submitComment").click(function() {
	var name = $("#name").val();
	var email = $("#email").val();
	var comment = $("#comment").val();
	var song_id = $("#song_id").val();
	var song_language = $("#song_language").val();
    var dataString = 'name='+ name + '&email=' + email + '&comment=' + comment + '&song_id=' + song_id + '&song_language=' + song_language;
	if(name=='' || email=='' || comment=='') {
		alert('Please enter valid comments');
    } else {
		$("#flash").show();
		$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
		$.ajax({
			type: "POST",
			url: "commentajax.php",
			data: dataString,
			cache: false,
			success: function(html){
				$("ol#update").append(html);
				$("ol#update li:last").fadeIn("slow");
				document.getElementById('email').value='';
				document.getElementById('name').value='';
				document.getElementById('comment').value='';
				$("#name").focus();
				$("#flash").hide();
			}
		});
	}
	return false;
	});
});

</script>
<style type="text/css">

.comment_box
{
	background-color:#D3E7F5; border-bottom:#ffffff solid 1px; padding-top:3px
}
a
	{
	text-decoration:none;
	color:#d02b55;
	}
	a:hover
	{
	text-decoration:underline;
	color:#d02b55;
	}
	
	
	ol.timeline
	{list-style:none;font-size:1.2em;}
	ol.timeline li{ display:none;position:relative;padding:.7em 0 .6em 0;}ol.timeline li:first-child{}
	
	#main
	{
	width:500px; margin-top:20px; 
	font-family: Georgia, serif; 
	}
	#flash
	{
		margin-left:100px;
	}
	.box
	{
		height:120px;
		border-bottom:#dedede dashed 1px;
		padding: 10px 10px 20px 10px;
		width: 600px;
	}
	input
	{
		margin-bottom:10px;
	}
	textarea
	{
		border:#666666 solid 2px;
		margin-bottom:10px;
		font-family: Georgia, serif; 
		font-weight: normal;
		text-decoration:none; 
		font-size: 12px; 
		color:#662117;
		padding: 5px;
		width: 400px;
		height: 200px;
	}
	.titles{
		font-size:13px;
		padding-left:10px;	
	}
	.star
	{
	color:#FF0000; font-size:16px; font-weight:bold;
	padding-left:5px;
	}
	
	.com_img
	{
		float: left; width: 80px; height: 80px; margin-right: 20px;
	}
	.com_name
	{
		font-size: 12px; color: rgb(102, 51, 153); font-weight: bold;
	}
	.com_date
	{
		font-size: 11px; color: rgb(102, 51, 153); font-weight: bold;
	}
	.com_dis
	{
		font-size: 12px; color: #000; 
		
		height: 100px;
		overflow: auto;
	}
</style>


<div id="main">

<ol  id="update" class="timeline">	
<?php
//var_dump($_REQUEST);


//$post_id value comes from the POSTS table
	mysql_query("SET NAMES utf8", $con);
	$sql		=	mysql_query("select * from comments where song_id=$primary_key_id and lang = '$song_language'", $con);
	while($row	=	mysql_fetch_array($sql))
	{
	
		$name 		= $row['comment_name'];
		$email 		= $row['comment_email'];
		$comment_dis = $row['comment_dis'];
		$date_time 	= $row['datetime'];

		$lowercase 	= strtolower($email);
		$image 		= md5( $lowercase );
		$display_date =  date("F j, Y",strtotime($date_time));
		
		$size = 40;
		$grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?s=" . $size;
?>

<div class="box">
<img src="<?php echo $grav_url; ?>" class="com_img">
<span class="com_name"> <?php echo $name; ?></span> <span class="com_date"><?php echo $display_date;?></span><br />
<div class="com_dis" id="comment_content" style="OVERFLOW: auto;style="OVERFLOW: auto;padding:10px;" onscroll="OnDivScroll(); "" onscroll="OnDivScroll(); "><?php echo $comment_dis; ?></div> <br />
</div>

<?php
}
?>

</ol>
<div id="flash" align="left" ></div>

	<div style="margin-left:100px; margin-top: 20px;">
	<form action="#" method="post">
		<table>
			<tr>
				<td width="120px"><span class="txt-login">Name</span></td>
				<td class="txtInput"><input type="text" class="txtCommentInput" name="title" id="name"/></td>
			</tr>
			<tr>
				<td><span class="txt-login">Email</span></td>
				<td class="txtInput"><input type="text" name="email" class="txtCommentInput" id="email"/></td>
			</tr>
			<tr>
				<td style="vertical-align:middle;"><span class="txt-login">Comments</span></td>
				<td class="txtInput"><textarea name="comment" id="comment" class="txtCommentInput"></textarea></td>
			</tr>
			<tr>
				<td colspan="2" align="middle">
				<input type="hidden" name="song_id" id="song_id" value="<?php echo $primary_key_id; ?>"/>
				<input type="hidden" name="song_language" id="song_language" value="<?php echo $song_language; ?>"/>
				
				<input type="submit" class="mybutton" id="submitComment" value=" Submit Comment "  />
				</td>
			</tr>
		</table>
		
	</form>
	</div>

</div>

