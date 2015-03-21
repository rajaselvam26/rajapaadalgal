<?php

include_once('includes/config.php');
include_once('includes/common_fns.php');
session_start();
@$tamil_result = mysql_query("SET NAMES utf8");
$album_search = trim(@$_REQUEST["album_search"]);    
   
    
    $eng_album_search = ($album_search == true) ? "" : "AND flim_english.flag <> 1";
    $tamil_album_search = ($album_search == true) ? "" : "AND flim_tamil.flag <> 1";
if (@$_REQUEST['fname'] == "") {

    $search_char = (isset($_REQUEST["char"])) ? $_REQUEST["char"] : "";
    $film_name = isset($_POST['song_name']) ? mysql_real_escape_string($_POST['song_name']) : '';
    $lang = ($_REQUEST["m"] != "") ? $_REQUEST["m"] : "";
    $_SESSION['m'] = $lang;
    $n = (@$_REQUEST["n"] == "") ? ($lang == 1) ? 2 : 1 : @$_REQUEST["n"];
    $film_id = trim(@$_REQUEST["film_id"]);
    $film_search = trim(@$_REQUEST["flm_search"]);
     $_SESSION['n'] = $n;
    $sort = isset($_REQUEST['sort']) ? (strval($_REQUEST['sort']) == "film_info") ? "flimname" : strval($_REQUEST['sort']) : 'sname';
    $order = isset($_REQUEST['order']) ? strval($_REQUEST['order']) : 'asc';
    switch ($lang) {
        case 1:
            if ($film_search == "") {
                $qry = "SELECT songs_english.sname, songs_english.sid, songs_english.fid, songs_english.imgflag, songs_english.lyricist, 
                         songs_english.male_singer, songs_english.female_singer, 
                            flim_english.flimname, flim_english.year FROM songs_english  inner join 
                                flim_english on songs_english.fid=flim_english.id where sname LIKE N'$search_char%' $eng_album_search  AND flim_english.lang = 'Tamil' order by $sort $order";
            } else {
                $qry = "SELECT songs_english.sname, songs_english.sid, songs_english.fid, songs_english.imgflag, songs_english.lyricist, 
                         songs_english.male_singer, songs_english.female_singer, 
                            flim_english.flimname, flim_english.year FROM songs_english  inner join 
                                flim_english on songs_english.fid=flim_english.id 
                                where fid = $film_id AND flim_english.lang = 'Tamil' $eng_album_search order by $sort $order";
            }
            $recordset = mysql_query($qry, $con);

            $_SESSION['songs_record_set'] = $qry;
            break;
        case 2:
            if ($film_id != "" && $film_search == "") {
                $qry = "SELECT songs_tamil.sname, songs_tamil.sid, songs_tamil.fid, songs_tamil.imgflag, songs_tamil.lyricist, 
                         songs_tamil.male_singer, songs_tamil.female_singer, 
                            flim_tamil.flimname, flim_tamil.year FROM songs_tamil
                            INNER JOIN flim_tamil on songs_tamil.fid=flim_tamil.id WHERE songs_tamil.fid = $film_id  $tamil_album_search  AND flim_tamil.lang = 'தமிழ்'
                             ORDER BY sname asc";
            } else if ($film_search == "") {
                $qry = "SELECT songs_tamil.sname, songs_tamil.sid, songs_tamil.fid, songs_tamil.imgflag, songs_tamil.lyricist, 
                         songs_tamil.male_singer, songs_tamil.female_singer, 
                            flim_tamil.flimname, flim_tamil.year FROM songs_tamil 
                            inner join flim_tamil on songs_tamil.fid=flim_tamil.id 
                            where sname LIKE N'$search_char%' AND flim_tamil.lang = 'தமிழ்' $tamil_album_search order by sname asc";
            } else {
                $qry = "SELECT songs_tamil.sname, songs_tamil.sid, songs_tamil.fid, songs_tamil.imgflag, songs_tamil.lyricist, 
                         songs_tamil.male_singer, songs_tamil.female_singer, 
                            flim_tamil.flimname, flim_tamil.year FROM songs_tamil 
                            inner join flim_tamil on songs_tamil.fid=flim_tamil.id 
                            where fid = $film_id AND flim_tamil.lang = 'தமிழ்' $tamil_album_search order by sname asc";
            }
            $recordset = mysql_query($qry, $con);
            $_SESSION['songs_record_set'] = $qry;
            break;
        default:
            $qry = "select * from songs_tamil inner join flim_tamil on songs_tamil.fid=flim_tamil.id
                         where sname LIKE N'$search_char%' AND flim_tamil.lang = 'தமிழ்' order by sname asc";
            $recordset = mysql_query($qry, $con);
    }

    $result["total"] = mysql_num_rows($recordset);

    $items = array();

    while ($row = mysql_fetch_object($recordset)) {
        $medium_img_path = get_medium_img($row->imgflag);
        $row->singer_info = get_singers_details($row->male_singer, $row->female_singer);
        $row->film_info = $row->flimname . "(" . $row->year . ")";
        $params = "search=" . $film_search . "&fid=" . $row->fid . "&sid=" . $row->sid . "&m=" . $lang;
        if (isset($search_char) != "") {
            $params.="&ch=" . $search_char;
        }
        $row->sname = "<a href='lyricstamil.php?" . $params . "' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>" . first_few_words($row->sname, 2) . "</a>";
        $row->Medium = "<img id='music' src='photos/" . $medium_img_path . "' width='39' height='32' align='left'/>";
        array_push($items, $row);
    }

    @$result["rows"] = $items;
    //print_r($result);   
} else {
    $search_char = $_REQUEST['fname'];
    $search_index = $_REQUEST['search_index'];
    if ($search_index == 1) {
        $qry = "SELECT songs_english.sname, songs_english.sid, songs_english.fid, songs_english.imgflag, songs_english.lyricist, 
                     songs_english.male_singer, songs_english.female_singer, 
                        flim_english.flimname, flim_english.year FROM songs_english  inner join 
                            flim_english on songs_english.fid=flim_english.id where  sname LIKE N'$search_char%' $eng_album_search AND flim_english.lang = 'Tamil'";
        $recordset = mysql_query($qry, $con);
        $_SESSION['songs_record_set'] = $qry;
        $lang = 1;
        if (mysql_num_rows($recordset) <= 0) {
            @$tamil_result = mysql_query("SET NAMES utf8");
            $qry = "SELECT songs_tamil.sname, songs_tamil.sid, songs_tamil.fid, songs_tamil.imgflag, songs_tamil.lyricist, 
                         songs_tamil.male_singer, songs_tamil.female_singer, 
                            flim_tamil.flimname, flim_tamil.year FROM songs_tamil 
                            inner join flim_tamil on songs_tamil.fid=flim_tamil.id 
                            where sname LIKE N'$search_char%' $tamil_album_search  AND flim_tamil.lang = 'தமிழ்' order by sname asc";
            $recordset = mysql_query($qry, $con);
            $_SESSION['songs_record_set'] = $recordset;
            $lang = 2;
        }

        $result["total"] = mysql_num_rows($recordset);

        $items = array();

        while ($row = mysql_fetch_object($recordset)) {
            $medium_img_path = get_medium_img($row->imgflag);
            $row->singer_info = get_singers_details($row->male_singer, $row->female_singer);
            $row->film_info = $row->flimname . "(" . $row->year . ")";
            $params = "fid=" . $row->fid . "&sid=" . $row->sid . "&m=" . $lang;
            if (isset($search_char) != "") {
                $params.="&ch=" . $search_char;
            }
            $row->sname = "<a href='lyricstamil.php?" . $params . "' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>" . first_few_words($row->sname, 2) . "</a>";
            $row->Medium = "<img id='music' src='photos/" . $medium_img_path . "' width='39' height='32' align='left'/>";
            array_push($items, $row);
        }

        @$result["rows"] = $items;
    } else if ($search_index == 2) {
        @$result = array();
        $items = array();
        @$tamil_result = mysql_query("SET NAMES utf8");
        $qry = "SELECT songs_english.sname, songs_english.sid, songs_english.fid, songs_english.imgflag, songs_english.lyricist, 
                     songs_english.male_singer, songs_english.songlyrics, songs_english.female_singer, 
                        flim_english.flimname, flim_english.year FROM songs_english  inner join 
                            flim_english on songs_english.fid=flim_english.id where songlyrics LIKE N'%$search_char%' AND flim_english.lang = 'Tamil'";

        $recordset = mysql_query($qry, $con);
        $_SESSION['songs_record_set'] = $qry;
        $lang_char = 1;
        if (mysql_num_rows($recordset) <= 0) {
            @$tamil_result = mysql_query("SET NAMES utf8");
            $qry = "SELECT songs_tamil.sname,  songs_tamil.sid, songs_tamil.fid, songs_tamil.imgflag, songs_tamil.lyricist, 
                         songs_tamil.male_singer, songs_tamil.songlyrics, songs_tamil.female_singer, 
                            flim_tamil.flimname, flim_tamil.year FROM songs_tamil 
                            inner join flim_tamil on songs_tamil.fid=flim_tamil.id 
                            where songlyrics LIKE N'%$search_char%' AND flim_tamil.lang = 'தமிழ்'";
            $recordset = mysql_query($qry, $con);
            $_SESSION['songs_record_set'] = $qry;
            $lang_char = 2;
        }
        $result["total"] = mysql_num_rows($recordset);
        while ($row = mysql_fetch_object($recordset)) {
            $medium_img_path = get_medium_img($row->imgflag);
            $row->singer_info = get_singers_details($row->male_singer, $row->female_singer);
            $row->film_info = $row->flimname . "(" . $row->year . ")";
            $params = "m=" . $lang_char . "&fid=" . $row->fid . "&sid=" . $row->sid;
            if (isset($search_char) != "") {
                $params.="&ch=" . $search_char;
            }
            @$tamil_result = mysql_query("SET NAMES utf8");
            $str1 = $row->songlyrics;
            $str1 = trim(preg_replace('/ +/', ' ', strip_tags($str1)));
            $keyword = array($search_char);
            $explode_result = explode($search_char, html_entity_decode($str1));

            $start_string = (isset($explode_result[0])) ? substr($explode_result[0], -20, 20) : "";

            $end_string = (isset($explode_result[1])) ? substr($explode_result[1], 0, 50) : "";
	 
            if ($lang_char == 1) {
                $end_string = preg_replace('/[^A-Za-z0-9]/', ' ', $end_string);
                $start_string = preg_replace('/[^A-Za-z0-9]/', ' ', $start_string);
            }

            $final_str = trim(strip_tags(htmlspecialchars($start_string))) . "<span style='background-color: #DDB107; font-weight:bolder; color: #fff;'>" . $search_char . "</span>" . trim(strip_tags(htmlspecialchars($end_string)));
			
			$highlight = '<span style="text-decoration: underline;">\1</span>';
            $row->sname = "<a href='lyricstamil.php?" . $params . "' style='font-size:12px;font-weight:normal;text-decoration:none;color:black;'><strong>" . first_few_words($row->sname, 2) . "</strong><br />"
                    . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . trim(($final_str)). "</a>";

            $row->Medium = "<img id='music' src='photos/" . $medium_img_path . "' width='39' height='32' align='left' />";
	    $row->songlyrics = "";
            array_push($items, $row);
        }
	
        @$result["rows"] = $items;
	
    }
}

//var_dump(@$result["rows"]);
echo json_encode(@$result);
?>