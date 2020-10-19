<?php
require_once('hm_functions.php');
$sender_id1 = mysqli_real_escape_string($connection, trim(($_GET['s'])-5)*2);
$reciver_id1 = mysqli_real_escape_string($connection, trim(($_GET['r'])-5)*2);
$now = date("Y-m-d H:i:s");
queryMysql("UPDATE `chat` SET `seen`= 1,`seen_on`= '$now' WHERE sender_id = '$reciver_id1' AND reciver_id = '$sender_id1' AND seen = 0");
?>