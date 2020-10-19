<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="plat1.css" />

<?php
require_once('hm_functions.php');
require_once('connectvars.php');
require_once('startsession.php');

if (isset($_SESSION['hm_id'])) {
	$hm_info = profileInfo($_SESSION['hm_id']);
}

$user_name = $hm_info['first_name'];
?>

<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

<script type="text/javascript">

	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            var container = $('#previews');
            var image = $('<img>').attr('src', e.target.result).width(80).height(80);
            image.appendTo(container);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
	
	function post_btn(btn,o1,o2,o3) {
		var i = document.getElementById(btn);
		var O1 = document.getElementById(o1);
		var O2 = document.getElementById(o2);
		var O3 = document.getElementById(o3);
		
		if(i.style.display == 'none'){
			
			switch(btn) {
				case "f1":
					O1.style.display = O2.style.display = O3.style.display = 'none';
					break;
				case "h2":
					O1.style.display = O2.style.display = O3.style.display = 'none';
					break;
				case "f3":
					O1.style.display = O2.style.display = O3.style.display = 'none';
					break;
				case "p4":
					O1.style.display = O2.style.display = O3.style.display = 'none';
					break;
			}
			
			i.style.display = '';
		}
		else
			i.style.display = 'none';
	}

	function showInfo(){
	
		var friend='';
		var hash='';
		var feelings='';
		var loc='';
		var you='';
		var x1 = document.getElementById('friend_tags_post');
		if(x1.value){
		var friend = " with " + x1.value.bold();
		}
		var x2 = document.getElementById('hash_tags_post');
		if(x2.value){
			var hash = "<b>#</b>" + x2.value.bold() + "<br>";
		}
		var x3 = document.getElementById('feelings_post');
		if(x3.value){
			var feelings = " feeling " + x3.value.bold();
		}
		var x4 = document.getElementById('places_post');
		if(x4.value){
			var loc = " at " + x4.value.bold();
		}
		if(x1.value||x3.value||x4.value){
			var you = "You are" + feelings + friend + loc + "<b>.</b><br>";
		}
		
			document.getElementById('showInfo').innerHTML = you + hash ;
				
	}
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>   
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   
</head>

<body background="arabian nights.jpg">


		<div id="tabs">
			<table>
				<tr>
					<td><a href="http://www.w3schools.com/bootstrap/trybs_theme_me_complete.htm#" style="background-color:#FFFFFF; padding:4px; border:solid; border-color:lime; border-radius:8px; text-decoration:none;" title="Profile Page"><?php echo $user_name; ?></a></td>
					<td><a href="add_shops.php?$user_id=$row['hm_id']" style="background-color:#FFFFFF; padding:4px; border:solid; border-color:lime; border-radius:8px; text-decoration:none;" title="Represent your Occupation, Shops, Service Centers or Businesses by creating its account, and make it online...">Add your Work</a></td>
					<td><a href="http://www.w3schools.com/bootstrap/trybs_theme_band_full.htm#myPage" style="background-color:#FFFFFF; padding:4px; border:solid; border-color:lime; border-radius:8px; text-decoration:none;" title="Search your desired items, products or stuff at the Shops nearer to you">Goto Shops</a></td>
					<td><a href="hm_service_centers.php?$from=$row['city']" style="background-color:#FFFFFF; padding:4px; border:solid; border-color:lime; border-radius:8px; text-decoration:none;" title="Search Service Centers for getting services. (Like:- Car Service Centers, Hospitals, Petrolpumps, Hotels, Restaurants, Saloon, etc) ">Get Services</a></td>
					<td><a href="hm_ads.php?$from=$row['occupasion']" style="background-color:#FFFFFF; padding:4px; border:solid; border-color:lime; border-radius:8px; text-decoration:none;" title="Showcase Advertisement of your Shops, Service Center, Businesses or present Invitation for an event">Make Advertisements</a></td>
					
				</tr>
			</table>
		</div>

		<div id="u_plat" style="margin-top:5px;">
			<table>
				<tr>
					<p id="plat_header" align="left"><b>Explore your thoughts...</b></p>
				</tr>
			</table>
			
			<table id="u_info" width="99%">
				<tr>
					<td id="u_pro1">
					
					<?php
					
						if (isset($_POST['submit_post']))  {  
							if($_POST['post_content']!=''||$_FILES['photo_post']['name']!=''||$_FILES['audio_post']['name']!=''||$_FILES['video_post']['name']!=''||$_FILES['file_post']['name']!=''||$_POST['places_post']!=''||$_POST['friend_tags_post']!=''||$_POST['hash_tags_post']!=''||$_POST['feelings_post']!=''){
								$post_content = sanitizeString($_POST['post_content']);    
								
								$post_hm_id = sanitizeString($_SESSION['hm_id']);
								
								
								if($_FILES['photo_post']['name']){
									$name = htmlspecialchars($_FILES['photo_post']['name']);
									$ext = end((explode(".", $name)));
									$ext = strtolower($ext);
									
									//if no errors...
									if(!$_FILES['photo_post']['error']){
										//now is the time to modify the future file name and validate the file
										$new_file_name = date('ymdHisu'). ".". $ext;
										
										if($ext !== "jpg" && $ext !== "png" && $ext !== "jpeg" && $ext != "gif" && $ext !== "bmp" ){
										  $valid_file = false;
										  echo "Your file must be in jpg, jpeg, png, gif, or bmp formats.";
										  $typeok = FALSE;
										}
										elseif(!$_FILES['photo_post']['size']){
											$valid_file = false;
											$typeok = FALSE;
										}
										else{
										  $valid_file = true;
										  $typeok = TRUE;
										}
										
										//if the file has passed the test
										if($valid_file){
										  //move it to where we want it to be
										  move_uploaded_file($_FILES['photo_post']['tmp_name'], 'images/post_pic/'.$new_file_name);
										  $typeok = TRUE;
										  
										  if($ext == "jpg"){
											  $exif_read = exif_read_data("images/post_pic/".$new_file_name);
											  if(!empty($exif_read['Orientation'])){
												$orientation_data = exif_read_data("images/post_pic/".$new_file_name)['Orientation'];
											  }
										  }
										  if(isset($orientation_data) && $orientation_data !== 1){
											$path = "images/post_pic/". $new_file_name;
											$buffer = ImageCreateFromJPEG($path);
											
											
											if ($typeok){      
												list($w, $h) = getimagesize($path);
												$max = 500;      
												$tw  = $w;      
												$th  = $h;
												
												if ($w > $h && $max < $w){        
													$th = $max / $w * $h;        
													$tw = $max;      
												}      
												elseif ($h > $w && $max < $h){        
													$tw = $max / $h * $w;        
													$th = $max;      
												}      
												elseif ($max < $w){        
													$tw = $th = $max;      
												}
												$tmp = imagecreatetruecolor($tw, $th);      
												imagecopyresampled($tmp, $buffer, 0, 0, 0, 0, $tw, $th, $w, $h);      
												imageconvolution($tmp, array(array(-1, -1, -1),array(-1, 16, -1), array(-1, -1, -1)), 8, 0);      
													  
													
											}
											
											
										   $exif = exif_read_data($path);
											if(!empty($exif['Orientation'])){
											  switch($exif['Orientation']){
												case 8:
												  $buffer = imagerotate($buffer,90,0);
												  break;
												case 3:
												  $buffer = imagerotate($buffer,180,0);
												  break;
												case 6:
												  $buffer = imagerotate($buffer,-90,0);
												  break;
											  }
											  imagejpeg($buffer, $path, 90);
											  imagedestroy($tmp);      
											  imagedestroy($buffer);
											}
											
											//imagejpeg($tmp, $path);
										  }
										}
										$post_attach = sanitizeString($new_file_name);
									}
									//if there is an error...
									else
									{
										//set that to be the returned message
										echo 'Ooops!  Your upload triggered the following error:  '.$_FILES['photo_post']['error'];
									}
									
									$exif="";
									$exif_read="";
									$orientation_data="";
								}
								
								elseif($_FILES['audio_post']['name']){
									$post_attach = sanitizeString($_FILES['audio_post']['name']);
								}
								elseif($_FILES['video_post']['name']){
									$post_attach = sanitizeString($_FILES['video_post']['name']);
								}
								elseif($_FILES['file_post']['name']){
									$post_attach = sanitizeString($_FILES['file_post']['name']);
								}
								else{
									$post_attach = "";
								}
								
								$loc_id = sanitizeString($_POST['place_post']);    
								$friend_tag_id = sanitizeString($_POST['friend_tags_post']);
								$hash_tag_id = sanitizeString($_POST['hash_tags_post']);
								$working_id = sanitizeString($_POST['feelings_post']);
								
								
								queryMysql("INSERT INTO hm_post VALUES(0,'$post_hm_id','$post_content','$post_attach','$loc_id','$friend_tag_id','$hash_tag_id','$working_id',NOW())");
								
							}
						} 
						 
					?>
						
						<form class="post_hm" action="<?php echo $_SERVER['PHP_SELF'];?>" method='post' autocomplete='off' enctype="multipart/form-data">	
							<table>
								<tr>
									<td></td>
									<td>
										<div id="showInfo" style="max-width:480px;"></div>
									</td>
									<td></td>
								</tr>
								<tr>
									<td>
										<table>
											<tr>
												<td>
													<label style="height:15px; width:20px; cursor:pointer; border-radius:3px; border-color:#0099FF; border-width:1px; border-style:ridge; vertical-align:middle; background-position:left center; background-repeat:no-repeat; background-image:url(icons_small/1456538209_free-34.png); padding-left:25px; margin:10px;">
													<input type="file" id="photo_post" name="photo_post" name="files[]" onChange="readURL(this);" style="display:none;" multiple />
													</label>
												</td>
											</tr>
											<tr></tr>
											<tr>
												<td>
													<label style="height:15px; width:20px; cursor:pointer; border-radius:3px; border-color:#0099FF; border-width:1px; border-style:ridge;  vertical-align:middle; background-position:left center; background-repeat:no-repeat; background-image:url(icons_small/1456538332_Microphone.png); padding-left:25px; margin:10px;">
													<input type="file" id="audio_post" name="audio_post" name="files[]" onChange="readURL(this);" style="display:none;" multiple />
													</label>
												</td>
											</tr>
											<tr></tr>
											<tr>									
												<td>
													<label style="height:15px; width:20px; cursor:pointer; border-radius:3px; border-color:#0099FF; border-width:1px; border-style:ridge; vertical-align:middle; background-position:left center; background-repeat:no-repeat; background-image:url(icons_small/1456538481_youtube.png); padding-left:25px; margin:10px;">
													<input type="file" id="video_post" name="video_post" name="files[]" onChange="readURL(this);" style="display:none;" multiple />
													</label>
												</td>
											</tr>
											<tr></tr>
											<tr>									
												<td>
													<label style="height:15px; width:20px; cursor:pointer; border-radius:3px; border-color:#0099FF; border-width:1px; border-style:ridge;  vertical-align:middle; background-position:left center; background-repeat:no-repeat; background-image:url(icons_small/file.png); padding-left:25px; margin:10px;">
													<input type="file" id="file_post" name="file_post" name="files[]" onChange="readURL(this);" style="display:none;" multiple />
													</label>
												</td>
											</tr>
										</table>
									</td>
									<td style="width:81%;">
										<textarea name="post_content" id="post_content" placeholder="Come On! Make over your thoughts or views into words" title="Make status update" style="width:95%; height:90px; padding:5px; float:left; border-color:#0099FF; border-width:2px;"></textarea>
										<div id="previews"></div>
									</td>
									
									<td style="margin-left:30px;">
										<table>
											<tr>
												<td id="friend_tags" title="Tag this to your friends" onClick="post_btn('f1','h2','f3','p4');"><img src="icons_small/1456536354_tag.png" style="height:20px; width:20px; cursor:pointer; margin:1px;"/>
												</td>
												<td id="place" title="Locate this work" onClick="post_btn('p4','f1','h2','f3');"><img src="icons_small/1456536485_Map-Marker-Marker-Outside-Chartreuse.png" style="height:20px; width:20px; cursor:pointer; margin:1px;"/>
												</td>
											</tr>
											<tr>
												<td id="feeling" title="Express your Feelings" onClick="post_btn('f3','f1','h2','p4');"><img src="icons_small/1456536648_face-smile.png" style="height:20px; width:20px; cursor:pointer; margin:1px;"/>
												</td>
												<td id="hash_tags" title="Make '#' Tagging" onClick="post_btn('h2','f1','f3','p4');"><img src="icons_small/1456536798_hash.png" style="height:20px; width:20px; cursor:pointer; margin:1px;"/>
												</td>
											</tr>
											<tr>
												<td colspan="2" id="post_button" title="Post this">
													<button name="submit_post" type="submit" id="submit_post" required><img src="icons_small/1456536975_send-01.png" style="height:28px; width:28px; margin:2px;"/></button>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
					
							<div id="post_btn_post" style="margin:10px 10px 10px 70px;">
								<div id="f1" style="display:none;">With:<input name="friend_tags_post" id="friend_tags_post" onKeyUp="showInfo();" onChange="showInfo();" type="text" /></div>
								<div id="h2" style="display:none;">hash: <input name="hash_tags_post" id="hash_tags_post" onKeyUp="showInfo();" onChange="showInfo();" type="text" v /></div>
								<div id="f3" style="display:none;">
									Feeling:
									<input name="feelings_post" id="feelings_post" type="text" list="feeling_info" onKeyUp="showInfo();" onChange="showInfo();"  placeholder="-Enter or Select feeling from list-" style="width:233px;" />
										<datalist id="feeling_info">
											<option value="Happy"></option>
											<option value="Cool"></option>
											<option value="Awesome"></option>
											<option value="Angry"></option>
											<option value="Sad"></option>
											<option value="Positive"></option>
											<option value="Courage"></option>
											<option value="Confidence"></option>
											<option value="Kind"></option>
											<option value="Pity"></option>
											<option value="Love"></option>
											<option value="Pride"></option>
											<option value="Pain"></option>
											<option value="Patience"></option>
											<option value="Relaxation"></option>
											<option value="Respected"></option>
											<option value="Hope"></option>
											<option value="Confused"></option>
											<option value="Afraid"></option>
										</datalist>
								</div>
								<div id="p4" style="display:none;">At:<input name="place_post" id="place_post" onKeyUp="showInfo();" onChange="showInfo();" type="text" /></div>
							</div>
						</form>
					</td>
				</tr>
			</table>
		</div>
		
		<?php
			showPost($_SESSION['hm_id']);
		?>
		
		<div id="s_plat" style="margin-top:5px;">
			<table>
				<tr>
					<p id="plat_header" align="left"><b>Top in City1</b></p>
					<p id="plat_more" align="right">More <a>&#x25BD </a> </p>
				</tr>
			</table>
			
			<table id="s_info" width="99%">
				<tr>
					<td id="s_pro1">
						<table>
							<tr>
								<p id="s_name">MPC shop123</p>
							</tr>
							
							<tr>
								<td id="s_img">
									<img id="s_pic" />
								</td>
								<td style="padding-left:10px;">
									<p>address:</p>
									<p>get location:</p>
								</td>
							</tr>
						</table>
					</td>
					
					<td id="s_pro2">
						<p id="s_category">category:</p>
						
						<p id="s_owner">owner name:</p>
						
						<p id="s_conatct_no">contact no.:</p>
						
						<p id="s_speciality">speciality:</p>
					</td>
					
					<td id="s_pro3">
						<p id="s_name">Vote: &#x2606 </p>
						
						<p id="s_name">Review:</p>
						
						<p id="s_name">Share:</p>
					</td>
				</tr>
			</table>
		</div><p></p>
		

		<div id="n_plat">
			<table>
				<tr>
					<h4 id="plat_header" align="left">Top in City</h4>
					<p id="plat_more" align="right">More <a> &#x25BD </a></p>
				</tr>
			</table>
			
			<table id="n_info" width="99%">
				<tr>
					<td id="s_pro1">
						<table>
							<tr>
								<p id="s_name">Novel title</p>
							</tr>
							
							<tr>
								<td id="s_img">
									<img id="s_pic" />
								</td>
								<td style="padding-left:10px;">
									<p>novel</p>
									<p>write</p>
								</td>
							</tr>
						</table>
					</td>
					
					<td id="s_pro2">
						<p id="s_description">description:</p>
						
						<p id="s_r_review">recent review:</p>
					</td>
					
					<td id="s_pro3">
						<p id="s_name">Vote: &#x2606 </p>
						
						<p id="s_name">Review:</p>
					</td>
				</tr>
			</table>
		</div><p></p>
		
		<div id="s_plat">
			<table>
				<tr>
					<h4 id="plat_header" align="left">Top in City</h4>
					<p id="plat_more" align="right">More <a>&#x25BD</a></p>
				</tr>
			</table>
			
			<table id="s_info" width="99%">
				<tr>
					<td id="s_pro1">
						<table>
							<tr>
								<p id="s_name">MPC shop</p>
							</tr>
							
							<tr>
								<td id="s_img">
									<img id="s_pic" />
								</td>
								<td style="padding-left:10px;">
									<p>address:</p>
									<p>get location:</p>
								</td>
							</tr>
						</table>
					</td>
					
					<td id="s_pro2">
						<p id="s_category">category:</p>
						
						<p id="s_owner">owner name:</p>
						
						<p id="s_conatct_no">contact no.:</p>
						
						<p id="s_speciality">speciality:</p>
					</td>
					
					<td id="s_pro3">
						<p id="s_name">Vote: &#x2606</p>
						
						<p id="s_name">Review:</p>
						
						<p id="s_name">Share:</p>
					</td>
				</tr>
			</table>
		</div><p></p>
	
		<div id="n_plat">
			<table>
				<tr>
					<h4 id="plat_header" align="left">Top in City</h4>
					<p id="plat_more" align="right">More <a> &#x25BD </a></p>
				</tr>
			</table>
			
			<table id="s_info" width="99%">
				<tr>
					<td id="s_pro1">
						<table>
							<tr>
								<p id="s_name">Novel title</p>
							</tr>
							
							<tr>
								<td id="s_img">
									<img id="s_pic" />
								</td>
								<td style="padding-left:10px;">
									<p>novel</p>
									<p>write</p>
								</td>
							</tr>
						</table>
					</td>
					
					<td id="s_pro2">
						<p id="s_description">description:</p>
						
						<p id="s_r_review">recent review:</p>
					</td>
					
					<td id="s_pro3">
						<p id="s_name">Vote: &#x2606 </p>
						
						<p id="s_name">Review:</p>
					</td>
				</tr>
			</table>
		</div>
	</body>
