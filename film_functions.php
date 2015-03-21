<?php

function ret_filmname($film_id, $lang) {
    include ("includes/config.php");
    if ($lang == 2)
        $qry_film = "select * from flim_tamil where id=$film_id";
    else
        $qry_film = "select * from flim_english where id=$film_id";

    $film_tam = mysql_query($qry_film, $con);
    $film_result = mysql_fetch_object($film_tam);
    $film_name = $film_result->flimname;
    return $film_name;
}

?>