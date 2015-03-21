<?php
include_once("includes/config.php");
?>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
    /* when document is ready */
    $(function() {
        /* initiate pugin assigning the desired button labels  */
        $("div.holder").jPages({
            containerID: "itemContainer",
            perPage: 4,
            first: false,
            previous: "span.arrowPrev",
            next: "span.arrowNext",
            last: false
        });
    });
</script>

<style type="text/css">
    ul#itemContainer { left: 30px; height: 230px; width: 760px; list-style: none; margin: 20px 0;  }
    ul#itemContainer li { display: inline-block; margin: 20px 5px; zoom: 1;  width: 170px; top: 20px;}
    ul#itemContainer ll li img { vertical-align: bottom;  height: 224px; }
    ul#itemContainer ll li div { vertical-align: bottom; width: 125px; }
    .horizontal {
        border-right:  1px dotted #EC8C10; 
        height:130px;     
        top:100px; 
        left: 20px;
    }
    .holder {
        margin:15px 0;
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
        border:2px solid #fff;
        box-shadow: 5px 5px 5px #ccc; 
        -moz-box-shadow: 5px 5px 5px #ccc; 
        -webkit-box-shadow: 5px 5px 5px #ccc; 
        -khtml-box-shadow: 5px 5px 5px #ccc; 
        -moz-border-radius:5px; -webkit-border-radius:5px; 
        border-radius:5px; 
    }
    .album-txt-small {
        font-family: Georgia, serif; 
        font-size: 11px;
        font-weight: bolder;
        color: #666;
        text-decoration: none;
        text-align: center;
    }
    .rajaBorder{
    border:solid 2px #F4B332; 
    margin-left: 10px; 
    width: 305px; 
    border-radius:5px; 
    height:270px; 
    margin-top: 5px;
}
.borderShadow {
    -moz-border-radius: 5px;
    border-radius: 5px;
    -moz-box-shadow: 5px 5px 5px black;
    -webkit-box-shadow: 5px 5px 5px black;
    box-shadow: 5px 5px 5px black;
}
</style>
<link rel="stylesheet" href="css/jPages.css">
<link rel="stylesheet" href="css/animate.css">

<script src="js/jPages.js"></script>

<div class="holder" style="display:none;">
</div>
<div class="customBtns">
    <span class="arrowPrev"></span>
    <span class="arrowNext"></span>
</div>

<!-- item container -->
<ul id="itemContainer" class="rajaBorder borderShadow">
    <?php
    mysql_query("set character_set_results='utf8'");
    $vtb = mysql_query("select * from flim_tamil where flag='2'");
    $vtb2 = mysql_query("select * from flim_english where flag='2'");
    $tot_count = mysql_num_rows($vtb2);
    $count = 0;
    while ($r = mysql_fetch_object($vtb)) {
        $count++;
        $r2 = mysql_fetch_object($vtb2);
        $hor_class = ($count % 4 == 0) ? "h" : ($tot_count == $count) ? "" : "border-right: 1px solid #a1a1a1;";
        $latest_img_path = ($_SERVER['HTTP_HOST'] == "localhost") ? "../raja_admin/Thumbnails/" : "../rajaadmin/Thumbnails/";
        $charset = 'UTF-8';
        $length = 15;
        $tamil_film_name = (strlen($r->flimname) > 15) ? mb_substr($r->flimname, 0, $length, $charset) . '.....' : $r->flimname;
        $english_film_name = (strlen($r2->flimname) > 15) ? mb_substr($r2->flimname, 0, $length, $charset) . '.....' : $r2->flimname;
        ?>
        <li class="" style="<?php echo $hor_class; ?>">

            <img alt="Picture 1" class="latest_img" src="<?php echo $latest_img_path . $r2->image; ?>" style="align:center; height:140px !important; width:140px !important;" height="140px" width="140px" />
            <br/>
            <div class="album-txt-small">
                <a class="album-txt-small" title="<?php echo $r->flimname; ?>"  target="_blank" href="songtabletamil.php?search=film_search&m=2&id= <?php echo $r->id; ?>"> <?php echo $tamil_film_name; ?></a>
            </div>
            <div  class="album-txt-small">
                <a class="album-txt-small" title="<?php echo $r2->flimname; ?>"  target="_blank" href="songtabletamil.php?search=film_search&m=1&id= <?php echo $r->id; ?>"><?php echo $english_film_name; ?></a>
            </div>
        </li>       

    <?php } ?>    
</ul>