<?php
include('header.php');
// session_start();
$_SESSION["BACK_PAGE_PATH"] = get_url_full_path();
?>
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
                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="center" class="site_caption">
                                    இளைராஜாவின் இசையில் வெளிவந்த அனைத்து பாடல் வரிகளின் தொகுப்பு
                                </td>
                            </tr>

                            <tr>
                                <td align="center" valign="top">
                                    <table width="100%">
                                        <tr>
                                            <td align="center">
<?php include("slideshowgit.php"); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="10px">&nbsp;</td>
                                        </tr>
                                        <tr >
                                            <td height="39" valign="top" class="big-bg" >
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="2%" height="26">&nbsp;</td>
                                                        <td width="98%" class="txt-hd-white" align="left" >Latest Ilayaraja Tracks</td>
                                                    </tr>

                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="margin-top: 20px;">
                                                <table width="750px;" align="center">
                                                    <tr>
                                                        <td>
<?php include("latest.php"); ?>
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
</td>
</tr>
</table>
<?php include("footer.php"); ?>
 <script type="text/javascript" src="js/jquery.reject.js"></script>
<script>

jQuery(document).ready(function($) { 
	check_alert_browser_compatibility();
});
function check_alert_browser_compatibility() {
   jQuery.reject({
        reject: {
            //safari: true, // Apple Safari
            safari: false, // Apple Safari
            //chrome: true, // Google Chrome
            chrome21: true, // Google Chrome
            chrome22: true, // Google Chrome
            //firefox: true, // Mozilla Firefox
            msie7: true, // Microsoft Internet Explorer
            msie8: true, // Microsoft Internet Explorer
            //msie9: true, // Microsoft Internet Explorer
            opera: true, // Opera
            konqueror: true, // Konqueror (Linux)
            linux: false,
            unknown: true // Everything else
        },
        beforeReject: function() {
            if ($.os.name === 'linux' || $.os.name === 'ipad') {
                this.browserShow = false;
                this.display =  [];
                this.paragraph2 = '';                
            }
            else
            {
                this.display = ['msie','chrome', 'firefox'];
            }
        },
        //display: ['msie','chrome'],
        browserInfo: {
            msie: { // Specifies browser name and image name (browser_konqueror.gif)
                text: 'Internet Explorer 9/10' // Text Link
            },
	    firefox: { // Specifies browser name and image name (browser_konqueror.gif)
                text: 'Firefox 30 or later' // Text Link
            },
            chrome: { // Specifies browser name and image name (browser_konqueror.gif)
                text: 'Chrome 26 or later' // Text Link
            }
        },
        //browserShow: false,
        header: 'Your browser is not supported here', // Header Text
        paragraph1: 'You are currently using an unsupported browser', // Paragraph 1
        paragraph2: 'Supported Browsers: IE 9, IE 10, Chrome 23 or later, Firefox 30 or later',
        //closeMessage: 'Close this window at your own demise!', // Message below close window link
        closeESC: false,
	imagePath: 'css/images/',
        closeCookie: false // Set cookie to remmember close for this session

    }); // Customized Browsers
}

</script>
