<?php
require_once('hm_functions.php');
require_once('startsession.php');
$user_id = $_SESSION['hm_id'];
$all_friends = friendList($user_id);
if(count($all_friends) != 0)
{
	$online_friends = array();
	for($x = 0; $x < count($all_friends); $x++)
	{
		$online_friend = queryMysql("SELECT hm_id, first_name, last_name, last_seen, profile_pic, gender_id FROM hm_profile WHERE hm_id = ". $all_friends[$x] ." AND online_status = 1");
		
		if($online_friend->num_rows)
		{	
			array_push($online_friends, $online_friend);
			while($msg_row = $online_friend->fetch_array(MYSQLI_ASSOC))
			{
				$hm_online_id = $msg_row['hm_id'];
				$hm_on_name = $msg_row['first_name'] ." ". $msg_row['last_name'];
				$hm_on_profile_pic = $msg_row['profile_pic'];
				$hm_on_gender_id = $msg_row['gender_id'];
				
				$last_chatted = queryMysql("SELECT sender_id, sent_on FROM chat WHERE ( reciver_id = '$user_id' AND sender_id = '$hm_online_id' ) OR ( reciver_id = '$hm_online_id' AND sender_id = '$user_id' ) ORDER BY sent_on DESC LIMIT 1");
				if($last_chatted->num_rows)
				{
					while($chatted_row = $last_chatted->fetch_array(MYSQLI_ASSOC))
					{
						$last_chat_sender = $chatted_row['sender_id'];
						$last_chat_on = '<small style="font-size:9px;">'.timeAgo($chatted_row['sent_on']).'</small>' ;
						/**
						if($user_id == $last_chat_sender){
							$last_chat = "You have last chatted ". $last_chat_on;
						}
						else{
							if($hm_on_gender_id == 1){
								$gender = "He";
							}
							else{
								$gender = "She";
							}
							$last_chat = $gender." had last chatted ". $last_chat_on;
						}
						**/
						$last_chat = "Chatted ". $last_chat_on;
					}
				}
				else
				{
					$not_chatted = "<small>You both have not chatted yet.</small>";
				}
					
		?>
		
				<span id="tab_for_chat_list">
					<div id="submit_reciver_id" >
						<table id="tabs_r_work">
							<tr>
								<td id="work_info" style="float:left;" width="12%">
									<img id="worker_pic" src="../images/profile_pic/<?php if($hm_on_profile_pic != ""){ echo $hm_on_profile_pic; } else{ echo "male.jpg"; }?>" style="margin-bottom:5px;" disabled="disabled" />
								</td>
								<td align="left" id="work_detail" width="88%">
									<table>
										<tr>
											<td>
												<b><a href="../profile/pro.php?user_id=<?php echo $hm_online_id/2+5; ?>" style="text-transform:capitalize; font-size:12px;"><?php echo $hm_on_name; ?></a></b><img src="../images/icon/status-1.png" width="15px" height="15px" />&nbsp <small><span class="glyphicon glyphicon-envelope" onClick="toChat('<?php echo $hm_online_id/2+5; ?>')" title="Chat with <?php echo $hm_on_name; ?>"></span></small><br />
											</td>
										</tr>
										<tr>
											<td>
												<?php if(isset($last_chat)){ ?>
													<small id="msg_info" style="font-size:9px"><?php echo $last_chat; ?></small>
												<?php }else{?>
													<b id="msg_info" style="font-size:9px"><?php echo $not_chatted; ?></b>
												<?php } ?>
											</td>
										</tr>
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
	if(count($online_friends) == 0){
		echo "<p align='center' style='color:blue;'>Oh! no one is online.</p>";
	}
}
else{
	echo "<p align='center' style='color:blue;'>Sorry! you have no friend.</p>";
}

?>

