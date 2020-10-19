<?php
//function used to clean the malicious scripting code
function clean($text)
{
	$return_text = strip_tags($text);
	return $return_text;
}

//function used to convert spl char into html entities
function special_chars($str)
{
	$str = htmlentities($str, ENT_COMPAT, 'iso-8859-1');
	$str = preg_replace('/&(.)(acute|cedil|circ|lig|grave|ring|tilde|uml);/', "$1", $str);
	return $str;
}

//function used to fix url by adding http://, https://
function fix_url($url)
{
	if (substr($url, 0, 7) == 'http://') { return $url; }
	if (substr($url, 0, 8) == 'https://') { return $url; }
	return 'http://'. $url;
}

function _make_url_clickable_cb($matches) {
	$ret = '';
	$url = $matches[2];
 
	if ( empty($url) )
		return $matches[0];
	// removed trailing [.,;:] from URL
	if ( in_array(substr($url, -1), array('.', ',', ';', ':')) === true ) {
		$ret = substr($url, -1);
		$url = substr($url, 0, strlen($url)-1);
	}
	return $matches[1] . "<a href=\"$url\" rel=\"nofollow\" target=\"_blank\">$url</a>" . $ret;
}
 
function _make_web_ftp_clickable_cb($matches) {
	$ret = '';
	$dest = $matches[2];
	$dest = 'http://' . $dest;
 
	if ( empty($dest) )
		return $matches[0];
	// removed trailing [,;:] from URL
	if ( in_array(substr($dest, -1), array('.', ',', ';', ':')) === true ) {
		$ret = substr($dest, -1);
		$dest = substr($dest, 0, strlen($dest)-1);
	}
	return $matches[1] . "<a href=\"$dest\" rel=\"nofollow\" target=\"_blank\">$dest</a>" . $ret;
}
 
function _make_email_clickable_cb($matches) {
	$email = $matches[2] . '@' . $matches[3];
	return $matches[1] . "<a href=\"mailto:$email\">$email</a>";
}
 
function make_clickable($ret) {
	$ret = ' ' . $ret;
	// in testing, using arrays here was found to be faster
	$ret = preg_replace_callback('#([\s>])([\w]+?://[\w\\x80-\\xff\#$%&~/.\-;:=,?@\[\]+]*)#is', '_make_url_clickable_cb', $ret);
	$ret = preg_replace_callback('#([\s>])((www|ftp)\.[\w\\x80-\\xff\#$%&~/.\-;:=,?@\[\]+]*)#is', '_make_web_ftp_clickable_cb', $ret);
	$ret = preg_replace_callback('#([\s>])([.0-9a-z_+-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,})#i', '_make_email_clickable_cb', $ret);
 
	// this one is not in an array because we need it to run last, for cleanup of accidental links within links
	$ret = preg_replace("#(<a( [^>]+?>|>))<a [^>]+?>([^>]+?)</a></a>#i", "$1$3</a>", $ret);
	$ret = trim($ret);
	return $ret;
}

//function used to fetch youtube video id from youtube url
function get_youtubeid($url)
{
		$parse = parse_url($url);
		if(!empty($parse['query'])) {
		  preg_match("/v=([^&]+)/i", $url, $matches);
		  return $matches[1];
		} else {
		  //to get basename
		  $info = pathinfo($url);
		  return $info['basename'];
		}
}



//timeline position alignment
function alignment($id) {
	switch ($id)
	{
		case 0:
		echo "left";
		break;
		case 1:
		echo "right";
		break;
		case 2:
		echo "highlight";
		break;
	}
}
?>

