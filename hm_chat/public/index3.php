<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
        <link href="style/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="style/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="style/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css" />
        <link href="style/non-responsive.css" rel="stylesheet" type="text/css" />
    <link href="style/core.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div style="margin: 0px auto; width: 980px;">
    </div>
    <?php
	require_once('../../../connectvars.php');
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	require_once __DIR__ . '../../core/FbChatMock.php';
    @session_start();
    
    $_SESSION['sender_id'] = 3;
    $_SESSION['reciver_id'] = mysqli_real_escape_string($dbc, trim($_POST['reciver_id']));
	
    // Load the messages initially
    $chat = new HmChatMock();
    $messages = $chat->getMessages();
    ?>
    
    <div class="container" style="border: 1px solid lightgray;">
      <div class="msg-wgt-header">
        <a href="#"><?php echo ucfirst($reciver_name); ?></a><span id="notification"></span>
      </div>
      <div class="msg-wgt-body">
        <table>
          <?php
          if (!empty($messages)) {
             $query = " SELECT `first_name`, `last_name` FROM `users` WHERE `users`.`user_id` = '3'  ";
              $user_data = mysqli_query($dbc,$query);	
	      $user_row = mysqli_fetch_array($user_data);
	      $user_name = ucfirst($user_row['first_name']);
            foreach ($messages as $message) {
              $msg = htmlentities($message['message'], ENT_NOQUOTES);
	          $reciver_name = ucfirst($message['reciver_first_name']) ;
              $sender_id = trim($message['sender_id']);
              $query = " SELECT `first_name`, `last_name` FROM `users` WHERE `users`.`user_id` = '$sender_id'  ";
              $name_data = mysqli_query($dbc,$query);	
	      $name_row = mysqli_fetch_array($name_data);
	      $sender_name = ucfirst($name_row['first_name']);
			  	//for msg sender name tag
             if( $reciver_name === $user_name ){
                $reciver = "$sender_name";
				$reciver_msg = "$msg";
			 }
			 else{
				$user = "$sender_name";
				$user_msg = "$msg";
			 }
			  
              $sent = date('g:ia \o\n l jS F Y', $message['sent_on']);
              echo <<<MSG
              <tr class="msg-row-container">
                <td>
                    <div class="msg-row">
		       <div class="sent" align="center"><span class="msg-time">{$sent}</span></div>
                          <div class="avatar"></div>
                          <div class="message">
                             <span class="user-label">
			  	<div style="float:left;">
			  		<a href="#" style="color: #6D84B4;">{$reciver}</a><br />
					<wdr class="msg">{$reciver_msg}</wdr>
				</div>
				
				<div style="float:right;">
					<a href="#" style="color: #6D84B4;">{$user}</a><br />
					<wdr class="msg">{$user_msg}</wdr>
				</div>
			  </span>
                       </div>
                    </div>
                </td>
              </tr>
MSG;

$reciver = "";
$reciver_msg = "";
$user = "";
$user_msg = "";
            }
          } else {
            echo '<span style="margin-left: 25px;">No chat messages available!index</span>';
          }
          ?>
        </table>
      </div>
      <div class="msg-wgt-footer">
        <textarea id="chatMsg" placeholder="Type your message. Press shift + Enter to send"></textarea>
		<button type="button" id="button" class="button" value="Send >>>">Send >>></button>
      </div>
    </div>
    
    <script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="scripts/chat.js"></script>
  </body>
</html>


























