<?php
include_once('header.php');

$_SESSION["BACK_PAGE_PATH"] = get_url_full_path();
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
                            <table width = "100%" height="700" border = "0"  style="margin-left: 5px; margin-top: 8px;" align = "center" cellpadding = "0" cellspacing = "0">
                                <tr><td align = "left" valign = "top"><?php include("songs_result.php"); ?></td></tr>
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
<?php include("footer.php"); ?>
<script src="js/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="ddsmoothmenu.js"></script>
<script type="text/javascript">

    function doSearch() {
        var song_name = $('#song_name').val();
        $('#songsTable').datagrid('load', {
            char: song_name
        });
    }

    $(document).ready(function() {
        $('#song_name').bind('keypress', function(e) {
            if (e.keyCode == 13) {
                doSearch();
            }
        });
    })

</script>