<?php
   if(!empty($_GET['lastPost'])) {
   $last_post_id = $_GET['lastPost'];
   //remove pageination- from last_post_id
   $remove_string = explode("-",$last_post_id);
   if(isset($remove_string[1])){
	   $last_post_id = $remove_string[1]; 
	   include_once 'includes/config.php';
	   include_once 'includes/smileys.php';
	   include_once 'includes/security.php';
	   require_once('../hm_functions.php');
	   require_once('../startsession.php');
	   
	   
	   
	   
	   if (isset($_SESSION['hm_id'])) {
		   
		   if(isset($_POST['user_id'])){
		  $user = $_SESSION['user_id'] = mysqli_real_escape_string($connection, trim($_POST['user_id']));
		  }
		  else if(isset($_GET['user_id'])){
		  $user = $_SESSION['user_id'] = mysqli_real_escape_string($connection, trim(($_GET['user_id'])-5)*2);
		  }
		  else if(isset($_POST['reciver_id_from_chat'])){
		  $user = $_SESSION['user_id'] = mysqli_real_escape_string($connection, trim($_POST['reciver_id_from_chat']));
		  }
		  else {
		  $user = $_SESSION['user_id'];
		  }
		  
		  $viewer_hm_info = profileInfo($_SESSION['hm_id']);
		  $viewer_user_hm_id = $viewer_hm_info['hm_id'];
		  $viewer_user_profile_pic = $viewer_hm_info['profile_pic'];
		  
		  
		   if($_SESSION['hm_id'] != $user){
		  //for the user to which the viewer is viewing
		  $user_hm_info = profileInfo($user);
		  $user_hm_id = $user_hm_info['hm_id'];
		  $user_first_name = $user_hm_info['first_name'];
		  $user_last_name = $user_hm_info['last_name'];
		  $hm_name = $user_first_name . " " . $user_last_name;
		  $user_profile_pic = $user_hm_info['profile_pic'];
		  }
		  else{
		  //for the viewer
		  $user_hm_info = profileInfo($_SESSION['hm_id']);
		  $user_hm_id = $user_hm_info['hm_id'];
		  $user_first_name = $user_hm_info['first_name'];
		  $user_last_name = $user_hm_info['last_name'];
		  $hm_name = $user_first_name . " " . $user_last_name;
		  $user_profile_pic = $user_hm_info['profile_pic'];
		  }
		  }
	   
	   
	   
	   //query to fetch posts < last_post_id
	   $result = mysqli_query($connection, "SELECT * FROM `posts` WHERE `post_hm_id` = $user_hm_id AND `pid` < $last_post_id ORDER BY `pid` DESC LIMIT $post_limit"); 
	   $total_result = mysqli_num_rows($result);
	   if($total_result > 0) {
	   
	   $al = 0; 
	   while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) { 
		$post_id = $row['pid']; 
		$post_hm_info = profileInfo($row['post_hm_id']);
		$post_user_first_name = $post_hm_info['first_name'];
		$post_user_last_name = $post_hm_info['last_name'];
		$post_user_profile_pic = $post_hm_info['profile_pic'];
		$post_hm_name = $post_user_first_name . " " . $post_user_last_name;
		if($row['special']!=1){
	   ?>
	<li class="<?php echo alignment($al); ?>" id="post-<?php echo $post_id; ?>">
	   <i class="pointer" id="pagination-<?php echo $post_id;?>"></i>
	   <div class="unit">
		  <!-- Story -->
		  <div class="storyUnit">
			 <div class="imageUnit">
				<a href="#">
				<?php if(!empty($post_user_profile_pic)){ ?>
					<img src="../images/profile_pic/<?php echo $post_user_profile_pic;?>" width="32" height="32" alt="">
				<?php 
				}else{
					echo '<img src="../images/icon/male.jpg" width="32" height="32" alt="">';
				} ?>
				</a>
				<p style="float:right; text-align:right;">
					<?php if($_SESSION['hm_id'] == $row['post_hm_id']){?><a href="javascript:;" class="post-fav" id="post_fav_<?php echo $post_id; ?>" title="Add as favourite post"><span class="glyphicon glyphicon-star-empty"></span></a><?php } else{ ?><a href="javascript:;" class="post-save" id="post_save_<?php echo $post_id; ?>" title="Save this post"><span class="glyphicon glyphicon-bookmark"></span></a><?php } ?>  <a href="javascript:;" class="post-more" id="post_more_<?php echo $post_id; ?>" title="More for this post"><span class="glyphicon glyphicon-chevron-down"></span></a> <?php if($_SESSION['hm_id'] != $row['post_hm_id']){?><a href="javascript:;" class="post-report" id="post_report_<?php echo $post_id; ?>" title="Report for this post"><span class="glyphicon glyphicon-exclamation-sign"></span></a><?php } else{ ?> <a href="javascript:;" class="post-edit" id="post_edit_<?php echo $post_id; ?>" title="Edit this post"><span class="glyphicon glyphicon-edit"></span></a><?php } ?> <a href="javascript:;" class="post-hide" id="post_hide_<?php echo $post_id; ?>" title="Hide this post"><span class="glyphicon glyphicon-eye-close"></span></a> <?php if($_SESSION['hm_id'] == $row['post_hm_id']){?><a href="javascript:;" class="post-delete" id="post_delete_<?php echo $post_id; ?>" title="Delete this post"><span class="glyphicon glyphicon-remove"></span></a><?php } ?>
				</p>
				<div class="imageUnit-content">
				   <h4>
					   <a href="pro.php?user_id=<?php echo $row['post_hm_id']/2+5; ?>" style="text-transform:capitalize;"><?php echo $post_hm_name;?> </a>
					   <?php if($_SESSION['hm_id'] != $row['post_hm_id']){?>
						<a href="javascript:;" onClick="parent.toChat('<?php echo $row['post_hm_id']/2+5; ?>')" title="Chat with <?php echo $post_hm_name; ?>">
							<small><span class="glyphicon glyphicon-envelope"></span></small>
						 </a>
						 <?php } ?>
					   <small style="font-size:11px;"> - <?php echo timeAgo($row['date']);?></small>
				   </h4>
				</div>
			 </div>
			 <pre class="msg_wrap"><?php echo parse_smileys(make_clickable(nl2br(stripslashes($row['desc']))), $smiley_folder); ?></pre>
			 <?php if(!empty($row['vid_url'])) { ?>
			 <iframe width="400" height="300" src="http://www.youtube.com/embed/<?php echo get_youtubeid($row['vid_url']);?>" frameborder="0" allowfullscreen></iframe>
			 <?php } elseif(!empty($row['image_url'])) { ?>
			 <img id="post_pic" src="image.php/<?php echo $row['image_url'];?>?width=400&nocache&quality=100&image=/kieton/images/post_pic/<?php echo $row['image_url'];?>">
			 <?php } ?>
			 <br>
			 
			 <a href="javascript:;" class="btn btn-default btn-sm" id="addLikeBtn-<?php echo $post_id; ?>" onClick="addLike(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>)">
			 <?php $like_result = queryMysql("SELECT `like_hm_id` FROM `hm_post_like` WHERE `like_post_id` = $post_id AND `like_hm_id` = $viewer_user_hm_id"); if(mysqli_num_rows($like_result) == 0){ ?>
				<span style="color:#FF0000;" class="glyphicon glyphicon-heart-empty"></span> Like
			<?php } else { ?>
				<span style="color:#FF0000;" class="glyphicon glyphicon-heart"></span> Like
			<?php } ?>
			 </a>
			 
			 <div class="stars">
				<small>Vote&nbsp;</small>
				<?php $vote_result = queryMysql("SELECT `vote_no` FROM `hm_post_vote` WHERE `vote_post_id` = $post_id AND `vote_hm_id` = $viewer_user_hm_id");
					if(mysqli_num_rows($vote_result) == 0){ ?>
				<label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,1)"><span class="glyphicon glyphicon-star-empty"></span> </label>
				<label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,2)"><span class="glyphicon glyphicon-star-empty"></span> </label>
				<label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,3)"><span class="glyphicon glyphicon-star-empty"></span> </label>
				<label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,4)"><span class="glyphicon glyphicon-star-empty"></span> </label>
				<label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,5)"><span class="glyphicon glyphicon-star-empty"></span></label>
				<?php } else{ 
					$vote_row = mysqli_fetch_array($vote_result,MYSQLI_ASSOC);
					$v_no = $vote_row['vote_no'];
					switch ($v_no) {
						case 1:
						?>
						<label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,1)"><span class="glyphicon glyphicon-star"></span> </label>
						<label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,2)"><span class="glyphicon glyphicon-star-empty"></span> </label>
						<label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,3)"><span class="glyphicon glyphicon-star-empty"></span> </label>
						<label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,4)"><span class="glyphicon glyphicon-star-empty"></span> </label>
						<label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,5)"><span class="glyphicon glyphicon-star-empty"></span></label>
						<?php 
							break;
						case 2:
						?>
						<label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,1)"><span class="glyphicon glyphicon-star"></span> </label>
						<label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,2)"><span class="glyphicon glyphicon-star"></span> </label>
						<label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,3)"><span class="glyphicon glyphicon-star-empty"></span> </label>
						<label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,4)"><span class="glyphicon glyphicon-star-empty"></span> </label>
						<label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,5)"><span class="glyphicon glyphicon-star-empty"></span></label>
						<?php 
							break;
						case 3:
						?>
						<label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,1)"><span class="glyphicon glyphicon-star"></span> </label>
						<label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,2)"><span class="glyphicon glyphicon-star"></span> </label>
						<label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,3)"><span class="glyphicon glyphicon-star"></span> </label>
						<label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,4)"><span class="glyphicon glyphicon-star-empty"></span> </label>
						<label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,5)"><span class="glyphicon glyphicon-star-empty"></span></label>
						<?php 
							break;
						case 4:
						?>
						<label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,1)"><span class="glyphicon glyphicon-star"></span> </label>
						<label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,2)"><span class="glyphicon glyphicon-star"></span> </label>
						<label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,3)"><span class="glyphicon glyphicon-star"></span> </label>
						<label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,4)"><span class="glyphicon glyphicon-star"></span> </label>
						<label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,5)"><span class="glyphicon glyphicon-star-empty"></span></label>
						<?php
							break;
						case 5:
						?>
						<label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,1)"><span class="glyphicon glyphicon-star"></span> </label>
						<label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,2)"><span class="glyphicon glyphicon-star"></span> </label>
						<label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,3)"><span class="glyphicon glyphicon-star"></span> </label>
						<label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,4)"><span class="glyphicon glyphicon-star"></span> </label>
						<label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,5)"><span class="glyphicon glyphicon-star"></span></label>
						<?php
							break;
					}
				}
				?>
			</div>
			<!--
			<a href="#" class="btn btn-default btn-sm" id="sharePostBtn-<?php echo $post_id; ?>" data-toggle="modal" data-target="#myModal_for_share" onClick="sharePost(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,5)">
				Share <span style="color:#00FF00;" class="glyphicon glyphicon-share"></span>
			</a>-->
			&nbsp;&nbsp;
			<?php $like_count_result = queryMysql("SELECT `like_hm_id` FROM `hm_post_like` WHERE `like_post_id` = $post_id"); ?>
			<a href="javascript:;" id="like_count-<?php echo $post_id; ?>"><?php if($l_c = mysqli_num_rows($like_count_result) != 0){ ?><span><?php echo $l_c; ?> </span><span style="color:#FF0000;" class="glyphicon glyphicon-heart"></span><?php }?></a> &nbsp;
			<?php $vote_count_result = queryMysql("SELECT `vote_hm_id` FROM `hm_post_vote` WHERE `vote_post_id` = $post_id"); ?>
			<a href="javascript:;" id="vote_count-<?php echo $post_id; ?>">
			<?php 
				if(mysqli_num_rows($vote_count_result) != 0){ 
					$vote_avg_result = queryMysql("SELECT AVG(vote_no) AS vote_avg FROM `hm_post_vote` WHERE `vote_post_id` = $post_id"); 
					$vote_avg_row = mysqli_fetch_array($vote_avg_result,MYSQLI_ASSOC); 
					$p_v_avg = $vote_avg_row['vote_avg'];
				?>
			<span><?php echo number_format($p_v_avg, 1, '.', ''); ?>  </span><span style="color:#80BFFF" class="glyphicon glyphicon-star"></span><?php }?></a> &nbsp;
			<!--<a href="javascript:;"> 5 <span id="share_count" class="glyphicon glyphicon-share"></span></a>-->
		  </div>
		  <div class="activity-comments">
			 <ul id="CommentPosted<?php echo $post_id; ?>">
				<?php 
				   //fetch comments from comments table using post id
				   $comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `cpid`= $post_id ORDER BY `cid` ASC ");
				   $total_comments = mysqli_num_rows($comments);
				   ?>
				<li class="show-all" id="show-all-<?php echo $post_id; ?>" <?php if($total_comments == 0) { ?> style="display:none" <?php } ?>><a href="javascript:;"><span id="comment_count_<?php echo $post_id;?>"><?php echo $total_comments;?></span> comments</a></li>
				<?php 
				   while($comt = mysqli_fetch_array($comments,MYSQLI_ASSOC)) {
					$comment_id = $comt['cid']; 
					
					if($comt['cmt_hm_id'] == $user_hm_id){
					
				   ?>
				<li id="li-comment-<?php echo $comment_id; ?>">
				   <div class="acomment-avatar">
						<a href="#" rel="nofollow">
					  <?php if(!empty($user_profile_pic)){ ?>
						<img src="../images/profile_pic/<?php echo $user_profile_pic; ?>" alt="Avatar Image" >
					  <?php
					  }else{
						echo '<img src="../images/icon/male.jpg" alt="Avatar Image">';
					  }
					  ?>
					  </a>
					  <p style="float:right; text-align:right; font-size:10px;"><a href="javascript:;" rel="<?php echo $post_id; ?>" class="comment-delete" id="comment_delete_<?php echo $comment_id; ?>">X</a></p>
				   </div>
				   <div class="acomment-meta">
					  <a href="../profile/pro.php?user_id=<?php echo $user_hm_id/2+5; ?>" style="text-transform:capitalize;"><?php echo $hm_name; ?></a>  <?php echo timeAgo($comt['commented_date']);?> 
				   </div>
				   <div class="acomment-content">
					  <pre class="msg_wrap"><?php echo parse_smileys(make_clickable(nl2br(stripslashes($comt['comment']))), $smiley_folder); ?></pre>
				   </div>
				   <br>
				</li>
				<?php 
				   } else {
					$cmt_hm_info = profileInfo($comt['cmt_hm_id']);
					$cmt_user_first_name = $cmt_hm_info['first_name'];
					$cmt_user_last_name = $cmt_hm_info['last_name'];
					$cmt_user_profile_pic = $cmt_hm_info['profile_pic'];
					$cmt_hm_name = $cmt_user_first_name . " " . $cmt_user_last_name;
				   
				   ?>
				<li id="li-comment-<?php echo $comment_id; ?>">
				   <div class="acomment-avatar">
						<a href="#" rel="nofollow">
						<?php if(!empty($cmt_user_profile_pic)){ ?>
							<img src="../images/profile_pic/<?php echo $cmt_user_profile_pic; ?>" alt="Avatar Image" >
						<?php
						}else{
							echo '<img src="../images/icon/male.jpg" alt="Avatar Image">';
						}
						?>
						</a>
					  <p style="float:right; text-align:right; font-size:10px;"><a href="javascript:;" rel="<?php echo $post_id; ?>" class="comment-delete" id="comment_delete_<?php echo $comment_id; ?>">X</a></p>
				   </div>
				   <div class="acomment-meta">
					  <a href="../profile/pro.php?user_id=<?php echo $comt['cmt_hm_id']/2+5; ?>" style="text-transform:capitalize;"><?php echo $cmt_hm_name; ?></a>  <?php echo timeAgo($comt['commented_date']);?> 
				   </div>
				   <div class="acomment-content">
					  <pre class="msg_wrap"><?php echo parse_smileys(make_clickable(nl2br(stripslashes($comt['comment']))), $smiley_folder); ?></pre>
				   </div>
				   <br>
				</li>
				<?php
				   }
				   }
				   ?>
			 </ul>
				 <a href="javascript:;" class="acomment-reply" title="" id="acomment-comment-<?php echo $post_id; ?>">
				 Write a comment..</a>
			 <form  method="post" id="fb-<?php echo $post_id; ?>" class="ac-form">
				<div class="ac-reply-avatar">
				<?php if(!empty($viewer_user_profile_pic)){ ?>	
					<img src="../images/profile_pic/<?php echo $viewer_user_profile_pic; ?>" width="30" height="30" alt="Avatar Image">
				<?php
				}else{
					echo '<img src="../images/icon/male.jpg" width="30" height="30" alt="Avatar Image">';
				}
				?>
				</div>
				<div class="ac-reply-content">
				   <div class="ac-textarea">
					  <textarea id="ac-input-<?php echo $post_id; ?>" class="ac-input" name="comment" style="height:40px;"></textarea>
					  <input type="hidden" id="act-id-<?php echo $post_id; ?>" name="act_id" value="<?php echo $post_id; ?>" />
					  <input type="hidden" name="user_hm_id" id="user_hm_id" value="<?php echo $viewer_user_hm_id; ?>">
				   </div>
				   <input name="ac_form_submit" class="uibutton confirm live_comment_submit" title="fb-<?php echo $post_id; ?>" id="comment_id_<?php echo $post_id; ?>" type="button" value="Submit"> &nbsp; or <a href="javascript:;" class="comment_cancel" id="<?php echo $post_id; ?>">Cancel</a>			
				</div>
			 </form>
		  </div>
	   </div>
	</li>
	<?php } else{ ?>
				<li class="<?php echo alignment(2); ?>" id="post-<?php echo $post_id; ?>">
				   <i class="pointer" id="pagination-<?php echo $post_id;?>"></i>
				   <div class="unit">
					  <!-- Story -->
					  <div class="storyUnit">
						 <div class="imageUnit">
							<a href="#">
							<?php if(!empty($post_user_profile_pic)){ ?>	
								<img src="../images/profile_pic/<?php echo $post_user_profile_pic; ?>" width="32" height="32" alt="">
							<?php
							}else{
								echo '<img src="../images/icon/male.jpg" width="32" height="32" alt="">';
							}
							?>
							</a>
							<p style="float:right; text-align:right;">
								<?php if($_SESSION['hm_id'] == $row['post_hm_id']){?><a href="javascript:;" class="post-fav" id="post_fav_<?php echo $post_id; ?>" title="Add as favourite post"><span class="glyphicon glyphicon-star-empty"></span></a><?php } else{ ?><a href="javascript:;" class="post-save" id="post_save_<?php echo $post_id; ?>" title="Save this post"><span class="glyphicon glyphicon-bookmark"></span></a><?php } ?>  <a href="javascript:;" class="post-more" id="post_more_<?php echo $post_id; ?>" title="More for this post"><span class="glyphicon glyphicon-chevron-down"></span></a> <?php if($_SESSION['hm_id'] != $user_hm_info['hm_id']){?><a href="javascript:;" class="post-report" id="post_report_<?php echo $post_id; ?>" title="Report for this post"><span class="glyphicon glyphicon-exclamation-sign"></span></a><?php } else{ ?> <a href="javascript:;" class="post-edit" id="post_edit_<?php echo $post_id; ?>" title="Edit this post"><span class="glyphicon glyphicon-edit"></span></a><?php } ?> <a href="javascript:;" class="post-hide" id="post_hide_<?php echo $post_id; ?>" title="Hide this post"><span class="glyphicon glyphicon-eye-close"></span></a> <?php if($_SESSION['hm_id'] == $row['post_hm_id']){?><a href="javascript:;" class="post-delete" id="post_delete_<?php echo $post_id; ?>" title="Delete this post"><span class="glyphicon glyphicon-remove"></span></a><?php } ?>
							</p>
							<div class="imageUnit-content">
							   <h4>
								   <a href="pro.php?user_id=<?php echo $row['post_hm_id']/2+5; ?>" style="text-transform:capitalize;"><?php echo $post_hm_name; ?> </a>
								    <?php if($_SESSION['hm_id'] != $row['post_hm_id']){?>
									<a href="javascript:;" onClick="parent.toChat('<?php echo $row['post_hm_id']/2+5; ?>')" title="Chat with <?php echo $post_hm_name; ?>">
										<small><span class="glyphicon glyphicon-envelope"></span></small>
									 </a>
									 <?php } ?>
								   <small style="font-size:11px;"> - <?php echo timeAgo($row['date']);?></small>
							   </h4>
							</div>
						 </div>
						 <div>
							 <div align="center"><br>
								 <h4 class="msg_wrap">
									<?php echo make_clickable(nl2br(stripslashes($row['desc']))); ?>
								 </h4><br>
								 <?php if(!empty($row['vid_url'])) { ?>
								 <iframe width="400" height="300" src="http://www.youtube.com/embed/<?php echo get_youtubeid($row['vid_url']);?>" frameborder="0" allowfullscreen></iframe>
								 <?php } elseif(!empty($row['image_url'])) { ?>
								 <img src="image.php/<?php echo $row['image_url'];?>?width=400&nocache&quality=100&image=/kieton/images/post_pic/<?php echo $row['image_url'];?>">
								 <?php } ?>
							 </div>
							 <br />
							 <a href="javascript:;" class="btn btn-default btn-sm" id="addFriendBtn-<?php echo $post_id; ?>" onClick="addLike(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>)">
							 <?php $like_result = queryMysql("SELECT `like_hm_id` FROM `hm_post_like` WHERE `like_post_id` = $post_id AND `like_hm_id` = $viewer_user_hm_id"); if(mysqli_num_rows($like_result) == 0){ ?>
								<span style="color:#FF0000;" class="glyphicon glyphicon-heart-empty"></span> Like
							<?php } else { ?>
								<span style="color:#FF0000;" class="glyphicon glyphicon-heart"></span> Like
							<?php } ?>
							 </a>
							 <div class="stars">
								<small>Vote&nbsp;</small>
								<?php $vote_result = queryMysql("SELECT `vote_no` FROM `hm_post_vote` WHERE `vote_post_id` = $post_id AND `vote_hm_id` = $viewer_user_hm_id");
									if(mysqli_num_rows($vote_result) == 0){ ?>
								<label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,1)"><span class="glyphicon glyphicon-star-empty"></span> </label>
								<label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,2)"><span class="glyphicon glyphicon-star-empty"></span> </label>
								<label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,3)"><span class="glyphicon glyphicon-star-empty"></span> </label>
								<label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,4)"><span class="glyphicon glyphicon-star-empty"></span> </label>
								<label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,5)"><span class="glyphicon glyphicon-star-empty"></span></label>
								<?php } else{ 
									$vote_row = mysqli_fetch_array($vote_result,MYSQLI_ASSOC);
									$v_no = $vote_row['vote_no'];
									switch ($v_no) {
										case 1:
										?>
										<label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,1)"><span class="glyphicon glyphicon-star"></span> </label>
										<label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,2)"><span class="glyphicon glyphicon-star-empty"></span> </label>
										<label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,3)"><span class="glyphicon glyphicon-star-empty"></span> </label>
										<label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,4)"><span class="glyphicon glyphicon-star-empty"></span> </label>
										<label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,5)"><span class="glyphicon glyphicon-star-empty"></span></label>
										<?php 
											break;
										case 2:
										?>
										<label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,1)"><span class="glyphicon glyphicon-star"></span> </label>
										<label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,2)"><span class="glyphicon glyphicon-star"></span> </label>
										<label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,3)"><span class="glyphicon glyphicon-star-empty"></span> </label>
										<label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,4)"><span class="glyphicon glyphicon-star-empty"></span> </label>
										<label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,5)"><span class="glyphicon glyphicon-star-empty"></span></label>
										<?php 
											break;
										case 3:
										?>
										<label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,1)"><span class="glyphicon glyphicon-star"></span> </label>
										<label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,2)"><span class="glyphicon glyphicon-star"></span> </label>
										<label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,3)"><span class="glyphicon glyphicon-star"></span> </label>
										<label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,4)"><span class="glyphicon glyphicon-star-empty"></span> </label>
										<label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,5)"><span class="glyphicon glyphicon-star-empty"></span></label>
										<?php 
											break;
										case 4:
										?>
										<label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,1)"><span class="glyphicon glyphicon-star"></span> </label>
										<label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,2)"><span class="glyphicon glyphicon-star"></span> </label>
										<label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,3)"><span class="glyphicon glyphicon-star"></span> </label>
										<label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,4)"><span class="glyphicon glyphicon-star"></span> </label>
										<label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,5)"><span class="glyphicon glyphicon-star-empty"></span></label>
										<?php
											break;
										case 5:
										?>
										<label class="star" id="star-1-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,1)"><span class="glyphicon glyphicon-star"></span> </label>
										<label class="star" id="star-2-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,2)"><span class="glyphicon glyphicon-star"></span> </label>
										<label class="star" id="star-3-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,3)"><span class="glyphicon glyphicon-star"></span> </label>
										<label class="star" id="star-4-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,4)"><span class="glyphicon glyphicon-star"></span> </label>
										<label class="star" id="star-5-post-id-<?php echo $post_id; ?>" onClick="addVote(<?php echo $_SESSION['hm_id']/2+5; ?>,<?php echo $post_id; ?>,5)"><span class="glyphicon glyphicon-star"></span></label>
										<?php
											break;
									}
								}
								?>
							</div>
							<!--
							<a href="#" class="btn btn-default btn-sm" onClick="sharePost(<?php echo $_SESSION['hm_id']; ?>,<?php echo $post_id; ?>,5)" id="addFriendBtn">
								Share <span style="color:#00FF00;" class="glyphicon glyphicon-share"></span>
							 </a>-->
							 &nbsp;&nbsp;
							<?php $like_count_result = queryMysql("SELECT `like_hm_id` FROM `hm_post_like` WHERE `like_post_id` = $post_id"); ?>
							<a href="javascript:;" id="like_count-<?php echo $post_id; ?>"><?php if($l_c = mysqli_num_rows($like_count_result) != 0){ ?><span><?php echo $l_c; ?> </span><span style="color:#FF0000;" class="glyphicon glyphicon-heart"></span><?php }?></a> &nbsp;
							<?php $vote_count_result = queryMysql("SELECT `vote_hm_id` FROM `hm_post_vote` WHERE `vote_post_id` = $post_id"); ?>
							<a href="javascript:;" id="vote_count-<?php echo $post_id; ?>">
								<?php 
								if(mysqli_num_rows($vote_count_result) != 0){ 
									$vote_avg_result = queryMysql("SELECT AVG(vote_no) AS vote_avg FROM `hm_post_vote` WHERE `vote_post_id` = $post_id"); 
									$vote_avg_row = mysqli_fetch_array($vote_avg_result,MYSQLI_ASSOC); 
									$p_v_avg = $vote_avg_row['vote_avg'];
								?>
							<span><?php echo number_format($p_v_avg, 1, '.', ''); ?>  </span><span style="color:#80BFFF" class="glyphicon glyphicon-star"></span><?php }?></a> &nbsp;
							<!--<a href="javascript:;"> 5 <span id="share_count" class="glyphicon glyphicon-share"></span></a>-->
						 </div>
					  </div>
					  <div class="activity-comments">
						 <ul id="CommentPosted<?php echo $post_id; ?>">
							<?php 
							   //fetch comments from comments table using post id
							   $comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `cpid`= $post_id ORDER BY `cid` ASC ");
							   $total_comments = mysqli_num_rows($comments);
							   ?>
							<li class="show-all" id="show-all-<?php echo $post_id; ?>" <?php if($total_comments == 0) { ?> style="display:none" <?php } ?>><a href="javascript:;"><span id="comment_count_<?php echo $post_id;?>"><?php echo $total_comments;?></span> comments</a></li>
							<?php 
							   while($comt = mysqli_fetch_array($comments,MYSQLI_ASSOC)) {
								$comment_id = $comt['cid']; 
								
								if($comt['cmt_hm_id'] == $user_hm_id){
								
							   ?>
							<li id="li-comment-<?php echo $comment_id; ?>">
							   <div class="acomment-avatar">
								  <a href="#" rel="nofollow">
								  <?php if(!empty($user_profile_pic)){ ?>	
								  <img src="../images/profile_pic/<?php echo $user_profile_pic; ?>" alt="Avatar Image" >
								  <?php
									}else{
										echo '<img src="../images/icon/male.jpg" alt="Avatar Image">';
									}
									?>
								  </a>
								  <p style="float:right; text-align:right; font-size:10px;"><a href="javascript:;" rel="<?php echo $post_id; ?>" class="comment-delete" id="comment_delete_<?php echo $comment_id; ?>">X</a></p>
							   </div>
							   <div class="acomment-meta">
								  <a href="pro.php?user_id=<?php echo $user_hm_id/2+5; ?>"><?php echo $hm_name; ?></a>  <?php echo timeAgo($comt['commented_date']);?> 
							   </div>
							   <div class="acomment-content">
								  <pre class="msg_wrap"><?php echo parse_smileys(make_clickable(nl2br(stripslashes($comt['comment']))), $smiley_folder); ?></pre>
							   </div>
							   <br>
							</li>
							<?php 
							   } else {
								$cmt_hm_info = profileInfo($comt['cmt_hm_id']);
								$cmt_user_first_name = $cmt_hm_info['first_name'];
								$cmt_user_last_name = $cmt_hm_info['last_name'];
								$cmt_user_profile_pic = $cmt_hm_info['profile_pic'];
								$cmt_hm_name = $cmt_user_first_name . " " . $cmt_user_last_name;
							   
							   ?>
							<li id="li-comment-<?php echo $comment_id; ?>">
							   <div class="acomment-avatar">
								  <a href="#" rel="nofollow">
								  <?php if(!empty($cmt_user_profile_pic)){ ?>	
								  <img src="../images/profile_pic/<?php echo $cmt_user_profile_pic; ?>" alt="Avatar Image" >
								  <?php
									}else{
										echo '<img src="../images/icon/male.jpg" alt="Avatar Image">';
									}
									?>
								  </a>
								  <p style="float:right; text-align:right; font-size:10px;"><a href="javascript:;" rel="<?php echo $post_id; ?>" class="comment-delete" id="comment_delete_<?php echo $comment_id; ?>">X</a></p>
							   </div>
							   <div class="acomment-meta">
								  <a href="pro.php?user_id=<?php echo $comt['cmt_hm_id']/2+5; ?>"><?php echo $cmt_hm_name; ?></a>  <?php echo timeAgo($comt['commented_date']);?> 
							   </div>
							   <div class="acomment-content">
								  <pre class="msg_wrap"><?php echo parse_smileys(make_clickable(nl2br(stripslashes($comt['comment']))), $smiley_folder); ?></pre>
							   </div>
							   <br>
							</li>
							<?php
							   }
							   }
							   
							   ?>
						 </ul>
						 <a href="javascript:;" class="acomment-reply" title="" id="acomment-comment-<?php echo $post_id; ?>">
						 Write a comment..</a>
						 <form  method="post" id="fb-<?php echo $post_id; ?>" class="ac-form">
							<div class="ac-reply-avatar">
							<?php if(!empty($viewer_user_profile_pic)){ ?>	
							<img src="../images/profile_pic/<?php echo $viewer_user_profile_pic; ?>" width="30" height="30" alt="Avatar Image">
							<?php
							}else{
								echo '<img src="../images/icon/male.jpg" width="30" height="30" alt="Avatar Image">';
							} ?>
							</div>
							<div class="ac-reply-content">
							   <div class="ac-textarea">
								  <textarea id="ac-input-<?php echo $post_id; ?>" class="ac-input" name="comment" style="height:40px;"></textarea>
								  <input type="hidden" id="act-id-<?php echo $post_id; ?>" name="act_id" value="<?php echo $post_id; ?>" />
								  <input type="hidden" name="user_hm_id" id="user_hm_id" value="<?php echo $viewer_user_hm_id; ?>">
							   </div>
							   <input name="ac_form_submit" class="uibutton confirm live_comment_submit" title="fb-<?php echo $post_id; ?>" id="comment_id_<?php echo $post_id; ?>" type="button" value="Submit"> &nbsp; or <a href="javascript:;" class="comment_cancel" id="<?php echo $post_id; ?>">Cancel</a>			
							</div>
						 </form>
					  </div>
					  <!-- / Units -->
				   </div>
				</li>
				<?php  
				}
			}
		}
	  }
   }
?>

