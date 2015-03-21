<?php
include_once('header.php');
$_SESSION["BACK_PAGE_PATH"] = get_url_full_path();
?>
<table width="998" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>

        <td height="333" colspan="2" valign="top" bgcolor="#F3EDDD"><table width="998" border="0" align="center" cellpadding="0" cellspacing="0">

                <tr>


                    <td height="265" width="113" valign="top">
                        <table width="113" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>                      
                                <td width="112" height="73" valign="top">
                                    <?php include("search_by_letter.php"); ?>                   
                                </td>
                            </tr>
                            <tr>
                                <td height="33">
                                    <table width="112" border="0" align="left" cellpadding="0" cellspacing="0" style="margin-left:2px">
                                        <tr>
                                            <td width="121" height="14" valign="bottom"><img src="raja-images/lett-bg1.png" width="112" height="13" style="margin-left:-1px;" /></td>
                                        </tr>
                                        <tr>
                                            <td height="168" valign="top" class="ltr-bg2">
                                                <?php include("side.php"); ?>                          
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="raja-images/lett-bg3.png" width="112" height="9" style="margin-left:-1px; margin-bottom: 3px;" /></td>
                                        </tr>
                                    </table></td>
                            </tr>
                        </table>
                    </td>


                    <td width="827" align="left" valign="top">
                        <table width="860" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <?php
                                $_SESSION['title_name'] = 'Advanced Search(Tamil)';
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
                        <table width="860" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td  style="padding-top: 6px;"> 
                                    <table align="center" style="padding: 10px;" class="searchBorder">
                                        <form method="post" id="frm_advanced_tamil">
                                            <tr><td><input type="hidden" /></td><td><input type="hidden" /></td></tr>
                                            <tr>
                                                <td width="217">
                                                    <div class="ui-widget">
                                                        <input id="film_name" value="<?php echo @$_REQUEST['fname']; ?>" name="fname" placeholder="படப் பெயர்" style="border-radius:5px; font-size: 13px; width:188px; padding:4px 2px;"  />
                                                    </div>
                                                </td>
                                                <td width="211"><div class="ui-widget">
                                                        <input id="film_actor" value="<?php echo @$_REQUEST['actor']; ?>" name="actor"  placeholder="நடிகர்" style="border-radius:5px; font-size: 13px; width:188px; padding:4px 2px;"  />
                                                    </div></td>
                                                <td><div class="ui-widget">
                                                        <input id="film_production" name="banner" value="<?php echo @$_REQUEST['banner']; ?>" placeholder="உற்பத்தி பேனர்" style="border-radius:5px; font-size: 13px; width:188px; padding:4px 2px;"  />
                                                    </div></td>

                                                <td><div class="ui-widget">
                                                        <input id="film_actress" name="actress" value="<?php echo @$_REQUEST['actress']; ?>" placeholder="நடிகை"  style="border-radius:5px; font-size: 13px; width:188px; padding:4px 2px;" />
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td><div class="ui-widget">
                                                        <input id="film_producer" name="producer" value="<?php echo @$_REQUEST['producer']; ?>" placeholder="தயாரிப்பாளர்" style="border-radius:5px; font-size: 13px; width:188px; padding:4px 2px;"  />
                                                    </div></td>
                                                <td><div class="ui-widget">
                                                        <input id="film_coartist" name="artist" value="<?php echo @$_REQUEST['artist']; ?>" placeholder="துணை நடிகர்" style="border-radius:5px; font-size: 13px; width:188px; padding:4px 2px;"  />
                                                    </div></td>
                                                <td><div class="ui-widget">
                                                        <input id="film_director" name="director" value="<?php echo @$_REQUEST['director']; ?>" placeholder="இயக்குநர்" style="border-radius:5px; font-size: 13px; width:188px; padding:4px 2px;"  />
                                                    </div></td>

                                                <td><div class="ui-widget">

                                                        <input id="film_lyricist" name="lyricist" value="<?php echo @$_REQUEST['lyricist']; ?>" placeholder="கவிஞன்"  style="border-radius:5px; font-size: 13px; width:188px; padding:4px 2px;" />
                                                    </div></td>
                                            </tr>
                                            <tr>
                                                <td><div class="ui-widget">
                                                        <input id="film_male_singer" name="male" value="<?php echo @$_REQUEST['male']; ?>" placeholder="ஆண் பாடகர்" style="border-radius:5px; font-size: 13px; width:188px; padding:4px 2px;"  />
                                                    </div></td>
                                                <td><div class="ui-widget">
                                                        <input type="hidden" name="lang" value="2"/>
                                                        <input id="film_female_singer" name="female" value="<?php echo @$_REQUEST['female']; ?>" placeholder="பெண் பாடகி" style="border-radius:5px; font-size: 13px; width:188px; padding:4px 2px;"  />
                                                    </div></td>
                                                <td colspan="2"><div align="center">
                                                        <input name="search" type="submit" class="mybutton" style=" width:246px; height:40px; font-size:12px;font-weight:bold;" value="Advanced Search" />
                                                        <input name="reset_btn" type="reset"  id="reset_btn" class="mybutton" style=" width:140px; height:40px; font-size:12px;font-weight:bold;" value="Reset" />
                                                    </div></td></tr>
                                            </tr>

                                        </form></table>
                                </td>
                            </tr>
                            <tr><td style="padding-top:10px">
                                    <?php
                                    $_GET['m'] = 2;
                                    include_once('songs_result.php');
                                    ?>

                                </td>
                            </tr>
                            <tr><td height="20">&nbsp;&nbsp;</td></tr>
                        </table></td>
                </tr>
            </table></td>
    </tr>
</table>
<?php include("footer.php"); ?>

<script src="js/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="ddsmoothmenu.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#film_name').autocomplete({
            source: "search.php?lang=2&search_term=movie"
        });
    })
    $(document).ready(function() {
        $("#film_actor").autocomplete({
            source: "search.php?lang=2&search_term=actor"
        });
    })
    $(document).ready(function() {
        $("#film_production").autocomplete({
            source: "search.php?lang=2&search_term=production"
        });
    })
    $(document).ready(function() {
        $("#film_actress").autocomplete({
            source: "search.php?lang=2&search_term=actress"
        });
    })
    $(document).ready(function() {
        $("#film_producer").autocomplete({
            source: "search.php?lang=2&search_term=producer"
        });
    })
    $(document).ready(function() {
        $("#film_coartist").autocomplete({
            source: "search.php?lang=2&search_term=co-artist"
        });
    })
    $(document).ready(function() {
        $("#film_director").autocomplete({
            source: "search.php?lang=2&search_term=director"
        });
    })
    $(document).ready(function() {
        $("#film_lyricist").autocomplete({
            source: "search.php?lang=2&search_term=lyricist"
        });
    })
    $(document).ready(function() {
        $("#film_male_singer").autocomplete({
            source: "search.php?lang=2&search_term=male_singer"
        });
    })
    $(document).ready(function() {
        $("#film_female_singer").autocomplete({
            source: "search.php?lang=2&search_term=female_singer"
        });
    });
	$(document).ready(function() {
        $("#reset_btn").live("click", function() {
            $('#frm_advanced_tamil')[0].reset();
        });
    });
	
	jQuery.ui.autocomplete.prototype._resizeMenu = function () {
	  var ul = this.menu.element;
	  ul.outerWidth(this.element.outerWidth());
	};
    $(document).ready(function() {
        //on window scroll fire it will call a function.
        $(window).scroll(function() {
            //after window scroll fire it will add define pixel added to that element.
            set = $(document).scrollTop() + "px";
            //this is the jQuery animate function to fixed the div position after scrolling.
            $('#floatDiv').animate({top: set}, {duration: 300, queue: false});
        });
    });
	
</script>