<?php
	require_once('class-db.php');
	
	if ( !class_exists('INSERT') ) {
		class INSERT {
			public function update_profile($user_id, $post) {
				global $hm_db;
				
				$table = 'hm_profile';
				
				$query = "
								UPDATE $table
								SET first_name='$post[firstname]', last_name='$post[lastname]', id_proof='$post[idproof]', mobile_no1='$post[mobile1]',
								mobile_no2='$post[mobile2]', address1='$post[address1]', address2='$post[address2]',
								d_o_b='$post[birthyear]-$post[birthmonth]-$post[birthday]', about_me='$post[description]',category='$post[category]',
								pin_code='$post[pin_code]', city='$post[city]', state='$post[state]', country='$post[country]',
								profile_pic='$post[profile_pic]' 
								WHERE id_proof = '$user_id'
							";

				return $hm_db->update($query);
			}
			
			public function add_friend($user_id, $friend_id) {
				global hm_db;
				
				$table = 'hm_buddy';
				
				$query = "
								INSERT INTO $table (user_id, friend_id)
								VALUES ('$user_id', '$friend_id')
							";
				
				return $hm_db->insert($query);
			}
			
			public function remove_friend($user_id, $friend_id) {
				global $hm_db;
				
				$table = 'hm_buddy';
				
				$query = "
								DELETE FROM $table 
								WHERE (user_id = '$user_id' AND friend_id = '$friend_id')
								OR (user_id = '$friend_id' AND friend_id ='$user_id')

							";
				
				return $hm_db->insert($query);
			}
			
			public function add_hm_status() {
				global $hm_db;

				$table = 'hm_status';
				
				$query = "
				
								INSERT INTO $table (user_id, status_time, status_content)
								VALUES ('$user_id', '$post[status_time]', '$post[status_content]')
							";
				
				return $hm_db->insert($query);
			}

			public function add_s_status() {
				global $hm_db;
				
				$table = 's_status';
				
				$query = "
								INSERT INTO $table (shop_id, admin_id, status_time, status_content)
								VALUES ('$shop_id', '$user_id', '$_POST[status_time]', '$_POST[status_content]')
							";
				
				return $hm_db->insert($query);
			}
			
			public function add_s_p_status() {
				global $hm_db;
				
				$table = 's_p_status';
				
				$query = "
								INSERT INTO $table (s_p_id, admin_id, status_time, status_content)
								VALUES ('$s_p_id', '$user_id', '$_POST[status_time]', '$_POST[status_content]')
							";
				
				return $hm_db->insert($query);
			}

			public function hm_send_message() {
				global $hm_db;
				
				$table = 'hm_messages';
				
				$query = "
								INSERT INTO $table (message_time, message_sender_id, message_recipient_id, message_subject, message_content)
								VALUES ('$_POST[message_time]', '$_POST[message_sender_id]', '$_POST[message_recipient_id]', '$_POST[message_subject]', '$_POST[message_content]')
							";
				
				return $hm_db->insert($query);
			}

			public function hm_send_s_message() {
				global $hm_db;
				
				$table = 'hm_s_messages';
				
				$query = "
								INSERT INTO $table (message_time, message_sender_id, message_recipient_id, message_subject, message_content)
								VALUES ('$_POST[message_time]', '$user_id', '$_POST[message_recipient_id]', '$_POST[message_subject]', '$_POST[message_content]')
							";
				
				return $hm_db->insert($query);
			}

			public function hm_send_s_p_message() {
				global $hm_db;
				
				$table = 'hm_s_p_messages';
				
				$query = "
								INSERT INTO $table (message_time, message_sender_id, message_recipient_id, message_subject, message_content)
								VALUES ('$_POST[message_time]', '$user_id', '$_POST[message_recipient_id]', '$_POST[message_subject]', '$_POST[message_content]')
							";
				
				return $hm_db->insert($query);
			}

			public function hm_post() {
				global $hm_db;

				$table = 'hm_post';

				$query = "
								INSERT INTO $table (message_time, message_sender_id, message_recipient_id, message_subject, message_content)
								VALUES ('$_POST[message_time]', '$user_id', '$_POST[message_recipient_id]', '$_POST[message_subject]', '$_POST[message_content]')
							";
				
				return $hm_db->insert($query);
			}
		}
	}
	
	$insert = new INSERT;
?>