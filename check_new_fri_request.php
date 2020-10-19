<?php
require_once('hm_functions.php');
require_once('startsession.php');
$sender_id = $_SESSION['hm_id'];
$new_fri_request = queryMysql("SELECT friendship_id FROM hm_friend WHERE (`user_id_1` = $sender_id OR `user_id_2` = $sender_id) AND `action_user_id` <> $sender_id AND `status` = 0");

	echo mysqli_num_rows($new_fri_request);

?>

