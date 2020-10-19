<?php
require_once('hm_functions.php');
require_once('startsession.php');
$sender_id = $_SESSION['hm_id'];
$new_msg = queryMysql("SELECT * FROM (SELECT chat_id, sender_id, sent_on, message AS msg, reciver_id, seen , seen_on FROM chat WHERE reciver_id = '$sender_id' AND seen = 0 ORDER BY `chat`.`sent_on` DESC) AS temp GROUP BY sender_id ORDER BY sent_on DESC ");


if($new_msg->num_rows)
{
	while($msg_row = $new_msg->fetch_array(MYSQLI_ASSOC))
	{
		$n_sender_id = $msg_row['sender_id'];
		$n_reciver_id = $msg_row['reciver_id'];
		$sent_on = $msg_row['sent_on'];
		$n_msg = $msg_row['msg'];
		$sender_info = profileInfo($n_sender_id);
		$sender_name = $sender_info['first_name'] ." ". $sender_info['last_name'];
		$sender_pro_pic = $sender_info['profile_pic'];
		$online_status = $sender_info['online_status'];
		$last_seen = timeAgo($sender_info['last_seen']);
		$sent_time = timeAgo($sent_on);
		
		$new_msg_for_user = queryMysql("SELECT chat_id FROM chat WHERE reciver_id = '$sender_id' AND sender_id = '$n_sender_id' AND seen = 0 ");
		$new_msg_no = mysqli_num_rows($new_msg_for_user);
?>
		<span id="tab_for_chat_list">
			<div id="submit_reciver_id" >
				<table id="tabs_r_work">
					<tr>
						<td id="work_info" style="float:left;" width="12%">
							<img id="worker_pic" src="../images/profile_pic/<?php if($sender_pro_pic != ""){ echo $sender_pro_pic; } else{ echo 'male.jpg'; }?>">
						</td>
						<td align="left" id="work_detail" width="88%">
							<table>
								<tr>
									<td>
										<b><a href="javascript:;" onClick="viewProfile('<?php echo $n_sender_id/2+5; ?>')" style="text-transform:capitalize; font-size:12px;"><?php echo $sender_name;?></a> </b><img src="../images/icon/status-<?php echo $online_status; ?>.png" width="15px" height="15px" /> <small><span style="color:#FF8000; font-size:11px;"> <b>(<?php echo $new_msg_no; ?>) </b> </span> <span class="glyphicon glyphicon-envelope" onClick="toChat('<?php echo $n_sender_id/2+5; ?>')" title="Chat with <?php echo $sender_name;?>"></span></small><br />
									</td>
								</tr>
								<tr>
									<td>
										<span style="font-size:9px;"><?php if($online_status==0) echo 'Last Seen: '. $last_seen .' | '; ?></small><small style="font-size:9px;"><?php echo 'Sent: ' . $sent_time ; ?></small>
									</td>
								</tr>
								<tr>
									<td>
										<p id="msg_info"><b><?php echo $n_msg; ?></b></p>
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
else{
	echo "<p align='center' style='color:blue;'>Sorry! no new message.</p>";
}

?>

