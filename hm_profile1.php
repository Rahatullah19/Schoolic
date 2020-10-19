<?php
require_once('hm_functions.php');
require_once('startsession.php');
if (isset($_SESSION['hm_id'])) {
$hm_info = profileInfo($_SESSION['hm_id']);
}
$user_hm_id = $hm_info['hm_id'];
$user_first_name = $hm_info['first_name'];
$user_last_name = $hm_info['last_name'];
$user_profile_pic = $hm_info['profile_pic'];
$hm_name = $user_first_name . " " . $user_last_name;
?>
<!DOCTYPE html>
<html>
  <title>Profile Update</title>
	<link rel="stylesheet" href="build/css/intlTelInput.css">
    <link rel="stylesheet" href="build/css/demo.css">

<script type= "text/javascript" src = "build/countries.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>



  <link rel="icon" type="image/png" href="images/helpmiiilogo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  
  <script src="timeline/assets/javascripts/ajaxupload.3.5.js" type="text/javascript">
      </script>
  
  
  <link rel="stylesheet" href="build/css/bootstrap.css">
  <link rel="stylesheet" href="build/css/light_gray.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <style>
    html,body,h1,h2,h3,h4,h5 {
      font-family: "Raleway", sans-serif}
	  
.search{
	float:left;
	height:32px;
	}
	
.content #searchid{
	height:30px;
	border-style:solid;
	border-width:2px;
	border-color:#75FF75;
	border-radius:5px;
	width:300px;
	padding:4px;
	font-size:11px;
	color:#333333;
	margin-left:40px;
	margin-right:40px;
	}
	
.content #searchid:hover{
	border-color:#91C8FF;
	}
	
#result{
		position:absolute;
		width:300px;
		padding:1px;
		display:none;
		margin-top:0px;
		margin-left:121px;
		overflow:hidden;
		border:1px #CCC solid;
		background-color: white;
		color:#666666;
	}

#reciver_select_area{
	width:100%;
	font-family:"Courier New", Courier, monospace;
	
	}

#reciver_area{
	width:100%;
	}
	
.show
	{
		padding:8px;
		height:40px;
		font-size:11px;
		width:100%;
		background-color:#EEEEEE;
	}

.show:hover
	{
		background:#0080FF;
		color:#FFFFFF;
		cursor:pointer;
	}
	
#reciver_search_pic{
	  width: 25px;
	  height: 25px;
	  border-radius: 3px;
	  margin-right:5px;
	}
	
	/*for notification box*/
	#nav{
	list-style-type: none;
	}
	#notification_li
	{
	position:relative;
	}
	#notificationContainer 
	{
	background-color: #fff;
	border: 2px solid #6FB7FF;
	border-radius:5px;
	-webkit-box-shadow: 0 3px 8px rgba(0, 0, 0, .25);
	overflow: visible;
	position: absolute;
	top: 25px;
	margin-left: -185px;
	width: 400px;
	z-index: 1;
	display: none; // Enable this after jquery implementation 
	}
	// Popup Arrow
	#notificationContainer:before {
	content: '';
	display: block;
	position: absolute;
	width: 0;
	height: 0;
	color: transparent;
	border: 10px solid black;
	border-color: transparent transparent white;
	margin-top: -20px;
	margin-left: 188px;
	}
	#notificationTitle
	{
	font-weight: bold;
	padding: 8px;
	font-size: 13px;
	background-color: #ffffff;
	width: 384px;
	border-bottom: 1px solid #dddddd;
	text-align:center;
	}
	#notificationsBody
	{
	padding: 33px 0px 0px 0px !important;
	min-height:300px;
	}
	#notificationFooter
	{
	background-color: #e9eaed;
	text-align: center;
	font-weight: bold;
	padding: 8px;
	font-size: 12px;
	border-top: 1px solid #dddddd;
	}
	
    #tab_for_chat_list{
      width:100%;
    }
    #submit_reciver_id{
      width:100%;
      border-style:none;
      background-color:#F0F0F0;
      margin-bottom:4px;
    }
    #submit_reciver_id:hover{
      background-color:#AED7FF;
    }
    #tabs_r_work{
      width:100%;
    }
    #work_title{
      width:70%;
    }
    #work_info{
    }
    #worker_pic{
      width:35px;
      height:35px;
      margin-top:9px;
      padding:5px;
    }
    #work_detail{
    }
    #msg_info{
      font-size:11px;
      white-space: nowrap;
      overflow:hidden;
      overflow-x: hidden;
      overflow-y: hidden;
      text-overflow:ellipsis;
      width:180px;
    }
	
	#fri_box{
	margin:-10px;
	margin-top:7px;
	}
#chat_box{
	margin:-10px;
	margin-top:7px;
	}
  </style>
  <body class="w3-light-grey">
  <?php
	require_once('appvars.php');
	require_once('connectvars.php');

	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	
if (isset($_SESSION['hm_id'])) {
	if(isset($_POST['submit'])){
		$first_name = mysqli_real_escape_string($dbc,trim($_POST['firstname']));
		$last_name = mysqli_real_escape_string($dbc,trim($_POST['lastname']));
		$id_proof = mysqli_real_escape_string($dbc,trim($_POST['idproof']));
		$mobile_1 = mysqli_real_escape_string($dbc,trim($_POST['mobile1']));
		$profile_pic = mysqli_real_escape_string($dbc,trim($_FILES['profile_pic']['name']));
		$profile_pic_type = mysqli_real_escape_string($dbc,trim($_FILES['profile_pic']['type']));
		$profile_pic_size = mysqli_real_escape_string($dbc,trim($_FILES['profile_pic']['size'])); 
		$day_of_birth = mysqli_real_escape_string($dbc,trim($_POST['birthday']));
		$month_of_birth = mysqli_real_escape_string($dbc,trim($_POST['birthmonth']));
		$year_of_birth = mysqli_real_escape_string($dbc,trim($_POST['birthyear']));
		$mobile_2 = mysqli_real_escape_string($dbc,trim($_POST['mobile2']));
		//$category = mysqli_real_escape_string($dbc,trim($_POST['category']));
		$description = mysqli_real_escape_string($dbc,trim($_POST['description']));
		$address_1 = mysqli_real_escape_string($dbc,trim($_POST['address1']));
		$address_2 = mysqli_real_escape_string($dbc,trim($_POST['address2']));
		//$pin_code = mysqli_real_escape_string($dbc,trim($_POST['pincode']));
		$city = mysqli_real_escape_string($dbc,trim($_POST['city']));
		$country = mysqli_real_escape_string($dbc,trim($_POST['country']));
		$state = mysqli_real_escape_string($dbc,trim($_POST['state']));
		
		if(!empty($first_name) && !empty($last_name) && !empty($id_proof) && !empty($mobile_1) && !empty($address_1) && !empty($address_2) && !empty($city) && !empty($country) && !empty($state)){
			if ((trim($_FILES['profile_pic']['name']) !== "" ) && (trim($_FILES['profile_pic']['size']) !== 0 )){
				if ((($profile_pic_type == 'image/gif') || ($profile_pic_type == 'image/jpeg') || ($profile_pic_type == 'image/pjpeg') || ($profile_pic_type == 'image/png')) && ($profile_pic_size > 0) && ($profile_pic_size <= HM_MAXFILESIZE)) {
					if ($_FILES['profile_pic']['error'] == 0) {
						// Move the file to the target upload folder
						$target = HM_UPLOADPATH . $profile_pic;
						if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target)) {
					
										  
								$query1 = "UPDATE hm_profile SET first_name = '$first_name', last_name = '$last_name',
								mobile_no1 = '$mobile_1', mobile_no2 = '$mobile_2', address1 = '$address_1', address2 = '$address_2',
								d_o_b = '$year_of_birth-$month_of_birth-$day_of_birth', about_me = '$description',
								profile_pic = '$profile_pic', city = '$city', state = '$state', country = '$country' WHERE hm_id = '" . $_SESSION['hm_id'] . "' ";
								mysqli_query($dbc, $query1);
								$error_msg = "";
							  	$home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/kieton/timeline/kieton.php';
							   	header('Location: ' . $home_url);
							  	mysqli_close($dbc);
							   	exit();
						}
						else {
							echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
						}
					}
				}
				else {
					echo '<p class="error">The screen shot must be a GIF, JPEG, or PNG image file no greater than ' . (HM_MAXFILESIZE / 1024) . ' KB in size.</p>';
				}
				// Try to delete the temporary screen shot image file
				@unlink($_FILES['profile_pic']['tmp_name']);
				mysqli_close($dbc);
			}
			else{
								  
					$query2 = "UPDATE hm_profile SET first_name = '$first_name', last_name = '$last_name',
								mobile_no1 = '$mobile_1', mobile_no2 = '$mobile_2', address1 = '$address_1', address2 = '$address_2',
								d_o_b = '$year_of_birth-$month_of_birth-$day_of_birth', about_me = '$description',
								city = '$city', state = '$state', country = '$country' WHERE id_proof = '" . $_SESSION['id_proof'] . "' ";
					mysqli_query($dbc, $query2);
					$error_msg = "";
					
					  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/kieton/timeline/kieton.php';
						header('Location: ' . $home_url);
						mysqli_close($dbc);
						exit();
			}
		}
		else{
			echo'<p class="error">You must enter <b>all of the required</b> (field with astric*) profile data.<?p>';
		}
	}
	$hm_info = profileInfo($_SESSION['hm_id']);
	mysqli_close($dbc);
}
?>
    <!-- Top container -->
    <div class="w3-container w3-top w3-green w3-large w3-padding" style="z-index:500">
      <a href="javascript:;" class="w3-left w3-padding-0 w3-hide-large w3-hover-text-white" style="text-decoration:none;" onClick="w3_open();">
        <i class="fa fa-user">
        </i>
      </a>
	  	<div class="search">
			<div class="content">
				<span style="margin-left:20px;"> <b>KietOn</b></span>
				<input type="text" name="reciver_name" id="searchid" class="searchBox"  maxlength="50" size="45" placeholder="Search anything people, shop, product, place, etc." autocomplete="off" />
				<div id="result">
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
						<span class="glyphicon glyphicon-chevron-down dropdown-toggle" id="menu1" data-toggle="dropdown"></span>
						<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
						  <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;"><span class="glyphicon glyphicon-tree-deciduous"></span> Feedback</a></li>
						  <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;"><span class="glyphicon glyphicon-tint"></span> Any Help</a></li>
						  <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;"><span class="glyphicon glyphicon-exclamation-sign"></span> Report</a></li>
						  <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;"><span class="glyphicon glyphicon-cog"></span> Setting</a></li>
						  <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;"><span class="glyphicon glyphicon-phone-alt"></span> Contact</a></li>
						  <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:;"><span class="glyphicon glyphicon-blackboard"></span> About</a></li>
						  <li role="presentation" class="divider"></li>
						  <li role="presentation"><a href="logout.php" role="menuitem" tabindex="-1" title="Logout by clicking here"><span class="glyphicon glyphicon-log-out"></span> LogOut</a></li>
						</ul>
					</div>
					<ul id="nav">
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
      <a href="javascript:;" class="w3-right w3-padding-0 w3-hide-large w3-hover-text-white" style="text-decoration:none;" onClick="w3_open2();">
        <i class="fa fa-bars">
        </i>
      </a>
    </div>
    <!-- Sidenav/menu -->
    <nav class="w3-sidenav w3-collapse w3-white w3-animate-left" style="z-index:400;width:300px;" id="mySidenav">
      <br>
      <br>
      <!-- Left Column -->
      <div class="w3-col">
        <!-- Profile -->
        <div class="w3-card-2">
			<div class="w3-container">
				
			 <table>
				<tr class="profile_info">
				   <td>
					  <img class="w3-round" id="hm_dp" src="images/profile_pic/<?php echo $user_profile_pic; ?>" style="float:left; width:60px; height:60px; margin:10px;">
				   </td>
				   <td>
					  <table>
						 <tr>
							<td>
							   <a href="profile/pro.php?user_id=<?php echo $user_hm_id/2+5; ?>"><p id="hm_name" style="text-transform:capitalize;"><b><?php echo $hm_name;?></b></p></a>
							</td>
						 </tr>
						 <tr>
							<td>
							   <a href="timeline/kieton.php" style="font-size:12px;"><span class="glyphicon glyphicon-home"></span> Home</a>
							</td>
						 </tr>
					  </table>
				   </td>
				</tr>
			 </table>
			 <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i><?php echo $hm_info['address1']; ?></p>
			 <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i><?php echo $hm_info['city']; ?>,<?php echo " " .  $hm_info['country']; ?></p>
			 <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i><?php echo $hm_info['d_o_b']; ?></p>
			</div>
		  </div>
        <br>
        <!-- Accordion -->
        <div class="w3-card-2 w3-round">
          <div class="w3-accordion w3-white">
            <button onClick="myFunction('Demo2')" class="w3-btn-block w3-theme-l1 w3-left-align">
              <i class="fa fa-calendar-check-o fa-fw w3-margin-right">
              </i> My Events
            </button>
            <div id="Demo2" class="w3-accordion-content w3-container">
              <p>Some other text..
              </p>
            </div>
            <button onClick="myFunction('Demo3')" class="w3-btn-block w3-theme-l1 w3-left-align">
              <i class="fa fa-users fa-fw w3-margin-right">
              </i> My Photos
            </button>
          </div>
        </div>
        <br>
        <!-- Interests -->
        <div class="w3-card-2 w3-round w3-white">
          <div class="w3-container">
            <p>Interests
            </p>
            <p>
              <span class="w3-tag w3-small w3-theme-l1">Friends
              </span>
              <span class="w3-tag w3-small w3-theme-l2">Food
              </span>
              <span class="w3-tag w3-small w3-theme-l3">Design
              </span>
              <span class="w3-tag w3-small w3-theme-l4">Art
              </span>
              <span class="w3-tag w3-small w3-theme-l5">Photos
              </span>
            </p>
          </div>
        </div>
        <br>
        <!-- Alert Box -->
        <div class="w3-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom">
          <span onClick="this.parentElement.style.display='none'" class="w3-hover-text-grey w3-closebtn">
            <i class="fa fa-remove">
            </i>
          </span>
          <p>
            <strong>Hey!
            </strong>
          </p>
          <p>People are looking at your profile. Find out who.
          </p>
        </div>
        <br>
        <br>
        <!-- End Left Column -->
      </div>
    </nav>
	
	
    
  <!-- Overlay effect when opening sidenav on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onClick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay">
  </div>
  <!-- !PAGE CONTENT! -->
  <div class="w3-main col-lg-5" style="margin-top:30px; margin-right:300px; margin-left:290px;">
    <div class="w3-col">


	<div style="margin:20px;">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" title="All the input fields with Astric ( * ) mark are compulsory" autocomplete="off" target="_parent">
          <fieldset style="border:solid; border-width:2px; border-color:#39F; border-radius:13px; box-shadow:2px 4px 9px #FFFFFF; background-color:#D7E4FF; opacity:0.8; margin-top:-5px;">
            <legend><h2>Personal</h2></legend><br>
               <table>
                  <tr>
                    <td>
                        <label for="Name">First Name:*</label>
                    </td>
                    <td align="right">
                        <input type="text" name="firstname" id="firstname" value="<?php echo $hm_info['first_name']; ?>" maxlength="50" placeholder="Firstname" style="width:250px" autofocus required>
                    </td>
                  </tr>
				  <tr>
                  </tr>
                  <tr>
                  	<td align="left">
                    	<label for="Name">Last Name:*</label>
                    </td>
                    <td align="right">
                    	<input type="text" name="lastname" id="lastname" value="<?php echo $hm_info['last_name']; ?>" maxlength="50" placeholder="Lastname" style="width:250px" required>
                    </td>
                  </tr>
                  <tr>
                  </tr>
                  <tr>
                  	<td align="left">
                    	<label for="email-id">Email-Id:*</label>
                    </td>
                    <td align="right">
                    	<input type="email" name="idproof" value="<?php echo $hm_info['id_proof']; ?>" id="idproof" size="25" title="Enter a valid Email Address. So, that it will be helpfull to drop a Email regarding any notification" placeholder="Email Address" style="width:250px" required>
                    </td>
                  </tr>
                  <tr>
                  </tr>
                  <tr>
                  	<td align="left">
                    	<label for="Mno">Mobile No.:*</label>
                    </td>
                    <td align="left">
                    	<input name="mobile1" id="phone" type="tel" value="<?php echo $hm_info['mobile_no1']; ?>" title="Enter a valid Mobile number. So, that it will be helpfull to contact you." minlegth="11" maxlength="11" placeholder="Mobile No." style="width:250px;" required>
                    </td>
                  </tr>
                  <tr>
                  </tr>
               </table><br>

            <fieldset style="border:solid; border-width:1.5px; border-color:#69F; border-radius:9px; background-color:#E6EEFF; opacity:0.8; margin-top:-5px;">
              <legend><h3>More Info</h3></legend><br>
			  	<table>
                  <tr>
                    <td>
                        <label for="profile_pic">Upload your Profile picture:</label>
                    </td>
                    <td align="right" style="width:221px;">
                        <img id="blah" src="images/profile_pic/<?php echo $hm_info['profile_pic']; ?>" style="border-radius:10px; margin:8px; width:100px;" />
						
                        <input type='file' name="profile_pic" name="files[0]" id="profilepic" onchange="readURL(this);" style="border-color:#FFF; margin-bottom:10px;" title="Upload your profile picture"/>
                    </td>
                    
                  </tr>
                  <tr>
                  </tr>
                  <tr>
                  	<td align="left">
                    	<label for="dob">Date of Birth:</label>
                    </td>
                    <td align="right">
                    	<span name="dateofbirth" >
                            <select name="birthday" id="day" title="Day"  style="width:53px; height:25px;" >
                                <option value="0" selected="1">Day</option>
                                <option value="01">1</option>
                                <option value="02">2</option>
                                <option value="03">3</option>
                                <option value="04">4</option>
                                <option value="05">5</option>
                                <option value="06">6</option>
                                <option value="07">7</option>
                                <option value="08">8</option>
                                <option value="09">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>&nbsp;
                            
                            <select name="birthmonth" id="month" title="Month" style="width:91px; height:25px;">
                                <option value="0" selected="1">Month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>&nbsp;

                            <select name="birthyear" id="year" title="Year" style="width:73px; height:25px;" >
                                <option value="0" selected="1">Year</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                             </select>
                        </span>
                    </td>
                  </tr>
                  <tr>
                  </tr>
                  <tr>
                  	<td align="left">
                    	<label for="mobile2"><br>Second Mobile No:</label>
                    </td>
                    <td align="left">
                    	<input name="mobile2" id="phone2" type="tel" value="<?php echo $hm_info['mobile_no2']; ?>" title="Enter your secondary mobile number. So, that you will be contacted on this in case emergency" placeholder="Another Mobile No. (Optional)" maxlength="11" minlegth="11" style="margin-top:10px; width:233px;" >
                    </td>
                  </tr>
                  <tr>
                  </tr>
				  <!--
				  <tr>
                  	<td align="left">
                    	<label for="category"><br>Select your category:*</label>
                    </td>
                    <td align="left">
                    	<input name="category" type="text" list="info" placeholder="-Enter or Select From List-" style="width:233px;" required />
                            <datalist id="info">
                                <option value="Artist"></option>
                                <option value="Businessman"></option>
                                <option value="Doctor"></option>
                                <option value="Engineer"></option>
                                <option value="Politician"></option>
                                <option value="Teacher"></option>
                                <option value="Student"></option>
                                <option value="_ : ' THE HELPER ' : _">All-Rounder</option>
                            </datalist>
                    </td>
                  </tr>
				  <tr>
                  </tr>
				  -->
				  <tr>
                  	<td align="left">
                    	<label for="description">Give your Description:</label>
                    </td>
                    <td align="left">
                    	<textarea rows="4" cols="30" name="description" value="<?php echo $hm_info['about_me']; ?>" id="descript" title="It will be helpfull to the user. So, that user can identifying you" placeholder="Hi, I want you to discribe yourself." style="margin-top:10px;"></textarea>
                    </td>
                  </tr>
               </table>
            </fieldset>
          </fieldset>
          <br>
		 
          <fieldset style="border:solid; border-width:2px; border-color:#39F; border-radius:13px; box-shadow:2px 4px 9px #FFFFFF; background-color:#D7E4FF; opacity:0.8;">
          	<legend><h2>Address</h2></legend><br>
            	<table>
                	<tr>
                    	<td>
                        	<label>Address:*</label>
                        </td>
                        <td>
                        	<input name="address1" type="text" value="<?php echo $hm_info['address1']; ?>" title="Street address, P.O. box, C/O" placeholder="Street address, P.O. box, C/O" style="width:278px;" required>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                    	<td>
                        	<label>Address(Continued from above):*</label>
                        </td>
                    	<td>
                        	<input name="address2" type="text" value="<?php echo $hm_info['address2']; ?>" title="Apartment, Suit, Unit, Building, Floor, etc" placeholder="Apartment,Suit,Unit,Building,Floor,etc" style="width:278px;" required>
                        </td>
                    </tr>
                    <tr>
                    </tr>
					<!--
                    <tr>
                    	<td>
                        	<label>Pincode or Post Office name :*</label>
                        </td>
                        <td>
							<div class="content">
								<input type="text" class="search" name="pincode" id="searchid" placeholder="Enter 6 digit pincode or post office name" style="width:278px; border: none;" required />
								<div id="result">
								</div>
							</div>
                        </td>
                    </tr>
                    <tr>
                    </tr>
					-->
                    <tr>
                    	<td>
                        	<label>City:*</label>
                        </td>
                        <td>
                        	<input name="city" type="text" value="<?php echo $hm_info['city']; ?>" placeholder="City in which you live."  style="width:278px;" required>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td>
                        	<label>Select Country:*</label>
                        </td>
                        <td>
                        	<select name ="country" id="country"  value="<?php echo $hm_info['country']; ?>" size="1.5" style="height:33px; width:278px;" required></select><br>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td>

                        	<label>Select State/Privince:*</label>
                        </td>
                        <td>
                        	<select name ="state" id ="state" value="<?php echo $hm_info['state']; ?>" size="1.5" style="height:33px; width:278px;" required></select>
                        </td>
                    </tr>
                    <script language="javascript">
                    	populateCountries("country", "state");
                    </script>
                </table>
              </fieldset>
              			
           <br>
           <br>
           <p align="center">
            <button type="reset" style="background-color:#FFF; color:#666; border:solid; border-width:1px; border-color:#999;"> &nbsp;&nbsp;&nbsp;&nbsp;Reset&nbsp;&nbsp;&nbsp;&nbsp; </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button name="submit" type="submit" value="Submit!" > Submit </button>
           </pt>
        </div>
        </form>
	</div>
        
                        <script src="build/js/intlTelInput.js"></script>
                        <script>
							$("#phone").intlTelInput({
							defaultCountry: "auto",
							geoIpLookup: function(callback) {
							$.get('http://ipinfo.io', function() {}, "jsonp").always(function(resp) {
							var countryCode = (resp && resp.country) ? resp.country : "";
							callback(countryCode);
							});
							},
							utilsScript: "lib/libphonenumber/build/utils.js"
							});
                        </script>

                        <script>
                            $("#phone2").intlTelInput({
							defaultCountry: "auto",
							geoIpLookup: function(callback) {
							$.get('http://ipinfo.io', function() {}, "jsonp").always(function(resp) {
							var countryCode = (resp && resp.country) ? resp.country : "";
							callback(countryCode);
							});
							},
							utilsScript: "lib/libphonenumber/build/utils.js"
							});
                        </script>

<!-- End page content -->
<script type="text/javascript">
function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
	
function rotateImage(degree) {         //for profile pic rotation
	$('#blah').animate({  transform: degree }, {
    step: function(now,fx) {
        $(this).css({
            '-webkit-transform':'rotate('+now+'deg)', 
            '-moz-transform':'rotate('+now+'deg)',
            'transform':'rotate('+now+'deg)',
			'margin':'8px'
        });
    }
    });
}
</script>
<script>
  // Get the Sidenav
  var mySidenav = document.getElementById("mySidenav");
  var mySidenav2 = document.getElementById("mySidenav2");
  // Get the DIV with overlay effect
  var overlayBg = document.getElementById("myOverlay");
  // Toggle between showing and hiding the sidenav, and add overlay effect
  function w3_open() {
    if (mySidenav.style.display === 'block') {
      mySidenav.style.display = 'none';
      overlayBg.style.display = "none";
    }
    else {
      mySidenav.style.display = 'block';
      overlayBg.style.display = "block";
    }
  }
  function w3_open2() {
    if (mySidenav2.style.display === 'block') {
      mySidenav2.style.display = 'none';
      overlayBg.style.display = "none";
    }
    else {
      mySidenav2.style.display = 'block';
      overlayBg.style.display = "block";
    }
  }
  // Close the sidenav with the close button
  function w3_close() {
    mySidenav.style.display = "none";
    overlayBg.style.display = "none";
  }
</script>
</body>
</html>




















