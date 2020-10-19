<?php
if(!empty($_POST['cid'])) {
	include_once 'includes/config.php';
	$cid = $_POST['cid'];
	$query = mysql_query("DELETE FROM `comments` WHERE `cid` = $cid ") or die(mysql_error());
} ?>