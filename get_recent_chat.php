
<?php
require_once('hm_functions.php');
require_once('startsession.php');
$sender_id = $_SESSION['hm_id'];
$recent_chat = queryMysql("SELECT * FROM (SELECT chat_id, sender_id, sent_on, message, reciver_id, seen , seen_on FROM chat WHERE reciver_id = '$sender_id' OR sender_id = '$sender_id' ORDER BY `chat`.`sent_on` DESC) AS temp GROUP BY reciver_id ORDER BY sent_on DESC");

if($recent_chat->num_rows)
{
$chatting_to_name_same = [];
	while($msg_row = $recent_chat->fetch_array(MYSQLI_ASSOC))
	{
		$n_sender_id = $msg_row['sender_id'];
		$n_reciver_id = $msg_row['reciver_id'];
		$sent_on = $msg_row['sent_on'];
		$n_msg = $msg_row['message'];
		$sender_info = profileInfo($n_sender_id);
		$reciver_info = profileInfo($n_reciver_id);
		if($sender_id == $n_sender_id){
			$chatting_to_name = $reciver_info['first_name'] ." ". $reciver_info['last_name'];
			$chatting_to_id = $reciver_info['hm_id'];
			$online_status = $reciver_info['online_status'];
			$last_seen = timeAgo($reciver_info['last_seen']);
			$msg_info = '<b style="text-transform:capitalize;">You:</b> ' . $n_msg;
			$pic_info = profileInfo($reciver_info['hm_id']);
		}
		else{
			$chatting_to_name = $sender_info['first_name'] ." ". $sender_info['last_name'];
			$chatting_to_id = $sender_info['hm_id'];
			$online_status = $sender_info['online_status'];
			$last_seen = timeAgo($sender_info['last_seen']);
			$msg_info = '<b style="text-transform:capitalize;">' . $sender_info['first_name'] . ':</b> ' . $n_msg;
			$pic_info = profileInfo($sender_info['hm_id']);
		}
		
		$sent_time = timeAgo($sent_on);
		$pic_name = $pic_info['profile_pic'];
		
		
		if (!in_array($chatting_to_name, $chatting_to_name_same)) {
?>

		<span id="tab_for_chat_list">
			<div id="submit_reciver_id" >
				<table id="tabs_r_work">
					<tr>
						<td id="work_info" style="float:left;">
							<img id="worker_pic" src="../images/profile_pic/<?php if($pic_name != ""){ echo $pic_name; } else{ echo "male.jpg"; }?>"  disabled="disabled" />
						</td>
						<td align="left" id="work_detail">
							<table>
								<tr>
									<td>
										<table>
											<tr>
												<td>
													<a href="../profile/pro.php?user_id=<?php echo $chatting_to_id/2+5; ?>" style="cursor:pointer" style="text-transform:capitalize; font-size:12px;"><img src="../images/icon/status-<?php echo $online_status; ?>.png" width="15px" height="15px" style="margin-bottom:5px;" /> <?php echo $chatting_to_name; ?> </a>
												</td>
												<td>
													&nbsp <small><span class="glyphicon glyphicon-envelope" onClick="toChat('<?php echo $chatting_to_id/2+5; ?>')" title="Chat with <?php echo $chatting_to_name; ?>"></span></small>
												</td>
											</tr>
										</table>
									</td>
								</tr>
								<tr>
									<td>
										<small style="font-size:9px;"><?php if($online_status==0) echo 'Seen '. $last_seen .' | '; ?></small><small style="font-size:9px;"><?php echo ' Chatted ' . $sent_time ; ?></small>
									</td>
								</tr>
								<tr>
									<td>
										<p id="msg_info"><?php echo $msg_info; ?></p>
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
		$chatting_to_name_same[] = $chatting_to_name;
	}
}
else{
	echo "<p align='center' style='color:blue;'>Oh! you had not chatted yet.</p>";
}

?>
