<?php
include('includes/SimpleImage.php');
include('includes/config.php'); 
// $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/w/images/post_pic/';

$name = htmlspecialchars($_FILES['uploadfile']['name']);
		$ext = end((explode(".", $name)));
		$ext = strtolower($ext);
		$new_pic_name = date('ymdHisu'). ".". $ext;
$file = '../images/post_pic/' . $new_pic_name;

if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) {

list($width, $height, $type, $attr) = getimagesize($file);
if($width > 1024) {
$image = new SimpleImage();
$image->load($file);
$image->resizeToWidth(1024);
$image->save($file);
}
  echo $new_pic_name; 
} else {
  echo "";
}
?>