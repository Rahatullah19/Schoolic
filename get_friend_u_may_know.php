<?php
// place the below php script at the top of the <html> in the home.php page
//session_start();
//include("connection.php"); //connect to the database file
require_once("hm_functions.php"); //connect to the fuction file
require_once('startsession.php');
$hm_id=$_SESSION['hm_id'];
?>


<!DOCTYPE >

<HTML >

<head>

</head>


<?php 

/* people you may know script */ 


/* below selecct from the database friend that you may know them */ 
$result= queryMysql("select * FROM `hm_profile` WHERE `hm_id`!='$hm_id'");
while($row=mysqli_fetch_array($result)) 

{ 

	$hmid = $row["hm_id"]; 
	
	/* below check if the friend is already your friend */
	
	$post = queryMysql("SELECT * FROM hm_friend WHERE user_id_1 = '$hm_id' AND user_id_2 ='$hmid' OR user_id_2 = '$hm_id' AND user_id_1='$hmid' ")or die(mysql_error()); 
	
	$num_rows =mysqli_num_rows($post); 
	
	if ($num_rows != 0 ){ 
		while($row = mysqli_fetch_array($post)) { 
			$myfriend = $hmid;
				if($hmid == $hm_id) { 
				$myfriend1 = $row['user_id_2']; 
				$friends = queryMysql("SELECT * FROM hm_profile WHERE hm_id = '$myfriend1'")or die(mysql_error()); 
				$friendsa = mysqli_fetch_array($friends); 
			}else{ 
				$friends = queryMysql("SELECT * FROM hm_profile WHERE hm_id = '$myfriend'")or die(mysql_error()); 
				$friendsa = mysqli_fetch_array($friends); 
				/* If the person is your friend the div having this id button_style will be seen. */
				//echo" <div id='button_style'>Friends$memberid</div> "; 
				//echo'<hr class="line_1"> '; 
			} 
		} 
	} else { 
		/* else if the person is not your fiend the link below will appear.*/ 
		$mutual_friend = queryMysql("SELECT p.first_name, p.last_name FROM ( 
			SELECT user_id_1 AS friend_id FROM hm_friend WHERE user_id_2 IN ($hm_id) AND status=1
			UNION
			SELECT user_id_2 AS friend_id FROM hm_friend WHERE user_id_1 IN ($hm_id) AND status=1
			) AS t1
			JOIN(
			SELECT user_id_1 AS friend_id FROM hm_friend WHERE user_id_2 IN ($hmid) AND status=1
			UNION
			SELECT user_id_2 AS friend_id FROM hm_friend WHERE user_id_1 IN ($hmid) AND status=1
			) AS t2
			ON t1.friend_id = t2.friend_id
			JOIN hm_profile p ON p.hm_id = t1.friend_id");
			
			$mutual_friend_no = mysqli_num_rows($mutual_friend);
			
			if($m = $mutual_friend->num_rows)
			{
				$mutual_f_name = "";
				$z=0;
				$mutual_f_name = "";
				while($mutual_fri_row = $mutual_friend->fetch_array(MYSQLI_ASSOC))
				{
					$z++;
					$mutual_fri_f_name=$mutual_fri_row['first_name'];
					$mutual_fri_l_name=$mutual_fri_row['last_name'];
					if($z != $m)
						$mutual_f_name .= $mutual_fri_f_name .' '. $mutual_fri_l_name .', ';
					else
						$mutual_f_name .= $mutual_fri_f_name .' '. $mutual_fri_l_name .'.';
				}
			}
?>
		
		
		<span id="tab_for_chat_list">
			<div id="submit_reciver_id" >
				<table id="tabs_r_work">
					<tr>
						<td id="work_info" style="float:left;" width="12%">
							 <img src="../images/profile_pic/<?php if($row['profile_pic'] != ""){ echo $row['profile_pic']; } else{ echo "male.jpg"; }?>" id="worker_pic">
						</td>
						<td align="left" id="work_detail" width="88%">
							<table>
								<tr>
									<td>
										<b><a href="../profile/pro.php?user_id=<?php echo $hmid/2+5; ?>" style="font-size:12px;"><?php echo $row['first_name'] . " " . $row['last_name'];?></a> </b> &nbsp <small><span class="glyphicon glyphicon-envelope" onClick="toChat('<?php echo $hmid/2+5; ?>')" title="Chat with <?php echo $row['first_name'] . " " . $row['last_name'];?>"></span></small><br />
									</td>
								</tr>
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
							</table>
						</td>
					</tr>		
				</table>
			</div>
		</span>
<?php
    } 
} 
?>