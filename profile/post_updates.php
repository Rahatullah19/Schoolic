<style>
p.msg_wrap { word-wrap:break-word; }
</style>
<?php
if(!empty($_POST['message'])) {
	include_once 'includes/config.php';
	include_once 'includes/security.php';
	include_once 'includes/smileys.php';
	require_once('../hm_functions.php');
	
	$message = clean(mysqli_real_escape_string($connection,$_POST['message']));
	$message = special_chars($message); 
	$now = date("Y-m-d H:i:s");
$user_hm_id =  clean(mysqli_real_escape_string($connection,$_POST['user_hm_id']));
	//getting image link
	if(!empty($_POST['pic_url'])) {
		$image = strip_tags($_POST['pic_url']);
	} else {
		$image = '';
	}
	
	//getting video link
	if(!empty($_POST['y_link'])) {
		$video = fix_url(strip_tags($_POST['y_link']));
	} else {
		$video = '';
	}
	
	//insert into wall table
	 $query = mysqli_query($connection, "INSERT INTO `posts` (`post_hm_id`, `desc`, `image_url`, `vid_url`,`date`) VALUES ('$user_hm_id', '$message', '$image', '$video','$now')") or die(mysql_error());
	 $ins_id = mysqli_insert_id($connection);

$result1 = mysqli_query($connection, "SELECT first_name, last_name, profile_pic FROM `hm_profile` WHERE `hm_id`= $user_hm_id");
$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
$hm_name = $row1['first_name']. " " . $row1['last_name'];
$hm_profile_pic = $row1['profile_pic'];
	
	
$lft = array('left' => '0', 'right' => '1', 'highlight' => '2'); ?>
<li class="<?php echo array_rand($lft,1);?>" id="post-<?php echo $ins_id; ?>">
  <i class="pointer"></i>
  <div class="unit">
  
    <!-- Story -->
    <div class="storyUnit">
      <div class="imageUnit">
        <a href="#">
		<?php if(!empty($hm_profile_pic)){ ?>
			<img src="../images/profile_pic/<?php echo $hm_profile_pic ; ?>" width="32" height="32" alt="">
		<?php 
		}else{
			echo '<img src="../images/icon/male.jpg" width="32" height="32" alt="">';
		} ?>
		</a>
         <p style="float:right; text-align:right;">
			<a href="javascript:;" class="post-fav" id="post_fav_<?php echo $ins_id; ?>" title="Add as favourite post"><span class="glyphicon glyphicon-star-empty"></span></a> <a href="javascript:;" class="post-more" id="post_more_<?php echo $ins_id; ?>" title="More for this post"><span class="glyphicon glyphicon-chevron-down"></span></a> <a href="javascript:;" class="post-edit" id="post_edit_<?php echo $ins_id; ?>" title="Edit this post"><span class="glyphicon glyphicon-edit"></span></a> <a href="javascript:;" class="post-hide" id="post_hide_<?php echo $ins_id; ?>"title="Hide this post"><span class="glyphicon glyphicon-eye-close"></span></a> <a href="javascript:;" class="post-delete" id="post_delete_<?php echo $ins_id; ?>"title="Delete this post"><span class="glyphicon glyphicon-remove"></span></a>
		 </p>
        <div class="imageUnit-content">
          <h4>
			  <a href="pro.php?user_id=<?php echo $user_hm_id/2+5; ?>" style="text-transform:capitalize;"><?php echo $hm_name ; ?></a>
			  <small style="font-size:11px;"> - Just now</small>
		  </h4>
        </div>
    </div>

      <pre class="msg_wrap"><?php echo parse_smileys(make_clickable(nl2br(stripslashes(strip_tags($_POST['message'])))), $smiley_folder); ?></pre>
       <?php if(!empty($video)) { ?>
          <iframe width="400" height="300" src="http://www.youtube.com/embed/<?php echo get_youtubeid($video);?>" frameborder="0" allowfullscreen></iframe>
          <?php } elseif(!empty($image)) { ?>
          <img id="post_pic" src="image.php/<?php echo $image;?>?width=400&nocache&quality=100&image=/Work%20Space/Schoolic/images/post_pic/<?php echo $image;?>">
          <?php } ?>
			<br>
			 <a href="javascript:;" class="btn btn-default btn-sm" id="addFriendBtn-<?php echo $ins_id; ?>" onClick="addLike(<?php echo $user_hm_id/2+5; ?>,<?php echo $ins_id; ?>)">
				<span style="color:#FF0000;" class="glyphicon glyphicon-heart-empty"></span> Like
			 </a>
			 
			 <div class="stars">
				<small>Vote&nbsp;</small>
				<label class="star" id="star-1-post-id-<?php echo $ins_id; ?>" onClick="addVote(<?php echo $user_hm_id/2+5; ?>,<?php echo $ins_id; ?>,1)"><span class="glyphicon glyphicon-star-empty"></span> </label>
				<label class="star" id="star-2-post-id-<?php echo $ins_id; ?>" onClick="addVote(<?php echo $user_hm_id/2+5; ?>,<?php echo $ins_id; ?>,2)"><span class="glyphicon glyphicon-star-empty"></span> </label>
				<label class="star" id="star-3-post-id-<?php echo $ins_id; ?>" onClick="addVote(<?php echo $user_hm_id/2+5; ?>,<?php echo $ins_id; ?>,3)"><span class="glyphicon glyphicon-star-empty"></span> </label>
				<label class="star" id="star-4-post-id-<?php echo $ins_id; ?>" onClick="addVote(<?php echo $user_hm_id/2+5; ?>,<?php echo $ins_id; ?>,4)"><span class="glyphicon glyphicon-star-empty"></span> </label>
				<label class="star" id="star-5-post-id-<?php echo $ins_id; ?>" onClick="addVote(<?php echo $user_hm_id/2+5; ?>,<?php echo $ins_id; ?>,5)"><span class="glyphicon glyphicon-star-empty"></span></label>
			</div>
			 <a href="#" class="btn btn-default btn-sm" id="sharePostBtn-<?php echo $ins_id; ?>" data-toggle="modal" data-target="#myModal_for_share" onClick="sharePost(<?php echo $user_hm_id; ?>,<?php echo $ins_id; ?>,5)">
				Share <span style="color:#00FF00;" class="glyphicon glyphicon-share"></span>
			</a>&nbsp;&nbsp;
			<a href="javascript:;" id="like_count-<?php echo $ins_id; ?>"></a> &nbsp;
			<a href="javascript:;" id="vote_count-<?php echo $ins_id; ?>"></a> &nbsp;
			<!--<a href="javascript:;" id="share_count-<?php echo $ins_id; ?>"></a>-->
    </div>
   
	<!-- comment starts -->
	<div class="activity-comments">
		<ul id="CommentPosted<?php echo $ins_id; ?>">
		<li class="show-all" id="show-all-<?php echo $ins_id; ?>" style="display:none"><a href="javascript:;"><span id="comment_count_<?php echo $ins_id; ?>">0</span> comments</a></li>
		  
		<a href="javascript:;" class="acomment-reply" title="" id="acomment-comment-<?php echo $ins_id; ?>">
		Write a comment..</a>
		</ul>
		<form  method="post" id="fb-<?php echo $ins_id; ?>" class="ac-form">
			<div class="ac-reply-avatar">
			<?php if(!empty($hm_profile_pic)){ ?>
				<img src="../images/profile_pic/<?php echo $hm_profile_pic ; ?>" width="30" height="30" alt="Profile Picture">
			<?php 
			}else{
				echo '<img src="../images/icon/male.jpg" width="30" height="30" alt="">';
			} ?>
			</div>
			<div class="ac-reply-content">
				<div class="ac-textarea">
					<textarea id="ac-input-<?php echo $ins_id; ?>" class="ac-input" name="comment" style="height:40px;"></textarea>
					<input type="hidden" id="act-id-<?php echo $ins_id; ?>" name="act_id" value="<?php echo $ins_id; ?>" />
					<input type="hidden" name="user_hm_id" id="user_hm_id" value="<?php echo $user_hm_id; ?>">
				</div>
				<input name="ac_form_submit" class="uibutton confirm live_comment_submit" title="fb-<?php echo $ins_id; ?>" id="comment_id_<?php echo $ins_id; ?>" type="button" value="Submit"> &nbsp; or <a href="javascript:;" class="comment_cancel" id="<?php echo $ins_id; ?>">Cancel</a>			
			</div>
		</form>
	</div>
	<!-- comment ends -->
  </div>
</li>
<?php } ?>













