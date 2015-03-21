<?php
//include("includes/config.php");
echo "<table background='photos/table-bg.png' class='moveonme' border='0' cellpadding='2' cellspacing='2' width='850px' align='center' style='color:black;text-align:center;font-size:10px;'>";
extract($_REQUEST);
if (isset($_REQUEST['search'])) {
    extract($_REQUEST);
    /* echo "select * from flim_english a songs_english b where a.flimname='".$fname."' or a.actors='".$actor."' or a.prodbanner='".$banner."' or 
      a.actresses='".$actress."' or a.fproducer='".$producer."'  or a.coartists='".$artist."' or a.fdirector='".$director."'  or b.male_singer='".$male."'
      or b.female_singer='".$female."' or b.lyricist='".$lyricist."'";
      exit; */
    $sel = mysql_query("select * from flim_english a,songs_english b where (a.id=b.fid) and ( b.songlyrics like '%$fname%' or b.sname like '$fname%' or b.male_singer like '$fname%'  or b.female_singer like '$fname%' or a.flimname like '$fname%' or b.lyricist like '$fname%')");
    $count = mysql_num_rows($sel);
    mysql_query("set character_set_results='utf8'");
    $sel1 = mysql_query("select * from flim_tamil a,songs_tamil b where (a.id=b.fid) and (b.songlyrics like N'%$fname%' or b.sname like N'$fname%' or b.male_singer like N'$fname%'  or b.female_singer like N'$fname%' or a.flimname like N'$fname%' or b.lyricist like N'$fname%')");
    $count1 = mysql_num_rows($sel1);
    $sel5 = mysql_query("select * from flim_english a,songs_english b where (a.id=b.fid) and (b.songlyrics like N'%$fname%')");
    $count5 = mysql_num_rows($sel5);

    if ($count > 0) {
        echo "<tr style='color:#FFF; font-size:14px;' height='40px'>
    <th bgcolor='#a17413' style='border-radius: 7px 0 0 7px;'>Medium</th>
    <th bgcolor='#a17413'>Song Title</th>
    <th bgcolor='#a17413'>Flim Name</th>
    <th bgcolor='#a17413'>Singers</th>
    <th bgcolor='#a17413' style='border-radius: 0 7px 7px 0px;'>Lyricist</th>

    </tr>";
        mysql_query("set character_set_results='utf8'");
        while ($r = mysql_fetch_object($sel)) {
            $str1 = $r->sname;
            extract($_REQUEST);
            $keyword = "$fname";
            $look = explode('.', $str1);
            foreach ($look as $find) {
                if (strpos($find, $keyword) !== false) {
                    if (!isset($highlight)) {
                        $highlight[] = $find;
                    } else {
                        if (!in_array($find, $highlight)) {
                            $highlight[] = $find;
                        }
                    }
                }
            }

            if (isset($highlight)) {
                foreach ($highlight as $replace) {
                    $str1 = str_replace($replace, '<font style="background:red">' . $replace . '</font>', $str1);
                }
            }

            $str2 = $r->flimname;
            extract($_REQUEST);
            $keyword = "$fname";
            $look = explode('.', $str2);
            foreach ($look as $find) {
                if (strpos($find, $keyword) !== false) {
                    if (!isset($highlight)) {
                        $highlight[] = $find;
                    } else {
                        if (!in_array($find, $highlight)) {
                            $highlight[] = $find;
                        }
                    }
                }
            }

            if (isset($highlight)) {
                foreach ($highlight as $replace) {

                    $str2 = str_replace($replace, '<font style="background:red">' . $replace . '</font>', $str2);
                }
            }
            $str3 = $r->male_singer;

            extract($_REQUEST);
            $keyword = "$fname";

            $look = explode('.', $str3);

            foreach ($look as $find) {


                if (strpos($find, $keyword) !== false) {

                    if (!isset($highlight)) {
                        $highlight[] = $find;
                    } else {
                        if (!in_array($find, $highlight)) {
                            $highlight[] = $find;
                        }
                    }
                }
            }

            if (isset($highlight)) {
                foreach ($highlight as $replace) {

                    $str3 = str_replace($replace, '<font style="background:red">' . $replace . '</font>', $str3);
                }
            }
            $str4 = $r->female_singer;

            extract($_REQUEST);
            $keyword = "$fname";

            $look = explode('.', $str4);

            foreach ($look as $find) {


                if (strpos($find, $keyword) !== false) {

                    if (!isset($highlight)) {
                        $highlight[] = $find;
                    } else {
                        if (!in_array($find, $highlight)) {
                            $highlight[] = $find;
                        }
                    }
                }
            }

            if (isset($highlight)) {
                foreach ($highlight as $replace) {

                    $str4 = str_replace($replace, '<font style="background:red">' . $replace . '</font>', $str4);
                }
            }
            $str5 = $r->lyricist;

            extract($_REQUEST);
            $keyword = "$fname";

            $look = explode('.', $str5);

            foreach ($look as $find) {


                if (strpos($find, $keyword) !== false) {

                    if (!isset($highlight)) {
                        $highlight[] = $find;
                    } else {
                        if (!in_array($find, $highlight)) {
                            $highlight[] = $find;
                        }
                    }
                }
            }

            if (isset($highlight)) {
                foreach ($highlight as $replace) {

                    $str5 = str_replace($replace, '<font style="background:red">' . $replace . '</font>', $str5);
                }
            }
            $str6 = $r->songlyrics;
            extract($_REQUEST);
            $keyword = "$fname";
            $look = explode(' ', $str6);

            foreach ($look as $find) {
                if (strpos($find, $keyword) !== false) {
                    if (!isset($highlight)) {
                        $highlight[] = $find;
                    } else {
                        if (!in_array($find, $highlight)) {
                            $highlight[] = $find;
                        }
                    }
                }
            }

            if (isset($highlight)) {
                foreach ($highlight as $replace) {

                    $str6 = '<font style="background:red;">' . $replace . '</font>';
                    $m = substr($r->songlyrics, 0, 50);
                    $stri = explode($replace, $r->songlyrics, 25);
                    foreach ($stri as $strin) {
                        $i = substr($strin, 0, 50);
                    }
                }
            }


            echo "<tr class='row' onmouseover='imgchange()' onmouseout='imgdefault()' >";

            if ($r->imgflag == 1) {
                echo "<td align='left'><img id='music' src='photos/music.png' width='50' height='35' align='left' /></td>";
            } else if ($r->imgflag == 2) {
                echo "<td align='left'><img id='music' src='photos/Record + Cassette.png' width='50' height='35' align='left' /></td>";
            } else if ($r->imgflag == 3) {
                echo "<td align='left'><img id='music' src='photos/Cassette.png' width='50' height='35' align='left' /></td>";
            } else if ($r->imgflag == 4) {
                echo "<td align='left'><img id='music' src='photos/Cassette + CD.png' width='50' height='35' align='left' /></td>";
            } else if ($r->imgflag == 5) {
                echo "<td align='left'><img id='music' src='photos/CD.png' width='50' height='35' align='left' /></td>";
            } else if ($r->imgflag == 6) {
                echo "<td align='left'><img id='music' src='photos/Cassette + CD+Recoder.png' width='50' height='35' align='left' /></td>";
            }
            echo "<td align='left'><a href='lyricstamil.php?fid=$r->fid&sid=$r->sid&n=2' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'>" . $str1 . "</a></td>";
            echo "<td align='left'><a href='lyricstamil.php?fid=$r->fid&sid=$r->sid&n=2' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'>" . $str2 . " (" . $r->year . ")" . "</a></td>";
            ?>
            <td align='left'><a href='lyricstamil.php?fid=$r->fid&sid=$r->sid&n=2' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'><?php echo $str3; ?><?php if ($str3 != '' and $str4 != '') {
                echo "&nbsp;,&nbsp;";
            } ?><?php echo $str4; ?></a></td>
            <?php
            echo "<td align='left'><a href='lyricstamil.php?fid=$r->fid&sid=$r->sid&n=2' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'>" . $str5 . "</a></td>";
            echo "</tr>";
            echo "<tr>";

            if ($count5 != '') {
                echo "<td align='left'><a href='lyricstamil.php?fid=$r->fid&sid=$r->sid&n=2' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'></a></td>";
                echo "<td colspan='4' align='left'>
    <a href='lyricstamil.php?fid=$r->fid&sid=$r->sid&n=2' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'></a>" . $str6 . "</td>";
                echo "<tr>";
                echo "<td align='center'colspan='5'>--------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>";
                echo "</tr>";
            } else {
                echo "<td  align='left'><a href='lyricstamil.php?fid=$r->fid&sid=$r->sid&n=2' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'></a></td>";
                echo "<td colspan='4' align='left'><a href='lyricstamil.php?fid=$r->fid&sid=$r->sid&n=2' style='font-size:10px !important;font-weight:bold;text-decoration:none;color:black;'></a>" . $m . "</td>";
                echo "<tr>";
                echo "<td align='center' colspan='5'>-------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>";
                echo "</tr>";
            }
            echo "</tr>";
        }
    } else if ($count1 > 0) {
        echo "<tr style='color:#FFF; font-size:14px;' height='40px'>
<th bgcolor='#a17413' style='border-radius: 7px 0 0 7px;'>பதிவு ஊடகம்</th>
<th bgcolor='#a17413'>பாடல் பெயர்</th>
<th bgcolor='#a17413'>படப் பெயர்</th>
<th bgcolor='#a17413'>பாடகர்கள்</th>
<th bgcolor='#a17413' style='border-radius: 0 7px 7px 0px;'>பாடலாசிரியர்</th>


</tr>";
        $sel4 = mysql_query("select * from flim_tamil a,songs_tamil b where (a.id=b.fid) and (b.songlyrics like N'%$fname%')");
        $count4 = mysql_num_rows($sel4);
        while ($r = mysql_fetch_object($sel1)) {
            $str1 = $r->sname;

            extract($_REQUEST);
            $keyword = "$fname";

            $look = explode('.', $str1);

            foreach ($look as $find) {


                if (strpos($find, $keyword) !== false) {

                    if (!isset($highlight)) {
                        $highlight[] = $find;
                    } else {
                        if (!in_array($find, $highlight)) {
                            $highlight[] = $find;
                        }
                    }
                }
            }

            if (isset($highlight)) {
                foreach ($highlight as $replace) {

                    $str1 = str_replace($replace, '<font style="background:red">' . $replace . '</font>', $str1);
                }
            }
            $str2 = $r->flimname;

            extract($_REQUEST);
            $keyword = "$fname";

            $look = explode('.', $str2);

            foreach ($look as $find) {


                if (strpos($find, $keyword) !== false) {

                    if (!isset($highlight)) {
                        $highlight[] = $find;
                    } else {
                        if (!in_array($find, $highlight)) {
                            $highlight[] = $find;
                        }
                    }
                }
            }

            if (isset($highlight)) {
                foreach ($highlight as $replace) {

                    $str2 = str_replace($replace, '<font style="background:red">' . $replace . '</font>', $str2);
                }
            }
            $str3 = $r->male_singer;

            extract($_REQUEST);
            $keyword = "$fname";

            $look = explode('.', $str3);

            foreach ($look as $find) {


                if (strpos($find, $keyword) !== false) {

                    if (!isset($highlight)) {
                        $highlight[] = $find;
                    } else {
                        if (!in_array($find, $highlight)) {
                            $highlight[] = $find;
                        }
                    }
                }
            }

            if (isset($highlight)) {
                foreach ($highlight as $replace) {

                    $str3 = str_replace($replace, '<font style="background:red">' . $replace . '</font>', $str3);
                }
            }
            $str4 = $r->female_singer;

            extract($_REQUEST);
            $keyword = "$fname";

            $look = explode('.', $str4);

            foreach ($look as $find) {


                if (strpos($find, $keyword) !== false) {

                    if (!isset($highlight)) {
                        $highlight[] = $find;
                    } else {
                        if (!in_array($find, $highlight)) {
                            $highlight[] = $find;
                        }
                    }
                }
            }

            if (isset($highlight)) {
                foreach ($highlight as $replace) {

                    $str4 = str_replace($replace, '<font style="background:red">' . $replace . '</font>', $str4);
                }
            }
            $str5 = $r->lyricist;

            extract($_REQUEST);
            $keyword = "$fname";

            $look = explode('.', $str5);

            foreach ($look as $find) {


                if (strpos($find, $keyword) !== false) {

                    if (!isset($highlight)) {
                        $highlight[] = $find;
                    } else {
                        if (!in_array($find, $highlight)) {
                            $highlight[] = $find;
                        }
                    }
                }
            }

            if (isset($highlight)) {
                foreach ($highlight as $replace) {

                    $str5 = str_replace($replace, '<font style="background:red">' . $replace . '</font>', $str5);
                }
            }
            $str6 = $r->songlyrics;
            extract($_REQUEST);
            $keyword = "$fname";
            $look = explode(' ', $str6);

            foreach ($look as $find) {
                if (strpos($find, $keyword) !== false) {
                    if (!isset($highlight)) {
                        $highlight[] = $find;
                    } else {
                        if (!in_array($find, $highlight)) {
                            $highlight[] = $find;
                        }
                    }
                }
            }

            if (isset($highlight)) {
                foreach ($highlight as $replace) {

                    $str6 = '<font style="background:red">' . $replace . '</font>';
                    $m = substr($r->songlyrics, 0, 50);
                    $stri = explode($replace, $r->songlyrics, 25);
                    foreach ($stri as $strin) {
                        $i = substr($strin, 0, 50);
                    }
                }
            }
            echo "<tr class='row' onmouseover='imgchange()' onmouseout='imgdefault()' >";

            if ($r->imgflag == 1) {
                echo "<td align='left'><img id='music' src='photos/music.png' width='50' height='35' align='left' /></td>";
            } else if ($r->imgflag == 2) {
                echo "<td align='left'><img id='music' src='photos/Record + Cassette.png' width='50' height='35' align='left' /></td>";
            } else if ($r->imgflag == 3) {
                echo "<td align='left'><img id='music' src='photos/Cassette.png' width='50' height='35' align='left' /></td>";
            } else if ($r->imgflag == 4) {
                echo "<td align='left'><img id='music' src='photos/Cassette + CD.png' width='50' height='35' align='left' /></td>";
            } else if ($r->imgflag == 5) {
                echo "<td align='left'><img id='music' src='photos/CD.png' width='50' height='35' align='left' /></td>";
            } else if ($r->imgflag == 6) {
                echo "<td align='left'><img id='music' src='photos/Cassette + CD+Recoder.png' width='50' height='35' align='left' /></td>";
            }
            echo "<td align='left'><a href='lyricstamil.php?fid=$r->fid&sid=$r->sid&n=1' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'>" . $str1 . "</a></td>";
            echo "<td align='left'><a href='lyricstamil.php?fid=$r->fid&sid=$r->sid&n=1' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'>" . $str2 . " (" . $r->year . ")" . "</a></td>";
            ?>
            <td align='left'><a href='lyricstamil.php?fid=$r->fid&sid=$r->sid&n=1' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'><?php echo $str3; ?><?php if ($str3 != '' and $str4 != '') {
                echo "&nbsp;,&nbsp;";
            } ?><?php echo $str4; ?></a></td>
            <?php
            echo "<td align='left'><a href='lyricstamil.php?fid=$r->fid&sid=$r->sid&n=1' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'>" . $str5 . "</a></td>";

            echo "</tr>";
            echo "<tr>";
            if ($count4 != '') {
                echo "<td align='left'><a href='lyricstamil.php?fid=$r->fid&sid=$r->sid&n=2' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'></a></td>";
                echo "<td colspan='4' align='left'><a href='lyricstamil.php?fid=$r->fid&sid=$r->sid&n=2' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'></a>" . $str6 . "" . $i . "</td>";
                echo "<tr>";
                echo "<td align='center'colspan='5'>--------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>";
                echo "</tr>";
            } else {
                echo "<td  align='left'><a href='lyricstamil.php?fid=$r->fid&sid=$r->sid&n=2' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'></a></td>";
                echo "<td colspan='4' align='left'><a href='lyricstamil.php?fid=$r->fid&sid=$r->sid&n=2' style='font-size:10px;font-weight:bold;text-decoration:none;color:black;'></a>" . $m . "</td>";
                echo "<tr>";
                echo "<td align='center'colspan='5'>--------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>";
                echo "</tr>";
            }
            echo "</tr>";
        }
    } else {
        echo "<td colspan='6' align='center'><font color='red'>No Records Found</font></td>";
    }
}
?>