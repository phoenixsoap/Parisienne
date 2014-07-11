<?php /*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::/

        Parent Class - Parent class for loe

/::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/

class Parental {

    //main
    var $error;

    //control variables
    //var $var;

    function Parental ($type = false) {
        $this->error = 'There was an error with your request. The database could not find the information with the paramaters you provided';
		
		/*switch (true) {
			case ($type == 'staff'):
				include 'staffconnect.inc';
				break;
			default:
				include 'connect.inc';
		}*/
	}

    function diemessage ($diemessage, $diemessagetext) {
        $errordoc = '/home/phoenixsoap/loe.org/docs/errordocs/dberror.html';
        $content_array = file($errordoc);
        $content = implode('', $content_array);

        $content = str_replace('ERRORTEXTMARKER', $diemessagetext, $content);
        $content = str_replace('ERRORMESSAGEMARKER', $diemessage, $content);

        return $content;
    }
//ereg_replace(' ', '&nbsp;', )
    function ptext ($text) {
        return $this->autop($this->text2($text));
    }

    function text ($text, $mode='clean') {
    //echo mb_detect_encoding($text);
        //$text = mb_convert_encoding($text, 'UTF-8'); //convert to utf-8
        //$text = str_replace (chr(145), '&lsquo;', $text);
        //$text = str_replace (chr(146), '&rsquo;', $text);
        //$text = str_replace (chr(147), '&ldquo;', $text);
        //$text = str_replace (chr(148), '&rdquo;', $text);
        //$text = str_replace (chr(149), '&bull;', $text);
        //$text = str_replace (chr(133), '...', $text); //changes "…" to "..."
        //$text = str_replace (chr(150), "&ndash;", $text);
        //$text = str_replace (chr(151), "&mdash;", $text);
        //$text = str_replace (chr(197), "-", $text);
        //$text = str_replace (chr(226), "'", $text);
        $text = htmlentities($text, ENT_QUOTES, "UTF-8", false);
        $text=ereg_replace('&gt;', '>', $text); 
        $text=ereg_replace('&lt;', '<', $text); 
        $text=ereg_replace('&quot;', "\"", $text);
        $text=ereg_replace('&#039;', "'", $text);
        $text=ereg_replace('&amp;', '&', $text);
        return $text;
    }
    
    function text2 ($text, $mode='clean') {

        
        $text = htmlentities($text, ENT_QUOTES, "UTF-8", false);
        $text=str_replace('&gt;', '>', $text);
        $text=str_replace('&lt;', '<', $text);
        $text=str_replace('&quot;', "\"", $text);
        $text=str_replace('&#039;', "'", $text);
        $text=str_replace('&amp;', '&', $text);
        return $text;
    }

    function ttext ($text) {
        return htmlentities($text, ENT_QUOTES, "UTF-8");
    }
    
    function audiopoint($audio) {
        //$audio = str_replace("http://stream.loe.org", "http://www.loe.org", $audio);
        return $audio;
    }
    
    function makeutf ($content) {
    if(!mb_check_encoding($content, 'UTF-8')
        OR !($content === mb_convert_encoding(mb_convert_encoding($content, 'UTF-32', 'UTF-8' ), 'UTF-8', 'UTF-32'))) {

        $content = mb_convert_encoding($content, 'UTF-8');

        if (mb_check_encoding($content, 'UTF-8')) {
            // log('Converted to UTF-8');
        } else {
            // log('Could not be converted to UTF-8');
        }
    }
    return $content;
} 
    
    function ascii2entities($text){
    for($i=128;$i<=255;$i++){
        $entity = htmlentities(chr($i), ENT_QUOTES, 'cp1252');
        $temp = substr($entity, 0, 1);
        $temp .= substr($entity, -1, 1);
        if ($temp != '&;'){
            $text = str_replace(chr($i), '', $text);
        }
        else{
            $text = str_replace(chr($i), $entity, $text);
        }
    }
    return $text;
}

    function stime ($time) { 
		if ($time == '00:00:00')
			return;
		else //this hasn't been checked since being placed inside this if statement
		    return eregi_replace('^((00:)|(00:0)|(0))', '', $time);
    }

    /*function autop($text, $br=1) {
        $text = preg_replace("/(\r\n|\n|\r)/", "\n", $text); // cross-platform newlines 
        $text = preg_replace("/\n\n+/", "\n\n", $text); // duplicates 
        $text = preg_replace('/\n?(.+?)(\n\n|\z)/s', "<p>$1</p>\n", $text); 
        if ($br) $text = preg_replace('|(?<!</p>)\s*\n|', "<br />\n", $text); //line breaks 
        return $text; 
    }*/

	/*function autop($text, $br=1) { 
		$text = preg_replace("/(\r\n|\n|\r)/", "\n", $text); // cross-platform newlines 
		$text = preg_replace("/\n\n+/", "\n\n", $text); // take care of duplicates 
		$text = preg_replace('/\n?(.+?)(\n\n|\z)/s', "<p>$1</p>\n", $text); // make paragraphs, including one at the end 
		$text = preg_replace('/<p>(<(?:table|[ou]l|pre|select|form|blockquote)>)/', "$1", $text); 
		$text = preg_replace('!(</?(?:table|[ou]l|pre|select|form|blockquote)>)</p>!', "$1", $text); 
		if ($br) $text = preg_replace('|(?<!</p>)\s*\n|', "<br />\n", $text); // optionally make line breaks 
		$text = preg_replace('!(</(?:table|[ou]l|pre|select|form|blockquote)>)<br />!', "$1", $text); 
	    $text = str_replace('<p><p>', '<p>', $text); 
		$text = str_replace('</p></p>', '</p>', $text); 
		return $text; 
	}*/
	
    function autop($text, $br=1) { 
		//$text = $text . "\n"; // just to make things a little easier, pad the end 
		$text = preg_replace('|<br />\s*<br />|', "\n\n", $text); 
		$text = preg_replace('!(<(?:table|ul|ol|li|pre|form|blockquote|h[1-6])[^>]*>)!', "\n$1", $text); // Space things out a little 
		$text = preg_replace('!(</(?:table|ul|ol|li|pre|form|blockquote|h[1-6])>)!', "$1\n", $text); // Space things out a little 
		$text = preg_replace("/(\r\n|\r)/", "\n", $text); // cross-platform newlines 
		$text = preg_replace("/\n\n+/", "\n\n", $text); // take care of duplicates 
		$text = preg_replace('/\n?(.+?)(?:\n\s*\n|\z)/s', "\t<p>$1</p>\n", $text); // make paragraphs, including one at the end 
		$text = preg_replace('|<p>\s*?</p>|', '', $text); // under certain strange conditions it could create a P of entirely whitespace 
		$text = preg_replace("|<p>(<li.+?)</p>|", "$1", $text); // problem with nested lists 
		$text = preg_replace('|<p><blockquote([^>]*)>|i', "<blockquote$1><p>", $text); 
		$text = str_replace('</blockquote></p>', '</p></blockquote>', $text); 
		$text = preg_replace('!<p>\s*(</?(?:table|tr|td|th|div|ul|ol|li|pre|select|form|blockquote|p|h[1-6])[^>]*>)!', "$1", $text); 
		$text = preg_replace('!(</?(?:table|tr|td|th|div|ul|ol|li|pre|select|form|blockquote|p|h[1-6])[^>]*>)\s*</p>!', "$1", $text); 
		if ($br) $text = preg_replace('|(?<!<br />)\s*\n|', "<br />\n", $text); // optionally make line breaks 
		$text = preg_replace('!(</?(?:table|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|select|form|blockquote|p|h[1-6])[^>]*>)\s*<br />!', "$1", $text); 
		$text = preg_replace('!<br />(\s*</?(?:p|li|div|th|pre|td|ul|ol)>)!', '$1', $text); 
		$text = preg_replace('/&([^#])(?![a-z]{1,8};)/', '&#038;$1', $text);
		
		return $text; 
	}


    function curl($curl) {  
        // single quotes 
        $curl = preg_replace("/'([dmst])([ .,?!\)\/<])/i","&#8217;$1$2",$curl);  
        $curl = preg_replace("/'([lrv])([el])([ .,?!\)\/<])/i","&#8217;$1$2$3",$curl); 
        $curl = preg_replace("/(?<!=)(\s+)'((?:[^ >])?(?:.*?)(?:[^=]))'(\s*[^>&])/Ss","$1&#8216;$2&#8217;$3",$curl); 

        // doubles 
        $curl = preg_replace('/(?<!=)(\s+)"(?=[ >]])((?:.*?)(?:[^=])?)"(\s*[^>&])/Ss',"$1&#8220;$2&#8221;$3",$curl); 
        // multi-paragraph 
        $curl = preg_replace('/<p>"(.*)<\/p>/U',"<p>&#8220;$1</p>",$curl);

        // not a quote, but whatever 
        $curl = str_replace('---','&#8212;',$curl);  
        $curl = str_replace('--','&#8211;',$curl);  
        return $curl; 
    }
}
