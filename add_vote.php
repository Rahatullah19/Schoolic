<?php
require_once('hm_functions.php');

if(isset($_GET['post']) && isset($_GET['user']) && isset($_GET['vote'])){
	$user_id = ($_GET['user']-5)*2;
	$post_id = $_GET['post'];
	$vote_no = $_GET['vote'];
	
	$result = queryMysql("SELECT `vote_no` FROM `hm_post_vote` WHERE `vote_post_id` = $post_id AND `vote_hm_id` = $user_id");
	if(mysqli_num_rows($result) == 0){
		queryMysql("INSERT INTO `hm_post_vote`(`vote_post_id`, `vote_hm_id`, `vote_no`) VALUES ($post_id, $user_id, $vote_no)");
		echo '<span style="color:#FF0000;" class="glyphicon glyphicon-heart"></span> Like';
	} else{
		queryMysql("UPDATE `hm_post_vote` SET `vote_post_id`=$post_id,`vote_hm_id`=$user_id,`vote_no`=$vote_no WHERE `vote_post_id` = $post_id AND `vote_hm_id` = $user_id");
		echo '<span style="color:#FF0000;" class="glyphicon glyphicon-heart"></span> Like';
	}
}
?>