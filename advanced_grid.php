<?php

include("includes/config.php");
include_once('includes/common_fns.php');
// session_start();
extract($_REQUEST);
@$tamil_result = mysql_query("SET NAMES utf8");
$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'sname';
$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
if (isset($fname) != '' or isset($actor) != '' or isset($banner) != '' or isset($actress) != '' or isset($producer) != '' or isset($artist) != '' or isset($director) != '' or isset($male) != '' or isset($female) != '' or isset($lyricist) != '') {
    if (isset($_REQUEST['search'])) {

        $lang = @$_GET["ch"];

        if ($lang == 1) {
            $search_query = "SELECT b.sname, b.sid, b.fid, b.imgflag, b.lyricist, b.male_singer, b.female_singer, 
	                    			a.flimname, a.year FROM flim_english a,songs_english b 
	                    			WHERE a.id=b.fid and a.flimname like '%$fname%' and a.actors like '%$actor%' 
	                    				and a.prodbanner like '%$banner%' and a.actresses like '%$actress%' 
	                    					and a.fproducer like '%$producer%'  and a.coartists like '%$artist%' 
	                    						and a.fdirector like '%$director%'  and b.male_singer like '%$male%' 
													and b.female_singer like '%$female%' and b.lyricist like '%$lyricist%' order by $sort $order";
            $recordset = mysql_query($search_query, $con);
        } else if ($lang == 2) {
            $search_query = "SELECT b.sname, b.sid, b.fid, b.imgflag, b.lyricist, b.male_singer, b.female_singer, 
	                    			a.flimname, a.year FROM flim_tamil a,songs_tamil b 
	                    				where a.id=b.fid and a.flimname like '%$fname%' 
	                    				and a.actors like N'%$actor%' and a.prodbanner like N'%$banner%' 
	                    				and a.actresses like N'%$actress%' and a.fproducer like N'%$producer%'  
	                    					and a.coartists like N'%$artist%' and a.fdirector like N'%$director%'  
	                    					and b.male_singer like N'%$male%' and b.female_singer like N'%$female%' and b.lyricist like N'%$lyricist%' order by $sort $order";
            $recordset = mysql_query($search_query, $con);
        }
        $_SESSION['songs_record_set'] = "";
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
            $row->sname = "<a href='lyricstamil.php?" . $params . "' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>" . $row->sname . "</a>";
            $row->Medium = "<img id='music' src='photos/" . $medium_img_path . "' width='39' height='32' align='left'/>";
            array_push($items, $row);
        }
        @$result["rows"] = $items;
        //print_r($result);
    }
}
echo json_encode($result);
?>