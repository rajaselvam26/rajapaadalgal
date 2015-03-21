 <?php
include("includes/config.php");
extract($_REQUEST);
$vtb4 = mysql_query("select * from users where email='$uname' and password='$pwd' and flag=1");
$count = mysql_num_rows($vtb4);
$fid = $_GET['fid'];
$sid = $_GET['sid'];
if (isset($_REQUEST['sub'])) {
    if ($count > 0) {
        session_start();
        $_SESSION['uname'] = $uname;
        if ($n == 1 or $n == 2) {
            header("location:lyricstamil.php?fid=$fid&sid=$sid&ch=$ch&n=$n");
        } else {
            header("location:index.php");
        }
    } else {
        $msg = 2;
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Rajapadalgal.com | Ilayaraja Songs | Tamil Songs | Best Ilayaraja Songs | Ilayaraja Movie Songs.</title>
        <link href='http://fonts.googleapis.com/css?family=Pathway+Gothic+One' rel='stylesheet' type='text/css'>
            <style type="text/css">
                body {
                    margin-left: 0px;
                    margin-top: 0px;
                    margin-right: 0px;
                    margin-bottom: 0px;
                    background-image: url(raja-images/bg-new.jpg);
                    background-attachment:fixed;
                }
                /***FIRST STYLE THE BUTTON***/
                input#searchbutton{
                    cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
                    padding:3px 3px; /*add some padding to the inside of the button*/
                    background:maroon; /*the colour of the button*/
                    border:1px solid #33842a; /*required or the default border for the browser will appear*/
                    /*give the button curved corners, alter the size as required*/
                    -moz-border-radius: 5px;
                    -webkit-border-radius: 5px;
                    border-radius: 10px;
                    /*give the button a drop shadow*/
                    -webkit-box-shadow: 0 0 4px rgba(0,0,0, .75);
                    -moz-box-shadow: 0 0 4px rgba(0,0,0, .75);
                    box-shadow: 0 0 4px rgba(0,0,0, .75);
                    /*style the text*/
                    color:#f3f3f3;
                    font-size:1em;
                    font-weight:bold;
                }
                /***NOW STYLE THE BUTTON'S HOVER AND FOCUS STATES***/
                input#searchbutton:hover, input#searchbutton:focus{
                    background-color :orange; /*make the background a little darker*/
                    /*reduce the drop shadow size to give a pushed button effect*/
                    -webkit-box-shadow: 0 0 1px rgba(0,0,0, .75);
                    -moz-box-shadow: 0 0 1px rgba(0,0,0, .75);
                    box-shadow: 0 0 1px rgba(0,0,0, .75);
                }

                .moveonme tr.row:hover, a:hover
                {
                    cursor:pointer;
                    color:#a17413 !important;
                    background-color:#cab66d !important;
                }

                .ltr-bg2 {
                    background-image: url(raja-images/lett-bg2.png);
                    background-repeat:repeat-y;
                }
                .body-bg {
                    background-image: url(raja-images/body-white.png);
                }
                .ltr-bg-hd {
                    background-image: url(raja-images/letters-bg-head1.png);
                    background-repeat:no-repeat;
                }
                .txt-hd-white {
                    font-family: "Times New Roman", Times, serif;
                    font-size: 13px;
                    font-weight: bold;
                    color: #FFF;
                    text-decoration: none;
                }
                .txt-hd-brown {
                    font-family: "Times New Roman", Times, serif;
                    font-size: 17px;
                    font-weight: bold;
                    color: #662117;
                    text-decoration: none;
                }
                .txt-hd-color {
                    font-family: 'Pathway Gothic One', sans-serif;
                    font-size: 17px;
                    font-weight: bold;
                    color: #531B14;
                    text-decoration: none;
                }
                .txt-hd-whiteCopy {
                    font-family: 'Pathway Gothic One', sans-serif;
                    font-size: 20px;
                    font-weight: bold;
                    color: #FFF;
                    text-decoration: none;

                }
                .search-bg {
                    background-image: url(raja-images/search-bg.png);
                    background-repeat:no-repeat;
                }
                .title-bg-hd {
                    background-image: url(raja-images/title-head.png);
                    background-repeat:no-repeat;
                }
                .big-bg {
                    background-image: url(raja-images/latest-head.png);
                    background-repeat:no-repeat;
                }
                .txt-small {
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 11px;
                    font-weight: normal;
                    color: #666;
                    text-decoration: none;
                }
                .txt-smallwhite {
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 12px;
                    font-weight: normal;
                    color: #FFF;
                    text-decoration: none;
                }
                .txt-smallCopy {
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 11px;
                    font-weight: normal;
                    color: #666;
                    text-decoration: none;
                    text-align: justify;
                    line-height: 17px;
                }
                .side-buton-head {
                    background-image: url(raja-images/side-button-bg.png);
                }
                .side-white {
                    background-image: url(raja-images/side-whit.png);
                }
                .side-bg2 {
                    background-image: url(raja-images/side-bg2.png);
                }
                .footer-bg {
                    background-image: url(raja-images/footer-bg.jpg);
                }
                .text {	font-family: 'Sintony', sans-serif;
                        font-size: 13px;
                        line-height: 24px;
                        font-weight: normal;
                        color: #FFF;
                        text-decoration: none;
                        text-align: justify;
                }
                .textcolor {
                    font-family: 'Sintony', sans-serif;
                    font-size: 13px;
                    line-height: 24px;
                    font-weight: bold;
                    color: #F90;
                    text-decoration: none;
                }
                .foot {
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 12px;
                    font-weight: normal;
                    color: #FFF;
                    text-decoration: none;
                }
                .aa-bg {
                    background-image: url(raja-images/aa-bg.jpg);
                }
                .text-white {
                    font-family: Verdana, Geneva, sans-serif;
                    font-size: 12px;
                    font-weight: bold;
                    text-decoration: none;
                    color: #FFF;
                }
                .song-lyrics-bg {
                    background-image: url(raja-images/song-lyrics-bg.png);
                }
                .l2 {
                    background-image: url(raja-images/l2.png);
                }
                .lry-bg1 {
                    background-image: url(raja-images/lyrics-bg1.jpg);
                }
                .form-txt {
                    border-top-color: #B17D19;
                    border-right-color: #B17D19;
                    border-bottom-color: #B17D19;
                    border-left-color: #B17D19;


                }
                .search-bg-big {
                    background-image: url(raja-images/search.png);
                    background-repeat:no-repeat;
                    background-position:right;
                }
                .search-bg-big input
                {
                    padding-left:10px;
                }
                .l-big2 {
                    background-image: url(raja-images/lbig3.png);
                }
                .lyrics-big {
                    background-image: url(raja-images/lyrics-big.jpg);
                }
                ul#menu, ul#menu ul.sub-menu {
                    padding:0;
                    margin: 0;
                }
                ul#menu li, ul#menu ul.sub-menu li {
                    list-style-type: none;
                    display: inline-block;
                }
                /*Link Appearance*/
                ul#menu li a, ul#menu li ul.sub-menu li a {
                    text-decoration: none;
                    color: #fff;
                    /*background: #666;*/
                    padding: 5px;
                    display:inline-block;
                    margin-left: 68px;
                    margin-right: 8px;
                    margin-top: 9px;
                }
                /*Make the parent of sub-menu relative*/
                ul#menu li {
                    position: relative;
                }
                /*sub menu*/
                ul#menu li ul.sub-menu {
                    display:none;
                    position: absolute;
                    top: 30px;
                    left: 0;
                    width: 100px;
                }
                ul#menu li:hover ul.sub-menu {
                    display:block;
                    background:none !important;
                }
                .menu1
                {
                    background:url(raja-images/menu.png) no-repeat;
                    width:990px;
                    height:39px;



                }
                .btn
                {
                    background:#CAB66D;
                    width:92px; height:42px;
                }
            </style>

            <link rel="stylesheet" type="text/css" href="ddsmoothmenu.css" />
            <link rel="stylesheet" type="text/css" href="ddsmoothmenu-v.css" />

            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
            <script type="text/javascript" src="ddsmoothmenu.js">
            </script>

            <script type="text/javascript">

                        ddsmoothmenu.init({
                        mainmenuid: "smoothmenu1", //menu DIV id
                                orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
                                classname: 'ddsmoothmenu', //class added to menu's outer DIV
                                //customtheme: ["#1c5a80", "#18374a"],
                                contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
                                })

                        ddsmoothmenu.init({
                        mainmenuid: "smoothmenu2", //Menu DIV id
                                orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
                                classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
                                method: 'hover', // set to 'hover' (default) or 'toggle'
                                arrowswap: true, // enable rollover effect on menu arrow images?
                                //customtheme: ["#804000", "#482400"],
                                contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
                                })

                        function imgchange()
                                {
            //document.getElementById("music").src="photos/music1.png";

                                $('.row').bind('click', function(){
                                window.location = $('a:first', this).attr('href');
                                        });
                                        }

                        function imgdefault()
                                {
            //document.getElementById("music").src="photos/music.png";
                                }

            </script>
    </head>

    <body>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style=" margin:0 auto;">
            <tr>
                <td height="977" valign="top"><table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td height="977" valign="top" bgcolor="#FFFFFF"><?php include('header.php'); ?><!--<table width="990" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td bgcolor="#FFFFFF"><table width="984" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td width="391" height="128" valign="top" bgcolor="#F3EDDD"><img src="raja-images/raja-paadalgal-logo.png" width="380" height="126" /></td>
                                  <td width="599" colspan="-1" valign="top" bgcolor="#F3EDDD"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                      <td width="77%" height="50">&nbsp;</td>
                                      <td width="23%"><img src="raja-images/social-icons.png" width="130" height="50" /></td>
                                    </tr>
                                    <tr>
                                      <td height="78" colspan="2"><li><iframe src="test/index-key.php" width="387" height="167" scrolling="yes" style="left: 524px;
                      overflow: hidden;
                      position: absolute;
                      top: -13px; border:none;"></iframe></li></td>
                                    </tr>
                                  </table></td>
                                </tr>
                                <tr>
                                  <td height="50" colspan="2" align="center" valign="top" bgcolor="#F3EDDD"><ul id="menu">
                     <a href="index.php"> <li style="background:url(raja-images/home.png) no-repeat; height:39px; width:167px;">
                          
                      </li></a>
                      <a href="about.php"><li style="background:url(raja-images/about.png) no-repeat;  height:39px; width:140px; margin: 0 -3px  0 -46px;">  
                      </li></a> 
                      <li style="background:url(raja-images/advanced.png) no-repeat;  height:39px; width:231px;">
                   <ul class="sub-menu">
                              <a href="advanced_tamil.php"><li style="background:url(raja-images/tamil.png) no-repeat; margin-left: -73px; margin-top: -5px; height: 39px; width: 188px; ">
                                  
                              </li></a>
                             <a href="advanced_english.php"> <li style="background:url(raja-images/english.png) no-repeat; margin-left: -74px; margin-top: -21px; height: 39px; width: 188px; ">
                                  
                              </li></a>
                             
                          </ul>
                      </li>
                     <a href="feedback.php"> <li style="background:url(raja-images/feedback.png) no-repeat;  height:39px; width:140px;margin: 0 -8px 0 -54px;">
                          </li></a>
                     <a href="contact.php"> <li style="background:url(raja-images/contact.png) no-repeat;  height:39px; width:140px;">
                          
                      </li></a>
                      <a href="news.php"> <li style="background:url(raja-images/news.png) no-repeat;  height:39px; width:139px;margin: 0 -23px  0 -3px;">
                         </li> </a>
                      
                       <a href="blog.php"><li style="background:url(raja-images/blog.png) no-repeat;  height:39px; width:140px;">
                          </li></a>
                      
                  </ul></td>
                                </tr>
                              </table></td>
                            </tr>
                          </table>-->
                                <table width="984" border="0" align="center" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td height="333" colspan="2" valign="top" bgcolor="#F3EDDD"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0" id="searchbutton">
                                                <tr>
                                                    <td width="153" height="265" valign="top"><table width="133" border="0" align="center" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td width="142" height="76" valign="top"><table width="112" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                            <td width="112" height="72" background="raja-images/side-bg.png"><table width="100%" height="34" border="0" cellpadding="0" cellspacing="0">
                                                                                    <tr>
                                                                                        <td width="3%" height="26">&nbsp;</td>
                                                                                        <td width="97%" valign="top" class="txt-hd-white">Search by Letters</td>
                                                                                    </tr>
                                                                                </table></td>
                                                                        </tr>
                                                                    </table></td>
                                                            </tr>
                                                            <tr>
                                                                <td height="33"><table width="112" border="0" align="left" cellpadding="0" cellspacing="0">
                                                                        <tr>
                                                                            <td width="121" height="14" valign="bottom"><img src="raja-images/lett-bg1.png" width="112" height="13" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td height="168" valign="top" class="ltr-bg2"><table width="93" border="0" align="center" cellpadding="0" cellspacing="0">
                                                                                    <tr>

                                                                                        <td width="8">&nbsp;</td>
                                                                                        <td width="85"><div id="smoothmenu2" class="ddsmoothmenu-v">
                                                                                                <ul>
                                                                                                    <li><a href="#">A </a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=A&m=1">A</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=B&m=1">B</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=C&m=1">C</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=D&m=1">D</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=E&m=1">E</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=F&m=1">F</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=G&m=1">G</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=H&m=1">H</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=I&m=1">I</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=J&m=1">J</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=K&m=1">K</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=L&m=1">L</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=M&m=1">M</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=N&m=1">N</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=O&m=1">O</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=P&m=1">P</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=Q&m=1">Q</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=R&m=1">R</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=S&m=1">S</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=T&m=1">T</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=U&m=1">U</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=V&m=1">V</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=W&m=1">W</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=X&m=1">X</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=Y&m=1">Y</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=Z&m=1">Z</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li><a href="#">அ </a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=அ&m=2">அ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஆ&m=2">ஆ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=இ&m=2">இ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஈ&m=2">ஈ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=உ&m=2">உ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஊ&m=2">ஊ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=எ&m=2">எ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஏ&m=2">ஏ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஐ&m=2">ஐ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஒ&m=2">ஒ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஓ&m=2">ஓ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஔ&m=2">ஔ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li><a href="#">க </a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=க&m=2">க</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=கா&m=2">கா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=கி&m=2">கி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=கீ&m=2">கீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=கு&m=2">கு</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=கூ&m=2">கூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=கெ&m=2">கெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=கே&m=2">கே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=கை&m=2">கை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=கொ&m=2">கொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=கோ&m=2">கோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=கௌ&m=2">கௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li><a href="#">ங</a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=ங&m=2">ங</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஙா&m=2">ஙா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஙி&m=2">ஙி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஙீ&m=2">ஙீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஙு&m=2">ஙு</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஙூ&m=2">ஙூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஙெ&m=2">ஙெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஙே&m=2">ஙே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஙை&m=2">ஙை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஙொ&m=2">ஙொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஙோ&m=2">ஙோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஙௌ&m=2">ஙௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li><a href="#">ச </a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=ச&m=2">ச</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=சா&m=2">சா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=சி&m=2">சி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=சீ&m=2">சீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=சு&m=2">சு</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=சூ&m=2">சூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=செ&m=2">செ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=சே&m=2">சே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=சை&m=2">சை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=சொ&m=2">சொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=சோ&m=2">சோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=சௌ&m=2">சௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li><a href="#">ஞ</a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=ஞ&m=2">ஞ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஞா&m=2">ஞா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஞி&m=2">ஞி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஞீ&m=2">ஞீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஞு&m=2">ஞு</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஞூ&m=2">ஞூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஞெ&m=2">ஞெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஞே&m=2">ஞே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஞை&m=2">ஞை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஞொ&m=2">ஞொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஞோ&m=2">ஞோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ஞௌ&m=2">ஞௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li><a href="#">ட</a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=ட&m=2">ட</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=டா&m=2">டா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=டி&m=2">டி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=டீ&m=2">டீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=டு&m=2">டு</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=டூ&m=2">டூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=டெ&m=2">டெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=டே&m=2">டே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=டை&m=2">டை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=டொ&m=2">டொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=டோ&m=2">டோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=டௌ&m=2">டௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li><a href="#">ண</a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=ண&m=2">ண</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ணா&m=2">ணா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ணி&m=2">ணி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ணீ&m=2">ணீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ணு&m=2">ணு</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ணூ&m=2">ணூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ணெ&m=2">ணெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ணே&m=2">ணே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ணை&m=2">ணை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ணொ&m=2">ணொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ணோ&m=2">ணோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ணௌ&m=2">ணௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li><a href="#">த </a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=த&m=2">த</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=தா&m=2">தா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=தி&m=2">தி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=தீ&m=2">தீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=து&m=2">து</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=தூ&m=2">தூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=தெ&m=2">தெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=தே&m=2">தே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=தை&m=2">தை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=தொ&m=2">தொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=தோ&m=2">தோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=தௌ&m=2">தௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li><a href="#">ந </a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=ந&m=2">ந</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=நா&m=2">நா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=நி&m=2">நி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=நீ&m=2">நீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=நு&m=2">நு</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=நூ&m=2">நூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=நெ&m=2">நெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=நே&m=2">நே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=நை&m=2">நை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=நொ&m=2">நொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=நோ&m=2">நோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=நௌ&m=2">நௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li><a href="#">ப</a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=ப&m=2">ப</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=பா&m=2">பா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=பி&m=2">பி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=பீ&m=2">பீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=பு&m=2">பு</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=பூ&m=2">பூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=பெ&m=2">பெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=பே&m=2">பே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=பை&m=2">பை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=பொ&m=2">பொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=போ&m=2">போ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=பௌ">பௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li><a href="#">ம </a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=ம&m=2">ம</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=மா&m=2">மா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=மி&m=2">மி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=மீ&m=2">மீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=மு&m=2">மு</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=மூ&m=2">மூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=மெ&m=2">மெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=மே&m=2">மே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=மை&m=2">மை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=மொ&m=2">மொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=மோ&m=2">மோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=மௌ&m=2">மௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li><a href="#">ய</a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=ய&m=2">ய</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=யா&m=2">யா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=யி&m=2">யி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=யீ&m=2">யீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=யு&m=2">யு</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=யூ&m=2">யூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=யெ&m=2">யெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=யே&m=2">யே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=யை&m=2">யை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=யொ&m=2">யொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=யோ&m=2">யோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=யௌ&m=2">யௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    </li>
                                                                                                    <li><a href="#">ர </a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=ர&m=2">ர</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ரா&m=2">ரா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ரி&m=2">ரி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ரீ&m=2">ரீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ரு&m=2">ரு</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ரூ&m=2">ரூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ரெ&m=2">ரெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ரே&m=2">ரே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ரை&m=2">ரை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ரொ&m=2">ரொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ரோ&m=2">ரோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ரௌ&m=2">ரௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    </li>
                                                                                                    <li><a href="#">ல</a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=ல&m=2">ல</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=லா&m=2">லா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=லி&m=2">லி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=லீ&m=2">லீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=லு&m=2">லு</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=லூ&m=2">லூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=லெ&m=2">லெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=லே&m=2">லே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=லை&m=2">லை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=லொ&m=2">லொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=லோ&m=2">லோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=லௌ&m=2">லௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    </li>
                                                                                                    <li><a href="#">வ</a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=வ&m=2">வ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=வா&m=2">வா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=வி&m=2">வி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=வீ&m=2">வீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=வு&m=2">வு</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=வூ&m=2">வூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=வெ&m=2">வெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=வே&m=2">வே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=வை&m=2">வை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=வொ&m=2">வொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=வோ&m=2">வோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=வௌ&m=2">வௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    </li>
                                                                                                    <li><a href="#">ழ</a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=ழ&m=2">ழ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ழா&m=2">ழா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ழி&m=2">ழி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ழீ&m=2">ழீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ழு&m=2">ழு</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ழூ&m=2">ழூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ழெ&m=2">ழெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ழே&m=2">ழே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ழை&m=2">ழை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ழொ&m=2">ழொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ழோ&m=2">ழோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ழௌ&m=2">ழௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    </li>
                                                                                                    <li><a href="#">ள</a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=ள&m=2">ள</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ளா&m=2">ளா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ளி&m=2">ளி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ளீ&m=2">ளீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ளு&m=2">ளு</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ளூ&m=2">ளூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ளெ&m=2">ளெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ளே&m=2">ளே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ளை&m=2">ளை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ளொ&m=2">ளொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ளோ&m=2">ளோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=ளௌ&m=2">ளௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    </li>
                                                                                                    <li><a href="#">ற</a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=ற&m=2">ற</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=றா&m=2">றா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=றி&m=2">றி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=றீ&m=2">றீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=று&m=2">று</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=றூ&m=2">றூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=றெ&m=2">றெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=றே&m=2">றே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=றை&m=2">றை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=றொ&m=2">றொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=றோ&m=2">றோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=றௌ&m=2">றௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    </li>
                                                                                                    <li><a href="#">ன</a>
                                                                                                        <ul>
                                                                                                            <li><a href="songtabletamil.php?char=ன&m=2">ன</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=னா&m=2">னா</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=னி&m=2">னி</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=னீ&m=2">னீ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=னு&m=2">னு</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=னூ&m=2">னூ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=னெ&m=2">னெ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=னே&m=2">னே</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=னை&m=2">னை</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=னொ&m=2">னொ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=னோ&m=2">னோ</a></li>
                                                                                                            <li><a href="songtabletamil.php?char=னௌ&m=2">னௌ</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                </ul>
                                                                                                </li>
                                                                                                </ul>
                                                                                                <br style="clear: left" />
                                                                                            </div></td>
                                                                                    </tr>
                                                                                </table></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><img src="raja-images/lett-bg3.png" width="112" height="9" /></td>
                                                                        </tr>
                                                                    </table></td>
                                                            </tr>
                                                        </table></td>
                                                    <td width="827" valign="top"><table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td width="161" height="40" valign="top" background="raja-images/letters-bg-head.png"><table width="129" height="45" border="0" align="center" cellpadding="0" cellspacing="0">
                                                                        <tr>
                                                                            <td width="12%" height="45" valign="middle" class="txt-hd-white">&nbsp;</td>
                                                                            <td width="88%" valign="middle" class="txt-hd-white"><div align="left"><span class="txt-hd-brown"> Login</span></div></td>
                                                                        </tr>
                                                                    </table></td>
                                                                <td width="660" align="right" valign="top"> <table width="662" border="0" align="center" cellpadding="0" cellspacing="0">
                                                                        <tr>
                                                                            <td width="662" height="56"  class="search-bg-big" ><form method="post" action="overallsearch.php"><label for="textfield3"></label>
                                                                                    <input name="fname" style="margin: 6px 0 0 138px; width: 434px;border:none;height:25px;"  type="text" class="form-txt" id="textfield3" size="70" onblur='if (this.value == & quot; & quot; ) {this.value = & quot; Over all search for Raja songs & quot; }' onfocus='if (this.value == & quot; Over all search for Raja songs & quot; ) {this.value = & quot; & quot; }' value="Over all search for Raja songs" /><input type="submit" style="background: none repeat scroll 0 0 #EFAE0D; border: medium none; border-radius: 10px; border-radius: 10px; margin: 0 -1px 0 11px; padding: 9px 5px 8px 8px;" name="search" value="search" /></form></td>
                                                                                <!--<td width="70"><button type="submit" style="margin:-18px 0 0 12px;"><img src="raja-images/search_button.png"  /></button></td>
                                                                                    <td width="110"><input type="submit" name="button" id="searchbutton" value="Search" /></td>-->
                                                                        </tr>
                                                                    </table></td>
                                                                <td width="29" valign="top">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td height="19" colspan="3" valign="top" background="raja-images/side-bg-under.png" style="background-repeat:no-repeat;">&nbsp;</td>
                                                            </tr>

                                                        </table>
                                                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <th valign="top">
<?php
include("includes/config.php");
?><form action="" method="post" enctype="multipart/form-data" name="form1">
                                                                        <div style="margin-top: 139px;">
                                                                            <div style="font-family: Helvetica;font-size: 13px; margin-bottom: -12px; float: left; margin-top: -44px;"><h3>New User</h3></div>
                                                                            <div style="background:#FFF; border:solid 1px #CCC; float:left; font-family: Helvetica; height: 251px; padding-top: 11px; border-radius:5px; padding-bottom: 34px; width: 385px;">

                                                                                <div style="margin: 14px 17px -5px 73px;">


                                                                                    <div style="margin-bottom: 7px;margin-left: -297px;"><h5>Register Account</h5></div>

                                                                                    <div style="margin-bottom: 7px; margin-left: -61px; width:306px; font-size: 14px; font-weight: normal;" align="justify">By creating  an account you will be able to browse the lyrics faster,be up to date data.</div>








                                                                                    <div style="margin-bottom: 7px; margin-top: 49px; margin-top: 49px; margin-left: -310px;"> <a style="text-decoration:none;" href="register.php"><input name="sub" class="btn" type="button" value="Continue" /></a></div>

                                                                                </div>

                                                                            </div>
                                                                            <div style="font-family: Helvetica;font-size: 13px; float:right; margin-left: -275px;
                                                                                 margin-right: 276px;
                                                                                 margin-top: -43px;"><h3>Existing User</h3></div>
                                                                            <div style="background:#FFF; border:solid 1px #CCC; float:right; font-family: Helvetica; padding-top: 11px;  border-radius:5px; padding-bottom: 34px; width: 385px;">

<?php
if ($msg == 2) {
    echo"<font style='font-size: 12px;
    margin-left: 11px; font-family: georgia;' color='#FF0000;''>Username Or Password Is Invalid</font>";
}
?>
                                                                                <div style="padding-left:10px;">


                                                                                    <div  align="left" style="margin-bottom: 7px;"><h5>I am a returning user</h5></div>

                                                                                    <div  align="left" style="margin-bottom: 7px; font-weight:normal; font-size:14px;
                                                                                          ">Email Address</div>

                                                                                    <div  align="left" style="margin-bottom: 7px; font-weight:normal; font-size:14px;"><input type="text" name="uname" id="uname" required="required" /></div>


                                                                                    <div align="left" style="margin-bottom: 7px; font-weight:normal; font-size:14px;"> Password</div>
                                                                                    <div  align="left" style="margin-bottom: 7px;">
                                                                                        <input type="password" name="pwd" id="pwd"  required="required" /><span id="rep"></span></div>
                                                                                    <div><a style="text-decoration:none; color:#D9A420; margin-left: -232px; font-family:Georgia, 'Times New Roman', Times, serif" href="forgot.php">Forgot Password</a></div>

                                                                                    <div style="margin-bottom: 7px; margin-top: 10px;"> <input name="sub" style="height: 42px;
                                                                                                                                               width: 92px; margin-left: -172px; background:
                                                                                                                                               #CAB66D;" type="submit" value="Login" /></div>

                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </form>
<?php
/* @$m=@$_GET["m"];
  @$n=@$_GET["n"];
  if($m==2)
  {
  @$a=@$_GET["char"];

  @$ch=@$_GET["ch"];

  @$fid=@$_GET["fid"];
  @$sid=@$_GET["sid"];

  @$result = mysql_query("SET NAMES utf8");

  if(@isset($_GET["char"]) && $_GET["char"] != "" )
  {
  @$qry="select * from songs_tamil inner join flim_tamil on songs_tamil.fid=flim_tamil.id where sname LIKE '$a%' order by sname asc";

  @$result = mysql_query($qry, $con);



  echo "<table background='photos/table-bg.png' class='moveonme' border='0' cellpadding='2' cellspacing='2' width='850px' align='center' style='color:white;text-align:center;font-size:14px;background-repeat:no-repeat;'>
  <tr height='40px'>
  <th bgcolor='#a17413'>Medium</th>
  <th bgcolor='#a17413'>Song Title</th>
  <th bgcolor='#a17413'>Flim Name</th>
  <th bgcolor='#a17413'>Singers</th>
  <th bgcolor='#a17413'>Lyricist</th>
  <th bgcolor='#a17413'>Likes</th>
  </tr>";

  if(mysql_num_rows($result) > 0 )
  {
  while(@$row=mysql_fetch_array($result))
  {
  $charset = 'UTF-8';
  $ch = "$row[2]";
  $ch = mb_substr($ch, 0, 1, $charset); */

// bgcolor='#dacf91'

/* echo "<tr class='row' onmouseover='imgchange()' onmouseout='imgdefault()' >";

  echo "<td align='left'><img id='music' src='photos/music.png' width='35' height='35' align='left' /></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=1' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'>".$row[2]."</a></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=1' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'>".$row[19]." (".$row[20].")"."</a></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=1' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'>".$row[3].",".$row[4]."</a></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=1' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'>".$row[8]."</a></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=1' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'>".$row[12]."</a></td>";

  echo "</tr>";

  }
  }
  else
  { */
//echo "<center><font size=6 color='white'>it brings no data....</font></center>";
/* }
  echo "</table>";
  }
  }else if($m==1)
  {
  @$a=@$_GET["char"];

  @$ch=@$_GET["ch"];

  @$fid=@$_GET["fid"];
  @$sid=@$_GET["sid"];

  @$result = mysql_query("SET NAMES utf8");

  if(@isset($_GET["char"]) && $_GET["char"] != "" )
  {
  @$qry="select * from songs_english inner join flim_english on songs_english.fid=flim_english.id where sname LIKE '$a%' order by sname asc";

  @$result = mysql_query($qry, $con);



  echo "<table background='photos/table-bg.png' class='moveonme' border='0' cellpadding='2' cellspacing='2' width='850px' align='center' style='color:white;text-align:center;font-size:14px;background-repeat:no-repeat;'>
  <tr height='40px'>
  <th bgcolor='#a17413'>Medium</th>
  <th bgcolor='#a17413'>Song Title</th>
  <th bgcolor='#a17413'>Flim Name</th>
  <th bgcolor='#a17413'>Singers</th>
  <th bgcolor='#a17413'>Lyricist</th>
  <th bgcolor='#a17413'>Likes</th>
  </tr>";

  if(mysql_num_rows($result) > 0 )
  {
  while(@$row=mysql_fetch_array($result))
  {
  $charset = 'UTF-8';
  $ch = "$row[2]";
  $ch = mb_substr($ch, 0, 1, $charset);



  echo "<tr class='row' onmouseover='imgchange()' onmouseout='imgdefault()' >";

  echo "<td align='left'><img id='music' src='photos/music.png' width='35' height='35' align='left' /></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=2' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>".$row[2]."</a></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=2' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>".$row[19]." (".$row[20].")"."</a></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=2' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>".$row[3].",".$row[4]."</a></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=2' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>".$row[8]."</a></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=2' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>".$row[12]."</a></td>";

  echo "</tr>";

  }
  }
  else
  {

  }
  echo "</table>";
  }
  }
  else if($n==1)
  {
  @$fid=@$_GET["id"];
  @$result = mysql_query("SET NAMES utf8");


  @$qry="select * from songs_tamil inner join flim_tamil on songs_tamil.fid=flim_tamil.id where songs_tamil.fid='$fid' order by sname asc";

  @$result = mysql_query($qry, $con);



  echo "<table background='photos/table-bg.png' class='moveonme' border='0' cellpadding='2' cellspacing='2' width='850px' align='center' style='color:white;text-align:center;font-size:14px;background-repeat:no-repeat;'>
  <tr height='40px'>
  <th bgcolor='#a17413'>Medium</th>
  <th bgcolor='#a17413'>Song Title</th>
  <th bgcolor='#a17413'>Flim Name</th>
  <th bgcolor='#a17413'>Singers</th>
  <th bgcolor='#a17413'>Lyricist</th>
  <th bgcolor='#a17413'>Likes</th>
  </tr>";

  if(mysql_num_rows($result) > 0 )
  {
  while(@$row=mysql_fetch_array($result))
  {
  $charset = 'UTF-8';
  $ch = "$row[2]";
  $ch = mb_substr($ch, 0, 1, $charset);



  echo "<tr class='row' onmouseover='imgchange()' onmouseout='imgdefault()' >";

  echo "<td align='left'><img id='music' src='photos/music.png' width='35' height='35' align='left' /></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=1' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>".$row[2]."</a></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=1' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>".$row[19]." (".$row[20].")"."</a></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=1' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>".$row[3].",".$row[4]."</a></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=1' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>".$row[8]."</a></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=1' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>".$row[12]."</a></td>";

  echo "</tr>";

  }
  }
  else
  {

  }
  echo "</table>";

  }
  else if($n==2)
  {
  @$fid=@$_GET["id"];
  @$result = mysql_query("SET NAMES utf8");


  @$qry1="select * from songs_english inner join flim_english on songs_english.fid=flim_english.id where songs_english.fid='$fid' order by sname asc";

  @$result = mysql_query($qry1, $con);



  echo "<table background='photos/table-bg.png' class='moveonme' border='0' cellpadding='2' cellspacing='2' width='850px' align='center' style='color:white;text-align:center;font-size:14px;'>
  <tr height='40px'>
  <th bgcolor='#a17413'>Medium</th>
  <th bgcolor='#a17413'>Song Title</th>
  <th bgcolor='#a17413'>Flim Name</th>
  <th bgcolor='#a17413'>Singers</th>
  <th bgcolor='#a17413'>Lyricist</th>
  <th bgcolor='#a17413'>Likes</th>
  </tr>";

  if(mysql_num_rows($result) > 0 )
  {
  while(@$row=mysql_fetch_array($result))
  {
  $charset = 'UTF-8';
  $ch = "$row[2]";
  $ch = mb_substr($ch, 0, 1, $charset);



  echo "<tr class='row' onmouseover='imgchange()' onmouseout='imgdefault()' >";

  echo "<td align='left'><img id='music' src='photos/music.png' width='35' height='35' align='left' /></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=2' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>".$row[2]."</a></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=2' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>".$row[19]." (".$row[20].")"."</a></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=2' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>".$row[3].",".$row[4]."</a></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=2' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>".$row[8]."</a></td>";
  echo "<td align='left'><a href='lyricstamil.php?fid=$row[0]&sid=$row[1]&ch=$ch&n=2' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>".$row[12]."</a></td>";

  echo "</tr>";

  }
  }
  else
  {

  }
  echo "</table>";

  } */
?>
                                                                </th>
                                                            </tr>
                                                        </table></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td width="679" height="333" align="center" valign="top" bgcolor="#F3EDDD"><?php include("album.php"); ?><!--</div>--></td>
                                    </tr>
                                </table></td>
                            <td width="305" valign="top" bgcolor="#F3EDDD"><table width="287" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td height="267" valign="top"><img src="raja-images/facebook-face.png" width="287" height="262" /></td>
                                    </tr>
                                    <tr>
                                        <td height="288" align="center"><img src="raja-images/advertisement.png" width="280" height="280" /></td>
                                    </tr>
                                </table></td>
                        </tr>
                    </table></td>
            </tr>
        </table>
        <table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td height="75" class="footer-bg"><table width="990" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                            <td height="28" align="center" class="foot">Copyrights © Rajapadalgal.com .Website Designed by <a href="http://www.360degreeinfo.com/" target="_blank" class="text">360degreeinfo</a></td>
                        </tr>
                    </table></td>
            </tr>
        </table></td>
        </tr>
        </table>
    </body>
</html>