<?php
	require_once('connectvars.php');
	require_once('startsession.php');
	$user_hm_id=$_SESSION['hm_id'];
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	if($_POST)
	{
		$q = strip_tags($_POST['search']);
		
		$tkn = $q;
		
		$search_exploded = explode ( "+", $q ); 
		$x = 0; 
		foreach( $search_exploded as $search_each ) { 
			$x++; 
			$construct = ""; 
			
			if( $x == 1 ) 
				$construct .="first_name LIKE '%$search_each%' OR last_name LIKE '%$search_each%' OR address1 LIKE '%$search_each%' OR address2 LIKE '%$search_each%' OR city LIKE '%$search_each%' OR about_me LIKE '%$search_each%'"; 
			else 
				$construct .=" AND first_name LIKE '%$search_each%' OR last_name LIKE '%$search_each%' OR address1 LIKE '%$search_each%' OR address2 LIKE '%$search_each%' OR city LIKE '%$search_each%' OR about_me LIKE '%$search_each%'";
		}

		
		$sql= "SELECT hm_id, first_name, last_name, address2, city, state, country, profile_pic FROM hm_profile WHERE hm_id <> $user_hm_id AND ( first_name LIKE '%$tkn%' OR last_name LIKE '%$tkn%' OR address1 LIKE '%$tkn%' OR address1 LIKE '%$tkn%' OR ".
		"city LIKE '%$tkn%' OR country LIKE '%$tkn%' OR about_me LIKE '%$tkn%' OR state LIKE '%$tkn%' OR user_aim LIKE '%$tkn%' OR ".
		"CONCAT(first_name, ' ', last_name) LIKE '%$tkn%' OR ".
		"CONCAT(last_name, '', first_name) LIKE '%$tkn%' OR ".
		"CONCAT(last_name, ' ', first_name) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, '  ', last_name) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, ',', last_name) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, ' ,', last_name) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, '_', last_name) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, '', last_name) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, '', last_name , ' ', address1) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, ' ', last_name , ' ', address1) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, '', last_name, ',', address1) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, '', last_name, ' ,', address1) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, ' ', last_name, ',', address1) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, '', last_name , ' ', address2) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, ' ', last_name , ' ', address2) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, '', last_name, ',', address2) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, '', last_name, ' ,', address2) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, ' ', last_name, ',', address2) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, ',', last_name, ',', address2) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, '', last_name, ' ', address1, ' ', address2) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, '', last_name, ',', address1, ' ', address2) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, '', last_name, ' ,', address1, ' ', address2) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, '', last_name, ' ,', address1, ' ,', address2) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, ' ', last_name, ',', address1, ' ', address2) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, ' ', last_name, ' ', address1, ' ', address2) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, ' ', last_name, ',', address1, ',', address2) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, ' ', last_name, ' ', address1, ' ', address2, ' ', city) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, ' ', last_name, ',', address1, ',', address2, ',', city) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, ' ', last_name, ' ,', address1, ' ,', address2, ' ,', city) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, '', last_name, ' ,', address1, ' ,', address2, ' ,', city) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, '', last_name, ' ', city) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, ' ', last_name, ',', city) LIKE '%$tkn%' OR ".
		"CONCAT(first_name, ' ', last_name, ' ,', city) LIKE '%$tkn%' AND ".
		"$construct ) ORDER BY first_name ASC LIMIT 11 ";
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
			$b_first_name='<em style="color:red;">'.$q.'</em>';
			$b_last_name='<em style="color:red;">'.$q.'</em>';
			$b_address2='<em style="color:red;">'.$q.'</em>';
			$b_city='<em style="color:red;">'.$q.'</em>';
			$final_first_name = str_ireplace($q, $b_first_name, $first_name);
			$final_last_name = str_ireplace($q, $b_last_name, $last_name);
			$final_address2 = str_ireplace($q, $b_address2, $address2);
			$final_city = str_ireplace($q, $b_city, $city);
?>
			
			<a href="../profile/pro.php?user_id=<?php echo $hm_id/2+5; ?>" id="reciver_select_area">
				<label id="reciver_area">
					<div class="show">
						<?php if(!empty($profile_pic)){ $margin = 1;?>
						<div style="float:left;"><img id="reciver_search_pic" src="../images/profile_pic/<?php echo $profile_pic; ?>" /></div>
						<?php } ?>
						<div <?php echo 'style="margin-left:30px;"'; ?>>
							<span class="name" style="display:none;"><?php echo $final_first_name ." ". $final_last_name; ?></span>
							<?php
								$f_address2 = '';
								$f_city = '';
								$f_country = '';
								
								 if(!empty($final_address2)){
									$f_address2 = $final_address2.", ";
								}
								elseif(!empty($final_city)){ 
									$f_city = $final_city.", ";
								}
								elseif(!empty($country)){ 
									$f_country = $country.".";
								}
								
								 echo $final_first_name ." ". $final_last_name; ?><br /><?php echo $f_address2 ."". $f_city ."". $f_country; 
								 
								 $margin = 0;
							 ?>
						</div>
					</div>
				</label>
			</span><br />
			
<?php
		}
		$tkn="";
		
	}
?>







