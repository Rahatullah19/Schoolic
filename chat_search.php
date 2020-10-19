<?php
	require_once('connectvars.php');
	require_once('startsession.php');
	$sender_hm_id=$_SESSION['hm_id'];
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	if($_POST)
	{
		$q=$_POST['search'];
		$sql="SELECT hm_id, first_name, last_name, address2, city, state, country, profile_pic FROM hm_profile WHERE hm_id <> $sender_hm_id AND ( first_name LIKE '%$q%' OR last_name LIKE '%$q%' OR address2 LIKE '%$q%' OR city LIKE '%$q%' ) ORDER BY first_name LIMIT 10";
		$result= mysqli_query($dbc,$sql);
		while($row=mysqli_fetch_array($result))
		{
			$hm_id=$row['hm_id'];
			$first_name=$row['first_name'];
			$last_name=$row['last_name'];
			$address2=$row['address2'];
			$city=$row['city'];
			$state=$row['state'];
			$country=$row['country'];
			$profile_pic=$row['profile_pic'];
			$b_first_name=$q;
			$b_last_name=$q;
			$b_address2=$q;
			$b_city=$q;
			$final_first_name = str_ireplace($q, $b_first_name, $first_name);
			$final_last_name = str_ireplace($q, $b_last_name, $last_name);
			$final_address2 = str_ireplace($q, $b_address2, $address2);
			$final_city = str_ireplace($q, $b_city, $city);
?>
			<div class="show" style="font-size:11px;">
				
				<div style="float:left;">
					<span class="reciverid" style="display:none;"><?php echo $hm_id ; ?></span>
					<span class="name" style="display:none;"><?php echo $final_first_name ." ". $final_last_name; ?></span><?php echo $final_first_name ." ". $final_last_name; ?><br /><?php echo " ".$final_address2 .",". $final_city .",". $country ."."; ?>
				</div>
				<div style="float:right;"><img id="reciver_search_pic" src="images/profile_pic/<?php echo $profile_pic; ?>" /></div>
			</div>
<?php
		}
	}
?>





