<?php
require_once('hm_functions.php');
if(isset($_GET['post'])){
	$post_id = $_GET['post'];
	$result = queryMysql("SELECT `like_hm_id` FROM `hm_post_like` WHERE `like_post_id` = $post_id");
	if(mysqli_num_rows($result) == 0){
		echo '';
	} else{
		$p_l_c = mysqli_num_rows($result);
		echo '<span>' . $p_l_c . ' </span><span style="color:#FF0000;" class="glyphicon glyphicon-heart"></span>';
	}
}
?>