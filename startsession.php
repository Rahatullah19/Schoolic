<?php
	session_start();
	if(!isset($_SESSION['hm_id'])){
		if(isset($_COOKIE['hm_id']) && isset($_COOKIE['id_proof'])){
			$_SESSION['hm_id'] = $_COOKIE['hm_id'];
			$_SESSION['id_proof'] = $_COOKIE['id_proof'];
		}
	}
?>

