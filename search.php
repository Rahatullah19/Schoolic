<?php
require_once('connectvars.php');
	$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if($_POST)
{
$q=$_POST['search'];
$sql="select id,name,email from autocomplete where name like '%$q%' or email like '%$q%' order by id LIMIT 5";
$result= mysqli_query($dbc,$sql);
while($row=mysqli_fetch_array($result))
{
$username=$row['name'];
$email=$row['email'];
$b_username='<strong>'.$q.'</strong>';
$b_email='<strong>'.$q.'</strong>';
$final_username = str_ireplace($q, $b_username, $username);
$final_email = str_ireplace($q, $b_email, $email);
?>
<div class="show" >
<span class="name"><?php echo $final_username; ?></span>&nbsp;<br/><?php echo $final_email; ?><br/>
</div>
<?php
}
}
?>





