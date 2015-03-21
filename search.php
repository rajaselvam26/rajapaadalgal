<?php
	include_once("includes/config.php");
	mysql_query ("set character_set_results='utf8'");
	$query 	= mysql_real_escape_string($_REQUEST['term']);
	$search_term = $_REQUEST['search_term'];
	$lang = $_REQUEST['lang'];
	
	if ($lang == 1)  {
		switch ($search_term) {
			case "movie":
				$sql 	= "select flimname from `flim_english` where flimname like N'$query%'";
				$query 	= mysql_query($sql);
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['flimname'];
				}
				break;
			case "actor":
				$sql 	= "select distinct actors from `flim_english` where actors like '$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['actors'];
				}
				break;
			case "production":
				$sql 	= "select distinct prodbanner from `flim_english` where prodbanner like '$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['prodbanner'];
				}
				break;
			case "actress":
				$sql 	= "select distinct actresses from `flim_english` where actresses like '$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['actresses'];
				}
				break;
			case "producer":
				$sql 	= "select distinct fproducer from `flim_english` where fproducer like '$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['fproducer'];
				}
				break;
			case "co-artist":
				$sql 	= "select distinct coartists from `flim_english` where coartists like '$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['coartists'];
				}
				break;
			case "director":
				$sql 	= "select distinct fdirector from `flim_english` where fdirector like '$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['fdirector'];
				}
				break;
			case "lyricist":
				$sql 	= "select distinct lyricist from `songs_english` where lyricist like '$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['lyricist'];
				}
				break;
			case "male_singer":
				$sql 	= "select distinct male_singer from `songs_english` where male_singer like '$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['male_singer'];
				}
				break;
			case "female_singer":
				$sql 	= "select distinct female_singer from `songs_english` where female_singer like '$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['female_singer'];
				}
				break;
			default:
				$sql 	= "select flimname from `flim_english` where flimname like N'$query%'";
				$query 	= mysql_query($sql);
				
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['flimname'];
				}
				break;
		}
	} else if($lang == 2){

		switch ($search_term) {
			case "movie":
				$sql 	= "select flimname from `flim_tamil` where flimname like N'$query%'";
				$query 	= mysql_query($sql);
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['flimname'];
				}
				break;
			case "actor":
				$sql 	= "select distinct actors from `flim_tamil` where actors like N'$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['actors'];
				}
				break;
			case "production":
				$sql 	= "select distinct prodbanner from `flim_tamil` where prodbanner like N'$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['prodbanner'];
				}
				break;
			case "actress":
				$sql 	= "select distinct actresses from `flim_tamil` where actresses like N'$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['actresses'];
				}
				break;
			case "producer":
				$sql 	= "select distinct fproducer from `flim_tamil` where fproducer like N'$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['fproducer'];
				}
				break;
			case "co-artist":
				$sql 	= "select distinct coartists from `flim_tamil` where coartists like N'$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['coartists'];
				}
				break;
			case "director":
				$sql 	= "select distinct fdirector from `flim_tamil` where fdirector like N'$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['fdirector'];
				}
				break;
			case "lyricist":
				$sql 	= "select distinct lyricist from `songs_tamil` where lyricist like N'$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['lyricist'];
				}
				break;
			case "male_singer":
				$sql 	= "select distinct male_singer from `songs_tamil` where male_singer like N'$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['male_singer'];
				}
				break;
			case "female_singer":
				$sql 	= "select distinct female_singer from `songs_tamil` where female_singer like N'$query%'";
				$query 	= mysql_query($sql); 
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['female_singer'];
				}
				break;
			default:
				$sql 	= "select flimname from `flim_tamil` where flimname like N'$query%'";
				$query 	= mysql_query($sql);
				
				while($row = mysql_fetch_assoc($query)){
					$val[] = $row['flimname'];
				}
				break;
		}
	}
	

	echo json_encode($val);
?>