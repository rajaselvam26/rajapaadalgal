<?php
	function get_medium_img($medium_id) {
	
		switch ($medium_id) {
			case 1:
				$medium_img="Record.png";
				break;
			case 2:
				$medium_img="Record_Cassette.png";
				break;
			case 3:
				$medium_img="Cassette.png";
				break;
			case 4:
				$medium_img="Cassette_CD.png";
				break;
			case 5:
				$medium_img="CD.png";
				break;
			case 6:
				$medium_img="Cassette_CD_Recoder.png";
				break;
			default:
				$medium_img="Record.png";
				break;
		}
		return $medium_img;
	}

	
	function get_singers_details($male_singer, $female_singer){
		$delimter = ($male_singer!='' and $female_singer!='') ? ", " : "";
		$singers =  trim($male_singer).$delimter.trim($female_singer);
		return wordwrap($singers, 50, "<br />\n");
	}

	function highlight_songs_replace_old($text_string, $terms){
    ## We can loop through the array of terms from string 
    foreach ($terms as $term)
    {
         ## use preg_quote 
            $term = preg_quote($term);
           ## Now we can  highlight the terms 
            $text_string = preg_replace("/\b($term)\b/i", '<span style="background:red">\1</span>', $text_string);
    }
          ## lastly, return text string with highlighted term in it
          return  $text_string;
    }

    function highlight_songs_replace_new($str, $search) {
	    $highlightcolor = "#daa732";
	    $occurrences = substr_count(strtolower($str), strtolower($search));
	    $newstring = strip_tags($str);
	    $match = array();
	 
	    for ($i=0;$i<$occurrences;$i++) {
	        $match[$i] = stripos($str, $search, $i);
	        $match[$i] = substr($str, $match[$i], strlen($search));
	        $newstring = str_replace($match[$i], '[#]'.$match[$i].'[@]', strip_tags($newstring));
	    }
	 
	    $newstring = str_replace('[#]', '<span style="color: '.$highlightcolor.';">', $newstring);
	    $newstring = str_replace('[@]', '</span>', $newstring);
	    return $newstring;
	 
	}

	function limit_text( $text, $limit = 100000000000 ) {
        if ( strlen ( $text ) < $limit ) {
            return $text;
        }
        $split_words = explode(' ', $text );
        $out = null;
        foreach ( $split_words as $word ) {
            if ( ( strlen( $word ) > $limit ) && $out == null ) {
                return substr( $word, 0, $limit )."...";
            }
            
            if (( strlen( $out ) + strlen( $word ) ) > $limit) {
                return $out . "...";
            }            
            $out.=" " . $word;
        }
        return $out;
    }

	    /**
	 * Perform a simple text replace
	 * This should be used when the string does not contain HTML
	 * (off by default)
	 */
	define('STR_HIGHLIGHT_SIMPLE', 1);
	 
	/**
	 * Only match whole words in the string
	 * (off by default)
	 */
	define('STR_HIGHLIGHT_WHOLEWD', 2);
	 
	/**
	 * Case sensitive matching
	 * (off by default)
	 */
	define('STR_HIGHLIGHT_CASESENS', 4);
	 
	/**
	 * Overwrite links if matched
	 * This should be used when the replacement string is a link
	 * (off by default)
	 */
	define('STR_HIGHLIGHT_STRIPLINKS', 8);
	 
	/**
	 * Highlight a string in text without corrupting HTML tags
	 *
	 * @author      Aidan Lister <aidan@php.net>
	 * @version     3.1.1
	 * @link        http://aidanlister.com/2004/04/highlighting-a-search-string-in-html-text/
	 * @param       string          $text           Haystack - The text to search
	 * @param       array|string    $needle         Needle - The string to highlight
	 * @param       bool            $options        Bitwise set of options
	 * @param       array           $highlight      Replacement string
	 * @return      Text with needle highlighted
	 */
	function highlight_songs_replace($text, $needle, $options = null, $highlight = null)
	{


	    // Default highlighting
	    if ($highlight === null) {
	        $highlight = '<strong>\1</strong>';
	    }
	 
	    // Select pattern to use
	    if ($options & STR_HIGHLIGHT_SIMPLE) {
	        $pattern = '#(%s)#';
	        $sl_pattern = '#(%s)#';
	    } else {
	        $pattern = '#(?!<.*?)(%s)(?![^<>]*?>)#';
	        $sl_pattern = '#<a\s(?:.*?)>(%s)</a>#';
	    }
	 
	    // Case sensitivity
	    if (!($options & STR_HIGHLIGHT_CASESENS)) {
	        $pattern .= 'i';
	        $sl_pattern .= 'i';
	    }
	 
	    $needle = (array) $needle;
	    foreach ($needle as $needle_s) {
	        $needle_s = preg_quote($needle_s);
	 
	        // Escape needle with optional whole word check
	        if ($options & STR_HIGHLIGHT_WHOLEWD) {
	            $needle_s = '\b' . $needle_s . '\b';
	        }
	 
	        // Strip links
	        if ($options & STR_HIGHLIGHT_STRIPLINKS) {
	            $sl_regex = sprintf($sl_pattern, $needle_s);
	            $text = preg_replace($sl_regex, '\1', $text);
	        }
	 
	        $regex = sprintf($pattern, $needle_s);
	        $text = preg_replace($regex, $highlight, $text);
	    }
	 	
	    return $text;
	}

	function first_few_words($text, $limit=20){
		$split_char = explode(' ', $text);
		$new_string  = "";

		$dots = '.....';
		if(count($split_char) <= $limit){
			$dots = '';
		}
		for($i=0; $i<$limit; $i++){
			$new_string .= @$split_char[$i]." ";
		}
		if ($dots) {
			$new_string = substr($new_string, 0, strlen($new_string));
		}
		return $new_string.$dots;
	}

function before ($this, $inthat)
    {
        return substr($inthat, 0, strpos($inthat, $this));
    };

function rajaWordWrap($str, $width, $break)
{
    $return = '';
    $br_width = mb_strlen($break, 'UTF-8');
    for($i = 0, $count = 0; $i < mb_strlen($str, 'UTF-8'); $i++, $count++)
    {
        if (mb_substr($str, $i, $br_width, 'UTF-8') == $break)
        {
            $count = 0;
            $return .= mb_substr($str, $i, $br_width, 'UTF-8');
            $i += $br_width - 1;
        }
        
        if ($count > $width)
        {
            $return .= $break;
            $count = 0;
        }
        
        $return .= mb_substr($str, $i, 1, 'UTF-8');
    }
    
    return $return;
}

function get_url_full_path(){
	return "http://".$_SERVER['SERVER_NAME']."/".$_SERVER['REQUEST_URI'];
}

function before_and_after_search_string($phrase, $keyword){
	$lcWords = preg_split("/\s/", strtolower($phrase));
	$words = preg_split("/\s/", $phrase);
	$wordCount = 5;

	$position = array_search(strtolower($keyword), $lcWords);
	$indexBegin =  max(array($position - $wordCount, 0));
	$len = min(array(count($words), $position - $indexBegin + $wordCount + 1));
	return join(" ", array_slice($words, $indexBegin, $len));

}

?>