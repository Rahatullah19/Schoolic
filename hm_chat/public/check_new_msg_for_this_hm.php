<?php
require_once('../../hm_functions.php');
require_once('../../startsession.php');
$sender_id = $_SESSION['hm_id'];
$reciver_id = $_SESSION['reciver_id'];
$new_msg = queryMysql("SELECT chat_id FROM chat WHERE ( ( reciver_id = '$reciver_id' AND sender_id = '$sender_id' ) OR ( reciver_id = '$sender_id' AND sender_id = '$reciver_id' ) ) AND seen = 0 ");

	echo mysqli_num_rows($new_msg);

?>