<?php
session_start();

if (isset($_POST['msg'])) {
  require_once __DIR__ . '../../../core/FbChatMock.php';
  
  $senderId = $_SESSION['hm_id']; /*$_SESSION['sender_id']*/
  $reciverId = $_SESSION['reciver_id'] ;
  
  // Escape the message string
  $msg = htmlentities($_POST['msg'],  ENT_NOQUOTES);
  
  $chat = new HmChatMock();
  $result = $chat->addMessage($senderId, $reciverId, $msg);
}
?>








