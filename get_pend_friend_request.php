<?php
require_once('hm_functions.php');
require_once('startsession.php');
$user_id = $_SESSION['hm_id'];
$new_fri = queryMysql("SELECT user_id_1, user_id_2, date_of_update FROM hm_friend WHERE (`user_id_1` = $user_id OR `user_id_2` = $user_id) AND `action_user_id` = $user_id AND `status` = 2");

if($new_fri->num_rows)
{
	$user_friend_list = array();
	$user_friend_list = friendList($user_id);
	
	
	while($fri_row = $new_fri->fetch_array(MYSQLI_ASSOC))
	{
	
		if($_SESSION['hm_id'] == $fri_row['user_id_1']){
			$requester_id = $fri_row['user_id_2'];
		}
		else{
			$requester_id = $fri_row['user_id_1'];
		}
		$requester_friend_list = array();
		$requester_friend_list = friendList($requester_id);
		$requested_on = $fri_row['date_of_update'];
		$requester_info = profileInfo($requester_id);
		$requester_name = $requester_info['first_name'] ." ". $requester_info['last_name'];
		$requester_pro_pic = $requester_info['profile_pic'];
		$ignoring_time = timeAgo($requested_on);
		
		$x = 0; 
		
				$mutual_friend = queryMysql("SELECT p.first_name, p.last_name FROM ( 
				SELECT user_id_1 AS friend_id FROM hm_friend WHERE user_id_2 IN ($user_id) AND status=1
				UNION
				SELECT user_id_2 AS friend_id FROM hm_friend WHERE user_id_1 IN ($user_id) AND status=1
				) AS t1
				JOIN(
				SELECT user_id_1 AS friend_id FROM hm_friend WHERE user_id_2 IN ($requester_id) AND status=1
				UNION
				SELECT user_id_2 AS friend_id FROM hm_friend WHERE user_id_1 IN ($requester_id) AND status=1
				) AS t2
				ON t1.friend_id = t2.friend_id
				JOIN hm_profile p ON p.hm_id = t1.friend_id");
				$mutual_friend_no = mysqli_num_rows($mutual_friend);
				
				if($m = $mutual_friend->num_rows)
				{
					$mutual_f_name = "";
					$z=0;
					while($mutual_fri_row = $mutual_friend->fetch_array(MYSQLI_ASSOC))
					{
						$z++;
						$mutual_fri_f_name = $mutual_fri_row['first_name'];
						$mutual_fri_l_name = $mutual_fri_row['last_name'];
						if($z != $m)
							$mutual_f_name .= $mutual_fri_f_name .' '. $mutual_fri_l_name .', ';
						else
							$mutual_f_name .= $mutual_fri_f_name .' '. $mutual_fri_l_name .'.';
					}
				}
			
?>
		<span onClick="viewProfile('<?php echo $requester_id/2+5; ?>')" id="tab_for_chat_list">
			<div id="submit_reciver_id" >
				<table id="tabs_r_work">
					<tr>
						<td id="work_info" style="float:left;" width="12%">
							<img id="worker_pic" src="../images/profile_pic/<?php if($requester_pro_pic != ""){ echo $requester_pro_pic; } else{ echo "male.jpg"; }?>">
						</td>
						<td align="left" id="work_detail" width="88%">
							<table>
								<tr>
									<td>
										<b><a href="javascript:;" onClick="viewProfile('<?php echo $requester_id/2+5; ?>')" style="text-transform:capitalize; font-size:12px;"><?php echo $requester_name;?></a></b> <br />
									</td>
								</tr>
								<tr>
									<td>
										<small style="font-size:9px;"><?php echo 'Pended: ' . $ignoring_time ; ?></small>
									</td>
								</tr>
								<tr>
									<td>
										<?php if($mutual_friend_no > 0){ if($mutual_friend_no==1){$m='Mutual Friend';}else{$m='Mutual Friends';}?> <span style="color:#FF8000; font-size:10px;" onClick="viewMutualFriInfo()" title="<?php if(!empty($mutual_f_name)){ echo $mutual_f_name ;} ?>"> <?php echo $mutual_friend_no.' '.$m; ?></span><?php } ?>
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
	echo "<p align='center' style='color:blue;'>No pending request.</p>";
}

?>

