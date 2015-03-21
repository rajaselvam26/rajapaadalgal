<?php
    ob_start();
    include_once("header.php");
    include_once ("film_functions.php");
    if($_SESSION['uname'] == "") { 
       header("location:login1.php");
    }

    @$ch	=	@$_GET["ch"];    
    @$fid	=	@$_GET["fid"];
    @$sid	=	@$_GET["sid"];
    $m = $n	=	$_GET['m'] ;

    switch ($n) {
        case 1:
            $txt_view = "தமிழ் பார்வையிட";
            $lang_to_view = 2;
            $lyrics_title = "Lyrics";
            $movies_qry  = "SELECT * from songs_english where songs_english.fid='$fid' order by sname asc";
            $qry_tam = "select * from songs_english inner join flim_english on songs_english.fid=flim_english.id where songs_english.fid='$fid' and songs_english.sid='$sid'";
            break;
        case 2:
            $txt_view = "View in English";
            $lang_to_view = 1;
            $lyrics_title = "பாடல் ";
            $movies_qry  = "SELECT * from songs_tamil where songs_tamil.fid='$fid' order by sname asc";
            $qry_tam = "select * from songs_tamil inner join flim_tamil on songs_tamil.fid=flim_tamil.id where songs_tamil.fid='$fid' and songs_tamil.sid='$sid'";
            break;
    }
   mysql_query("SET NAMES utf8"); 
?>
<link href="jquery.mCustomScrollbar.css" rel="stylesheet" />
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="smoothmenu2" style="background-color: #F3EDDD; ">
        <tr>
            <td height="40px;" colspan="2">
                <div style="position:absolute; left:519px; margin-top: -15px;">
                    <audio autoplay="autoplay" controls="controls" loop="loop">
                      <source src="songs/<?php echo $fid; ?>/<?php echo $fid; ?>_<?php echo $sid; ?>.mp3" type="audio/mpeg">
                       <embed height="30" width="100" src="songs/<?php echo $fid; ?>_<?php echo $sid; ?>.mp3">
                    </audio> 
                </div>

                <div style="position: absolute; margin-left: 10px;margin-top: -10px;">
                    <a style="background:#B57F00; border-radius: 5px; color: #fff; padding: 5px; text-decoration: none; font-size:13px;" 
                        href="songtabletamil.php?search=<?php echo @$_REQUEST['search'];?>&char=<?php echo @$_REQUEST['ch'];?>&m=<?php echo $_REQUEST['m']; ?>">Back</a>
                </div>

                <div style="position: absolute; right:190px;margin-top: -10px;">
                    <a style="background:#B57F00;  border-radius: 5px; color: #fff; padding: 5px; text-decoration: none; font-size:13px;" 
                        href="?fid=<?php echo $fid; ?>&sid=<?php echo $sid; ?>&m=<?php echo $lang_to_view;?>"><?php echo $txt_view;?></a>
                </div>
            </td>
        </tr>

        <tr>
            <td width="33%" height="210" valign="top">
                <table width="326" border="0" align="left" cellpadding="0" cellspacing="0">
                     
                    <tr>
                    <td width="315" height="200" align="center" valign="top">
                        <div style="border:solid 2px #F4B332; margin-left: 10px; width: 305px; border-radius:5px; height:270px; margin-top: 20px;">
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <?php
                                            @$n = $_GET['m'];
                                                if(@isset($_GET["fid"]) && $_GET["fid"] != "" && @isset($_GET["sid"]) && $_GET["sid"] != "" )
                                                {
                                                    $res = mysql_query($movies_qry, $con); 
                                                    echo "<div style='text-align:left;'>
                                                                <font size='4px' style='font-weight:bold;line-height:35px; font-size:14px;'>
                                                                    &nbsp;&nbsp;<img src='photos/flim.png' width='40' height='40' 
                                                                    style='vertical-align:middle;'/>&nbsp;&nbsp;".ret_filmname($_GET["fid"], $m)."
                                                                    <hr color='black' style=' margin-left: 4px; width: 298px;'></font>";
                                                    echo "</div><br>";
                                                    ?>
                                                    <div style="text-align:left; height:200px; width:294px; padding:0; margin-top: -24px; overflow:auto;" id="content_5" class="content" >
                                                    <?php
                                                    $i = 1;
                                                    while(@$row = mysql_fetch_array($res))
                                                    {
                                                        $charset = 'UTF-8';
                                                        $f = "$row[2]";
                                                        $f = mb_substr($f, 0, 1, $charset);
                                                        $song_id = $row['sid'];
                                                        $film_id = $row['fid'];
                                                        if(($song_id == $sid) && ($film_id == $fid))
                                                            $flm_cls = "side_menu_select";
                                                        else
                                                            $flm_cls = "side_menu_black";
                                                        echo "<a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$f&n=2' class='".$flm_cls."'>&nbsp;&nbsp;&nbsp;<img src='photos/song-no.png' width='15' height='10' />".$i.". ".$row[2]."</a>";
                                                        echo "<hr style='height:0px;border:none;display:block;' color='white' ></hr>"; 
                                                        $i  = $i+1;
                                                    }
                                                ?>
                                                </div>
                                            <?php
                                                }
                                            ?>
                                    </td>
                                </tr>
                                <?php
                                if($_SESSION["songs_record_set"] != "") {
                                ?>
                                <tr>
                                    <td >
                                        <table width="324" border="0" align="left" cellpadding="0" cellspacing="0" style="margin-top: 30px;">
                                            <tr>
                                                <td width="400" height="300" valign="top" background="">
                                                <div style="border:solid 2px #F4B332; border-radius:5px; height:340px; width: 305px;">
                                                    <table width="95%" border="0" align="left" cellpadding="0" cellspacing="0">
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
                                                                                $search_qry =  $_SESSION["songs_record_set"];
                                                                                $recordset = mysql_query($search_qry, $con);
                                                                                $i = 1;
                                                                                while($row = mysql_fetch_array($recordset))
                                                                                {                                                        
                                                                                    $charset = 'UTF-8';
                                                                                    $f = "$row[2]";
                                                                                    $song_id = $row['sid'];
                                                                                    $film_id = $row['fid'];
                                                                                    if(($song_id == $sid) && ($film_id == $fid))
                                                                                        $flm_cls = "side_menu_select";
                                                                                    else
                                                                                        $flm_cls = "side_menu_black";
                                                                                    $f = mb_substr($f, 0, 1, $charset);
                                                                                    echo "<a href='lyricstamil.php?fid=".$row['fid']."&sid=".$row['sid']."&ch=$ch&m=$m' class='".$flm_cls."'>&nbsp;&nbsp;&nbsp;
                                                                                            <img src='photos/song-no.png' width='15' height='10' />".$i.". ".$row['sname']."</a>";
                                                                                    echo "<hr style='height:0px;border:none;display:block;' color='white' ></hr>"; 
                                                                                    $i  = $i+1;
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
        <td width="28%">
            <table width="640px" height="634" border="0" cellpadding="0" cellspacing="0" background="raja-images/rollpaper.png" bgcolor="#F3EDDD">
              
            <tr>
              <td width="500" height="634">                          
              <table width="100%" height="469" border="0" align="left" cellpadding="0" cellspacing="0">              
                  <tr>
                    <td width="104" height="117" align="center" valign="middle">&nbsp;</td>
                    <td width="309" align="left" valign="middle">
                        <div  style="OVERFLOW: auto;WIDTH: 586px;HEIGHT: 550px; margin-left: 20px; padding:0; margin-top:25px;  margin-left:3;" onscroll="OnDivScroll(); "  id="lyrics_content" class="content" >
                            <?php
                            if(@isset($_GET["fid"]) && $_GET["fid"] != "" && @isset($_GET["sid"]) && $_GET["sid"] != "" )
                            {
                                @$res_tam = mysql_query($qry_tam, $con); 
                                @$row_tam = mysql_fetch_array($res_tam);
                                echo "<font style='line-height:35px;font-weight:bold;font-size:25px;color:black; margin-left: 225px;'>".$lyrics_title." : </font><p>";
                                $lyrics = $row_tam[6];
                                echo "<p>".$lyrics."</p>";    
                            }
                      
                            ?>
                        </div>
                    </td>
                    <td width="96" align="center" valign="middle">&nbsp;</td>
                  </tr>
                </table>
                </td>
            </tr>
        </table>
        </td>
    </tr>
    <tr><td colspan="2" height="50">&nbsp;</td></tr>

    
    </table>

    
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
</script>
