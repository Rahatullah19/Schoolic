<?php
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'helpmiii');
define('ImageUploadPath', 'Work%20Space/Schoolic/images/post_pic');
$post_limit = 10;
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die(mysql_error()); 
$base_url=''; // with trailing slash
$base_folder = ""; //leave empty if you using root folder 
$smiley_folder = $base_url.'assets/smileys/';
?>












