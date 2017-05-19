<?php include('header.php'); ?>

<table width="998" border="0" align="left" cellpadding="0" cellspacing="0">
    <tr>
        <td height="333" colspan="2" valign="top" bgcolor="#F3EDDD">
            <table width="993" border="0" align="left" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="112" height="265" valign="top">
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="112" height="73" valign="top">
                                    <?php include("search_by_letter.php"); ?>                   
                                </td>
                            </tr>
                            <tr>                
                                <td height="33">
                                    <table width="112" border="0" align="left" cellpadding="0" cellspacing="0" style="margin-left:3px;">
                                        <tr>
                                            <td width="112" align="left" height="14" valign="bottom">
                                                <img src="raja-images/lett-bg1.png"  style="margin-left: px;" width="112px" height="13" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" class="ltr-bg2">
                                                <?php include("side.php"); ?>                         
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="raja-images/lett-bg3.png" width="112px" height="9" style="" />
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="827" valign="top" border="1">
                        <table width="860" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <?php
                                $_SESSION['title_name'] = 'Private Album';
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
                        <table width = "100%" border = "0"  style="margin-left: -5px; margin-top: 2px;" align = "center" cellpadding = "0" cellspacing = "0">
                            <tr>
                                <td align="center" class="site_caption">
                                    இளையராஜாவின் இசையில் வெளிவந்த அனைத்து ஆல்பங்களின் தொகுப்பு
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="padding-left: 5px; margin-top: 0px;">
                                    <?php include_once("album_list.php"); ?> <br/>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

        </td>
    </tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
<?php include("footer.php"); ?>