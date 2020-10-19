<?php
require_once('hm_functions.php');

$hm_id_1 = $_GET['hm_u_id_1'];
$hm_id_2 = $_GET['hm_u_id_2'];

$block = $_GET['bla'];

$tm = date("Y-m-d H:i:s");

$result = queryMysql("SELECT `status`, `action_user_id` FROM `hm_friend` WHERE (`user_id_1` = $hm_id_1 AND `user_id_2` = $hm_id_2) OR (`user_id_1` = $hm_id_2 AND `user_id_2` = $hm_id_1)" );
if(mysqli_num_rows($result) != 0){
		$row = mysqli_fetch_array($result);
		if($row['status'] == 0 && $row['action_user_id'] == $hm_id_2 && $block != 2){
			$insert = queryMysql("UPDATE `hm_friend` SET `status`= 1,`action_user_id`= $hm_id_1,`date_of_update`= '$tm' WHERE (`user_id_1` = $hm_id_1 AND `user_id_2` = $hm_id_2) OR (`user_id_1` = $hm_id_2 AND `user_id_2` = $hm_id_1)");
			if(!$insert) {
				//If it fails to run the SQL return an error.
				echo "Connection Failed";
			} else {
				echo '<span class="glyphicon glyphicon-minus"></span> Friend';
			}
		}
		elseif($row['status'] == 0 && $row['action_user_id'] == $hm_id_2 && $block == 2){
			$insert = queryMysql("UPDATE `hm_friend` SET `status`= 2,`action_user_id`= $hm_id_1,`date_of_update`= '$tm' WHERE (`user_id_1` = $hm_id_1 AND `user_id_2` = $hm_id_2) OR (`user_id_1` = $hm_id_2 AND `user_id_2` = $hm_id_1)");
			if(!$insert) {
				//If it fails to run the SQL return an error.
				echo "Connection Failed";
			} else {
				echo '<span class="glyphicon glyphicon-plus"></span> Friend';
			}
		}
		elseif($row['status'] == 0 && $row['action_user_id'] == $hm_id_1 && $block == 3){
			$insert = queryMysql("UPDATE `hm_friend` SET `status`= 3,`action_user_id`= $hm_id_1,`date_of_update`= '$tm' WHERE (`user_id_1` = $hm_id_1 AND `user_id_2` = $hm_id_2) OR (`user_id_1` = $hm_id_2 AND `user_id_2` = $hm_id_1)");
			if(!$insert) {
				//If it fails to run the SQL return an error.
				echo "Connection Failed";
			} else {
				echo 'Unblock';
			}
		}
		elseif($row['status'] == 0 && $row['action_user_id'] == $hm_id_2 && $block == 3){
			$insert = queryMysql("UPDATE `hm_friend` SET `status`= 3,`action_user_id`= $hm_id_1,`date_of_update`= '$tm' WHERE (`user_id_1` = $hm_id_1 AND `user_id_2` = $hm_id_2) OR (`user_id_1` = $hm_id_2 AND `user_id_2` = $hm_id_1)");
			if(!$insert) {
				//If it fails to run the SQL return an error.
				echo "Connection Failed";
			} else {
				echo 'Unblock';
			}
		}
		elseif($row['status'] == 0 && $row['action_user_id'] == $hm_id_1 && $block == 2){
			$insert = queryMysql("UPDATE `hm_friend` SET `status`= 2,`action_user_id`= $hm_id_1,`date_of_update`= '$tm' WHERE (`user_id_1` = $hm_id_1 AND `user_id_2` = $hm_id_2) OR (`user_id_1` = $hm_id_2 AND `user_id_2` = $hm_id_1)");
			if(!$insert) {
				//If it fails to run the SQL return an error.
				echo "Connection Failed";
			} else {
				echo '<span class="glyphicon glyphicon-plus"></span> Friend';
			}
		}
		elseif($row['status'] == 0 && $row['action_user_id'] == $hm_id_1){
			$insert = queryMysql("DELETE FROM `hm_friend` WHERE (`user_id_1` = $hm_id_1 AND `user_id_2` = $hm_id_2) OR (`user_id_1` = $hm_id_2 AND `user_id_2` = $hm_id_1) LIMIT 1");
			if(!$insert) {
				//If it fails to run the SQL return an error.
				echo "Connection Failed";
			} else {
				echo '<span class="glyphicon glyphicon-plus"></span> Friend';
			}
		}
		elseif($row['status'] == 1  && $block != 3){
			$insert = queryMysql("UPDATE `hm_friend` SET `status`= 2,`action_user_id`= $hm_id_1,`date_of_update`= '$tm' WHERE (`user_id_1` = $hm_id_1 AND `user_id_2` = $hm_id_2) OR (`user_id_1` = $hm_id_2 AND `user_id_2` = $hm_id_1)");
			if(!$insert) {
				//If it fails to run the SQL return an error.
				echo "Connection Failed";
			} else {
				echo '<span class="glyphicon glyphicon-plus"></span> Friend';
			}
		}
		elseif($row['status'] == 1 && $block == 3){
			$insert = queryMysql("UPDATE `hm_friend` SET `status`= 3,`action_user_id`= $hm_id_1,`date_of_update`= '$tm' WHERE (`user_id_1` = $hm_id_1 AND `user_id_2` = $hm_id_2) OR (`user_id_1` = $hm_id_2 AND `user_id_2` = $hm_id_1)");
			if(!$insert) {
				//If it fails to run the SQL return an error.
				echo "Connection Failed";
			} else {
				echo 'Unblock';
			}
		}
		elseif($row['status'] == 2 && $block == 3){
			$insert = queryMysql("UPDATE `hm_friend` SET `status`= 3,`action_user_id`= $hm_id_1,`date_of_update`= '$tm' WHERE (`user_id_1` = $hm_id_1 AND `user_id_2` = $hm_id_2) OR (`user_id_1` = $hm_id_2 AND `user_id_2` = $hm_id_1)");
			if(!$insert) {
				//If it fails to run the SQL return an error.
				echo "Connection Failed";
			} else {
				echo 'Unblock';
			}
		}
		elseif($row['status'] == 2 && $row['action_user_id'] == $hm_id_1 ){
			$insert = queryMysql("UPDATE `hm_friend` SET `status`= 1,`action_user_id`= $hm_id_1,`date_of_update`= '$tm' WHERE (`user_id_1` = $hm_id_1 AND `user_id_2` = $hm_id_2) OR (`user_id_1` = $hm_id_2 AND `user_id_2` = $hm_id_1)");
			if(!$insert) {
				//If it fails to run the SQL return an error.
				echo "Connection Failed";
			} else {
				echo '<span class="glyphicon glyphicon-minus"></span> Friend';
			}
		}
		elseif($row['status'] == 2 && $row['action_user_id'] == $hm_id_2){
			$insert = queryMysql("UPDATE `hm_friend` SET `status`= 0,`action_user_id`= $hm_id_1,`date_of_update`= '$tm' WHERE (`user_id_1` = $hm_id_1 AND `user_id_2` = $hm_id_2) OR (`user_id_1` = $hm_id_2 AND `user_id_2` = $hm_id_1)");
			if(!$insert) {
				//If it fails to run the SQL return an error.
				echo "Connection Failed";
			} else {
				echo 'Cancel Request';
			}
		}
		elseif($row['status'] == 3 && $row['action_user_id'] == $hm_id_1){
			$insert = queryMysql("DELETE FROM `hm_friend` WHERE (`user_id_1` = $hm_id_1 AND `user_id_2` = $hm_id_2) OR (`user_id_1` = $hm_id_2 AND `user_id_2` = $hm_id_1) LIMIT 1");
			if(!$insert) {
				//If it fails to run the SQL return an error.
				echo "Connection Failed";
			} else {
				echo '<span class="glyphicon glyphicon-plus"></span> Friend';
			}
		}
		
} elseif($block==3){
	$insert = queryMysql("INSERT INTO `hm_friend` VALUES ('', '$hm_id_1','$hm_id_2', 3, '$hm_id_1', '$tm')");
	if(!$insert) {
		//If it fails to run the SQL return an error.
		echo "Connection Failed";
	} else {
		echo "Unblock";
	}
}else {
	$insert = queryMysql("INSERT INTO `hm_friend` VALUES ('', '$hm_id_1','$hm_id_2', 0, '$hm_id_1', '$tm')");
	if(!$insert) {
		//If it fails to run the SQL return an error.
		echo "Connection Failed";
	} else {
		echo "Cancel Request";
	}
}




if(!$result) {
    //If it fails to run the SQL return an error.
    echo "Connection Failed";
}

?>