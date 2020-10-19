<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"  />
    <title>
    </title>
    <link href="style/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css" />
    <link href="style/chat_box.css" rel="stylesheet" type="text/css" />
    <?php
require_once('../../connectvars.php');
require_once('../../startsession.php');
require_once('../../hm_functions.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
require_once('../core/FbChatMock.php');
$sender = $_SESSION['hm_id'];
if(isset($_POST['reciver_id'])){
$reciver = $_SESSION['reciver_id'] = mysqli_real_escape_string($dbc, trim($_POST['reciver_id']));
}
else if(isset($_GET['reciver_id'])){
$reciver = $_SESSION['reciver_id'] = mysqli_real_escape_string($dbc, trim(($_GET['reciver_id'])-5)*2);
}
else if(isset($_POST['reciver_id_from_chat'])){
$reciver = $_SESSION['reciver_id'] = mysqli_real_escape_string($dbc, trim($_POST['reciver_id_from_chat']));
}
else {
$reciver = $_SESSION['reciver_id'];
}
$r = $reciver;
$reci = ($r/2)+5;
//redirect to the same page when back button is clicked
$chat_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Work%20Space/Schoolic/hm_chat/public/index1.php?reciver_id=' . $reci;
header('Location: ' . $chat_url);
if(isset($_GET['close_chat_id'])){
$close_box_id = mysqli_real_escape_string($dbc, trim($_GET['close_chat_id']));
$shift_hm = swapBox($sender);
$zero = 0;
$box0 = $shift_hm['box_0'];
$box1 = $shift_hm['box_1'];
$box2 = $shift_hm['box_2'];
$box3 = $shift_hm['box_3'];
$box4 = $shift_hm['box_4'];
switch ($close_box_id) {
case 4:
queryMysql("UPDATE swap SET box_0 = $box0, box_1 = $box1, box_2 = $box2, box_3 = $box3, box_4 = $zero WHERE user_id = $sender ");
break;
case 3:
queryMysql("UPDATE swap SET box_0 = $box0, box_1 = $box1, box_2 = $box2, box_3 = $box4, box_4 = $zero WHERE user_id = $sender");
break;
case 2:
queryMysql("UPDATE swap SET box_0 = $box0, box_1 = $box1, box_2 = $box3, box_3 = $box4, box_4 = $zero WHERE user_id = $sender");
break;
case 1:
queryMysql("UPDATE swap SET box_0 = $box0, box_1 = $box2, box_2 = $box3, box_3 = $box4, box_4 = $zero WHERE user_id = $sender");
break;
case 0:
queryMysql("UPDATE swap SET box_0 = $box1, box_1 = $box2, box_2 = $box3, box_3 = $box4, box_4 = $zero WHERE user_id = $sender");
break;
}
}
if($r!=0){	
if(isset($_GET['swap_id'])){
$box_id = mysqli_real_escape_string($dbc, trim($_GET['swap_id']));
$swap_hm = swapBox($sender);
if($swap_hm['box_1'] == $r){
$box_id = 1;
}
else if($swap_hm['box_2'] == $r){
$box_id = 2;
}
else if($swap_hm['box_3'] == $r){
$box_id = 3;
}
else if($swap_hm['box_4'] == $r){
$box_id = 4;
}
else{
$box_id = 0;
}
switch ($box_id) {
case 4:
for($x = 4; $x > 0; $x--)
{
$no = $x-1;
$col = "box_" .$no;
$swap_id[$x] = $swap_hm[$col];
}
queryMysql("UPDATE swap SET box_0 = $r, box_1 = $swap_id[1], box_2 = $swap_id[2], box_3 = $swap_id[3], box_4 = $swap_id[4] WHERE user_id = $sender");
break;
case 3:
for($x = 3; $x > 0; $x--)
{
$no = $x-1;
$col = "box_" .$no;
$swap_id[$x] = $swap_hm[$col];
}
queryMysql("UPDATE swap SET box_0 = $r, box_1 = $swap_id[1], box_2 = $swap_id[2], box_3 = $swap_id[3] WHERE user_id = $sender");
break;
case 2:
for($x = 2; $x > 0; $x--)
{
$no = $x-1;
$col = "box_" .$no;
$swap_id[$x] = $swap_hm[$col];
}
queryMysql("UPDATE swap SET box_0 = $r, box_1 = $swap_id[1], box_2 = $swap_id[2] WHERE user_id = $sender");
break;
case 1:
for($x = 1; $x > 0; $x--)
{
$no = $x-1;
$col = "box_" .$no;
$swap_id[$x] = $swap_hm[$col];
}
queryMysql("UPDATE swap SET box_0 = $r, box_1 = $swap_id[1] WHERE user_id = $sender");
break;
case 0:
for($x = 4; $x > 0; $x--)
{
$no = $x-1;
$col = "box_" .$no;
$swap_id[$x] = $swap_hm[$col];
}
queryMysql("UPDATE swap SET box_0 = $r, box_1 = $swap_id[1], box_2 = $swap_id[2], box_3 = $swap_id[3], box_4 = $swap_id[4] WHERE user_id = $sender");
break;
}
}
if (isset($_POST['submit_chat_pic']))  { 
$pic_caption = sanitizeString($_POST['pic_caption']);    
$chat_hm_id = $sender;
$reciver = sanitizeString($_SESSION['reciver_id']);
if($_FILES['chat_pic']['name']){
$name = htmlspecialchars($_FILES['chat_pic']['name']);
$ext = end((explode(".", $name)));
$ext = strtolower($ext);
//if no errors...
if(!$_FILES['chat_pic']['error']){
//now is the time to modify the future file name and validate the file
$new_pic_name = date('ymdHisu'). ".". $ext;
if($ext !== "jpg" && $ext !== "png" && $ext !== "jpeg" && $ext != "gif" && $ext !== "bmp" ){
$valid_file = false;
echo "Your image file must be in jpg, jpeg, png, gif, or bmp formats.";
$typeok = FALSE;
}
elseif(!$_FILES['chat_pic']['size']){
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
move_uploaded_file($_FILES['chat_pic']['tmp_name'], '../../images/chat_pic/'.$new_pic_name);
$typeok = TRUE;
if($ext == "jpg"){
$exif_read = exif_read_data("../../images/chat_pic/".$new_pic_name);
if(!empty($exif_read['Orientation'])){
$orientation_data = exif_read_data("../../images/chat_pic/".$new_pic_name)['Orientation'];
}
}
if(isset($orientation_data) && $orientation_data !== 1){
$path = "../../images/chat_pic/". $new_pic_name;
$buffer = ImageCreateFromJPEG($path);
if ($typeok){      
list($w, $h) = getimagesize($path);
$max = 100;      
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
$msg_pic = sanitizeString($new_pic_name);
$msg_file = '';
$msg_audio = '';
$msg_video = '';
}
//if there is an error...
else
{
//set that to be the returned message
echo 'Ooops!  Your upload triggered the following error:  '.$_FILES['chat_pic']['error'];
}
$exif="";
$exif_read="";
$orientation_data="";
}
if($_FILES['chat_audio']['name']){
$name = htmlspecialchars($_FILES['chat_audio']['name']);
$ext = end((explode(".", $name)));
$ext = strtolower($ext);
//if no errors...
if(!$_FILES['chat_audio']['error']){
//now is the time to modify the future file name and validate the file
$new_audio_name = date('ymdHisu'). ".". $ext;
if($ext !== "mid" && $ext !== "midi" && $ext !== "rm" && $ext != "ram" && $ext !== "wma" && $ext !== "aac" && $ext !== "wav" && $ext !== "ogg" && $ext != "mp3" && $ext !== "mp4" && $ext != "amr" && $ext !== "m4a"){
$valid_file = false;
echo "Your audio file must be in mid, midi, rm, ram, wma, aac, amr, m4a, wav, ogg, mp3 or mp4 formats.";
}
elseif(!$_FILES['chat_audio']['size']){
$valid_file = false;
}
else{
$valid_file = true;
}
//if the file has passed the test
if($valid_file){
//move it to where we want it to be
move_uploaded_file($_FILES['chat_audio']['tmp_name'], '../../audios/chat_audio/'.$new_audio_name);
}
$msg_audio = sanitizeString($new_audio_name);
$msg_file = '';
$msg_pic = '';
$msg_video = '';
}
//if there is an error...
else
{
//set that to be the returned message
echo 'Ooops!  Your upload triggered the following error:  '.$_FILES['chat_audio']['error'];
}
}
if($_FILES['chat_video']['name']){
$name = htmlspecialchars($_FILES['chat_video']['name']);
$ext = end((explode(".", $name)));
$ext = strtolower($ext);
//if no errors...
if(!$_FILES['chat_video']['error']){
//now is the time to modify the future file name and validate the file
$new_video_name = date('ymdHisu'). ".". $ext;
if($ext !== "mpg" && $ext !== "mpeg" && $ext !== "3gp" && $ext !== "srt" && $ext !== "avi" && $ext != "wmv" && $ext !== "mov" && $ext !== "rm" && $ext !== "ram" && $ext !== "swf" && $ext != "flv" && $ext !== "ogg" && $ext !== "webm" && $ext != "mp4"){
$valid_file = false;
echo "Your video file must be in mpg, mpeg, 3gp, srt, avi, wmv, mov, rm, ram, swf, flv, ogg, webm or mp4 formats.";
}
elseif(!$_FILES['chat_video']['size']){
$valid_file = false;
}
else{
$valid_file = true;
}
//if the file has passed the test
if($valid_file){
//move it to where we want it to be
move_uploaded_file($_FILES['chat_video']['tmp_name'], '../../videos/chat_video/'.$new_video_name);
}
$msg_video = sanitizeString($new_video_name);
$msg_file = '';
$msg_pic = '';
$msg_audio = '';
}
//if there is an error...
else
{
//set that to be the returned message
echo 'Ooops!  Your upload triggered the following error:  '.$_FILES['chat_video']['error'];
}
}
if($_FILES['chat_file']['name']){
$name = htmlspecialchars($_FILES['chat_file']['name']);
$ext = end((explode(".", $name)));
$ext = strtolower($ext);
//if no errors...
if(!$_FILES['chat_file']['error']){
//now is the time to modify the future file name and validate the file
$new_file_name = date('ymdHisu'). ".". $ext;
if($ext !== "doc" && $ext !== "docx" && $ext !== "msg" && $ext != "rtf" && $ext !== "txt" && $ext !== "wpd" && $ext !== "wps" && $ext !== "csv" && $ext != "dat" && $ext !== "key" && $ext !== "ged" && $ext !== "pps" && $ext !== "ppt" && $ext != "pptx" && $ext !== "sdf" && $ext !== "vcf" && $ext !== "xml" && $ext !== "svg" && $ext != "pdf" && $ext !== "xlr" && $ext !== "xls" && $ext !== "xlsx" && $ext !== "accdb" && $ext != "db" && $ext !== "dbf" && $ext !== "mdb" && $ext !== "wav" && $ext !== "ogg" && $ext != "mp3" && $ext !== "mp4" && $ext !== "mid" && $ext !== "midi" && $ext !== "pdb" && $ext != "sql" && $ext !== "apk" && $ext !== "app" && $ext !== "bat" && $ext !== "com" && $ext != "exe" && $ext !== "jar" && $ext !== "dwg" && $ext !== "dxf" && $ext !== "gpx" && $ext != "kml" && $ext !== "kmz" && $ext !== "asp" && $ext !== "aspx" && $ext !== "cer" && $ext != "cfm" && $ext !== "csr" && $ext !== "css" && $ext !== "htm" && $ext != "html" && $ext !== "js" && $ext !== "jsp" && $ext !== "php" && $ext !== "rss" && $ext != "xhtml" && $ext !== "crx" && $ext !== "plugin" && $ext !== "fnt" && $ext !== "fon" && $ext != "otf" && $ext !== "ttf" && $ext !== "icns" && $ext !== "ico" && $ext != "cfg" && $ext !== "ini" && $ext !== "prf" && $ext !== "sys" && $ext !== "dmp" && $ext != "drv" && $ext !== "hqx" && $ext !== "mim" && $ext !== "uue" && $ext !== "7z" && $ext != "cbr" && $ext !== "deb" && $ext !== "gz" && $ext !== "pkg" && $ext != "rar" && $ext !== "rpm" && $ext !== "sitx" && $ext !== "zip" && $ext !== "zipx" && $ext != "c" && $ext !== "class" && $ext !== "cpp" && $ext !== "cs" && $ext != "dtd" && $ext !== "fla" && $ext !== "h" && $ext !== "java" && $ext !== "lua" && $ext != "m" && $ext !== "pl" && $ext !== "py" && $ext !== "sh" && $ext !== "sln" && $ext != "swift" && $ext !== "vb" && $ext !== "vcxproj" && $ext !== "xcodeproj" && $ext != "bak" && $ext !== "tmp" && $ext !== "msi" && $ext !== "torrent" && $ext !== "dem" && $ext != "gam" && $ext !== "nes" && $ext !== "rom" && $ext !== "sav" && $ext != "pif" && $ext !== "wsf" && $ext !== "cgi" && $ext !== "indd" && $ext !== "pct" && $ext != "eps" && $ext !== "ai" && $ext !== "ps" && $ext !== "thm" && $ext !== "psd" && $ext != "dds" && $ext !== "tar" && $ext !== "tex" && $ext !== "pages" && $ext != "odt" && $ext !== "log"){
$valid_file = false;
echo "Your file must be in shareable file formats.";
}
elseif(!$_FILES['chat_file']['size']){
$valid_file = false;
}
else{
$valid_file = true;
}
//if the file has passed the test
if($valid_file){
//move it to where we want it to be
move_uploaded_file($_FILES['chat_file']['tmp_name'], '../../files/chat_file/'.$new_file_name);
}
$msg_file = sanitizeString($new_file_name);
$msg_pic = '';
$msg_audio = '';
$msg_video = '';
}
//if there is an error...
else
{
//set that to be the returned message
echo 'Ooops!  Your upload triggered the following error:  '.$_FILES['chat_file']['error'];
}
}
$now = date("Y-m-d H:i:s");
queryMysql("INSERT INTO chat (`chat_id`, `sender_id`, `reciver_id`, `message`, `msg_pic`, `msg_audio`, `msg_video`, `msg_file`, `sent_on`, `seen`) VALUES(0, '$chat_hm_id', '$reciver', '$pic_caption', '$msg_pic', '$msg_audio', '$msg_video', '$msg_file', '$now', 0) ");
}
// Load the messages initially
$chat = new HmChatMock();
$messages = $chat->getMessages();
$hm_info = profileInfo($reciver);
$user_info = profileInfo($sender);
msgSeen($sender, $reciver);
?>
    <script type="text/javascript" src="../../jquery-1.8.0.min.js">
    </script>
    <script type="text/javascript">
      $(document).ready(
        function() {
          setInterval(function(){
            $.ajax({
              url: 'check_new_msg_for_this_hm.php' ,
              cache: false,
              success: function(data)
              {
                $('#msg_show2').val(data);
                var ms1 = document.getElementById("msg_show2").value;
                var ms2 = document.getElementById("msg_show1").value;
                if( ms1 > ms2 ){
                  var ms3 = document.getElementById('msg_body_table');
                  setTimeout(function () {
                    ms3.scrollTop = ms3.scrollHeight;
                  }
                             , 100);
                }
                setTimeout(function() {
                  $(document).ready(
                    function()	{
                      $(document).ready(
                        function() {
                          setTimeout(function() {
                            $.ajax({
                              url: 'check_new_msg_for_this_hm.php' ,
                              cache: false,
                              success: function(data)
                              {
                                $('#msg_show1').val(data);
                              }
                              ,                                          
                            }
                                  );
                          }
                                     , 400);
                        }
                      );
                    }
                    , 1000);
                }
                          );
              }
            }
                  );
          }
                      , 3000);
        }
      );
    </script>
    <script type='text/javascript'>
      window.setTimeout(function () {
        var elem = document.getElementById('msg_body_table');
        elem.scrollTop = elem.scrollHeight;
      }
                        , 0);
    </script>
    <script type="text/javascript">
      $(document).ready(
        function() {
          setTimeout(function() {
            onSwap();
          }
                     , 500);
        }
      );
      function scrollDown(){
        var e = document.getElementById('msg_body_table');
        e.scrollTop = e.scrollHeight;
        $.ajax({
          url: '../../msg_seen_update.php?s=<?php echo $sender/2+5 ; ?>&r=<?php echo $reciver/2+5 ; ?>',
          cache: false,
          success: function(data)
          {
          }
          ,                                          
        }
              );
      }
      function play_audio(audio){
        var pa1 = document.getElementById('audio_box');
        var pa3 = document.getElementById('audio_player');
        pa1.src = "../../audios/chat_audio/" + audio;
        pa3.load();
        var pa4 = document.getElementById('popup2');
        pa4.style.display = "";
      }
      function play_video(video){
        var pv1 = document.getElementById('video_box');
        var pv3 = document.getElementById('video_player');
        pv1.src = "../../videos/chat_video/" + video;
        pv3.load();
        var pv4 = document.getElementById('popup1');
        pv4.style.display = "";
      }
      function close_box(p){
        var pavc = document.getElementById(p);
        pavc.style.display = "none";
        var pac1 = document.getElementById('audio_box');
        var pac3 = document.getElementById('audio_player');
        pac1.src = "";
        pac3.load();
        var pvc1 = document.getElementById('video_box');
        var pvc3 = document.getElementById('video_player');
        pvc1.src = "";
        pvc3.load();
      }
      function onSwap(){
        var os = window.parent.document.getElementById('chat_reciver');
        os.value = "<?php echo $r/2+5 ; ?>";
      }
    </script>
  </head>
  <body onLoad="scrollDown()">
    <?php
$hm_id = $sender;
$swap_id = swapBox($hm_id);
for($i=1; $i<6; $i++){
$no = $i-1;
$col = "box_" .$no;
$r_c_r_id[$i] = $swap_id[$col];
$swap_info = swapInfo($r_c_r_id[$i]);
$r_icon[$i] = $swap_info['profile_pic'];
$header_name[$i] = $swap_info['first_name'] ." ". $swap_info['last_name'];
}
?>
    <?php 
$not_last = 0;
if( $r_c_r_id[5] !=0 ){ $not_last = 1;?>
    <div class="container-4">
      <div class="msg-wgt-header-4">
        <a id="select_chat_box4" href="index.php?reciver_id=<?php echo $r_c_r_id[5]/2+5; ?>&amp;swap_id=4">
          <img id="reciver_icon-4" src="../../images/profile_pic/<?php if($r_icon[5] != ""){ echo $r_icon[5]; } else{ echo "male.jpg"; }?>" />
          <span>
            <?php echo $header_name[5]; ?>
          </span>
        </a>
        <a style="float:right;" href="index.php?reciver_id=<?php echo $r/2+5; ?>&amp;close_chat_id=4">X
        </a>
      </div>
    </div>
    <?php 
}
if( $r_c_r_id[4] != 0){ $not_last = 1;?>
    <div class="container-3">
      <div class="msg-wgt-header-3">
        <a id="select_chat_box3" href="index.php?reciver_id=<?php echo $r_c_r_id[4]/2+5; ?>&amp;swap_id=3">
          <img id="reciver_icon-3" src="../../images/profile_pic/<?php if($r_icon[4] != ""){ echo $r_icon[4]; } else{ echo "male.jpg"; }?>" />
          <span>
            <?php echo $header_name[4]; ?>
          </span>
        </a>
        <a style="float:right;" href="index.php?reciver_id=<?php echo $r/2+5; ?>&amp;close_chat_id=3">X
        </a>
      </div>
    </div>
    <?php 
}
if( $r_c_r_id[3] != 0 ){ $not_last = 1;?>
    <div class="container-2">
      <div class="msg-wgt-header-2">
        <a id="select_chat_box2" href="index.php?reciver_id=<?php echo $r_c_r_id[3]/2+5; ?>&amp;swap_id=2">
          <img id="reciver_icon-2" src="../../images/profile_pic/<?php if($r_icon[3] != ""){ echo $r_icon[3]; } else{ echo "male.jpg"; }?>" />
          <span>
            <?php echo $header_name[3]; ?>
          </span>
        </a>
        <a style="float:right;" href="index.php?reciver_id=<?php echo $r/2+5; ?>&amp;close_chat_id=2">X
        </a>
      </div>
    </div>
    <?php 
}
if($r_c_r_id[2] != 0 ){ $not_last = 1;?>
    <div class="container-1">
      <div class="msg-wgt-header-1">
        <a id="select_chat_box1" href="index.php?reciver_id=<?php echo $r_c_r_id[2]/2+5; ?>&amp;swap_id=1">
          <img id="reciver_icon-1" src="../../images/profile_pic/<?php if($r_icon[2] != ""){ echo $r_icon[2]; } else{ echo "male.jpg"; }?>" />
          <span>
            <?php echo $header_name[2]; ?>
          </span>
        </a>
        <a style="float:right;" href="index.php?reciver_id=<?php echo $r/2+5; ?>&amp;close_chat_id=1">X
        </a>
      </div>
    </div>
    <?php 
}?>
    <span id="msg_show">
    </span>
    <input type="hidden" id="msg_show1" />
    <input type="hidden" id="msg_show2" />
    <div class="container">
      <div class="msg-wgt-header">
        <img id="reciver_icon" src="../../images/profile_pic/<?php if($hm_info['profile_pic'] != ""){ echo $hm_info['profile_pic']; } else{ echo "male.jpg"; }?>" />
        <span>
          <?php echo $hm_info['first_name'] ." ". $hm_info['last_name']; ?>
        </span>
        <?php if($not_last == 1){ ?>
        <a href="index.php?reciver_id=<?php echo $r_c_r_id[2]/2+5; ?>&amp;close_chat_id=0" style="float:right; margin:6px;">X
        </a>
        <?php }elseif($not_last == 0){ ?>
        <a href="index.php?reciver_id=<?php echo 0/2+5; ?>&amp;close_chat_id=0" onClick="parent.reciverZero()" style="float:right; margin:6px;">X
        </a>
        <?php }?>
      </div>
      <div class="msg-wgt-body"  id="msg_body_table">
        <table>
          <?php
if (!empty($messages)) {
$query = " SELECT `first_name`, `last_name` FROM `hm_profile` WHERE `hm_profile`.`hm_id` = $sender  ";
$user_data = mysqli_query($dbc,$query);	
$user_row = mysqli_fetch_array($user_data);
$user_name = ucfirst($user_row['first_name']);
$same_date="";
foreach ($messages as $message) {
$msg = htmlentities($message['message'], ENT_NOQUOTES);
$msg_pic = htmlentities($message['msg_pic'], ENT_NOQUOTES);
$msg_audio = htmlentities($message['msg_audio'], ENT_NOQUOTES);
$msg_video = htmlentities($message['msg_video'], ENT_NOQUOTES);
$msg_file = htmlentities($message['msg_file'], ENT_NOQUOTES);
$reciver_name = ucfirst($message['reciver_first_name']) ;
$sender_id = trim($message['sender_id']);
$query = " SELECT `first_name`, `last_name` FROM `hm_profile` WHERE `hm_profile`.`hm_id` = '$sender_id'  ";
$name_data = mysqli_query($dbc,$query);	
$name_row = mysqli_fetch_array($name_data);
$sender_name = ucfirst($name_row['first_name']);
$c_date = date_create($message['send_date']);
$date = date_format($c_date, 'l jS \of F Y');
$time = date_format($c_date, 'h:i:s A');
if($same_date !== $date){
$s_on = "$date<br>$time";
}
else{
$s_on = $time;
}
if( $sender_id !== $sender ){
$reciver_msg = "$msg";
$reciver_pic_msg = "$msg_pic";
$reciver_audio_msg = "$msg_audio";
$reciver_video_msg = "$msg_video";
$reciver_file_msg = "$msg_file";
if(!empty($reciver_pic_msg) && !empty($reciver_msg)){
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" align="left">
<p class="msg" id="r_msg" style="float:left;" align="left">{$reciver_msg}<br/><br/>
<img src="../../images/chat_pic/{$reciver_pic_msg}" width="100%"  /><br><br/><a href='download_p.php?nama={$reciver_pic_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
</p>
</div>
</span>
</div>
</div>
</td>
</tr>
MSG;
}
else if(!empty($reciver_audio_msg) && !empty($reciver_msg)){
$this_audio=$reciver_audio_msg;
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" align="left">
<p class="msg" id="r_msg" style="float:left;" align="left">{$reciver_msg}<br/><br/>
<a href="#popup2" onclick="play_audio('{$this_audio}')">Play this audio</a> <a href='download_a.php?nama={$reciver_audio_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
</p>
</div>
</span>
</div>
</div>
</td>
</tr>
MSG;
}
else if(!empty($reciver_video_msg) && !empty($reciver_msg)){
$this_video=$reciver_video_msg;
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" align="left">
<p class="msg" id="r_msg" style="float:left;" align="left">{$reciver_msg}<br/><br/>
<a href="#popup1" onclick="play_video('{$this_video}')">Play this video</a> <a href='download_v.php?nama={$reciver_video_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
</p>
</div>
</span>
</div>
</div>
</td>
</tr>
MSG;
}
else if(!empty($reciver_file_msg) && !empty($reciver_msg)){
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" align="left">
<p class="msg" id="r_msg" style="float:left;" align="left">{$reciver_msg}<br/><br/>
<img src="../../images/icon/1456538705_folder.png" width="100%"  /><br/><br/><a href='download_f.php?nama={$reciver_file_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
</p>
</div>
</span>
</div>
</div>
</td>
</tr>
MSG;
}
else if(!empty($reciver_pic_msg) && empty($reciver_msg)){
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" align="left">
<p class="msg" id="r_msg" style="float:left;" align="left">
<img src="../../images/chat_pic/{$reciver_pic_msg}" width="100%"  /><br/><br/><a href='download_p.php?nama={$reciver_pic_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
</p>
</div>
</span>
</div>
</div>
</td>
</tr>
MSG;
}
else if(!empty($reciver_audio_msg) && empty($reciver_msg)){
$this_audio=$reciver_audio_msg;
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" align="left">
<p class="msg" id="r_msg" style="float:left;" align="left">
<a href="#popup2" onclick="play_audio('{$this_audio}')">Play the audio</a> <a href='download_a.php?nama={$reciver_audio_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
</p>
</div>
</span>
</div>
</div>
</td>
</tr>
MSG;
}
else if(!empty($reciver_video_msg) && empty($reciver_msg)){
$this_video=$reciver_video_msg;
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" align="left">
<p class="msg" id="r_msg" style="float:left;" align="left">
<a href="#popup1" onclick="play_video('{$this_video}')">Play the video</a> <a href='download_v.php?nama={$reciver_video_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
</p>
</div>
</span>
</div>
</div>
</td>
</tr>
MSG;
}
else if(!empty($reciver_file_msg) && empty($reciver_msg)){
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" align="left">
<p class="msg" id="r_msg" style="float:left;" align="left">
<img src="../../images/icon/1456538705_folder.png" width="100%" /><br/><br/><a href='download_f.php?nama={$reciver_file_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
</p>
</div>
</span>
</div>
</div>
</td>
</tr>
MSG;
}
else{
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" align="left">
<p class="msg" id="r_msg" style="float:left;" align="left">{$reciver_msg}</p>
</div>
</span>
</div>
</div>
</td>
</tr>
MSG;
}
}
else{
$user_msg = "$msg";
$user_pic_msg = "$msg_pic";
$user_audio_msg = "$msg_audio";
$user_video_msg = "$msg_video";
$user_file_msg = "$msg_file";
if(!empty($user_pic_msg) && !empty($user_msg)){
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" style="float:right;" align="right">
<p class="msg" id="s_msg" style="float:right;" align="left">{$user_msg}<br/><br/>
<img src="../../images/chat_pic/{$user_pic_msg}" width="100%" style="margin-right:18px;"  /><br/><br/><a href='download_p.php?nama={$user_pic_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px"/></a>
</p>
</div> 
</span>
</div>
</div>
</td>
</tr>
MSG;
}
else if(!empty($user_audio_msg) && !empty($user_msg)){
$this_audio=$user_audio_msg;
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" style="float:right;" align="right">
<p class="msg" id="s_msg" style="float:right;" align="left">{$user_msg}<br/><br/>
<a href="#popup2" onclick="play_audio('{$this_audio}')">Play this audio</a> <a href='download_a.php?nama={$user_audio_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
</p>
</div> 
</span>
</div>
</div>
</td>
</tr>
MSG;
}
else if(!empty($user_video_msg) && !empty($user_msg)){
$this_video=$user_video_msg;
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" style="float:right;" align="right">
<p class="msg" id="s_msg" style="float:right;" align="left">{$user_msg}<br/><br/>
<a href="#popup1" onclick="play_video('{$this_video}')">Play this video</a> <a href='download_v.php?nama={$user_video_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
</p>
</div> 
</span>
</div>
</div>
</td>
</tr>
MSG;
}
else if(!empty($user_file_msg) && !empty($user_msg)){
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" style="float:right;" align="right">
<p class="msg" id="s_msg" style="float:right;" align="left">{$user_msg}<br/><br/>
<img src="../../images/icon/1456538705_folder.png" width="100%" style="margin-right:18px;"/><br/><br/><a href='download_f.php?nama={$user_file_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
</p>
</div> 
</span>
</div>
</div>
</td>
</tr>
MSG;
}
else if(!empty($user_pic_msg) && empty($user_msg)){
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" style="float:right;" align="right">
<p class="msg" id="s_msg" style="float:right;" align="left">
<img src="../../images/chat_pic/{$user_pic_msg}" width="100%" style="margin-right:18px;" /><br/><br/><a href='download_p.php?nama={$user_pic_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
</p>
</div> 
</span>
</div>
</div>
</td>
</tr>
MSG;
}
else if(!empty($user_audio_msg) && empty($user_msg)){
$this_audio=$user_audio_msg;
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" style="float:right;" align="right">
<p class="msg" id="s_msg" style="float:right;" align="left">
<a href="#popup2" onclick="play_audio('{$this_audio}')">Play this audio</a> <a href='download_a.php?nama={$user_audio_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
</p>
</div> 
</span>
</div>
</div>
</td>
</tr>
MSG;
}
else if(!empty($user_video_msg) && empty($user_msg)){
$this_video=$user_video_msg;
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" style="float:right;" align="right">
<p class="msg" id="s_msg" style="float:right;" align="left">
<a href="#popup1" onclick="play_video('{$this_video}')">Play this video</a> <a href='download_v.php?nama={$user_video_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
</p>
</div> 
</span>
</div>
</div>
</td>
</tr>
MSG;
}
else if(!empty($user_file_msg) && empty($user_msg)){
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" style="float:right;" align="right">
<p class="msg" id="s_msg" style="float:right;" align="left">
<img src="../../images/icon/1456538705_folder.png" width="100%" style="margin-right:18px;" /><br/><br/><a href='download_f.php?nama={$user_file_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
</p>
</div> 
</span>
</div>
</div>
</td>
</tr>
MSG;
}
else{
echo <<<MSG
<tr class="msg-row-container">
<td>
<div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
<div class="msg-row">
<div class="message">
<span class="user-label">
<div class="msg_area" style="float:right;" align="right">
<p class="msg" id="s_msg" style="float:right;" align="left">{$user_msg}</p>
</div> 
</span>
</div>
</div>
</td>
</tr>
MSG;
}
}
$same_date = $date;
$reciver = "";
$reciver_msg = "";
$reciver_pic_msg = "";
$user = "";
$user_msg = "";
$user_pic_msg = "";
$date = "";
}
} else {
echo '<div align="center"><br><br><span style="color:blue; font-size:14px;">You have not chatted yet.</span></div>';
}
?>
        </table>
      </div>
      <script type="text/javascript">
        function display_pic_box(){
          var p1 = document.getElementById('for_pic_msg');
          var p2 = document.getElementById('for_text_box');
          var p3 = document.getElementById('chatMsg');
          var p4 = document.getElementById('for_pic_box');
          p4.style.display = 'none';
          p3.style.display = 'none';
          p2.style.display = '';
          p1.style.display = '';
        }
        function display_text_box(){
          var t1 = document.getElementById('for_pic_msg');
          var t2 = document.getElementById('for_text_box');
          var t3 = document.getElementById('chatMsg');
          var t4 = document.getElementById('for_pic_box');
          t4.style.display = '';
          t3.style.display = '';
          t2.style.display = 'none';
          t1.style.display = 'none';
        }
      </script>
      <div class="msg-wgt-footer">
        <table width="100%">
          <tr>
            <td>
              <textarea id="chatMsg" onClick="setTimeout(scrollDown(),500)" placeholder="Type your message. Press shift + Enter to send" autofocus>
              </textarea>
              <div id="for_pic_msg" style="display:none;">
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                  <table width="100%">
                    <tr>
                      <td>
                        <textarea id="pic_caption" onClick="setTimeout(scrollDown(),500)" name="pic_caption" placeholder="Type caption for this attachment.">
                        </textarea>
                      </td>
                    </tr>
                    <tr>
                      <td onClick="setTimeout(scrollDown(),500)" >
                        <br/>
                        Upload: 
                        <label id="chat_pic_select" title="Upload Picture">
                          <img src="../../images/icon/1456538209_free-34.png" width="15" />
                          <input type="file" name="chat_pic" id="chat_pic" style="display:none;" />
                        </label>
                        <label id="chat_audio_select" title="Upload Audio">
                          <img src="../../images/icon/1456538332_Microphone.png" width="15" />
                          <input type="file" name="chat_audio" id="chat_audio" style="display:none;" />
                        </label>
                        <label id="chat_video_select" title="Upload Video">
                          <img src="../../images/icon/1456538481_youtube.png" width="15" />
                          <input type="file" name="chat_video" id="chat_video" style="display:none;" />
                        </label>
                        <label id="chat_file_select" title="Upload File">
                          <img src="../../images/icon/file.png" width="15" />
                          <input type="file" name="chat_file" id="chat_file" style="display:none;" />
                        </label>
                        <input id="reciver_id_from_chat" name="reciver_id_from_chat" type="hidden" value="<?php echo $_SESSION['reciver_id']; ?>" />
                        <label style="float:right; cursor:pointer;" title="Send" >
                          <img src="../../images/icon/1456537048_send.png" width="20"/>
                          <input type="submit" name="submit_chat_pic" onClick="return verify_msg_pic()" style="display:none;" />
                        </label>
                      </td>
                    </tr>
                  </table>
                </form>
              </div>
            </td>
            <td>
              <label id="for_pic_box" onClick="display_pic_box()" style="border:#A6D2FF 1px solid; padding:8px; float:right; cursor:pointer;" onClick="setTimeout(scrollDown(),500)" title="Click to attach media file">
                <img src="../../images/icon/1456539170_Iconfinder_0039_15.png" width="20"/>
              </label>
              <label id="for_text_box" onClick="display_text_box()" style="border:#A6D2FF 1px solid; padding:8px; display:none; float:right; cursor:pointer;" title="Click to text chat">
                <img src="../../images/icon/1456538612_EditDocument.png" width="20"/>
              </label>
            </td>
          </tr>
        </table>
      </div>
    </div>		
    <div id="popup1" class="overlay">
      <div class="popup">
        <h2>
        </h2>
        <a href="index.php?reciver_id=<?php echo ($_SESSION['reciver_id'])/2+5; ?>" class="close" onClick="close_box('popup1')">&times;
        </a>
        <br>
        <div class="content">
          <video id="video_player" width="280" controls>
            <source id="video_box" src="" type="video/mp4">
          </video>
        </div>
      </div>
    </div>
    <div id="popup2" class="overlay">
      <div class="popup11">
        <h2>
        </h2>
        <a href="index.php?reciver_id=<?php echo ($_SESSION['reciver_id'])/2+5; ?>" class="close" onClick="close_box('popup2')">&times;
        </a>
        <br>
        <div class="content">
          <audio id="audio_player" controls>
            <source id="audio_box" src="" type="audio/mp3">
          </audio>
        </div>
      </div>
    </div>
    <?php } ?>
    <script type="text/javascript" src="scripts/jquery-1.11.0.min.js">
    </script>
    <script type="text/javascript" src="scripts/chat.js">
    </script>
  </body>
</html>
