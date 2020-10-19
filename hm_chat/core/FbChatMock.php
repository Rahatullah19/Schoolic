<?php

class HmChatMock {

  // Holds the database connection
  private $dbConnection;
  
  //----- Database connection details --/
  //-- Change these to your database values
  
  private $_dbHost = '127.0.0.1';
  
  private $_dbUsername = 'root';
  
  private $_dbPassword = '';
  
  public $_databaseName = 'helpmiii';
  
 
  public function __construct() {
    $this->dbConnection = new mysqli($this->_dbHost, $this->_dbUsername, 
        $this->_dbPassword, $this->_databaseName);

    if ($this->dbConnection->connect_error) {
      die('Connection error.');
    }
  }
 
  public function getMessages() {
  
  	$sender_id = $_SESSION['hm_id'];
	$reciver_id = $_SESSION['reciver_id'];
	
    $messages = array();
    $query = <<<QUERY
        SELECT 
	`chat`.`message`, 
	`chat`.`msg_pic`,
	`chat`.`msg_audio`,
	`chat`.`msg_video`,
	`chat`.`msg_file`, 
	`chat`.`sent_on` AS send_date, 
	`chat`.`sender_id`, 
	`hm_profile`.`first_name` AS reciver_first_name, 
	`hm_profile`.`last_name` AS reciver_last_name 
FROM 
	`chat` 
	JOIN `hm_profile` ON `hm_profile`.`hm_id` = `chat`.`reciver_id` 
WHERE 
	(
		chat.reciver_id = '$reciver_id' 
		AND chat.sender_id = '$sender_id'
	) 
	OR (
		chat.reciver_id = '$sender_id' 
		AND chat.sender_id = '$reciver_id'
	) 
ORDER BY 
	`sent_on`

QUERY;
    
    
    $resultObj = $this->dbConnection->query($query);
    
    while ($row = $resultObj->fetch_assoc()) {
      $messages[] = $row;
    }
    
    return $messages;
  }

  
  public function addMessage($senderId, $reciverId, $message) {
    $addResult = false;
    
    $cSenderId = (int) $senderId;
    $cReciverId = (int) $reciverId;
    
    $cMessage = $this->dbConnection->real_escape_string($message);
	$now = date("Y-m-d H:i:s");
    
    $query = <<<QUERY
      INSERT INTO `chat`(`chat_id`, `sender_id`, `reciver_id`, `message`, `sent_on`, `seen`)
      VALUES (0, '$cSenderId', '$cReciverId', '$cMessage', '$now', 0)
QUERY;

    $result = $this->dbConnection->query($query);
    
    if ($result !== false) {
     
      $addResult = $this->dbConnection->insert_id;
    } else {
      echo $this->dbConnection->error;
    }
    
    return $addResult;
  }

}

?>























