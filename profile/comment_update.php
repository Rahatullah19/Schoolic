<style>
   p.msg_wrap { word-wrap:break-word; }
</style>
<?php
	include_once 'includes/config.php';
   	include_once 'includes/security.php';
   	include_once 'includes/smileys.php';
	require_once('../hm_functions.php');
	require_once('../startsession.php');
	
   if(!empty($_POST['comment']) && !empty($_POST['act_id']) && !empty($_POST['user_hm_id']) && isset($_SESSION['hm_id'])) {
   	
   	
   	//clean the comment message
   	$comment = clean(mysqli_real_escape_string($connection, $_POST['comment']));
   	$comment = special_chars($comment); 
   	$now = date("Y-m-d H:i:s");
   	$post_id = $_POST['act_id'];
	
	if ($_SESSION['hm_id'] == $_POST['user_hm_id']) {
   		$post_cmt_hm_id = $_SESSION['hm_id'];
	}
	else{
		$post_cmt_hm_id = $_POST['user_hm_id'];
	}
   	
   	//insert into wall table
	$query = mysqli_query($connection, "INSERT INTO `comments` (`comment`, `cpid`, `cmt_hm_id`, `commented_date`) VALUES ('$comment', '$post_id', '$post_cmt_hm_id', '$now')") or die(mysql_error());
	$ins_id = mysqli_insert_id($connection);
	$cmt_hm_info = profileInfo($post_cmt_hm_id);
   	$cmt_hm_first_name = $cmt_hm_info['first_name'];
   	$cmt_hm_last_name = $cmt_hm_info['last_name'];
   	$cmt_hm_profile_pic = $cmt_hm_info['profile_pic'];
   	$cmt_hm_fullname = $cmt_hm_first_name . " " . $cmt_hm_last_name;
   	?>
<li id="li-comment-<?php echo $ins_id; ?>">
   <div class="acomment-avatar">
      <a href="#" rel="nofollow">
	  <?php if(!empty($cmt_hm_profile_pic)){ ?>
      		<img src="../images/profile_pic/<?php echo $cmt_hm_profile_pic; ?>" alt="Avatar Image" >
	  <?php 
		}else{
			echo '<img src="../images/icon/male.jpg" alt="Avatar Image">';
		} ?>
      </a>
      <p style="float:right; text-align:right; font-size:10px;"><a href="javascript:;" rel="<?php echo $post_id; ?>" class="comment-delete" id="comment_delete_<?php echo $ins_id; ?>">X</a></p>
   </div>
   <div class="acomment-meta">
      <a href="pro.php?user_id=<?php echo $post_cmt_hm_id/2+5; ?>"><?php echo $cmt_hm_fullname; ?></a>  0 sec ago 
   </div>
   <div class="acomment-content">
      <pre class="msg_wrap"><?php echo parse_smileys(make_clickable(nl2br(stripslashes(strip_tags($_POST['comment'])))), $smiley_folder); ?></pre>
   </div><br>
</li>
<?php } ?>


