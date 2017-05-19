<?php
include_once ("includes/config.php");
include_once ("film_functions.php");
@session_start();

$res_tam = mysql_query("SET NAMES utf8");
//$qry_tam   = "SELECT * FROM songs_tamil WHERE 
//                   RAND()<(SELECT ((1/COUNT(*))*10) FROM songs_tamil) ORDER BY RAND() LIMIT 3";

$qry_tam = "SELECT * FROM songs_tamil INNER JOIN flim_tamil ON
                    songs_tamil.fid = flim_tamil.id AND flim_tamil.flag <> 1 AND  
                            flim_tamil.lang = 'தமிழ்'  ORDER BY RAND() LIMIT 5";
$res_tam = mysql_query($qry_tam, $con);

$_SESSION['songs_record_set'] = "";
?>

<link rel="stylesheet" href="css/jquery.heroCarousel.css">
<div class="hero">
    <div class="hero-carousel carousel-fade">
        <?php
        $count = 1;
        while ($result_set = mysql_fetch_object($res_tam)) {
            $string = $result_set->songlyrics;
            $film_id = $result_set->fid;
            $film_name = $result_set->flimname;
            $sid = $result_set->sid;
            $charset = 'UTF-8';
            $length = 500;

            if (mb_strlen($string, $charset) > $length) {
                $string = mb_substr($string, 0, $length, $charset) . '.....';
            }
			$string=trim($string);
            ?>
            <article><img src="img/music_<?php echo $count; ?>.jpg" style="" alt="raja">
                <div class="contents">
                    <p style="color:#fff; font-size: 14px; text-decoration:underline; "><?php echo $film_name; ?></p>
                    <p>
                        <a style="color:#fff; text-decoration:none; " href="lyricstamil.php?fid=<?php echo $film_id ?>&sid=<?php echo $sid ?>&m=2">
                            <?php echo strip_tags($string, '<p>'); ?> 
                        </a>
                    </p>
                </div>
            </article>
            <?php
            $count++;
        }
        ?>

    </div>
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/jquery.easing-1.3.js"></script>
    <script src="js/jquery.heroCarousel-1.3.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('.hero-carousel').heroCarousel({
                itemsToShow: 1,
                navigationPosition: 'Inside',
                navigation: true,
                // easing: 'easeOutExpo',                    
                css3pieFix: true
            });
        });
    </script>