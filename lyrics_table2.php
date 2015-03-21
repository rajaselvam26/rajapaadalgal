<?php 
    include_once('includes/config.php');
    include_once('includes/common_fns.php');
    @$tamil_result = mysql_query("SET NAMES utf8");
    
    $search_char   = $_REQUEST["char"];
    $lang           = $_REQUEST["m"];
    $_SESSION['m']  = $lang;
    $n = (@$_REQUEST["n"] == "") ? ($lang == 1) ? 2 : 1 : @$_REQUEST["n"];

    $_SESSION['n']  = $n;
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
    $offset = ($page-1)*$rows;

    switch ($lang) {
      case 1:
        $qry = "SELECT songs_english.sname, songs_english.sid, songs_english.fid, songs_english.imgflag, songs_english.lyricist, 
                 songs_english.male_singer, songs_english.female_singer, 
                    flim_english.flimname, flim_english.year FROM songs_english  inner join flim_english on songs_english.fid=flim_english.id where sname LIKE '$search_char%' order by sname asc";
        $recordset = mysql_query($qry, $con);
        break;
      case 2:
  
        $qry="select songs_tamil.sname, songs_tamil.sid, songs_tamil.fid, songs_tamil.imgflag, songs_tamil.lyricist, 
                 songs_tamil.male_singer, songs_tamil.female_singer, 
                    flim_tamil.flimname, flim_tamil.year from songs_tamil inner join flim_tamil on songs_tamil.fid=flim_tamil.id where sname LIKE '$search_char%' order by sname asc";
        $recordset = mysql_query($qry, $con);
        break;
      default:
        $qry="select * from songs_tamil inner join flim_tamil on songs_tamil.fid=flim_tamil.id where sname LIKE '$search_char%' order by sname asc";
        $recordset = mysql_query($qry, $con);         
    }
  
    $result["total"] = mysql_num_rows($recordset);
    
    $items = array();
    
    while($row = mysql_fetch_object($recordset)){
        $medium_img_path = get_medium_img($row->imgflag);        
        $row->singer_info = get_singers_details($row->male_singer, $row->female_singer);
        $row->film_info =  $row->flimname."(".$row->year.")";
        $row->song_detail = "<a href='lyricstamil.php?fid=".$row->fid."&sid=".$row->sid."&ch=".$search_char."&n=".$n."' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>".$row->sname."</a>";
        $row->Medium = "<img id='music' src='photos/".$medium_img_path."' width='39' height='32' align='left'/>";
        array_push($items, $row);        
    }

    @$result["rows"] = $items;
    //print_r($result);   
    echo json_encode($result);
?>