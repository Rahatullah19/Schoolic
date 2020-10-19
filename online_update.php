<?php
require_once('hm_functions.php');
require_once('startsession.php');


if(isset($_SESSION['hm_id'])){
	$online_hm_id = $_SESSION['hm_id'];
	$tm = date("Y-m-d H:i:s");
	$q = queryMysql("UPDATE hm_profile SET online_status = 1, last_seen = '$tm' WHERE hm_id = $online_hm_id ");
}
	// Find out who is online /////////
	$gap = 2; // change this to change the time in minutes, This is the time for which active users are collected. 
	$tm = date ("Y-m-d H:i:s", mktime (date("H"),date("i"),date("s")-$gap,date("m"),date("d"),date("Y")));
	
	//// Let us update the table and set the status to OFF 
	////for the users who have not interacted with 
	////pages in last 10 minutes ( set by $gap variable above ) ///
	$ut = queryMysql("UPDATE hm_profile SET online_status = 0 WHERE last_seen < '$tm' ");

?>