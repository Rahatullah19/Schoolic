<?php
	if(isset($_POST['save_aim'])){
		if(isset($_POST['aim'])){
			$aim = $_POST['aim'];
			$id = $_SESSION['hm_id'];
			$result = queryMysql("SELECT user_aim FROM hm_profile WHERE hm_id='$id'");    
			if ($result->num_rows){  
				queryMysql("UPDATE hm_profile SET user_aim = '$aim' WHERE hm_id='$id'");
			}
		}
	}
?>