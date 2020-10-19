<?php
require_once('hm_functions.php');
require_once('startsession.php');
$user_id = $_SESSION['hm_id'];
//$user_id = 16;
$all_friends = queryMysql("SELECT user_id_1, user_id_2, date_of_update FROM hm_friend WHERE (`user_id_1` = $user_id OR `user_id_2` = $user_id) AND `status` = 1");

if($all_friends->num_rows)
{
	while($msg_row = $all_friends->fetch_array(MYSQLI_ASSOC))
	{
		$hm_all_id_1 = $msg_row['user_id_1'];
		$hm_all_id_2 = $msg_row['user_id_2'];
		/*
		$hm_on_name = $msg_row['first_name'] ." ". $msg_row['last_name'];
		$hm_on_profile_pic = $msg_row['profile_pic'];
		$hm_on_gender_id = $msg_row['gender_id'];
		*/
		if($hm_all_id_1 == $user_id){
			$f_id = $hm_all_id_2;
		} else {
			$f_id = $hm_all_id_1;
		}
		$f_info = queryMysql("SELECT hm_id, first_name FROM hm_profile WHERE hm_id = $f_id AND profile_type = 6");
		if($f_info->num_rows)
		{
			while($f_row = $f_info->fetch_array(MYSQLI_ASSOC))
			{
?>
			<a href="../profile/pro.php?user_id=<?php echo $f_id/2+5; ?>" class="w3-tag w3-small w3-theme-l1"><?php echo $f_row['first_name'];?></a>
<?php
			}
		}
	}
}
else{
	echo "<p align='center' style='color:blue;'>You don't added any Subject.</p>";
}
?>

