<?php
include_once("includes/config.php");
?>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script src="jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
    /* when document is ready */
    $(function() {
        /* initiate pugin assigning the desired button labels  */
        $("div.holder").jPages({
            containerID: "itemContainer",
            perPage: 20,
            first: false,
            previous: "span.arrowPrev",
            next: "span.arrowNext",
            last: false
        });
    });
</script>

<style type="text/css">
    ul#itemContainer { left: 30px; height: auto; width: 760px; list-style: none; margin: 3px 0;  }
    ul#itemContainer li { display: block; margin: 20px 5px; zoom: 1;  width: 340px; top: 20px; float: left;}
    ul#itemContainer ll li img {display: block; vertical-align: bottom;  height: 224px; }
    ul#itemContainer ll li div { display: block; vertical-align: bottom; width: 125px; }
    .horizontal {
        border-right:  1px dotted #EC8C10; 
        height:130px;     
        top:100px; 
        left: 20px;
    }
    .holder {
        margin:15px 0;
    }
    .txt-small {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        font-weight: normal;
        color: #666;
        text-decoration: none;
    }
    .holder a {
        font-size:12px;
        cursor:pointer;
        margin:0 5px;
        color:#333;
    }
    .holder a:hover {
        background-color:#222;
        color:#fff;
    }
    .holder a.jp-current,a.jp-current:hover {
        color:#FF4242;
        font-weight:bold;
        cursor:default;
        background:none;
    }
    .holder span {
        margin:0 5px;
    }
    .customBtns {
        position:relative;
    }
    .arrowPrev,.arrowNext {
        width:29px;
        height:29px;
        position:absolute;
        top:100px;
        cursor:pointer;
    }
    .arrowPrev {
        background-image:url('img/back.gif');
        left: 5px;
    }

    .arrowNext {
        background-image:url('img/next.gif');
        right: 10px;
    }
    .arrowPrev.jp-disabled,.arrowNext.jp-disabled {
        display: none;
    }
    .latest_img {   
        border:2px solid #a1a1a1;
        box-shadow: 5px 5px 5px #ccc; 
        -moz-box-shadow: 5px 5px 5px #ccc; 
        -webkit-box-shadow: 5px 5px 5px #ccc; 
        -khtml-box-shadow: 5px 5px 5px #ccc; 
        -moz-border-radius:5px; -webkit-border-radius:5px; 
        border-radius:5px; 
    }

    .div_position {
        position: absolute;
    }

</style>
<link rel="stylesheet" href="css/jPages.css">
<link rel="stylesheet" href="css/raja_paadal.css">
<link rel="stylesheet" href="css/animate.css">

<script src="js/jPages.js"></script>

<div class="holder" style="display:none;">
</div>
<div class="customBtns">
    <span class="arrowPrev"></span>
    <span class="arrowNext"></span>
</div>

<!-- item container -->
<ul id="itemContainer" class="rajaBorder borderShadow" >
  <?php
    mysql_query("set character_set_results='utf8'");
    $vtb = mysql_query("select * from flim_english where flag='1'");	
    $count = 0;
    while ($r = mysql_fetch_object($vtb)) {
        $count++;        
        $vtb2 = mysql_query("select * from flim_tamil where rid = $r->rid");
		$r2   = mysql_fetch_object($vtb2);
		$tot_count 	= mysql_num_rows($vtb);
		$hor_class 	= ($count % 2 == 0) ? "h" : ($tot_count == $count) ? "" : "";
        
		$latest_img_path = ($_SERVER['HTTP_HOST'] == "localhost") ? "../raja_admin/Thumbnails/" : "../rajaadmin/Thumbnails/";
        ?>
        <li class = "" style = "<?php echo $hor_class; ?>">
            <table align="left">
                <tr>
                    <td>
                        <div>
                            <img alt="rajapaadalgal_album" class="latest_img" src="<?php echo $latest_img_path . $r->image; ?>" style="align:center; height:140px !important; width:140px !important;" 
                                 height="140px" width="140px" /></div>

                    </td>
                    <td valign="middle" style="">
                        <div class="txt-small" align="left">
                            <a class="txt-small" style="margin-left: 15px;color:#EC8C10;" href="songtabletamil.php?album_search=true&search=film_search&m=2&id= <?php echo $r->id; ?>"> <?php echo $r->flimname; ?></a>
                        </div>
                        <div  class="txt-small" align="left" >
                            <a class="txt-small"  style="margin-left: 15px;color:#EC8C10;" href="songtabletamil.php?album_search=true&search=film_search&m=1&id= <?php echo $r->id; ?>"><?php echo $r2->flimname; ?></a>
                        </div>
                    </td>              
                </tr>
            </table>
        </li>                  
    <?php } ?>
</ul>
<script>
    $("#itemContainer").mCustomScrollbar({
        autoHideScrollbar: true,
        theme: "light-thin"
    });
</script>