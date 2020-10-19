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
		$f_info = queryMysql("SELECT hm_id, first_name, last_name, last_seen, profile_pic, gender_id FROM hm_profile WHERE hm_id = $f_id");
		if($f_info->num_rows)
		{
			while($f_row = $f_info->fetch_array(MYSQLI_ASSOC))
			{
?>
			<span id="tab_for_chat_list">
				<div id="submit_reciver_id" >
					<table id="tabs_r_work">
						<tr>
							<td id="work_info" style="float:left;" width="12%">
								 <img src="../images/profile_pic/<?php if($f_row['profile_pic'] != ""){ echo $f_row['profile_pic']; } else{ echo "male.jpg"; }?>" id="worker_pic">
							</td>
							<td align="left" id="work_detail" width="88%">
								<table>
									<tr>
										<td>
											<b><a href="../profile/pro.php?user_id=<?php echo $f_id/2+5; ?>" style="font-size:12px;"><?php echo $f_row['first_name'] . " " . $f_row['last_name'];?></a> </b><br><small><span class="glyphicon glyphicon-envelope" onClick="toChat('<?php echo $f_id/2+5; ?>')" title="Chat with <?php echo $f_row['first_name'] . " " . $f_row['last_name'];?>"></span></small><br />
										</td>
									</tr>
									<!--
									<tr>
										<td>
											<?php if($mutual_friend_no > 0){ if($mutual_friend_no==1){$m='Mutual Friend';} else{$m='Mutual Friends';}?> <span style="color:#FF8000; font-size:10px;" onClick="viewMutualFriInfo()" title="<?php if(!empty($mutual_f_name)){ echo $mutual_f_name ;} ?>"> <?php echo $mutual_friend_no.' '.$m; ?></span><?php } else {  ?> <span style="color:#FF8000; font-size:10px;" > No Mutual Friend </span> <?php } ?>
										</td>
									</tr>
									
									<tr>
										<td>
											<a href="process.php?send='.$row['hm_id'].'" ><div id="button_style1">Add Friend</div></a>
										</td>
									</tr>
									-->
								</table>
							</td>
						</tr>		
					</table>
				</div>
			</span>
<?php
			}
		}
	}
}
else{
	echo "<p align='center' style='color:blue;'>Sorry! you have no friend.</p>";
}
?>

