<?php
include 'includes/config.php';
include 'includes/smileys.php';
require_once ('../hm_functions.php');
require_once ('../startsession.php');
if (isset($_SESSION['hm_id']))
{
$hm_info = profileInfo($_SESSION['hm_id']);
}
else
{
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Work%20Space/Schoolic/welcome.php';
header('Location: ' . $home_url);
}
$user_hm_id = $hm_info['hm_id'];
$user_first_name = $hm_info['first_name'];
$user_last_name = $hm_info['last_name'];
$user_profile_pic = $hm_info['profile_pic'];
$hm_name = $user_first_name . " " . $user_last_name;
?>
<!DOCTYPE html>
<html>
  <title>Home Page
  </title>
  <link rel="icon" type="image/png" href="../images/helpmiiilogo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="assets/stylesheets/normalize.css" media="screen" rel="stylesheet" type="text/css" />
  <link href="assets/stylesheets/all.css" media="screen" rel="stylesheet" type="text/css" />
  <link href="assets/stylesheets/timeline.css" media="screen" rel="stylesheet" type="text/css" />
  <link href="assets/stylesheets/comments.css" media="screen" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
  </script>
  <script src="assets/javascripts/all.js" type="text/javascript">
  </script>
  <script src="assets/javascripts/ajaxupload.3.5.js" type="text/javascript">
  </script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
  </script>
  <link rel="stylesheet" href="../build/css/bootstrap.css">
  <link rel="stylesheet" href="../build/css/light_gray.css">
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
      padding:4px;
      font-size:11px;
      color:#333333;
    }
    .content #searchid:hover{
      border-color:#ffffff;
    }
    #result{
      position:absolute;
      width:300px;
      padding:1px;
      display:none;
      margin-top:0px;
      margin-left:131px;
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
      display: none;
      // Enable this after jquery implementation 
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
    <div class="w3-container w3-light-blue w3-top " style="z-index:500">
      <div class="w3-bar w3-left-align w3-padding-small" style="max-width:1200px;">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-left w3-padding-small w3-hover-white" href="javascript:void(0);" onclick="w3_open();">
          <i class="fa fa-user">
          </i>
        </a>
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-small w3-hover-white" href="javascript:void(0);" onclick="w3_open2();">
          <i class="fa fa-bars">
          </i>
        </a>
        <a href="#" class="w3-bar-item w3-button w3-padding-small">Schoolic
        </a>
        <div class="w3-dropdown-hover w3-bar-item w3-padding-small w3-middle">
          <span title="Notifications">
            <i class="glyphicon glyphicon-chevron-down">
            </i>
            <span class="w3-badge w3-right w3-small w3-green">
            </span>
          </span>     
          <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:200px">
            <a href="#" class="w3-bar-item w3-button">
              <span class="glyphicon glyphicon-tree-deciduous">
              </span> Feedback
            </a>
            <a href="#" class="w3-bar-item w3-button">
              <span class="glyphicon glyphicon-tint">
              </span> Any Help
            </a>
            <a href="#" class="w3-bar-item w3-button">
              <span class="glyphicon glyphicon-exclamation-sign">
              </span> Report
            </a>
            <a href="#" class="w3-bar-item w3-button">
              <span class="glyphicon glyphicon-cog">
              </span> Setting
            </a>
            <a href="#" class="w3-bar-item w3-button">
              <span class="glyphicon glyphicon-phone-alt">
              </span> Contact
            </a>
            <a href="#" class="w3-bar-item w3-button">
              <span class="glyphicon glyphicon-blackboard">
              </span> About
            </a>
            <a href="../logout.php" title="Logout by clicking here" class="w3-bar-item w3-button">
              <span class="glyphicon glyphicon-log-out">
              </span> LogOut
            </a>
          </div>
        </div>
        <span class="w3-bar-item w3-center">
          <input type="input" name="reciver_name" id="searchid" class="searchBox"  maxlength="30" size="25" title="Search for any students, teachers, parents, group or subject etc." placeholder="Search for anything." autocomplete="off" />
          <div id="result">
          </div>
        </span>
      </div>
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
                  <?php if (!empty($user_profile_pic))
{ ?>
                  <img class="w3-round" id="hm_dp" src="../images/profile_pic/<?php echo $user_profile_pic; ?>" style="float:left; width:60px; height:60px; margin:10px;" >
                  <?php
}
else
{
echo '<img class="w3-round" id="hm_dp" src="../images/icon/male.jpg" style="float:left; width:60px; height:60px; margin:10px;" >';
}
?>
                </td>
                <td>
                  <table>
                    <tr>
                      <td>
                        <a href="../profile/pro.php?user_id=<?php echo $user_hm_id / 2 + 5; ?>">
                          <p id="hm_name" style="text-transform:capitalize;">
                            <b>
                              <?php echo $hm_name; ?>
                            </b>
                          </p>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a href="../hm_profile.php" style="font-size:12px;">Update Profile
                        </a>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <?php if ($hm_info['address1'] != "")
{ ?>
            <p>
              <i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme">
              </i> 
              <?php echo $hm_info['address1']; ?>
            </p>
            <?php
}
if ($hm_info['country'] != "")
{ ?>
            <p>
              <i class="fa fa-home fa-fw w3-margin-right w3-text-theme">
              </i> 
              <?php echo $hm_info['city']; ?>, 
              <?php echo $hm_info['country']; ?>
            </p>
            <?php
}
if ($hm_info['d_o_b'] != 0000 - 00 - 00)
{ ?>
            <p>
              <i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme">
              </i> 
              <?php echo $hm_info['d_o_b']; ?>
            </p>
            <?php
} ?>
          </div>
        </div>
        <br>
        <!-- Accordion -->
        <div class="w3-card-2 w3-round">
          <div class="w3-accordion w3-white">
            <!-- <button onClick="myFunction('Demo2')" class="w3-btn-block w3-theme-l1 w3-left-align">
              <i class="fa fa-calendar-check-o fa-fw w3-margin-right">
              </i> My School
            </button> -->
<?php if ($hm_info['profile_type'] != "4" && $hm_info['profile_type'] != "5" && $hm_info['profile_type'] != "6")
{ ?>
            <br>
            <div id="my_school">
            </div>
            <br>
<?php } ?>
            
<?php if ($hm_info['profile_type'] == "2")
{ ?>
            <a href="../create_school.php" class="w3-btn-block w3-theme-l1 w3-left-align">
              <i class="fa fa-home fa-fw w3-margin-right">
              </i> Create a School
            </a>
<?php } ?>
          </div>
        </div>
        <br>
            
<?php if ($hm_info['profile_type'] != "5" && $hm_info['profile_type'] != "6")
{ ?>
        <!-- Interests -->
        <div class="w3-card-2 w3-round w3-white">
          <div class="w3-container">
            <p>My Groups</p>
            <a href="../create_group.php" class="w3-btn w3-theme-l1">
              <i class="fa fa-group fa-fw w3-margin-right">
              </i> Create a Group
            </a>
            <br>
            <br>
            <div id="my_group">
            </div>
            <br>
          </div>
        </div>
        <br>
<?php } ?>

<?php if ($hm_info['profile_type'] != "6")
{ ?>
        <div class="w3-card-2 w3-round w3-white">
          <div class="w3-container">
            <p>My Subjects</p>
            <br>
            <div id="my_subject">
            </div>
            <br>
          </div>
        </div>
        <br>
<?php } ?>

      </div>
    </nav>
    <!-- Sidenav/menu -->
    <nav class="w3-sidenav w3-collapse w3-white w3-animate-right" style="z-index:400;width:490px;right:0;" id="mySidenav2">
      <br>
      <br>
      <!-- Right Column -->
      <div class="col-sm-13">
        <div class="col-sm-5" id="fri_box">
          <div class="w3-card-2">
            School Holics 
            <a href="#" id="find_friend" style="font-size:12px; float:right">
            </a>
            <div>
              <div class="panel-group" id="accordion_friend">
                <div class="panel panel-default">
                  <div class="panel-heading" data-toggle="collapse" data-parent="#accordion_friend" href="#collapse_friend1">
                    <span style="font-size:13px" class="panel-title">Online Holics
                    </span>
                    <s style="float:right">
                      <span class="glyphicon glyphicon-globe">
                      </span>
                    </s>
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
                    <span style="font-size:13px" class="panel-title">Add Request
                    </span>
                    <s style="float:right">
                      <span class="glyphicon glyphicon-plus-sign">
                      </span>
                      <span id="f_request" class="badge" style="color:#FFFFFF; background-color:#FF8000;">
                      </span>
                    </s>
                    <div id="f_sound" style="display:none;">
                    </div>
                    </b>
                  <input type="hidden" id="f_r_noti" />
                  <input type="hidden" id="f_r_noti1" />
                </div>
                <div id="collapse_friend2" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div id="friend_request">
                    </div>
                    <br>
                    <em>Pending Request
                    </em>
                    <div id="pend_friend_request">
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-parent="#accordion_friend" href="#collapse_friend4">
                  <span style="font-size:13px" class="panel-title">You may know
                  </span>
                  <s style="float:right">
                    <span class="glyphicon glyphicon-eye-open">
                    </span>
                  </s>
                </div>
                <div id="collapse_friend4" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div id="friend_u_may_know">
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-parent="#accordion_friend" href="#collapse_friend5">
                  <span style="font-size:13px" class="panel-title">Your Holics
                  </span>
                  <s style="float:right">
                    <span class="glyphicon glyphicon-user">
                    </span>
                  </s>
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
      <div class="col-sm-7" id="chat_box">
        <div class="w3-card-2">
          Chat & Play 
          <div>
            <div class="panel-group" id="accordion_chat">
              <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-parent="#accordion_chat" href="#collapse_chat1">
                  <span style="font-size:13px" class="panel-title">New Message
                  </span>
                  <s style="float:right">
                    <span class="glyphicon glyphicon-envelope">
                    </span>
                    <span id="message_no" class="badge" style="color:#FFFFFF; background-color:#FF8000;">
                    </span>
                  </s>
                  <div id="m_sound" style="display:none;">
                  </div>
                  </b>
                <input type="hidden" id="msg_noti" />
                <input type="hidden" id="msg_noti1" />
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
                <span style="font-size:13px" class="panel-title">Recent Chat
                </span>
                <s style="float:right">
                  <span class="glyphicon glyphicon-time">
                  </span>
                </s>
              </div>
              <div id="collapse_chat2" class="panel-collapse collapse">
                <div class="panel-body">
                  <div id="recent_chat">
                  </div>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" data-toggle="collapse" data-parent="#accordion_chat" href="#collapse_chat4">
                <span style="font-size:13px" class="panel-title">Chat Box
                </span>
                <s style="float:right">
                  <span class="glyphicon glyphicon-transfer">
                  </span>
                </s>
              </div>
              <div id="collapse_chat4" class="panel-collapse collapse">
                <div class="panel-body" style="padding:0px;">
                  <?php
$swap_hm = swapBox($hm_info['hm_id']);
if (isset($swap_hm['box_0']))
{
$no1 = $swap_hm['box_0'];
}
else
{
$no1 = 0;
}
?>
                  <input id="chat_reciver" type="hidden" value="" />
                  <iframe id="chat_panel" src="../hm_chat/public/index.php?reciver_id=<?php echo $no1 / 2 + 5; ?>" width="100%" height="488px" style="display:block;" frameborder="0" onload="disableContextMenu();" onMyLoad="disableContextMenu();">
                  </iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </nav>

<!-- !PAGE CONTENT! -->
<br>
<div class="w3-main col-lg-6" style="margin-top:20px; margin-right:315px; margin-left:285px;">
  <div class="w3-col">
    <!-- Modal the popup for share-->
    <div class="modal fade" id="myModal_for_share" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;
            </button>
            <h4 class="modal-title">Select sharing type
            </h4>
          </div>
          <div class="modal-body" align="center">
            <button class="btn btn-default btn-lg" onClick="">Share with all your Holics instantly
            </button>
            <p>
            </p>
            <span> Or 
            </span>
            <p>
            </p>
            <button class="btn btn-default btn-lg" onClick="">Share with some of your selected Holics
            </button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="main">
      <ol class="timeline clearfix">
        <li class="left">
          <i class="pointer">
          </i>
          <div class="unit" id="tabs">
            <ul class="actions">
              <li>
                <a href="#tabs-1">
                  <span class="glyphicon glyphicon-modal-window">
                  </span> Status
                </a>
              </li>
              <li>
                <a href="#tabs-2">
                  <span class="glyphicon glyphicon-picture">
                  </span> Add Picture
                </a>
              </li>
              <li>
                <a href="#tabs-3">
                  <span class="glyphicon glyphicon-film">
                  </span> Add Video
                </a>
              </li>
            </ul>
            <span class="ajax_indi">
              <img src="assets/images/loader.gif">
            </span>
            <!-- Units -->
            <div class="actionUnits" id="tabs-1">
              <form id="npost" name="npost">
                <p class="formUnit" id="Status"> 
                  <i class="active">
                  </i>
                  <textarea name="message" placeholder="Come On! Make over your thoughts or views into words..." id="message" cols="30" rows="3">
                  </textarea>
                  <input type="hidden" name="user_hm_id" id="user_hm_id" value="<?php echo $user_hm_id; ?>">
                <ol class="controls clearfix">
                  <li class="post">
                    <button  class="uibutton confirm hm_submit" type="button" title="npost" value="Post">
                      <span class="glyphicon glyphicon-send">
                      </span> Post
                    </button>
                  </li>
                </ol>
                </p>
              </form>
          </div>
          <div class="actionUnits" id="tabs-2">
            <form id="picpost" name="picpost">
              <p class="formUnit"> 
                <i class="active_pic">
                </i>
                <textarea name="message" placeholder="Come On! Make over your thoughts or views into words..." id="pmessage" cols="30" rows="3">
                </textarea>
                <input type="hidden" name="pic_url" id="pic_url">
                <input type="hidden" name="user_hm_id" id="user_hm_id" value="<?php echo $user_hm_id; ?>">
                <button class="uibutton" type="button" id="upload_pic">
                  <span class="glyphicon glyphicon-upload">
                  </span> Upload Picture
                </button>
                <span id="statuss">
                </span>
              <ol class="controls clearfix">
                <li class="post">
                  <button  class="uibutton confirm hm_submit" type="button" value="Post" title="picpost">
                    <span class="glyphicon glyphicon-send">
                    </span> Post
                  </button>
                </li>
              </ol>
              </p>
            <p id="files">
            </p>
            </form>
        </div>
      <div class="actionUnits" id="tabs-3">
        <form id="vidpost" name="vidpost">
          <p class="formUnit" id="Status"> 
            <i class="active_vid">
            </i>
            <textarea name="message" placeholder="Come On! Make over your thoughts or views into words..." id="vmessage" cols="30" rows="3">
            </textarea>
            <input type="text" name="y_link" style="width:100%" id="y_link" placeholder="Enter Youtube Url Like:- www.youtube.com/watch?v=rdmycu13Png">
            <input type="hidden" name="user_hm_id" id="user_hm_id" value="<?php echo $user_hm_id; ?>">
          <ol class="controls clearfix">
            <li class="post">
              <button  class="uibutton confirm hm_submit" type="button" value="Post" title="vidpost">
                <span class="glyphicon glyphicon-send">
                </span> Post
              </button>
            </li>
          </ol>
          </p>
        </form>
    </div>
    <!-- / Units -->
  </div>
  </li>
</ol>
<style>
  p.msg_wrap {
    word-wrap:break-word;
  }
</style>
<ol class="timeline clearfix" id="tupdate">
  <?php
include 'includes/security.php';
//fetching the friend list of the logged user
$user_friend_list = array();
$user_friend_list = friendList($_SESSION['hm_id']);
$x = 0;
$construct = "";
if (count($user_friend_list) > 0)
{
foreach ($user_friend_list as $each_friend)
{
$x++;
if ($x == 1) $construct .= "`post_hm_id` = $each_friend OR";
else $construct .= " `post_hm_id` = $each_friend OR";
}
}
else
{
$construct = "";
}
$query = "SELECT * FROM `posts` WHERE `block` <> 1 AND ($construct `post_hm_id` = $user_hm_id) ORDER BY `pid` DESC LIMIT $post_limit";
$result = mysqli_query($connection, $query);
?>
  <?php $al = 2;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
$post_id = $row['pid'];
$post_hm_info = profileInfo($row['post_hm_id']);
$post_user_first_name = $post_hm_info['first_name'];
$post_user_last_name = $post_hm_info['last_name'];
$post_user_profile_pic = $post_hm_info['profile_pic'];
$post_hm_name = $post_user_first_name . " " . $post_user_last_name;
if ($row['special'] != 1)
{
?>
  <li class="<?php echo alignment(2); ?>" id="post-<?php echo $post_id; ?>">
    <i class="pointer" id="pagination-<?php echo $post_id; ?>">
    </i>
    <div class="unit">
      <!-- Story -->
      <div class="storyUnit">
        <div class="imageUnit">
          <a href="#">
            <?php if (!empty($post_user_profile_pic))
{ ?>
            <img src="../images/profile_pic/<?php echo $post_user_profile_pic; ?>" width="32" height="32" alt="">
            <?php
}
else
{
echo '<img src="../images/icon/male.jpg" width="32" height="32" alt="">';
}
?>
          </a>
          <p style="float:right; text-align:right;">
            <?php if ($_SESSION['hm_id'] == $row['post_hm_id'])
{ ?>
            <a href="javascript:;" class="post-fav" id="post_fav_<?php echo $post_id; ?>" title="Add as favourite post">
              <span class="glyphicon glyphicon-star-empty">
              </span>
            </a>
            <?php
}
else
{ ?>
            <a href="javascript:;" class="post-save" id="post_save_<?php echo $post_id; ?>" title="Save this post">
              <span class="glyphicon glyphicon-bookmark">
              </span>
            </a>
            <?php
} ?>  
            <a href="javascript:;" class="post-more" id="post_more_<?php echo $post_id; ?>" title="More for this post">
              <span class="glyphicon glyphicon-chevron-down">
              </span>
            </a> 
            <?php if ($_SESSION['hm_id'] != $row['post_hm_id'])
{ ?>
            <a href="javascript:;" class="post-report" id="post_report_<?php echo $post_id; ?>" title="Report for this post">
              <span class="glyphicon glyphicon-exclamation-sign">
              </span>
            </a>
            <?php
}
else
{ ?> 
            <a href="javascript:;" class="post-edit" id="post_edit_<?php echo $post_id; ?>" title="Edit this post">
              <span class="glyphicon glyphicon-edit">
              </span>
            </a>
            <?php
} ?> 
            <a href="javascript:;" class="post-hide" id="post_hide_<?php echo $post_id; ?>" title="Hide this post">
              <span class="glyphicon glyphicon-eye-close">
              </span>
            </a> 
            <?php if ($_SESSION['hm_id'] == $row['post_hm_id'])
{ ?>
            <a href="javascript:;" class="post-delete" id="post_delete_<?php echo $post_id; ?>" title="Delete this post">
              <span class="glyphicon glyphicon-remove">
              </span>
            </a>
            <?php
} ?>
          </p>
          <div class="imageUnit-content">
            <h4>
              <a href="../profile/pro.php?user_id=<?php echo $row['post_hm_id'] / 2 + 5; ?>" style="text-transform:capitalize;">
                <?php echo $post_hm_name; ?> 
              </a> 
              <?php if ($_SESSION['hm_id'] != $row['post_hm_id'])
{ ?>
              <a href="javascript:;" onClick="toChat('<?php echo $row['post_hm_id'] / 2 + 5; ?>')" title="Chat with <?php echo $post_hm_name; ?>">
                <small>
                  <span class="glyphicon glyphicon-envelope">
                  </span>
                </small>
              </a>
              <?php
} ?>
              <small style="font-size:11px;"> - 
                <?php echo timeAgo($row['date']); ?>
              </small>
            </h4>
          </div>
        </div>
        <pre class="msg_wrap">
<?php echo parse_smileys(make_clickable(nl2br(stripslashes($row['desc']))) , $smiley_folder); ?>
</pre>
        <?php if (!empty($row['vid_url']))
{ ?>
        <iframe width="400" height="300" src="http://www.youtube.com/embed/<?php echo get_youtubeid($row['vid_url']); ?>" frameborder="0" allowfullscreen>
        </iframe>
        <?php
}
elseif (!empty($row['image_url']))
{ ?>
        <img id="post_pic" src="image.php/<?php echo $row['image_url']; ?>?width=400&nocache&quality=100&image=/Work%20Space/Schoolic/images/post_pic/<?php echo $row['image_url']; ?>">
        <?php
} ?>
        <br>
        <a href="javascript:;" class="btn btn-default btn-sm" id="addLikeBtn-<?php echo $post_id; ?>" onClick="addLike(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>)">
          <?php $like_result = queryMysql("SELECT `like_hm_id` FROM `hm_post_like` WHERE `like_post_id` = $post_id AND `like_hm_id` = $user_hm_id");
if (mysqli_num_rows($like_result) == 0)
{ ?>
          <span style="color:#FF0000;" class="glyphicon glyphicon-heart-empty">
          </span> Like
          <?php
}
else
{ ?>
          <span style="color:#FF0000;" class="glyphicon glyphicon-heart">
          </span> Like
          <?php
} ?>
        </a>
        <div class="stars">
          <small>Vote&nbsp;
          </small>
          <?php $vote_result = queryMysql("SELECT `vote_no` FROM `hm_post_vote` WHERE `vote_post_id` = $post_id AND `vote_hm_id` = $user_hm_id");
if (mysqli_num_rows($vote_result) == 0)
{ ?>
          <label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,1)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,2)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,3)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,4)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,5)">
            <span class="glyphicon glyphicon-star-empty">
            </span>
          </label>
          <?php
}
else
{
$vote_row = mysqli_fetch_array($vote_result, MYSQLI_ASSOC);
$v_no = $vote_row['vote_no'];
switch ($v_no)
{
case 1:
?>
          <label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,1)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,2)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,3)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,4)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,5)">
            <span class="glyphicon glyphicon-star-empty">
            </span>
          </label>
          <?php
break;
case 2:
?>
          <label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,1)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,2)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,3)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,4)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,5)">
            <span class="glyphicon glyphicon-star-empty">
            </span>
          </label>
          <?php
break;
case 3:
?>
          <label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,1)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,2)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,3)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,4)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,5)">
            <span class="glyphicon glyphicon-star-empty">
            </span>
          </label>
          <?php
break;
case 4:
?>
          <label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,1)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,2)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,3)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,4)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,5)">
            <span class="glyphicon glyphicon-star-empty">
            </span>
          </label>
          <?php
break;
case 5:
?>
          <label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,1)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,2)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,3)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,4)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,5)">
            <span class="glyphicon glyphicon-star">
            </span>
          </label>
          <?php
break;
}
}
?>
        </div>
        <!--
<a href="#" class="btn btn-default btn-sm" id="sharePostBtn-<?php echo $post_id; ?>" data-toggle="modal" data-target="#myModal_for_share" onClick="sharePost(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,5)">
Share 
<span style="color:#00FF00;" class="glyphicon glyphicon-share">
</span>
</a>-->
        &nbsp;&nbsp;
        <?php $like_count_result = queryMysql("SELECT `like_hm_id` FROM `hm_post_like` WHERE `like_post_id` = $post_id"); ?>
        <a href="javascript:;" id="like_count-<?php echo $post_id; ?>">
          <?php if ($l_c = mysqli_num_rows($like_count_result) != 0)
{ ?>
          <span>
            <?php echo $l_c; ?> 
          </span>
          <span style="color:#FF0000;" class="glyphicon glyphicon-heart">
          </span>
          <?php
} ?>
        </a> &nbsp;
        <?php $vote_count_result = queryMysql("SELECT `vote_hm_id` FROM `hm_post_vote` WHERE `vote_post_id` = $post_id"); ?>
        <a href="javascript:;" id="vote_count-<?php echo $post_id; ?>">
          <?php
if (mysqli_num_rows($vote_count_result) != 0)
{
$vote_avg_result = queryMysql("SELECT AVG(vote_no) AS vote_avg FROM `hm_post_vote` WHERE `vote_post_id` = $post_id");
$vote_avg_row = mysqli_fetch_array($vote_avg_result, MYSQLI_ASSOC);
$p_v_avg = $vote_avg_row['vote_avg'];
?>
          <span>
            <?php echo number_format($p_v_avg, 1, '.', ''); ?> 
          </span>
          <span style="color:#80BFFF" class="glyphicon glyphicon-star">
          </span>
          <?php
} ?>
        </a> &nbsp;
        <!--
<a href="javascript:;"> 5 
<span id="share_count" class="glyphicon glyphicon-share">
</span>
</a>-->
      </div>
      <div class="activity-comments">
        <ul id="CommentPosted<?php echo $post_id; ?>">
          <?php
//fetch comments from comments table using post id
$comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `cpid`= $post_id ORDER BY `cid` ASC ");
$total_comments = mysqli_num_rows($comments);
?>
          <li class="show-all" id="show-all-<?php echo $post_id; ?>" 
              <?php if ($total_comments == 0)
          { ?> style="display:none" 
          <?php
} ?>>
          <a href="javascript:;">
            <span id="comment_count_<?php echo $post_id; ?>">
              <?php echo $total_comments; ?>
            </span> comments
          </a>
          </li>
        <?php
while ($comt = mysqli_fetch_array($comments, MYSQLI_ASSOC))
{
$comment_id = $comt['cid'];
if ($comt['cmt_hm_id'] == $user_hm_id)
{
?>
        <li id="li-comment-<?php echo $comment_id; ?>">
          <div class="acomment-avatar">
            <a href="#" rel="nofollow">
              <?php if (!empty($user_profile_pic))
{ ?>
              <img src="../images/profile_pic/<?php echo $user_profile_pic; ?>" alt="Avatar Image" >
              <?php
}
else
{
echo '<img src="../images/icon/male.jpg" alt="Avatar Image">';
}
?>
            </a>
            <p style="float:right; text-align:right; font-size:10px;">
              <a href="javascript:;" rel="<?php echo $post_id; ?>" class="comment-delete" id="comment_delete_<?php echo $comment_id; ?>">X
              </a>
            </p>
          </div>
          <div class="acomment-meta">
            <a href="../profile/pro.php?user_id=<?php echo $user_hm_id / 2 + 5; ?>" style="text-transform:capitalize;">
              <?php echo $hm_name; ?>
            </a>  
            <?php echo timeAgo($comt['commented_date']); ?> 
          </div>
          <div class="acomment-content">
            <pre class="msg_wrap">
<?php echo parse_smileys(make_clickable(nl2br(stripslashes($comt['comment']))) , $smiley_folder); ?>
</pre>
          </div>
          <br>
        </li>
        <?php
}
else
{
$cmt_hm_info = profileInfo($comt['cmt_hm_id']);
$cmt_user_first_name = $cmt_hm_info['first_name'];
$cmt_user_last_name = $cmt_hm_info['last_name'];
$cmt_user_profile_pic = $cmt_hm_info['profile_pic'];
$cmt_hm_name = $cmt_user_first_name . " " . $cmt_user_last_name;
?>
        <li id="li-comment-<?php echo $comment_id; ?>">
          <div class="acomment-avatar">
            <a href="#" rel="nofollow">
              <?php if (!empty($cmt_user_profile_pic))
{ ?>
              <img src="../images/profile_pic/<?php echo $cmt_user_profile_pic; ?>" alt="Avatar Image" >
              <?php
}
else
{
echo '<img src="../images/icon/male.jpg" alt="Avatar Image">';
}
?>
            </a>
            <p style="float:right; text-align:right; font-size:10px;">
              <a href="javascript:;" rel="<?php echo $post_id; ?>" class="comment-delete" id="comment_delete_<?php echo $comment_id; ?>">X
              </a>
            </p>
          </div>
          <div class="acomment-meta">
            <a href="../profile/pro.php?user_id=<?php echo $comt['cmt_hm_id'] / 2 + 5; ?>" style="text-transform:capitalize;">
              <?php echo $cmt_hm_name; ?>
            </a>  
            <?php echo timeAgo($comt['commented_date']); ?> 
          </div>
          <div class="acomment-content">
            <pre class="msg_wrap">
<?php echo parse_smileys(make_clickable(nl2br(stripslashes($comt['comment']))) , $smiley_folder); ?>
</pre>
          </div>
          <br>
        </li>
        <?php
}
}
?>
        </ul>
      <a href="javascript:;" class="acomment-reply" title="" id="acomment-comment-<?php echo $post_id; ?>">
        Write a comment..
      </a>
      <form  method="post" id="fb-<?php echo $post_id; ?>" class="ac-form">
        <div class="ac-reply-avatar">
          <?php if (!empty($user_profile_pic))
{ ?>	
          <img src="../images/profile_pic/<?php echo $user_profile_pic; ?>" width="30" height="30" alt="Avatar Image">
          <?php
}
else
{
echo '<img src="../images/icon/male.jpg" width="30" height="30" alt="Avatar Image">';
}
?>
        </div>
        <div class="ac-reply-content">
          <div class="ac-textarea">
            <textarea id="ac-input-<?php echo $post_id; ?>" class="ac-input" name="comment" style="height:40px;">
            </textarea>
            <input type="hidden" id="act-id-<?php echo $post_id; ?>" name="act_id" value="<?php echo $post_id; ?>" />
            <input type="hidden" name="user_hm_id" id="user_hm_id" value="<?php echo $user_hm_id; ?>">
          </div>
          <input name="ac_form_submit" class="uibutton confirm live_comment_submit" title="fb-<?php echo $post_id; ?>" id="comment_id_<?php echo $post_id; ?>" type="button" value="Submit"> &nbsp; or 
          <a href="javascript:;" class="comment_cancel" id="<?php echo $post_id; ?>">Cancel
          </a>			
        </div>
      </form>
    </div>
    <!-- / Units -->
  </div>
</li>
<?php
}
else
{ ?>
<li class="<?php echo alignment(2); ?>" id="post-<?php echo $post_id; ?>">
  <i class="pointer" id="pagination-<?php echo $post_id; ?>">
  </i>
  <div class="unit">
    <!-- Story -->
    <div class="storyUnit">
      <div class="imageUnit">
        <a href="#">
          <?php if (!empty($post_user_profile_pic))
{ ?>	
          <img src="../images/profile_pic/<?php echo $post_user_profile_pic; ?>" width="32" height="32" alt="">
          <?php
}
else
{
echo '<img src="../images/icon/male.jpg" width="32" height="32" alt="">';
}
?>
        </a>
        <p style="float:right; text-align:right;">
          <?php if ($_SESSION['hm_id'] == $row['post_hm_id'])
{ ?>
          <a href="javascript:;" class="post-fav" id="post_fav_<?php echo $post_id; ?>" title="Add as favourite post">
            <span class="glyphicon glyphicon-star-empty">
            </span>
          </a>
          <?php
}
else
{ ?>
          <a href="javascript:;" class="post-save" id="post_save_<?php echo $post_id; ?>" title="Save this post">
            <span class="glyphicon glyphicon-bookmark">
            </span>
          </a>
          <?php
} ?>  
          <a href="javascript:;" class="post-more" id="post_more_<?php echo $post_id; ?>" title="More for this post">
            <span class="glyphicon glyphicon-chevron-down">
            </span>
          </a> 
          <?php if ($_SESSION['hm_id'] != $row['post_hm_id'])
{ ?>
          <a href="javascript:;" class="post-report" id="post_report_<?php echo $post_id; ?>" title="Report for this post">
            <span class="glyphicon glyphicon-exclamation-sign">
            </span>
          </a>
          <?php
}
else
{ ?> 
          <a href="javascript:;" class="post-edit" id="post_edit_<?php echo $post_id; ?>" title="Edit this post">
            <span class="glyphicon glyphicon-edit">
            </span>
          </a>
          <?php
} ?> 
          <a href="javascript:;" class="post-hide" id="post_hide_<?php echo $post_id; ?>" title="Hide this post">
            <span class="glyphicon glyphicon-eye-close">
            </span>
          </a> 
          <?php if ($_SESSION['hm_id'] == $row['post_hm_id'])
{ ?>
          <a href="javascript:;" class="post-delete" id="post_delete_<?php echo $post_id; ?>" title="Delete this post">
            <span class="glyphicon glyphicon-remove">
            </span>
          </a>
          <?php
} ?>
        </p>
        <div class="imageUnit-content">
          <h4>
            <a href="../profile/pro.php?user_id=<?php echo $row['post_hm_id'] / 2 + 5; ?>" style="text-transform:capitalize;">
              <?php echo $post_hm_name; ?> 
            </a>
            <?php if ($_SESSION['hm_id'] != $row['post_hm_id'])
{ ?>
            <a href="javascript:;" onClick="toChat('<?php echo $row['post_hm_id'] / 2 + 5; ?>')" title="Chat with <?php echo $post_hm_name; ?>">
              <small>
                <span class="glyphicon glyphicon-envelope">
                </span>
              </small>
            </a>
            <?php
} ?>
            <small style="font-size:11px;"> - 
              <?php echo timeAgo($row['date']); ?>
            </small>
          </h4>
        </div>
      </div>
      <div>
        <div align="center">
          <br>
          <h4 class="msg_wrap">
            <?php echo make_clickable(nl2br(stripslashes($row['desc']))); ?>
          </h4>
          <br>
          <?php if (!empty($row['vid_url']))
{ ?>
          <iframe width="400" height="300" src="http://www.youtube.com/embed/<?php echo get_youtubeid($row['vid_url']); ?>" frameborder="0" allowfullscreen>
          </iframe>
          <?php
}
elseif (!empty($row['image_url']))
{ ?>
          <img src="image.php/<?php echo $row['image_url']; ?>?width=400&nocache&quality=100&image=/Work%20Space/Schoolic/images/post_pic/<?php echo $row['image_url']; ?>">
          <?php
} ?>
        </div>
        <br>
        <a href="javascript:;" class="btn btn-default btn-sm" id="addLikeBtn-<?php echo $post_id; ?>" onClick="addLike(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>)">
          <?php $like_result = queryMysql("SELECT `like_hm_id` FROM `hm_post_like` WHERE `like_post_id` = $post_id AND `like_hm_id` = $user_hm_id");
if (mysqli_num_rows($like_result) == 0)
{ ?>
          <span style="color:#FF0000;" class="glyphicon glyphicon-heart-empty">
          </span> Like
          <?php
}
else
{ ?>
          <span style="color:#FF0000;" class="glyphicon glyphicon-heart">
          </span> Like
          <?php
} ?>
        </a>
        <div class="stars">
          <small>Vote&nbsp;
          </small>
          <?php $vote_result = queryMysql("SELECT `vote_no` FROM `hm_post_vote` WHERE `vote_post_id` = $post_id AND `vote_hm_id` = $user_hm_id");
if (mysqli_num_rows($vote_result) == 0)
{ ?>
          <label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,1)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,2)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,3)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,4)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,5)">
            <span class="glyphicon glyphicon-star-empty">
            </span>
          </label>
          <?php
}
else
{
$vote_row = mysqli_fetch_array($vote_result, MYSQLI_ASSOC);
$v_no = $vote_row['vote_no'];
switch ($v_no)
{
case 1:
?>
          <label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,1)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,2)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,3)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,4)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,5)">
            <span class="glyphicon glyphicon-star-empty">
            </span>
          </label>
          <?php
break;
case 2:
?>
          <label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,1)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,2)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,3)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,4)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,5)">
            <span class="glyphicon glyphicon-star-empty">
            </span>
          </label>
          <?php
break;
case 3:
?>
          <label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,1)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,2)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,3)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,4)">
            <span class="glyphicon glyphicon-star-empty">
            </span> 
          </label>
          <label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,5)">
            <span class="glyphicon glyphicon-star-empty">
            </span>
          </label>
          <?php
break;
case 4:
?>
          <label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,1)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,2)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,3)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,4)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,5)">
            <span class="glyphicon glyphicon-star-empty">
            </span>
          </label>
          <?php
break;
case 5:
?>
          <label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,1)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,2)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,3)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,4)">
            <span class="glyphicon glyphicon-star">
            </span> 
          </label>
          <label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,5)">
            <span class="glyphicon glyphicon-star">
            </span>
          </label>
          <?php
break;
}
}
?>
        </div>
        <!--
<a href="javascript:;" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal_for_share" onClick="shareBtn(<?php echo $_SESSION['hm_id'] / 2 + 5; ?>,<?php echo $post_id; ?>,5)" id="shareBtn-<?php echo $post_id; ?>">
Share 
<span style="color:#00FF00;" class="glyphicon glyphicon-share">
</span>
</a>-->
        &nbsp;&nbsp;
        <?php $like_count_result = queryMysql("SELECT `like_hm_id` FROM `hm_post_like` WHERE `like_post_id` = $post_id"); ?>
        <a href="javascript:;" id="like_count-<?php echo $post_id; ?>">
          <?php if ($l_c = mysqli_num_rows($like_count_result) != 0)
{ ?>
          <span>
            <?php echo $l_c; ?> 
          </span>
          <span style="color:#FF0000;" class="glyphicon glyphicon-heart">
          </span>
          <?php
} ?>
        </a> &nbsp;
        <?php $vote_count_result = queryMysql("SELECT `vote_hm_id` FROM `hm_post_vote` WHERE `vote_post_id` = $post_id"); ?>
        <a href="javascript:;" id="vote_count-<?php echo $post_id; ?>">
          <?php
if (mysqli_num_rows($vote_count_result) != 0)
{
$vote_avg_result = queryMysql("SELECT AVG(vote_no) AS vote_avg FROM `hm_post_vote` WHERE `vote_post_id` = $post_id");
$vote_avg_row = mysqli_fetch_array($vote_avg_result, MYSQLI_ASSOC);
$p_v_avg = $vote_avg_row['vote_avg'];
?>
          <span>
            <?php echo number_format($p_v_avg, 1, '.', ''); ?> 
          </span>
          <span style="color:#80BFFF" class="glyphicon glyphicon-star">
          </span>
          <?php
} ?>
        </a> &nbsp;
        <!--
<a href="javascript:;"> 5 
<span id="share_count" class="glyphicon glyphicon-share">
</span>
</a>-->
      </div>
    </div>
    <div class="activity-comments">
      <ul id="CommentPosted<?php echo $post_id; ?>">
        <?php
//fetch comments from comments table using post id
$comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `cpid`= $post_id ORDER BY `cid` ASC ");
$total_comments = mysqli_num_rows($comments);
?>
        <li class="show-all" id="show-all-<?php echo $post_id; ?>" 
            <?php if ($total_comments == 0)
        { ?> style="display:none" 
        <?php
} ?>>
        <a href="javascript:;">
          <span id="comment_count_<?php echo $post_id; ?>">
            <?php echo $total_comments; ?>
          </span> comments
        </a>
        </li>
      <?php
while ($comt = mysqli_fetch_array($comments, MYSQLI_ASSOC))
{
$comment_id = $comt['cid'];
if ($comt['cmt_hm_id'] == $user_hm_id)
{
?>
      <li id="li-comment-<?php echo $comment_id; ?>">
        <div class="acomment-avatar">
          <a href="#" rel="nofollow">
            <?php if (!empty($user_profile_pic))
{ ?>	
            <img src="../images/profile_pic/<?php echo $user_profile_pic; ?>" alt="Avatar Image" >
            <?php
}
else
{
echo '<img src="../images/icon/male.jpg" alt="Avatar Image">';
}
?>
          </a>
          <p style="float:right; text-align:right; font-size:10px;">
            <a href="javascript:;" rel="<?php echo $post_id; ?>" class="comment-delete" id="comment_delete_<?php echo $comment_id; ?>">X
            </a>
          </p>
        </div>
        <div class="acomment-meta">
          <a href="../pro.php?user_id=<?php echo $user_hm_id / 2 + 5; ?>" style="text-transform:capitalize;">
            <?php echo $hm_name; ?>
          </a>  
          <?php echo timeAgo($comt['commented_date']); ?> 
        </div>
        <div class="acomment-content">
          <pre class="msg_wrap">
<?php echo parse_smileys(make_clickable(nl2br(stripslashes($comt['comment']))) , $smiley_folder); ?>
</pre>
        </div>
        <br>
      </li>
      <?php
}
else
{
$cmt_hm_info = profileInfo($comt['cmt_hm_id']);
$cmt_user_first_name = $cmt_hm_info['first_name'];
$cmt_user_last_name = $cmt_hm_info['last_name'];
$cmt_user_profile_pic = $cmt_hm_info['profile_pic'];
$cmt_hm_name = $cmt_user_first_name . " " . $cmt_user_last_name;
?>
      <li id="li-comment-<?php echo $comment_id; ?>">
        <div class="acomment-avatar">
          <a href="#" rel="nofollow">
            <?php if (!empty($cmt_user_profile_pic))
{ ?>	
            <img src="../images/profile_pic/<?php echo $cmt_user_profile_pic; ?>" alt="Avatar Image" >
            <?php
}
else
{
echo '<img src="../images/icon/male.jpg" alt="Avatar Image">';
}
?>
          </a>
          <p style="float:right; text-align:right; font-size:10px;">
            <a href="javascript:;" rel="<?php echo $post_id; ?>" class="comment-delete" id="comment_delete_<?php echo $comment_id; ?>">X
            </a>
          </p>
        </div>
        <div class="acomment-meta">
          <a href="../pro.php?user_id=<?php echo $comt['cmt_hm_id'] / 2 + 5; ?>" style="text-transform:capitalize;">
            <?php echo $cmt_hm_name; ?>
          </a>  
          <?php echo timeAgo($comt['commented_date']); ?> 
        </div>
        <div class="acomment-content">
          <pre class="msg_wrap">
<?php echo parse_smileys(make_clickable(nl2br(stripslashes($comt['comment']))) , $smiley_folder); ?>
</pre>
        </div>
        <br>
      </li>
      <?php
}
}
?>
      </ul>
    <a href="javascript:;" class="acomment-reply" title="" id="acomment-comment-<?php echo $post_id; ?>">
      Write a comment..
    </a>
    <form  method="post" id="fb-<?php echo $post_id; ?>" class="ac-form">
      <div class="ac-reply-avatar">
        <?php if (!empty($cmt_user_profile_pic))
{ ?>	
        <img src="../images/profile_pic/<?php echo $cmt_user_profile_pic; ?>" width="30" height="30" alt="Avatar Image">
        <?php
}
else
{
echo '<img src="../images/icon/male.jpg" width="30" height="30" alt="Avatar Image">';
} ?>
      </div>
      <div class="ac-reply-content">
        <div class="ac-textarea">
          <textarea id="ac-input-<?php echo $post_id; ?>" class="ac-input" name="comment" style="height:40px;">
          </textarea>
          <input type="hidden" id="act-id-<?php echo $post_id; ?>" name="act_id" value="<?php echo $post_id; ?>" />
          <input type="hidden" name="user_hm_id" id="user_hm_id" value="<?php echo $cmt_user_hm_id; ?>">
        </div>
        <input name="ac_form_submit" class="uibutton confirm live_comment_submit" title="fb-<?php echo $post_id; ?>" id="comment_id_<?php echo $post_id; ?>" type="button" value="Submit"> &nbsp; or 
        <a href="javascript:;" class="comment_cancel" id="<?php echo $post_id; ?>">Cancel
        </a>			
      </div>
    </form>
  </div>
  <!-- / Units -->
</div>
</li>
<?php
}
} ?>
</ol>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
</script>
<script type="text/javascript">
  var domain = "";
  // Simple infinite Scrolling
  $(function(){
    var $timeline = $('#tupdate'),
        $spinner = $('#Spinner').hide();
    function loadMore(){
      $(window).unbind('scroll.posts');
      $spinner.show();
      $.ajax({
        url: "loadmore.php?lastPost="+ $(".pointer:last").attr('id'),
        success: function(html){
          if(html){
            $timeline.append(html);
            $spinner.hide();
          }
          else{
            $spinner.html('<p>No more posts to show.</p>');
          }
          $(window).bind('scroll.posts',scrollEvent);
        }
      }
            );
    }
    //lastAddedLiveFunc();
    $(window).bind('scroll.posts',scrollEvent);
    function scrollEvent(){
      var wintop = $(window).scrollTop(), docheight = $(document).height(), winheight = $(window).height();
      var  scrolltrigger = 0.95;
      if  ((wintop/(docheight-winheight)) > scrolltrigger)  loadMore();
    }
  }
   );
  $(function(){
    $('#tabs div').hide();
    $('#tabs div:first').show();
    $('#tabs ul li:first').addClass('active');
    $('#tabs ul li a').click(function(){
      $('#tabs ul li').removeClass('active');
      $(this).parent().addClass('active');
      var currentTab = $(this).attr('href');
      $('#tabs div').hide();
      $(currentTab).show();
      return false;
    }
                            );
    jQuery('a.acomment-reply').live("click", function(e) {
      var getpID =  jQuery(this).attr('id').replace('acomment-comment-','');
      jQuery("#acomment-comment-"+getpID).hide();
      jQuery("#fb-"+getpID).css('display','block');
      jQuery("#ac-input-"+getpID).focus();
      e.preventDefault();
    }
                                   );
    jQuery('a.comment_cancel').live("click", function(e) {
      var getpID =  jQuery(this).attr('id');
      jQuery("#fb-"+getpID).css('display','');
      jQuery("#acomment-comment-"+getpID).show();
      jQuery("#ac-input-"+getpID).val('');
      e.preventDefault();
    }
                                   );
  }
   );
</script>
<script type="text/javascript" > 
  jQuery(document).ready(function() {
    var btnUpload=jQuery('#upload_pic');
    var status=jQuery('#statuss');
    new AjaxUpload(btnUpload, {
      action: 'upload-img.php',
      name: 'uploadfile',
      onSubmit: function(file, ext){
        if (! (ext && /^(jpg|jpeg|gif|png)$/.test(ext))){
          // extension is not allowed 
          status.text('Only JPG or GIF files are allowed');
          return false;
        }
        status.text('Uploading...');
      }
      ,
      onComplete: function(file, response){
        //On completion clear the status
        status.text('');
        //Add uploaded file to list
        if(response!==""){
          jQuery("#pic_url").val(response);
          //jQuery('#files').empty();
          //jQuery('#files').text(file+' added').addClass('successe');
          //var ts = Math.round((new Date()).getTime() / 1000);
          jQuery('#files').html('<img src="../images/post_pic/'+response+'" height="100" width="100">');
        }
        else{
          //jQuery('#files').text(file+' upload failed').addClass('errore');
        }
      }
    }
                  );
  }
                        );
</script>
<script type="text/javascript">
  function addHm(hm_id_1, hm_id_2, bla_hm) {
    //for sending friend request
    var hm_1 = 'hm_id_1';
    var hm_2 = 'hm_id_2';
    var bla = 'bla_hm';
    $.ajax({
      url: '../friend_request.php?hm_u_id_1='+hm_1+'&hm_u_id_2='+hm_2+'&bla='+bla,
      success: function( data ) {
        $('#addFriendBtn').val(data);
        // set the button value to the new status.
        $('#addFriendBtn').unbind('click');
      }
    }
          );
  }
  ///for new message
  $(document).ready(
    function() {
      setInterval(function(){
        $.ajax({
          url: '../check_new_msg.php' ,
          cache: false,
          success: function(data)
          {
            $('#msg_noti1').val(data);
            var m1 = document.getElementById("msg_noti1").value;
            var m2 = document.getElementById("msg_noti").value;
            if(m1 > m2){
              if( m1 != 0 ){
                document.getElementById("m_sound").innerHTML='<audio autoplay="autoplay"><source src="../button_tiny.mp3" type="audio/mpeg" /><source src="../button_tiny.ogg" type="audio/ogg" /><embed hidden="true" autostart="true" loop="false" src="../button_tiny.mp3" /></audio>';
                //play sound
              }
            }
            setTimeout(function() {
              $(document).ready(
                function()	{
                  $(document).ready(
                    function() {
                      setTimeout(function() {
                        $.ajax({
                          url: '../check_new_msg.php' ,
                          cache: false,
                          success: function(data)
                          {
                            $('#message_no').html(data);
                            $('#msg_noti').val(data);
                          }
                          ,                                          
                        }
                              );
                      }
                                 , 400);
                    }
                  );
                }
                , 2000);
            }
                      );
          }
        }
              );
      }
                  , 3000);
    }
  );
  ///for new request friend 
  $(document).ready(
    function() {
      setInterval(function(){
        $.ajax({
          url: '../check_new_fri_request.php' ,
          cache: false,
          success: function(data)
          {
            $('#f_r_noti1').val(data);
            var f1 = document.getElementById("f_r_noti1").value;
            var f2 = document.getElementById("f_r_noti").value;
            if(f1 > f2){
              if( f1 != 0 ){
                document.getElementById("f_sound").innerHTML='<audio autoplay="autoplay"><source src="../button_tiny.mp3" type="audio/mpeg" /><source src="../button_tiny.ogg" type="audio/ogg" /><embed hidden="true" autostart="true" loop="false" src="../button_tiny.mp3" /></audio>';
                //play sound
              }
            }
            setTimeout(function() {
              $(document).ready(
                function()	{
                  $(document).ready(
                    function() {
                      setTimeout(function() {
                        $.ajax({
                          url: '../check_new_fri_request.php' ,
                          cache: false,
                          success: function(data)
                          {
                            $('#f_request').html(data);
                            $('#f_r_noti').val(data);
                          }
                          ,                                          
                        }
                              );
                      }
                                 , 400);
                    }
                  );
                }
                , 2000);
            }
                      );
          }
        }
              );
      }
                  , 3000);
    }
  );
  $(document).ready(
    function() {
      setInterval(function() {
        $.ajax({
          url: '../get_new_msg.php' ,
          cache: false,
          success: function(data)
          {
            $('#new_msg').html(data);
          }
          ,                                          
        }
              );
      }
                  , 2000);
    }
  );
  $(document).ready(
    function() {
      setInterval(function() {
        $.ajax({
          url: '../get_online_friends.php' ,
          cache: false,
          success: function(data)
          {
            $('#hm_online').html(data);
          }
          ,                                          
        }
              );
      }
                  , 4100);
    }
  );
  $(document).ready(
    function() {
      setInterval(function() {
        $.ajax({
          url: '../get_friend_u_may_know.php' ,
          cache: false,
          success: function(data)
          {
            $('#friend_u_may_know').html(data);
          }
          ,                                          
        }
              );
      }
                  , 4100);
    }
  );
  $(document).ready(
    function() {
      setInterval(function() {
        $.ajax({
          url: '../get_all_friends.php' ,
          cache: false,
          success: function(data)
          {
            $('#all_friends').html(data);
          }
          ,                                          
        }
              );
      }
                  , 8300);
    }
  );


  $(document).ready(
    function() {
      setInterval(function() {
        $.ajax({
          url: '../get_my_group.php' ,
          cache: false,
          success: function(data)
          {
            $('#my_group').html(data);
          }
          ,                                          
        }
              );
      }
                  , 2300);
    }
  );

  $(document).ready(
    function() {
      setInterval(function() {
        $.ajax({
          url: '../get_my_subject.php' ,
          cache: false,
          success: function(data)
          {
            $('#my_subject').html(data);
          }
          ,                                          
        }
              );
      }
                  , 3300);
    }
  );

  $(document).ready(
    function() {
      setInterval(function() {
        $.ajax({
          url: '../get_my_school.php' ,
          cache: false,
          success: function(data)
          {
            $('#my_school').html(data);
          }
          ,                                          
        }
              );
      }
                  , 4300);
    }
  );

  $(document).ready(
    function() {
      setInterval(function() {
        $.ajax({
          url: '../get_recent_chat.php' ,
          cache: false,
          success: function(data)
          {
            $('#recent_chat').html(data);
          }
          ,                                          
        }
              );
      }
                  , 2800);
    }
  );
  $(document).ready(
    function() {
      setInterval(function() {
        $.ajax({
          url: '../online_update.php' ,
          cache: false,
          success: function(data)
          {
          }
          ,                                          
        }
              );
      }
                  , 1500);
    }
  );
  $(document).ready(
    function() {
      setInterval(function() {
        $.ajax({
          url: '../get_friend_request.php' ,
          cache: false,
          success: function(data)
          {
            $('#friend_request').html(data);
          }
          ,                                          
        }
              );
      }
                  , 4100);
    }
  );
  //for friend request
  $(document).ready(
    function() {
      setInterval(function() {
        $.ajax({
          url: '../get_pend_friend_request.php' ,
          cache: false,
          success: function(data)
          {
            $('#pend_friend_request').html(data);
          }
          ,                                          
        }
              );
      }
                  , 4100);
    }
  );
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
          url: "../over_all_search.php",
          data: dataString,
          cache: false,
          success: function(html)
          {
            $("#result").html(html).show();
          }
        }
              );
      }
      return false;
    }
                         );
    jQuery("#result").live("click",function(e){
      var $clicked = $(e.target);
      var $name = $clicked.find('.name').html();
      var $hm_id = $clicked.find('.reciverid').html();
      var decoded = $("<div/>").html($name).text();
      var decoded_id = $("<div/>").html($hm_id).text();
      $('#searchid').val(decoded);
      $('#reciver_id').val(decoded_id);
    }
                          );
    jQuery(document).live("click", function(e) {
      var $clicked = $(e.target);
      if (! $clicked.hasClass("searchBox")){
        jQuery("#result").fadeOut();
      }
    }
                         );
    $('#searchid').click(function(){
      jQuery("#result").fadeIn();
    }
                        );
  }
   );
</script>
<script type="text/javascript">
  function addLike(user_id,post_id) {
    var likeBtnId = '#addLikeBtn-'+post_id;
    //for sending like
    $.ajax({
      url: '../add_like.php?user='+user_id+'&post='+post_id,
      success: function( data ) {
        $(likeBtnId).html(data);
        // set the button value to the new status.
        $(likeBtnId).unbind('click');
        updateLike(post_id);
      }
    }
          );
  }
  function updateLike(post_id){
    var likeCountId = '#like_count-'+post_id;
    $.ajax({
      url: '../update_like.php?post='+post_id,
      success: function( data1 ) {
        $(likeCountId).html(data1);
        // set the button value to the new status.  
        $(likeCountId).unbind('click');
      }
    }
          );
  }
  function addVote(user_id,post_id,vote) {
    var voteStrId1 = '#star-1-post-id-'+post_id;
    var voteStrId2 = '#star-2-post-id-'+post_id;
    var voteStrId3 = '#star-3-post-id-'+post_id;
    var voteStrId4 = '#star-4-post-id-'+post_id;
    var voteStrId5 = '#star-5-post-id-'+post_id;
    //for sending like
    $.ajax({
      url: '../add_vote.php?user='+user_id+'&post='+post_id+'&vote='+vote,
      success: function( data ) {
        updateVote(post_id);
      }
    }
          );
    switch(vote) {
      case 1:
        $(voteStrId1).html('<span class="glyphicon glyphicon-star"></span> ');
        $(voteStrId2).html('<span class="glyphicon glyphicon-star-empty"></span> ');
        $(voteStrId3).html('<span class="glyphicon glyphicon-star-empty"></span> ');
        $(voteStrId4).html('<span class="glyphicon glyphicon-star-empty"></span> ');
        $(voteStrId5).html('<span class="glyphicon glyphicon-star-empty"></span> ');
        break;
      case 2:
        $(voteStrId1).html('<span class="glyphicon glyphicon-star"></span> ');
        $(voteStrId2).html('<span class="glyphicon glyphicon-star"></span> ');
        $(voteStrId3).html('<span class="glyphicon glyphicon-star-empty"></span> ');
        $(voteStrId4).html('<span class="glyphicon glyphicon-star-empty"></span> ');
        $(voteStrId5).html('<span class="glyphicon glyphicon-star-empty"></span> ');
        break;
      case 3:
        $(voteStrId1).html('<span class="glyphicon glyphicon-star"></span> ');
        $(voteStrId2).html('<span class="glyphicon glyphicon-star"></span> ');
        $(voteStrId3).html('<span class="glyphicon glyphicon-star"></span> ');
        $(voteStrId4).html('<span class="glyphicon glyphicon-star-empty"></span> ');
        $(voteStrId5).html('<span class="glyphicon glyphicon-star-empty"></span> ');
        break;
      case 4:
        $(voteStrId1).html('<span class="glyphicon glyphicon-star"></span> ');
        $(voteStrId2).html('<span class="glyphicon glyphicon-star"></span> ');
        $(voteStrId3).html('<span class="glyphicon glyphicon-star"></span> ');
        $(voteStrId4).html('<span class="glyphicon glyphicon-star"></span> ');
        $(voteStrId5).html('<span class="glyphicon glyphicon-star-empty"></span> ');
        break;
      case 5:
        $(voteStrId1).html('<span class="glyphicon glyphicon-star"></span> ');
        $(voteStrId2).html('<span class="glyphicon glyphicon-star"></span> ');
        $(voteStrId3).html('<span class="glyphicon glyphicon-star"></span> ');
        $(voteStrId4).html('<span class="glyphicon glyphicon-star"></span> ');
        $(voteStrId5).html('<span class="glyphicon glyphicon-star"></span> ');
        break;
    }
  }
  function updateVote(post_id){
    var voteCountId = '#vote_count-'+post_id;
    $.ajax({
      url: '../update_vote.php?post='+post_id,
      success: function( data2 ) {
        $(voteCountId).html(data2);
        // set the button value to the new status.  
        $(voteCountId).unbind('click');
      }
    }
          );
  }
  function disableContextMenu()
  {
    document.getElementById("chat_panel").contentWindow.document.oncontextmenu = function(){
      return false;
    };
  }
  function toChat(reciver){
    var chatBox = document.getElementById('chat_panel');
    var chatReciver = document.getElementById('chat_reciver');
    var panelClass1 = document.getElementById('collapse_chat1');
    var panelClass2 = document.getElementById('collapse_chat2');
    //var panelClass3 = document.getElementById('collapse_chat3');
    var panelClass4 = document.getElementById('collapse_chat4');
    panelClass1.className = "panel-collapse collapse";
    panelClass2.className = "panel-collapse collapse";
    //panelClass3.className = "panel-collapse collapse";
    panelClass4.className = "panel-collapse collapse";
    if(chatReciver.value !== reciver){
      chatBox.src = "../hm_chat/public/index.php?reciver_id=" + reciver + "&swap_id=0";
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
    //var panelClass3 = document.getElementById('collapse_chat3');
    var panelClass4 = document.getElementById('collapse_chat4');
    panelClass1.className = "panel-collapse collapse";
    panelClass2.className = "panel-collapse collapse";
    //panelClass3.className = "panel-collapse collapse";
    panelClass4.className = "panel-collapse collapse";
    panelClass4.className = "panel-collapse collapse in";
  }
</script>
<!-- End page content -->
</div>
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
