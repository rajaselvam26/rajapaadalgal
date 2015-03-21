<?php
include_once("includes/config.php");
if($_POST)
{
$name	=	$_POST['name'];
$email	=	$_POST['email'];
$comment_dis	=	$_POST['comment'];
$song_id		=	$_POST['song_id'];
$song_language	=	$_POST['song_language'];
$cur_date = date("Y-m-d H:i:s");
$display_date =  date("F j, Y",strtotime($cur_date));
$lowercase = strtolower($email);
$image = md5( $lowercase );
mysql_query("SET NAMES utf8", $con);
mysql_query("insert into comments(comment_name, comment_email, comment_dis, lang, song_id, datetime) values ('$name', '$email', '$comment_dis', '$song_language', '$song_id', now())", $con);

}

else { }

?>


<div class="box">
<img src="http://www.gravatar.com/avatar.php?gravatar_id=<?php echo $image; ?>" class="com_img">
<span class="com_name"> <?php echo $name; ?></span> <span class="com_date"><?php echo $display_date;?></span><br />
<div class="com_dis"><?php echo $comment_dis; ?></div> <br />
</div>