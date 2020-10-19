<?php
require_once('hm_functions.php');
if(isset($_GET['post'])){
	$post_id = $_GET['post'];
	$result = queryMysql("SELECT AVG(vote_no) AS vote_avg FROM `hm_post_vote` WHERE `vote_post_id` = $post_id");
	if(mysqli_num_rows($result) == 0){
		echo '';
	} else{
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		$p_v_avg = $row['vote_avg'];
		echo '<span>' . $p_v_avg . ' </span><span style="color:#80BFFF" class="glyphicon glyphicon-star"></span>';
	}
}
?>