<?php
ob_start();
include_once("header.php");
include_once ("film_functions.php");
include_once('includes/common_fns.php');
if ($_SESSION['uname'] == "") {
    header("location:login1.php?redirect_reason=session_not_present&" . $_SERVER['QUERY_STRING']);
}

@$ch  = @$_GET["ch"];
@$fid = @$_GET["fid"];
@$sid = @$_GET["sid"];
$m = $n = $_GET['m'];

switch ($n) {
    case 1:
        $txt_view = "தமிழில் பார்வையிட";
        $lang_to_view = 2;
        $lyrics_title = "Lyrics";
        $lbl_singers = "Singers";
        $lbl_lyricist = "Lyricist";
		$_SESSION['song_language'] = "English";
        $movies_qry = "SELECT * from songs_english where songs_english.fid='$fid' order by sname asc";
        $qry_tam = "select * from songs_english inner join flim_english on songs_english.fid=flim_english.id where songs_english.fid='$fid' and songs_english.sid='$sid'";
        break;
    case 2:
        $txt_view = "View in English";
        $lang_to_view = 1;
		$_SESSION['song_language'] = "Tamil";
        $lyrics_title = "பாடல் வரிகள்";
        $lbl_singers = "பாடகர்கள";
        $lbl_lyricist = "பாடலாசிரியர";
        $movies_qry = "SELECT * from songs_tamil where songs_tamil.fid='$fid' order by sname asc";
        $qry_tam = "select * from songs_tamil inner join flim_tamil on songs_tamil.fid=flim_tamil.id where songs_tamil.fid='$fid' and songs_tamil.sid='$sid'";
        break;
}
mysql_query("SET NAMES utf8");
$previous = "javascript:history.go(-1)";
if (isset($_SESSION["BACK_PAGE_PATH"])) {
    $previous = $_SESSION["BACK_PAGE_PATH"];
}
?>


<link href="jquery.mCustomScrollbar.css" rel="stylesheet" />
<link rel="stylesheet" href="css/colorbox.css" />

<!-- Include jQuery Popup Overlay -->
<script src="js/jquery.popupoverlay.js"></script>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="smoothmenu2" style="background-color: #F3EDDD; ">
    <tr>
        <td height="40px;" colspan="2">
			<?php 
				$audio_player = 0;
				$vConfigQuery = "SELECT config_status from tbl_config where config_var='show_player'";
				$conRes = mysql_query($vConfigQuery, $con);
				while ($con_row = mysql_fetch_object($conRes)){
					$audio_player = $con_row->config_status;
				}
				if( $audio_player == 1) {
			?>
				<div style="position:absolute;right: 180px; margin-top: -13px;">
					<audio autoplay="autoplay" controls="controls" loop="loop">
						<source src="songs/<?php echo $fid; ?>/<?php echo $fid; ?>_<?php echo $sid; ?>.mp3" type="audio/mpeg">
						<embed height="30" width="100" src="songs/<?php echo $fid; ?>_<?php echo $sid; ?>.mp3">
					</audio> 
				</div>
			<?php } ?>
            <div style="position: absolute; margin-right: -50px;margin-top: -20px;">
                <a class="" href="<?php echo $previous; ?>"> <img src="img/back_button.png" border="0" alt="Back to previous" title="Back to previous"/></a>
            </div>
			<div style="position: absolute;right: 270px;float: right;margin-top: 38px;">
            	<a href="#main_comment"> <img src="img/comment.png" border="0" alt="comment" title="Comment"/></a>			
            </div>

        </td>
    </tr>

    <tr>
        <td width="33%" height="210" valign="top">
            <table width="326" border="0" align="left" cellpadding="0" cellspacing="0">

                <tr>
                    <td width="315" height="200" align="center" valign="top">
                        <div class="rajaBorder" style="left: 2px;">
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <?php
                                        @$n = $_GET['m'];
                                        if (@isset($_GET["fid"]) && $_GET["fid"] != "" && @isset($_GET["sid"]) && $_GET["sid"] != "") {
                                            $res = mysql_query($movies_qry, $con);
                                            echo "<div style='text-align:left;'>
                                                                <font size='4px' style='font-weight:bold;line-height:40px; font-size:14px;'>
                                                                    &nbsp;&nbsp;<img src='photos/flim.png' width='40' height='40' 
                                                                    style='vertical-align:middle;'/>&nbsp;&nbsp;" . ret_filmname($_GET["fid"], $m) . "
                                                                    <hr color='black' style=' margin-left: 4px; width: 298px;'></font>";
                                            echo "</div><br>";
                                            ?>
                                            <div style="text-align:left; height:200px;margin: 10px width:294px; padding:0; margin-top: 0px; overflow:auto;" id="content_5" class="content" >
                                                <?php
                                                $i = 1;
                                                while (@$row = mysql_fetch_array($res)) {
                                                    $charset = 'UTF-8';
                                                    $f = "$row[2]";
                                                    $f = mb_substr($f, 0, 1, $charset);
                                                    $song_id = $row['sid'];
                                                    $film_id = $row['fid'];
													$_SESSION['song_id'] = $row['rid'];
                                                    if (($song_id == $sid) && ($film_id == $fid))
                                                        $flm_cls = "side_menu_select";
                                                    else
                                                        $flm_cls = "side_menu_black";
                                                    echo "<a href='lyricstamil.php?search=" . @$_REQUEST['search'] . "&fid=$row[0]&sid=$row[1]&ch=$f&m=" . $_REQUEST['m'] . "' class='" . $flm_cls . "'>&nbsp;&nbsp;&nbsp;<img src='photos/song-no.png' width='15' height='10' />" . $i . ". " . first_few_words($row[2], 2) . "</a>";
                                                    echo "<hr style='height:0px;border:none;display:block;' color='white' ></hr>";
                                                    $i = $i + 1;
                                                }
                                                ?>
                                            </div>
                                                <?php
                                            }
                                            ?>
                                    </td>
                                </tr>
<?php
if (@$_SESSION["songs_record_set"] != "") {
    ?>
                                    <tr>
                                        <td >
                                            <table width="324" border="0" align="left" cellpadding="0" cellspacing="0" style="margin-top: 30px;">
                                                <tr>
                                                    <td width="400" height="300" valign="top" >
                                                        <div class="rajaBorder" style="height: 330px;">
                                                            <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
                                                                <tr>
                                                                    <td> 
                                                                        <span style='font-weight:bold;font-size:14px; margin-left: 10px;line-height:35px;'>Previous search </span>
                                                                        <hr color='black' style=' margin-left: 4px; width: 298px;'>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18"> 
                                                                        <div style="text-align:left; height:260px; width:294px; padding:0; margin-top: 4px; overflow:auto;" id="search_content" class="content" >
    <?php
    $search_qry = $_SESSION["songs_record_set"];
    $recordset = mysql_query($search_qry, $con);
    $i = 1;
    while ($row = mysql_fetch_array($recordset)) {
        $charset = 'UTF-8';
        $f = "$row[2]";
        $song_id = $row['sid'];
        $film_id = $row['fid'];
		//$_SESSION['song_id'] = $row['rid'];
        if (($song_id == $sid) && ($film_id == $fid))
            $flm_cls = "side_menu_select";
        else
            $flm_cls = "side_menu_black";
        $f = mb_substr($f, 0, 1, $charset);
        echo "<a href='lyricstamil.php?fid=" . $row['fid'] . "&sid=" . $row['sid'] . "&ch=$ch&m=$m' class='" . $flm_cls . "'>&nbsp;&nbsp;&nbsp;
                                                                                            <img src='photos/song-no.png' width='15' height='10' />" . $i . ". " . first_few_words($row['sname'], 2) . "</a>";
        echo "<hr style='height:0px;border:none;display:block;' color='white' ></hr>";
        $i = $i + 1;
    }
    ?>
                                                                        </div>
                                                                        <!-- Left Side Songs List -->
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
    <?php
}
?>

                            </table>
                        </div>
                    </td>
                </tr>
            </table>
        </td>    
        <td>
            <table width="640px" height="634" border="0" cellpadding="0" style="margin-top: 10px;" cellspacing="0" background="raja-images/rollpaper.png" bgcolor="#F3EDDD">
                <tr>
                    <td width="500" height="634">                          
                        <table width="100%" border="0" style="margin-top: -10px;" align="left" cellpadding="0" cellspacing="0">              
                            <tr>
                                <td width="104" height="117" align="center" valign="middle">&nbsp;</td>
                                <td align="left" valign="top">
<?php
if (@isset($_GET["fid"]) && $_GET["fid"] != "" && @isset($_GET["sid"]) && $_GET["sid"] != "") {
    @$res_tam = mysql_query($qry_tam, $con);
    @$row_tam = mysql_fetch_array($res_tam);
    //var_dump(@$row_tam);
    $singers = get_singers_details(@$row_tam[3], @$row_tam[4]);

    ?>
                                        <table width="613">
                                            <tr height="60px;">

                                                <td style="margin-left:10px;" align="left"  width="200">
                                                    <span style="">
                                                        <a class="mybutton"
                                                           href="?fid=<?php echo $fid; ?>&sid=<?php echo $sid; ?>&m=<?php echo $lang_to_view; ?>"><?php echo $txt_view; ?>
                                                        </a>
                                                    </span>
                                                </td>

                                                <td width="150" style="padding-top: 20px;">
    <?php
    echo "<font style='text-decoration:underline;text-align:center; font-weight:bold;font-size:15px;color:black; margin-left: 25px;margin-top: 30px;'>" . $lyrics_title . " </font><p>";
    ?>
                                                </td>

                                                <td align="right">
                                                    <span style="font-size:11px; margin-right: 0px;color:#fff;">														
														<a href="#basic" class='initialism basic_open' alt="More info about Song" title="More info about Song">
															<img src="img/icon-info.png" border="0"  />
														</a>
                                                    </span>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <div  style="OVERFLOW: auto;WIDTH: 586px;HEIGHT: 550px; margin-left: 50px; padding:0;" onscroll="OnDivScroll(); "  id="lyrics_content" class="content" >
    <?php
    $lyrics = "$row_tam[6]";
    echo "<p style='margin-top: 10px;'>" . $lyrics . "</p>";
    ?>
                                                    </div>                    
                                                </td>
                                            </tr>
                                        </table>
    <?php
}
?>

                                </td>
                                <td width="96" align="center" valign="middle">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr><td colspan="2" height="20">&nbsp;</td></tr>
	<tr id="main_comment">
		<td>&nbsp;</td>
		<td><?php include_once("comment.php");?></td>
	</tr>
<tr><td colspan="2" height="50">&nbsp;</td></tr>
</table>

<!-- This contains the hidden content for inline calls -->
<div id="basic" class="well popup_content" style="max-width: 44em; opacity: 0; visibility: hidden; display: inline-block; outline: none; text-align: left; position: relative; vertical-align: middle;" >
    <h5>More Info about <?php echo "'".first_few_words(@$row_tam[2], 3)."'";?></h5>
	<table width="100%" cellspacing=2 cellpadding=2 style="padding-bottom: 15px;" border="0">
		<tr><td class = "side_menu_black">Film Name</td><td class="popup_window"><?php echo @$row_tam[20]?></td></tr>
		<tr><td class = "side_menu_black">Chorus</td><td class="popup_window"><?php echo @$row_tam[5]?></td></tr>
		<tr><td class = "side_menu_black">Male Singers</td><td class="popup_window"><?php echo $row_tam[3];?></td></tr>
		<tr><td class = "side_menu_black">Female Singers</td><td class="popup_window"><?php echo @$row_tam[4]?></td></tr>
		<tr><td class = "side_menu_black">Playback time</td><td class="popup_window"><?php echo @$row_tam[8]?></td></tr>
		<tr><td class = "side_menu_black">Production Banner</td><td class="popup_window"><?php echo @$row_tam[25]?></td></tr>
		<tr><td class = "side_menu_black">Producers</td><td class="popup_window"><?php echo @$row_tam[26]?></td></tr>
		<tr><td class = "side_menu_black">Director</td><td class="popup_window"><?php echo @$row_tam[27]?></td></tr>
		<tr><td class = "side_menu_black">Actor</td><td class="popup_window"><?php echo @$row_tam[28]?></td></tr>
		<tr><td class = "side_menu_black">Actress</td><td class="popup_window"><?php echo @$row_tam[29]?></td></tr>
		<tr><td class = "side_menu_black">Editor</td><td class="popup_window"><?php echo @$row_tam[32]?></td></tr>
		<tr><td class = "side_menu_black">Release Date</td><td class="popup_window"><?php echo @$row_tam[33]?></td></tr>
	</table>
	<button class="mybutton basic_close btn btn-default">Close</button>
</div>
<?php

include_once("footer.php");
?>
<script src="jquery.mCustomScrollbar.concat.min.js"></script>
<script type="">
    $('#lyrics_content').bind("contextmenu cut copy",function(e){
    alert("Right click disabled!!");
    return false;
    });
    $("#lyrics_content").mCustomScrollbar({
    autoHideScrollbar:true,
    theme:"light-thin"
    });
    $("#search_content").mCustomScrollbar({
    autoHideScrollbar:true,
    theme:"light-thin"
    });
	jQuery(document).ready(function($){
      // Initialize the plugin
      $('#basic').popup();
	});
</script>
