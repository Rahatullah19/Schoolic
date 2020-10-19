<?php
require_once('hm_functions.php');

if(isset($_GET['post']) && isset($_GET['user'])){
	$user_id = ($_GET['user']-5)*2;
	$post_id = $_GET['post'];
	
	
	$result = queryMysql("SELECT `like_hm_id` FROM `hm_post_like` WHERE `like_post_id` = $post_id AND `like_hm_id` = $user_id");
	if(mysqli_num_rows($result) == 0){
		queryMysql("INSERT INTO `hm_post_like`(`like_post_id`, `like_hm_id`) VALUES ($post_id,$user_id)");
		echo '<span style="color:#FF0000;" class="glyphicon glyphicon-heart"></span> Like';
	} else{
		queryMysql("DELETE FROM `hm_post_like` WHERE `like_post_id` = $post_id AND `like_hm_id` = $user_id");
		echo '<span style="color:#FF0000;" class="glyphicon glyphicon-heart-empty"></span> Like';
	}
}
?>