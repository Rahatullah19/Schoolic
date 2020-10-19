<?php
	require_once('hm_functions.php');
	
	$aim = strip_tags($_GET['user_aim']);

	$id = strip_tags($_GET['aim_user']);
	
	if(isset($aim)){
		if(isset($_GET['aim_user'])){
			$result = queryMysql("UPDATE hm_profile SET user_aim = '$aim' WHERE hm_id='$id'");
			if($result){
				echo $aim;
			} else{
				echo 'Connection Error';
			}
		} else{
			echo 'Connection Error';
		}
	} else{
		echo '';
	}
?>