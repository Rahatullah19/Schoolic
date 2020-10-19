<?php

require_once('../../../connectvars.php');
require_once('../../../startsession.php');
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

require_once __DIR__ . '../../../core/FbChatMock.php';

$sender = $_SESSION['hm_id'];
$reciverId = $_SESSION['reciver_id'];
	

$chat = new HmChatMock();
$messages = $chat->getMessages();
$chat_converstaion = array();

if (!empty($messages)) {
  $chat_converstaion[] = '<table>';
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
$chat_converstaion[] = <<<MSG
              <tr class="msg-row-container">
                <td>
                    <div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
                    <div class="msg-row">
                          <div class="message">
                             <span class="user-label">
                                 <div class="msg_area" align="left">
									<p class="msg" id="r_msg" style="float:left;" align="left">{$reciver_msg}<br/><br/>
										<img src="../../images/chat_pic/{$reciver_pic_msg}" width="100%" /><br><br/><a href='download_p.php?nama={$reciver_pic_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
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
$chat_converstaion[] = <<<MSG
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
$chat_converstaion[] = <<<MSG
              <tr class="msg-row-container">
                <td>
                    <div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
                    <div class="msg-row">
                          <div class="message">
                             <span class="user-label">
                                <div class="msg_area" align="left">
									<p class="msg" id="r_msg" style="float:left;" align="left">{$reciver_msg}<br/><br/>
										<a href="#popup1" onclick="play_video('{$this_video}')">Play this video</a> <a href='download_v.php?nama={$reciver_video_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px"/></a>
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
$chat_converstaion[] = <<<MSG
              <tr class="msg-row-container">
                <td>
                    <div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
                    <div class="msg-row">
                          <div class="message">
                             <span class="user-label">
                                 <div class="msg_area" align="left">
									<p class="msg" id="r_msg" style="float:left;" align="left">{$reciver_msg}<br/><br/>
										<img src="../../images/icon/1456538705_folder.png" width="100%"/><br/><br/><a href='download_f.php?nama={$reciver_file_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
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
$chat_converstaion[] = <<<MSG
              <tr class="msg-row-container">
                <td>
                    <div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
                    <div class="msg-row">
                          <div class="message">
                             <span class="user-label">
                                 <div class="msg_area" align="left">
									<p class="msg" id="r_msg" style="float:left;" align="left">
										<img src="../../images/chat_pic/{$reciver_pic_msg}" width="100%" /><br/><br/><a href='download_p.php?nama={$reciver_pic_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px"/></a>
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
$chat_converstaion[] = <<<MSG
              <tr class="msg-row-container">
                <td>
                    <div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
                    <div class="msg-row">
                          <div class="message">
                             <span class="user-label">
                                 <div class="msg_area" align="left">
									<p class="msg" id="r_msg" style="float:left;" align="left">
										<a href="#popup2" onclick="play_audio('{$this_audio}')">Play this audio</a> <a href='download_a.php?nama={$reciver_audio_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px"/></a>
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
$chat_converstaion[] = <<<MSG
              <tr class="msg-row-container">
                <td>
                    <div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
                    <div class="msg-row">
                          <div class="message">
                             <span class="user-label">
                                 <div class="msg_area" align="left">
									<p class="msg" id="r_msg" style="float:left;" align="left">
										<a href="#popup1" onclick="play_video('{$this_video}')">Play this video</a> <a href='download_v.php?nama={$reciver_video_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px"/></a>
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
$chat_converstaion[] = <<<MSG
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
$chat_converstaion[] = <<<MSG
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
$chat_converstaion[] = <<<MSG
              <tr class="msg-row-container">
                <td>
                    <div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
                    <div class="msg-row">
						<div class="message">
						 <span class="user-label">
							<div class="msg_area" style="float:right;" align="right">
								<p class="msg" id="s_msg" style="float:right;" align="left">{$user_msg}<br/><br/>
									<img src="../../images/chat_pic/{$user_pic_msg}" width="100%" style="margin-right:18px;" /><br/><br/><a href='download_p.php?nama={$user_pic_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px"/></a>
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
$chat_converstaion[] = <<<MSG
              <tr class="msg-row-container">
                <td>
                    <div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
                    <div class="msg-row">
						<div class="message">
						 <span class="user-label">
							<div class="msg_area" style="float:right;" align="right">
								<p class="msg" id="s_msg" style="float:right;" align="left">{$user_msg}<br/><br/>
									<a href="#popup2" onclick="play_audio('{$this_audio}')">Play this audio</a> <a href='download_a.php?nama={$user_audio_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px"/></a>
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
$chat_converstaion[] = <<<MSG
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
$chat_converstaion[] = <<<MSG
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
$chat_converstaion[] = <<<MSG
              <tr class="msg-row-container">
                <td>
                    <div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
                    <div class="msg-row">
						<div class="message">
						 <span class="user-label">
							<div class="msg_area" style="float:right;" align="right">
								<p class="msg" id="s_msg" style="float:right;" align="left">
									<img src="../../images/chat_pic/{$user_pic_msg}" width="100%" style="margin-right:18px;"  /><br/><br/><a href='download_p.php?nama={$user_pic_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
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
$chat_converstaion[] = <<<MSG
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
$chat_converstaion[] = <<<MSG
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
$chat_converstaion[] = <<<MSG
              <tr class="msg-row-container">
                <td>
                    <div class="sent" align="center"><span class="msg-time">{$s_on}</span></div>
                    <div class="msg-row">
						<div class="message">
						 <span class="user-label">
							<div class="msg_area" style="float:right;" align="right">
								<p class="msg" id="s_msg" style="float:right;" align="left">
									<img src="../../images/icon/1456538705_folder.png" width="100%" style="margin-right:18px;" /><br/><br/><a href='download.php?nama={$user_file_msg}' style="margin-left:10px;"><img src="../../images/icon/download_icon3.png" width="10px" /></a>
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
$chat_converstaion[] = <<<MSG
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
$user = "";
$user_msg = "";
$date = "";
  }
  $chat_converstaion[] = '</table>';
}
else {
  echo '<div align="center"><br><br><span style="color:blue; font-size:14px;">You have not chatted yet.</span></div>';
}

echo implode('', $chat_converstaion);
?>