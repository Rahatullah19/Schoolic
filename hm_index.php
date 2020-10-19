<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	  
 <?php
         require_once('hm_functions.php');
         require_once('startsession.php');
         
         if (!isset($_SESSION['hm_id'])) {
             if (!isset($_POST['login']) || !isset($_POST['signup'])) {
                   $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/welcome.php';
                   header('Location: ' . $home_url);
             }
         }
         else{
         	$hm_info = profileInfo($_SESSION['hm_id']);
         }
         ?>

      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <title>Home Page</title>
	  <link rel="icon" type="image/png" href="images/helpmiiilogo.png">
	   <link href="boot/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="hm_index.css"/>
		
		
      <style>
         #map {
         height: 100%;
         }
      </style>
	  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
      <script type="text/javascript">
			function viewProfile(user){
				var profile = document.getElementById('content');
				var profileUser = document.getElementById('profile_user');
				
				if(profileUser.value !== user){
					profile.src = "profile/pro.php?user_id=" + user;
				}
			}
			
			function editProfile(){
				var editprofile = document.getElementById('content');
				editprofile.src = "hm_profile.php";
			}
			
			function gotoHome(){
				var gotoHome = document.getElementById('content');
				gotoHome.src = "timeline/index.php";
			}
			
			function goto(page){
				var gotoPage = document.getElementById('content');
				gotoPage.src = page;
			}
			
			function addWork(){
				var gotoHome = document.getElementById('content');
				gotoHome.src = "add_work.php";
			}
			
			function addHm(hm_id_1, hm_id_2, bla_hm) {
				//for sending friend request
				var hm_1 = 'hm_id_1';
				var hm_2 = 'hm_id_2';
				var bla = 'bla_hm';
				$.ajax({
					url: 'friend_request.php?hm_u_id_1='+hm_1+'&hm_u_id_2='+hm_2+'&bla='+bla,
					success: function( data ) {
						$('#addFriendBtn').val(data); // set the button value to the new status.
						$('#addFriendBtn').unbind('click');   
					}
				});
			}
			
			
			///for new message
			$(document).ready(
			function() {
				setInterval(function(){
					$.ajax({
						url: 'check_new_msg.php' ,
						cache: false,
						success: function(data)
						{
							$('#msg_noti1').val(data);
							var m1 = document.getElementById("msg_noti1").value;
							var m2 = document.getElementById("msg_noti").value;
							
							if(m1 > m2){
								if( m1 != 0 ){
									document.getElementById("m_sound").innerHTML='<audio autoplay="autoplay"><source src="button_tiny.mp3" type="audio/mpeg" /><source src="button_tiny.ogg" type="audio/ogg" /><embed hidden="true" autostart="true" loop="false" src="button_tiny.mp3" /></audio>';//play sound
								}
							}
							
							setTimeout(function() {
								$(document).ready(
									function()	{
									
										$(document).ready(
											function() {
												setTimeout(function() {
													$.ajax({
														url: 'check_new_msg.php' ,
														cache: false,
														success: function(data)
														{
															$('#message').html(data);
															$('#msg_noti').val(data);
														},                                          
													});
												}, 400);
											});
							
								}, 2000);
							});
							
						}
					});
					
			}, 3000);
		});	
		
		///for new request friend 
			$(document).ready(
			function() {
				setInterval(function(){
					$.ajax({
						url: 'check_new_fri_request.php' ,
						cache: false,
						success: function(data)
						{
							$('#f_r_noti1').val(data);
							var f1 = document.getElementById("f_r_noti1").value;
							var f2 = document.getElementById("f_r_noti").value;
							
							if(f1 > f2){
								if( f1 != 0 ){
									document.getElementById("f_sound").innerHTML='<audio autoplay="autoplay"><source src="button_tiny.mp3" type="audio/mpeg" /><source src="button_tiny.ogg" type="audio/ogg" /><embed hidden="true" autostart="true" loop="false" src="button_tiny.mp3" /></audio>';//play sound
								}
							}
							
							setTimeout(function() {
								$(document).ready(
									function()	{
									
										$(document).ready(
											function() {
												setTimeout(function() {
													$.ajax({
														url: 'check_new_fri_request.php' ,
														cache: false,
														success: function(data)
														{
															$('#f_request').html(data);
															$('#f_r_noti').val(data);
														},                                          
													});
												}, 400);
											});
							
								}, 2000);
							});
							
						}
					});
					
			}, 3000);
		});	
				
		$(document).ready(
				function() {
					setInterval(function() {
						$.ajax({
							url: 'get_new_msg.php' ,
							cache: false,
							success: function(data)
							{
								$('#new_msg').html(data);
							},                                          
						});
					}, 2000);
				});
				
		$(document).ready(
				function() {
					setInterval(function() {
						$.ajax({
							url: 'get_online_friends.php' ,
							cache: false,
							success: function(data)
							{
								$('#hm_online').html(data);
							},                                          
						});
					}, 4100);
				});
				
		$(document).ready(
				function() {
					setInterval(function() {
						$.ajax({
							url: 'get_recent_chat.php' ,
							cache: false,
							success: function(data)
							{
								$('#recent_chat').html(data);
							},                                          
						});
					}, 2800);
				});
				
		$(document).ready(
				function() {
					setInterval(function() {
						$.ajax({
							url: 'online_update.php' ,
							cache: false,
							success: function(data)
							{
							   
							},                                          
						});
					}, 1500);
				});
				
		$(document).ready(
				function() {
					setInterval(function() {
						$.ajax({
							url: 'get_friend_request.php' ,
							cache: false,
							success: function(data)
							{
								$('#friend_request').html(data);
							},                                          
						});
					}, 4100);
				});
				
		//for friend request
		$(document).ready(
				function() {
					setInterval(function() {
						$.ajax({
							url: 'get_pend_friend_request.php' ,
							cache: false,
							success: function(data)
							{
								$('#pend_friend_request').html(data);
							},                                          
						});
					}, 4100);
				});
					
			
			
			//for main searching
			$(function(){
			$(".searchBox").keyup(function() 
			{ 
			var searchid = $(this).val();
			searchid = searchid.trim();
			searchid = searchid.replace(/[, ]+/g, "+");
			
			var dataString = 'search='+ searchid;
			if(searchid!='')
			{
				$.ajax({
				type: "POST",
				url: "over_all_search.php",
				data: dataString,
				cache: false,
				success: function(html)
				{
				$("#result").html(html).show();
				}
				});
			}return false;    
			});
			
			jQuery("#result").live("click",function(e){ 
				var $clicked = $(e.target);
				var $name = $clicked.find('.name').html();
				var $hm_id = $clicked.find('.reciverid').html();
				var decoded = $("<div/>").html($name).text();
				var decoded_id = $("<div/>").html($hm_id).text();
				$('#searchid').val(decoded);
				$('#reciver_id').val(decoded_id);
			});
			
			jQuery(document).live("click", function(e) { 
				var $clicked = $(e.target);
				if (! $clicked.hasClass("searchBox")){
				jQuery("#result").fadeOut(); 
				}
			});
			$('#searchid').click(function(){
				jQuery("#result").fadeIn();
			});
			});
		</script>
		
		
   </head>
   <body>
      <div class="info">
         <table>
            <tr class="profile_info">
               <td>
                  <img id="hm_dp" src="images/profile_pic/<?php echo $hm_info['profile_pic']; ?>" style="float:left" >
               </td>
               <td>
                  <table>
                     <tr>
                        <td>
                           <a href="#" onClick="viewProfile('<?php echo $hm_info['hm_id']/2+5; ?>')"><p id="hm_name" style="text-transform:capitalize;"><?php echo $hm_info['first_name'];?>  <?php echo $hm_info['last_name']; ?></p></a>
                        </td>
                     </tr>
                     <tr>
                        <td>
                           <a href="#" onClick="gotoHome('<?php echo $hm_info['hm_id']/2+5; ?>')" style="font-size:12px;"><span class="glyphicon glyphicon-home"></span> Home</a> | <a href="#" onClick="editProfile()" style="font-size:12px;">Update Profile</a>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
			<!--
         <table class="location">
            <tr>
               <td>
                  <?php
                     if($sock = @fsockopen('www.google.com', 80))
					{

						$ipAddress = $_SERVER['REMOTE_ADDR'];
						if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
							$ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
						}
						$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ipAddress"));
						$city = trim($geo["geoplugin_city"]);
						$region = trim($geo["geoplugin_regionName"]);
						$country = trim($geo["geoplugin_countryName"]);
						$lat = $geo["geoplugin_latitude"];
						$lon = $geo["geoplugin_longitude"];
						echo '<small>You are in: '.$city.','.$region.','.$country.'</small><a class="button" href="#popup1" style="font-size:11px" title="Get on map">.<span class="glyphicon glyphicon-map-marker"></span></a>';

                     ?>
                  
                  
                  <div id="popup1" class="overlay">
                     <div class="popup">
                        <h2>Location on MapMiii</h2>
                        <a class="close" href="#">&times;</a>
                        <div class="content">
                           <iframe width="400px" height="300px">
                              <!DOCTYPE html>
                              <html>
                                 <head>
                                    <title>Geolocation</title>
                                    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
                                    <meta charset="utf-8">
                                    <style>
                                       html, body {
                                       height: 100%;
                                       margin: 0;
                                       padding: 0;
                                       }
                                       #map {
                                       height: 100%;
                                       }
                                    </style>
                                 </head>
                                 <body>
                                    <div id="map"></div>
                                    <script>
                                       function initMap() {
                                         var map = new google.maps.Map(document.getElementById('map'), {
                                       	center: {lat: -34.397, lng: 150.644},
                                       	zoom: 6
                                         });
                                         var infoWindow = new google.maps.InfoWindow({map: map});
                                       
                                         // Try HTML5 geolocation.
                                         if (navigator.geolocation) {
                                       	navigator.geolocation.getCurrentPosition(function(position) {
                                       	  var pos = {
                                       		lat: position.coords.latitude,
                                       		lng: position.coords.longitude
                                       	  };
                                       
                                       	  infoWindow.setPosition(pos);
                                       	  infoWindow.setContent('Location found.');
                                       	  map.setCenter(pos);
                                       	}, function() {
                                       	  handleLocationError(true, infoWindow, map.getCenter());
                                       	});
                                         } else {
                                       	// Browser doesn't support Geolocation
                                       	handleLocationError(false, infoWindow, map.getCenter());
                                         }
                                       }
                                       
                                       function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                                         infoWindow.setPosition(pos);
                                         infoWindow.setContent(browserHasGeolocation ?
                                       						'Error: The Geolocation service failed.' :
                                       						'Error: Your browser doesn\'t support geolocation.');
                                       }
                                       
                                       	
                                    </script>
                                    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&signed_in=true&callback=initMap"
                                       async defer></script>
			  </body>
                              </html>
                           </iframe>
                        </div>
                     </div>
                  </div>
				  <?php } ?>
               </td>
            </tr>
         </table>
		 -->

         <div class="hm_info">
			
			<form class="aim_form" method="post">
				<table width="100%">
				   <tr>
					  <td id="aim">
					  	<table width="100%">
						   <tr>
						   	<td>
								<small>Your Aim:</small>
							</td>
						   	<td>
								<span align="right" style="float:right;">
									<a id="cancel_aim" href="#" onClick="cancelAimBox()" style="font-size:12px; display:none;"><span class="glyphicon glyphicon-remove"></span> Cancel </a>
									&nbsp;
									<label onClick="updateAim(<?php echo $hm_info['hm_id']; ?>)" style="font-size:12px; display:none; float:right; cursor:pointer;" id="save_aim"> Save <span class="glyphicon glyphicon-save"></span></label>
									<a id="edit_aim" href="#" onClick="editAimBox()" style="font-size:12px; float:right;">Edit <span class="glyphicon glyphicon-edit"></span></a>
								 </span>
							</td>
						   </tr>
						</table>
					  </td>
				   </tr>
				   <tr>
					<td>
						<div id="aim_display">
							<p id="aim_info"><?php echo showAim($hm_info['hm_id']); ?></p>
							<textarea name="aim" id="edit_aim_box" type="text" style="display:none;"><?php echo showAim($hm_info['hm_id']); ?></textarea>
						</div>
					</td>
				   </tr>
				</table>
			</form>
			<script type="text/javascript">
			   function editAimBox(){
				var a1 = document.getElementById("edit_aim_box");
				var a2 = document.getElementById("aim_info");
				var a3 = document.getElementById("edit_aim");
				var a4 = document.getElementById("save_aim");
				var a5 = document.getElementById("cancel_aim");
				
				a1.style.display ="";
				a2.style.display ="none";
				a3.style.display ="none";
				a4.style.display ="";
				a5.style.display ="";
			   }
			   
			   function cancelAimBox(){
				var c1 = document.getElementById("edit_aim_box");
				var c2 = document.getElementById("aim_info");
				var c3 = document.getElementById("edit_aim");
				var c4 = document.getElementById("save_aim");
				var c5 = document.getElementById("cancel_aim");
				
				c1.style.display ="none";
				c2.style.display ="";
				c3.style.display ="";
				c4.style.display ="none";
				c5.style.display ="none";
			   }
			</script>
         </div>
		 
         <div id="hm_work">
            Your Work: <a href="javascript:;" onClick="addWork()" id="add_work" style="font-size:12px; float:right"><span class="glyphicon glyphicon-plus"></span> Add your Work</a>
			<div>
				<div class="panel-group" id="accordion">
				   <div class="panel panel-default">
					  <div class="panel-heading">
						<span style="font-size:13px" class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse1" onClick="goto('shop/shop.php')">Your Shop</span>
						 <table style="float:right">
							<tr>
							   <td title="New Message">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-envelope"></span></small></a>&nbsp;
							   </td>
							   <td title="New Vote">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-star"></span></small></a>&nbsp;
							   </td>
							   <td title="New Review">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-comment"></span></small></a>&nbsp;
							   </td>
							   <td title="New Share">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-share"></span></small></a>
							   </td>
							</tr>
						 </table>
					  </div>
					  <div id="collapse1" class="panel-collapse collapse in">
						 <div class="panel-body">
							<table id="tabs_child">
							   <tr>
								  <td id="work_title">
									 Your Product:
								  </td>
								  <td id="work_info" >
									 <table>
										<tr>
										   <td title="New Message">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-envelope"></span></small></a>&nbsp;
										   </td>
										   <td title="New Vote">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-star"></span></small></a>&nbsp;
										   </td>
										   <td title="New Review">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-comment"></span></small></a>&nbsp;
										   </td>
										   <td title="New View">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-eye-open"></span></small></a>&nbsp;
										   </td>
										   <td title="New Share">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-share"></span></small></a>
										   </td>
										</tr>
									 </table>
								  </td>
							   </tr>
							</table>
						 </div>
					  </div>
				   </div>
				   <div class="panel panel-default">
					  <div class="panel-heading">
						<span style="font-size:13px" class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse2">Your Service Center</span>
						 <table style="float:right">
							<tr>
							   <td title="New Message">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-envelope"></span></small></a>&nbsp;
							   </td>
							   <td title="New Vote">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-star"></span></small></a>&nbsp;
							   </td>
							   <td title="New Review">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-comment"></span></small></a>&nbsp;
							   </td>
							   <td title="New Share">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-share"></span></small></a>
							   </td>
							</tr>
						 </table>
					  </div>
					  <div id="collapse2" class="panel-collapse collapse">
						 <div class="panel-body">
							<table id="tabs_child">
							   <tr>
								  <td id="work_title">
									 Your Service:
								  </td>
								  <td id="work_info" >
									 <table>
										<tr>
										   <td title="New Message">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-envelope"></span></small></a>&nbsp;
										   </td>
										   <td title="New Vote">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-star"></span></small></a>&nbsp;
										   </td>
										   <td title="New Review">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-comment"></span></small></a>&nbsp;
										   </td>
										   <td title="New View">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-eye-open"></span></small></a>&nbsp;
										   </td>
										   <td title="New Share">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-share"></span></small></a>
										   </td>
										</tr>
									 </table>
								  </td>
							   </tr>
							</table>
						 </div>
					  </div>
				   </div>
				   <div class="panel panel-default">
					  <div class="panel-heading">
						<span style="font-size:13px" class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse3">Your Dish</span>
						 <table style="float:right">
							<tr>
							   <td title="New Message">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-envelope"></span></small></a>&nbsp;
							   </td>
							   <td title="New Vote">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-star"></span></small></a>&nbsp;
							   </td>
							   <td title="New Review">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-comment"></span></small></a>&nbsp;
							   </td>
							   <td title="New Share">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-share"></span></small></a>
							   </td>
							</tr>
						 </table>
					  </div>
					  <div id="collapse3" class="panel-collapse collapse">
						 <div class="panel-body">
							<table id="tabs_child">
							   <tr>
								  <td id="work_title">
									 Your Genre:
								  </td>
								  <td id="work_info">
									 <table>
										<tr>
										   <td title="New Message">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-envelope"></span></small></a>&nbsp;
										   </td>
										   <td title="New Vote">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-star"></span></small></a>&nbsp;
										   </td>
										   <td title="New Review">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-comment"></span></small></a>&nbsp;
										   </td>
										   <td title="New View">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-eye-open"></span></small></a>&nbsp;
										   </td>
										   <td title="New Share">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-share"></span></small></a>
										   </td>
										</tr>
									 </table>
								  </td>
							   </tr>
							</table>
						 </div>
					  </div>
				   </div>
				   <div class="panel panel-default">
					  <div class="panel-heading">
						<span style="font-size:13px" class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse4">Your Novel</span>
						 <table style="float:right">
							<tr>
							   <td title="New Message">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-envelope"></span></small></a>&nbsp;
							   </td>
							   <td title="New Vote">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-star"></span></small></a>&nbsp;
							   </td>
							   <td title="New Review">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-comment"></span></small></a>&nbsp;
							   </td>
							   <td title="New Share">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-share"></span></small></a>
							   </td>
							</tr>
						 </table>
					  </div>
					  <div id="collapse4" class="panel-collapse collapse">
						 <div class="panel-body">
							<table id="tabs_child">
							   <tr>
								  <td id="work_title">
									 Your Genre:
								  </td>
								  <td id="work_info" >
									 <table>
										<tr>
										   <td title="New Message">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-envelope"></span></small></a>&nbsp;
										   </td>
										   <td title="New Vote">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-star"></span></small></a>&nbsp;
										   </td>
										   <td title="New Review">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-comment"></span></small></a>&nbsp;
										   </td>
										   <td title="New View">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-eye-open"></span></small></a>&nbsp;
										   </td>
										   <td title="New Share">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-share"></span></small></a>
										   </td>
										</tr>
									 </table>
								  </td>
							   </tr>
							</table>
							<table id="tabs_child">
							   <tr>
								  <td id="work_title">
									 Your Genre:
								  </td>
								  <td id="work_info" >
									 <table>
										<tr>
										   <td title="New Message">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-envelope"></span></small></a>&nbsp;
										   </td>
										   <td title="New Vote">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-star"></span></small></a>&nbsp;
										   </td>
										   <td title="New Review">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-comment"></span></small></a>&nbsp;
										   </td>
										   <td title="New View">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-eye-open"></span></small></a>&nbsp;
										   </td>
										   <td title="New Share">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-share"></span></small></a>
										   </td>
										</tr>
									 </table>
								  </td>
							   </tr>
							</table>
							<table id="tabs_child">
							   <tr>
								  <td id="work_title">
									 Your Genre:
								  </td>
								  <td id="work_info" >
									 <table>
										<tr>
										   <td title="New Message">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-envelope"></span></small></a>&nbsp;
										   </td>
										   <td title="New Vote">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-star"></span></small></a>&nbsp;
										   </td>
										   <td title="New Review">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-comment"></span></small></a>&nbsp;
										   </td>
										   <td title="New View">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-eye-open"></span></small></a>&nbsp;
										   </td>
										   <td title="New Share">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-share"></span></small></a>
										   </td>
										</tr>
									 </table>
								  </td>
							   </tr>
							</table>
						 </div>
					  </div>
				   </div>
				   <div class="panel panel-default">
					  <div class="panel-heading">
						<span style="font-size:13px" class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse5">Your Blog</span>
						 <table style="float:right">
							<tr>
							   <td title="New Message">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-envelope"></span></small></a>&nbsp;
							   </td>
							   <td title="New Vote">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-star"></span></small></a>&nbsp;
							   </td>
							   <td title="New Review">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-comment"></span></small></a>&nbsp;
							   </td>
							   <td title="New Share">
								  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-share"></span></small></a>
							   </td>
							</tr>
						 </table>
					  </div>
					  <div id="collapse5" class="panel-collapse collapse">
						 <div class="panel-body">
							<table id="tabs_child">
							   <tr>
								  <td id="work_title">
									 Your Genre:
								  </td>
								  <td id="work_info" >
									 <table>
										<tr>
										   <td title="New Message">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-envelope"></span></small></a>&nbsp;
										   </td>
										   <td title="New Vote">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-star"></span></small></a>&nbsp;
										   </td>
										   <td title="New Review">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-comment"></span></small></a>&nbsp;
										   </td>
										   <td title="New View">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-eye-open"></span></small></a>&nbsp;
										   </td>
										   <td title="New Share">
											  <a href="#" style="text-decoration:none"><small><span class="glyphicon glyphicon-share"></span></small></a>
										   </td>
										</tr>
									 </table>
								  </td>
							   </tr>
							</table>
						 </div>
					  </div>
				   </div>
				</div>
			 </div>
         </div>
         <div id="recent_hm_work">
            Recent Work: <a href="my pro/martfill/home page/view_more.php" style="font-size:12px; float:right"><span class="glyphicon glyphicon-sunglasses"></span> View More</a>
            <table id="tabs_r_work" width="99%">
               <tr>
                  <td id="work_detail">
                     <table>
                        <small style="font-size:9px;">jjfsfjahfj</small>
                        <tr>
                           <td style="font-size:12px">
                              voted on helpmiii on dates company
                           </td>
                        </tr>
                     </table>
                  </td>
                  <td id="work_info" align="right">
                     <img width="30px" height="35px">
                  </td>
               </tr>
            </table>
            <table id="tabs_r_work" width="99%">
               <tr>
                  <td id="work_detail">
                     <table>
                        <small style="font-size:9px;">jjfsfjahfj</small>
                        <tr>
                           <td style="font-size:12px">
                              voted on helpmiii on dates company
                           </td>
                        </tr>
                     </table>
                  </td>
                  <td id="work_info" align="right">
                     <img width="30px" height="35px">
                  </td>
               </tr>
            </table>
            <table id="tabs_r_work" width="99%">
               <tr>
                  <td id="work_detail">
                     <table>
                        <small style="font-size:9px;">jjfsfjahfj</small>
                        <tr>
                           <td style="font-size:12px">
                              voted on helpmiii on dates company
                           </td>
                        </tr>
                     </table>
                  </td>
                  <td id="work_info" align="right">
                     <img width="30px" height="35px">
                  </td>
               </tr>
            </table>
         </div>
		 
      </div>
      <div class="chat">
         <div id="hm_work">
            Chat & Play <a href="my pro/martfill/home page/add_work.php" id="add_work" style="font-size:12px; float:right"><span class="glyphicon glyphicon-search"></span> Friend for Chat</a>
			<div>
				<div class="panel-group" id="accordion_chat">
				   <div class="panel panel-default">
					  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion_chat" href="#collapse_chat1">
						<span style="font-size:13px" class="panel-title">New Message</span>
						 <s style="float:right"><span class="glyphicon glyphicon-envelope"></span><span id="message" class="badge" style="color:#FFFFFF; background-color:#FF8000;"></span></s>
						<div id="m_sound" style="display:none;"></div></b><input type="hidden" id="msg_noti" /><input type="hidden" id="msg_noti1" />
					  </div>
					  <div id="collapse_chat1" class="panel-collapse collapse in">
						 <div class="panel-body">
							<div id="new_msg">
							</div>
						 </div>
					  </div>
				   </div>
				   
				   <div class="panel panel-default">
					  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion_chat" href="#collapse_chat2">
						<span style="font-size:13px" class="panel-title">Recent Chat</span>
						 <s style="float:right"><span class="glyphicon glyphicon-time"></span></s>
					  </div>
					  <div id="collapse_chat2" class="panel-collapse collapse">
						 <div class="panel-body">
							<div id="recent_chat">
							</div>
						 </div>
					  </div>
				   </div>
				   <div class="panel panel-default">
					  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion_chat" href="#collapse_chat3">
						<span style="font-size:13px" class="panel-title">Memory On - Game</span>
						 <s style="float:right"><span class="glyphicon glyphicon-th"></span></s>
					  </div>
					  <div id="collapse_chat3" class="panel-collapse collapse">
						 <div class="panel-body">
						 	<style>
							div#memory_board{
								background:#CCC;
								border:#999 0.5px solid;
								width:198px;
								height:293px;
								padding:4px;
								margin:0px auto;
							}
							div#memory_board > div{
								background: url(tile_bg.jpg) no-repeat;
								border:#000 1px solid;
								width:39px;
								height:39px;
								float:left;
								margin:4px;
								padding:5px;
								font-size:20px;
								cursor:pointer;
								text-align:center;
							}
							</style>
							<script>
							var memory_array = ['A','A','B','B','C','C','D','D','E','E','F','F','G','G','H','H','I','I','J','J','K','K','L','L'];
							var memory_values = [];
							var memory_tile_ids = [];
							var tiles_flipped = 0;
							Array.prototype.memory_tile_shuffle = function(){
								var i = this.length, j, temp;
								while(--i > 0){
									j = Math.floor(Math.random() * (i+1));
									temp = this[j];
									this[j] = this[i];
									this[i] = temp;
								}
							}
							function newBoard(){
								tiles_flipped = 0;
								var output = '';
								memory_array.memory_tile_shuffle();
								for(var i = 0; i < memory_array.length; i++){
									output += '<div id="tile_'+i+'" onclick="memoryFlipTile(this,\''+memory_array[i]+'\')"></div>';
								}
								document.getElementById('memory_board').innerHTML = output;
							}
							function memoryFlipTile(tile,val){
								if(tile.innerHTML == "" && memory_values.length < 2){
									tile.style.background = '#FFF';
									tile.innerHTML = val;
									if(memory_values.length == 0){
										memory_values.push(val);
										memory_tile_ids.push(tile.id);
									} else if(memory_values.length == 1){
										memory_values.push(val);
										memory_tile_ids.push(tile.id);
										if(memory_values[0] == memory_values[1]){
											tiles_flipped += 2;
											// Clear both arrays
											memory_values = [];
											memory_tile_ids = [];
											// Check to see if the whole board is cleared
											if(tiles_flipped == memory_array.length){
												alert("Board cleared... generating new board");
												document.getElementById('memory_board').innerHTML = "";
												newBoard();
											}
										} else {
											function flip2Back(){
												// Flip the 2 tiles back over
												var tile_1 = document.getElementById(memory_tile_ids[0]);
												var tile_2 = document.getElementById(memory_tile_ids[1]);
												tile_1.style.background = 'url(tile_bg.jpg) no-repeat';
												tile_1.innerHTML = "";
												tile_2.style.background = 'url(tile_bg.jpg) no-repeat';
												tile_2.innerHTML = "";
												// Clear both arrays
												memory_values = [];
												memory_tile_ids = [];
											}
											setTimeout(flip2Back, 700);
										}
									}
								}
							}
							</script>
						 	<div id="memory_board"></div>
							<script>newBoard();</script>
						 </div>
					  </div>
				   </div>
				   <div class="panel panel-default">
					  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion_chat" href="#collapse_chat4">
						<span style="font-size:13px" class="panel-title">Chat Box</span>
						 <s style="float:right"><span class="glyphicon glyphicon-transfer"></span></s>
					  </div>
					  <div id="collapse_chat4" class="panel-collapse collapse">
						 <div class="panel-body" style="padding:0px;">
						 	<?php
								$swap_hm = swapBox($hm_info['hm_id']);
								if(isset($swap_hm['box_0'])){
									$no1 = $swap_hm['box_0'];
								} else{
									$no1 = 0;
								}
							?>
							
							<input id="chat_reciver" type="hidden" value="" />
							<iframe id="chat_panel" src="hm_chat/public/index.php?reciver_id=<?php echo $no1/2+5; ?>" width="100%" height="488px" style="display:block;" frameborder="0" onload="disableContextMenu();" onMyLoad="disableContextMenu();">
							</iframe>
						 </div>
					  </div>
				   </div>
				</div>
			 </div>
         </div>
      </div>
      <div class="extra">
		 <div id="hm_work">
            Friend <a href="#" id="find_friend" style="font-size:12px; float:right"><span class="glyphicon glyphicon-search"></span> Find Friend</a>
			<div>
				<div class="panel-group" id="accordion_friend">
				   <div class="panel panel-default">
					  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion_friend" href="#collapse_friend1">
						<span style="font-size:13px" class="panel-title">Online Friend</span>
						 <s style="float:right"><span class="glyphicon glyphicon-globe"></span></s>
					  </div>
					  <div id="collapse_friend1" class="panel-collapse collapse in">
						 <div class="panel-body">
							<div id="hm_online">
							</div>
						 </div>
					  </div>
				   </div>
				   <div class="panel panel-default">
					  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion_friend" href="#collapse_friend2">
						<span style="font-size:13px" class="panel-title">Friend Request</span>
						 <s style="float:right"><span class="glyphicon glyphicon-plus-sign"></span><span id="f_request" class="badge" style="color:#FFFFFF; background-color:#FF8000;"></span></s>
						 <div id="f_sound" style="display:none;"></div></b><input type="hidden" id="f_r_noti" /><input type="hidden" id="f_r_noti1" />
					  </div>
					  <div id="collapse_friend2" class="panel-collapse collapse">
						 <div class="panel-body">
							<div id="friend_request">
							</div>
							<br>
							<em>Pending Request</em>
							<div id="pend_friend_request">
							</div>
						 </div>
					  </div>
				   </div>
				   <div class="panel panel-default">
					  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion_friend" href="#collapse_friend3">
						<span style="font-size:13px" class="panel-title">People of your Curiosity</span>
						 <s style="float:right"><span class="glyphicon glyphicon-flag"></span></s>
					  </div>
					  <div id="collapse_friend3" class="panel-collapse collapse">
						 <div class="panel-body">
						 	<div id="hm_of_same_curiosity">
							</div>
						 </div>
					  </div>
				   </div>
				   <div class="panel panel-default">
					  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion_friend" href="#collapse_friend4">
						<span style="font-size:13px" class="panel-title">People you may know</span>
						 <s style="float:right"><span class="glyphicon glyphicon-eye-open"></span></s>
					  </div>
					  <div id="collapse_friend4" class="panel-collapse collapse">
						 <div class="panel-body">
							<div id="hm_you_may_know">
							</div>
						 </div>
					  </div>
				   </div>
				   <div class="panel panel-default">
					  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion_friend" href="#collapse_friend5">
						<span style="font-size:13px" class="panel-title">Your Friends</span>
						 <s style="float:right"><span class="glyphicon glyphicon-user"></span></s>
					  </div>
					  <div id="collapse_friend5" class="panel-collapse collapse">
						 <div class="panel-body">
						 	<div id="all_friends">
							</div>
						 </div>
					  </div>
				   </div>
				</div>
			 </div>
         </div>
      </div>
      <div class="header">
         <img id="logo" title="Logo" name="HelpMiii Logo" src="images/helpmiiilogo.png" align="left" alt="HelpMiii" />
         <strong id="helpmiii">KietOn</strong>
         <div class="search">
			<div class="content">
				<input type="text" name="reciver_name" id="searchid" class="searchBox"  maxlength="50" size="45" placeholder="Search anything people, shop, product, place, etc." autocomplete="off" />
				<div id="result">
				</div>
			</div>
			<div style="margin:8px; float:right;">
				<script type="text/javascript" >
				$(document).ready(function()
				{
				$("#notificationLink").click(function()
				{
				$("#notificationContainer").fadeToggle(300);
				$("#notification_count").fadeOut("slow");
				return false;
				});
				
				//Document Click hiding the popup 
				$(document).click(function()
				{
				$("#notificationContainer").hide();
				});
				
				//Popup on click
				$("#notificationContainer").click(function()
				{
				return false;
				});
				
				});
				</script>
				
				<div class="dropdown" style="float:left; cursor:pointer;">
					<span class="glyphicon glyphicon-chevron-down dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"></span>
					<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
					  <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;"><span class="glyphicon glyphicon-tree-deciduous"></span> Feedback</a></li>
					  <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;"><span class="glyphicon glyphicon-tint"></span> Any Help</a></li>
					  <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;"><span class="glyphicon glyphicon-exclamation-sign"></span> Report</a></li>
					  <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;"><span class="glyphicon glyphicon-cog"></span> Setting</a></li>
					  <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;"><span class="glyphicon glyphicon-phone-alt"></span> Contact</a></li>
					  <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;"><span class="glyphicon glyphicon-blackboard"></span> About</a></li>
					  <li role="presentation" class="divider"></li>
					  <li role="presentation"><a href="/kieton/logout.php" role="menuitem" tabindex="-1" title="Logout by clicking here"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
					</ul>
				</div>
				<ul id="nav" style="margin-right:70px;">
					<li id="notification_li">
						<a href="#" id="notificationLink"><span class="glyphicon glyphicon-leaf"></span></a>
						<div id="notificationContainer">
							<div id="notificationTitle">Notifications</div>
							<div id="notificationsBody" class="notifications"></div>
							<div id="notificationFooter"><a href="#">See All</a></div>
						</div>
					</li>
				</ul>
			</div>
		 </div>
		 
      </div>
      <div class="plats">
	  		<input id="profile_user" type="hidden" value="" />
         <iframe id="content" src="timeline/index.php" frameborder="0" width="100%" height="100%">
         </iframe>
      </div>
	  <script type="text/javascript">
	  	function reciverZero(){
			var chatReciverZero = document.getElementById('chat_reciver');
			var zero = '5';
			chatReciverZero.value = zero;
		}
	  
		function toChat(reciver){
			var chatBox = document.getElementById('chat_panel');
			var chatReciver = document.getElementById('chat_reciver');
			var panelClass1 = document.getElementById('collapse_chat1');
			var panelClass2 = document.getElementById('collapse_chat2');
			var panelClass3 = document.getElementById('collapse_chat3');
			var panelClass4 = document.getElementById('collapse_chat4');
		
			panelClass1.className = "panel-collapse collapse";
			panelClass2.className = "panel-collapse collapse";
			panelClass3.className = "panel-collapse collapse";
			panelClass4.className = "panel-collapse collapse";
			
			if(chatReciver.value !== reciver){
				chatBox.src = "hm_chat/public/index.php?reciver_id=" + reciver + "&swap_id=0";
				var i = 1;
			}
			if(i == 1){
				chatReciver.value = reciver;
				var i = 0;
			}
			
			panelClass4.className = "panel-collapse collapse in";
		}
		
		function toChat1(){
			var chatBox = document.getElementById('chat_panel');
			var chatReciver = document.getElementById('chat_reciver');
			var panelClass1 = document.getElementById('collapse_chat1');
			var panelClass2 = document.getElementById('collapse_chat2');
			var panelClass3 = document.getElementById('collapse_chat3');
			var panelClass4 = document.getElementById('collapse_chat4');
		
			panelClass1.className = "panel-collapse collapse";
			panelClass2.className = "panel-collapse collapse";
			panelClass3.className = "panel-collapse collapse";
			panelClass4.className = "panel-collapse collapse";
			
			panelClass4.className = "panel-collapse collapse in";
		}
		
		function updateAim(hm_id) {
				var aim_info = document.getElementById("edit_aim_box").value;
				var aim_info1 = encodeURIComponent(aim_info);
				$.ajax({
					url: 'update_aim.php?aim_user='+hm_id+'&user_aim='+aim_info1,
					success: function( data ) {
						$('#aim_info').html(data); // set the value to the new status.
						$('#edit_aim_box').val(data);
						changeBtn();
					}
				});
				
			}
			
			function changeBtn(){
				var s1 = document.getElementById("edit_aim_box");
				var s2 = document.getElementById("aim_info");
				var s3 = document.getElementById("edit_aim");
				var s4 = document.getElementById("save_aim");
				var s5 = document.getElementById("cancel_aim");
				
				s1.style.display ="none";
				s2.style.display ="";
				s3.style.display ="";
				s4.style.display ="none";
				s5.style.display ="none";
			}
		
		function disableContextMenu()
  		{
			document.getElementById("chat_panel").contentWindow.document.oncontextmenu = function(){ return false;};
		}   
		
	</script>
   </body>
</html>















