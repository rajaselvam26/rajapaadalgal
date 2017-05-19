<?php
include_once('includes/config.php');
include_once('includes/common_fns.php');
@$tamil_result = mysql_query("SET NAMES utf8");
$sort = isset($_REQUEST['sort']) ? strval($_REQUEST['sort']) : 'flimname';
$order = isset($_REQUEST['order']) ? strval($_REQUEST['order']) : 'asc';
$lang = (isset($_REQUEST["lang"])) ? $_REQUEST["lang"] : 1;
$film_name = isset($_POST['film_name']) ? mysql_real_escape_string($_POST['film_name']) : '';

switch ($lang) {
    case 1:
        $where = ( $film_name != "") ? " where flimname like '$film_name%' and flim_english.lang = 'Tamil' and year != 0" : "where year != 0 and flim_english.lang = 'Tamil'";
        $qry = "SELECT id, flimname, year, fproducer, fdirector, actors, actresses
                     FROM flim_english $where order by $sort $order  ";
		$recordset = mysql_query($qry, $con);
        break;
    case 2:
        $where = ( $film_name != "") ? " where flimname like '$film_name%' and flim_tamil.lang = 'தமிழ்' and year != 0" : "where year != 0 and flim_tamil.lang = 'தமிழ்'";
        $qry = "SELECT id, flimname, year, fproducer, fdirector, actors, actresses FROM flim_tamil 
                    $where order by $sort $order";
        $recordset = mysql_query($qry, $con);
        break;
    default:
        $qry = "SELECT id, flimname, year, fproducer, fdirector, actors, actresses
                     FROM flim_english order by $sort $order";
        $recordset = mysql_query($qry, $con);
}

$result["total"] = mysql_num_rows($recordset);

$items = array();

while ($row = mysql_fetch_object($recordset)) {
    // $row->movie = $row->flimname;
    $row->year = $row->year;
    $actress = ($row->actresses != "") ? ", " . $row->actresses : "";
    $row->actor_info = $row->actors . $actress;
    $params = "search=film_search&m=$lang&id=" . $row->id;
    $row->movie = "<a href='songtabletamil.php?" . $params . "' style='font-size:12px;font-weight:bold;text-decoration:none;color:black;'>" . $row->flimname . "</a>";
    $row->director = $row->fdirector;
    $row->fproducer = $row->fproducer;
    array_push($items, $row);
}

@$result["rows"] = $items;
echo json_encode($result);
?>