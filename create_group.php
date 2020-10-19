<html>
  <head>
    <meta charset="utf-8">
    <title>Profile Update
    </title>
    <link rel="stylesheet" href="build/css/demo.css">
    <script type= "text/javascript" src = "build/countries.js">
    </script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js">
    </script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js">
    </script>
    <script type="text/javascript" src="jquery-1.8.0.min.js">
    </script>
    
    <style type="text/css">
      .content{
        width:278px;
        margin-left: 0px;
      }
      #searchid
      {
        width:278px;
        border:solid 1px #000;
        padding:1px;
        font-size:14px;
      }
      #result
      {
        position:absolute;
        width:278px;
        padding:1px;
        display:none;
        margin-top:-4px;
        border-top:0px;
        overflow:hidden;
        border:1px #CCC solid;
        background-color: white;
      }
      .show
      {
        padding:2px;
        border-bottom:1px #999 dashed;
        font-size:10px;
        height:35px;
      }
      .show:hover
      {
        background:#4c66a4;
        color:#FFF;
        cursor:pointer;
      }
    </style>
  </head>
  <body>
  
    <?php
require_once ('appvars.php');
require_once ('connectvars.php');
require_once ('startsession.php');
require_once ('hm_functions.php');
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_SESSION['hm_id']))
{
    if (isset($_POST['submit']))
    {
        $first_name = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
        $id_proof = mysqli_real_escape_string($dbc, trim($_POST['idproof']));
        $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
        $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
        $mobile_1 = mysqli_real_escape_string($dbc, trim($_POST['mobile2']));
        $description = mysqli_real_escape_string($dbc, trim($_POST['description']));

        if (!empty($first_name) && !empty($id_proof) && !empty($password1) && !empty($password2))
        {
            $email = $id_proof;
            $emailErr = 1;
            if (filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                if ($password1 == $password2)
                {
                    $query = "SELECT * FROM hm_profile WHERE id_proof = '$id_proof'";

                    $data = mysqli_query($dbc, $query);

                    if (mysqli_num_rows($data) == 0)
                    {

                        $now = date("Y-m-d H:i:s");

                        $query = "INSERT INTO hm_profile(hm_id, first_name, id_proof, password, profile_type, mobile_no1, about_me, date_of_join) VALUES" . "( 0, '$first_name', '$id_proof', SHA('$password1'), 5, '$mobile_1', '$description', '$now')";
                        mysqli_query($dbc, $query);

                        $user_id = mysqli_insert_id($dbc);
                        if (!empty($user_id))
                        {
                                $query1 = "INSERT INTO swap(user_id, box_0) VALUES($user_id, 10)";
                                mysqli_query($dbc, $query1);

                                $query2 = "INSERT INTO `chat`(`chat_id`, `sender_id`, `sent_on`, `message`, `reciver_id`, `seen`) VALUES ( 0 , 10, '$now', 'Hello, Welcome to Schoolic. If you need any support chat with me on Schoolic Support.', $user_id, 0)";
                                mysqli_query($dbc, $query2);

                                $now1 = date("l jS \of F Y");
                                $user_hm_id = $user_id;
                                $message = 'Joined Schoolic on <br><br>' . $now1;
                                $image = '';
                                $video = '';
                                $query3 = "INSERT INTO `posts` (`post_hm_id`, `desc`, `image_url`, `vid_url`,`date`,`special`) VALUES ('$user_hm_id', '$message', '$image', '$video', '$now', 1)";
                                mysqli_query($dbc, $query3);
                        }
                    }
                    else
                    {
                        echo '<div class="alert alert-danger" align="center"><strong>An <b>account already exits</b> for this E-mail address. Please use a different address.</strong></div>';
                        $id_proof = "";
                    }
                    $query1 = "SELECT hm_id, id_proof FROM hm_profile WHERE id_proof = '$id_proof'";

                    $data1 = mysqli_query($dbc, $query1);
                    if (mysqli_num_rows($data1) == 1)
                    {
                        $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Work%20Space/Schoolic/group_confirmation.php';
                        header('Location: ' . $home_url);
                        mysqli_close($dbc);
                        exit();
                    }
                }
                else
                {
                echo '<div class="alert alert-danger" align="center">You must enter the <b>same password</b> twice.</div>';
                }
            }
            else
            {
                echo '<div class="alert alert-danger" align="center">You must enter a <b>valid Email format</b>.</div>';
            }
        }
        else
        {
            echo '<div class="alert alert-danger" align="center">You must enter <b>all</b> of the signup data.</div>';
        }
    }
    $hm_info = profileInfo($_SESSION['hm_id']);
}
?>

    <div style="margin:20px;" align="center">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" title="All the input fields with Astric ( * ) mark are compulsory" autocomplete="off" target="_parent">
        <fieldset style="border:solid; border-width:2px; border-color:#39F; border-radius:13px; box-shadow:2px 4px 9px #FFFFFF; background-color:#D7E4FF; opacity:0.8; margin-top:-5px; width:600px;">
          <legend>
            <h2>Create a Group Page
            </h2>
          </legend>
          <br>
          <table>
            <tr>
              <td>
                <label for="Name">Group Name:*
                </label>
              </td>
              <td align="right">
                <input type="text" name="firstname" id="name" maxlength="50" placeholder="Name" style="width:250px" autofocus required>
              </td>
            </tr>
            <tr>
            </tr>
            <tr>
              <td align="left">
                <label for="email-id">Email-Id:*
                </label>
              </td>
              <td align="right">
                <input type="email" name="idproof" id="idproof" size="25" title="Enter a valid Email Address. " placeholder="Email Address" style="width:250px" required>
              </td>
            </tr>
            <tr>
            </tr>
            <tr>
              <td align="left">
                <label for="password">Password:*
                </label>
              </td>
              <td align="right">
                <input type="password" name="password1" id="password" title="Enter a password for this Group" placeholder="Password for Group" style="width:250px" required>
              </td>
            </tr>
            <tr>
            </tr>
            <tr>
              <td align="left">
                <label for="confirm_password">Confirm Password:*
                </label>
              </td>
              <td align="right">
                <input type="password" name="password2" id="password" title="Enter a Confirm password for this Group" placeholder="Confirm Password for Group" style="width:250px" required>
              </td>
            </tr>
            <tr>
            </tr>
          </table>
          <br>
          <fieldset style="border:solid; border-width:1.5px; border-color:#69F; border-radius:9px; background-color:#E6EEFF; opacity:0.8; margin-top:-5px;">
            <legend>
              <h3>More Info (Below fields are optional)
              </h3>
            </legend>
            <br>
            <table>
              <tr>
                <td align="left">
                  <label for="mobile2">
                    <br>Mobile No. (If any):
                  </label>
                </td>
                <td align="left">
                  <input name="mobile2" id="phone2" type="tel" title="Enter your secondary mobile number. So, that you will be contacted on this in case emergency" placeholder="Another Mobile No. (Optional)" maxlength="11" minlegth="11" style="margin-top:10px; width:250px;" >
                </td>
              </tr>
              <tr>
              </tr>
              <tr>
                <td align="left">
                  <label for="description">Give description about your Group:
                  </label>
                </td>
                <td align="left">
                  <input name="description" type="input" id="descript" title="It will be helpfull for profile visitors to identify your group." placeholder="Briefly discribe about your group." maxlength="100" style="margin-top:10px; width:250px;" >
                </td>
              </tr>
            </table>
          </fieldset>
        </fieldset>
        
        <br>
        <p align="center">
          <button type="reset" style="background-color:#FFF; color:#666; border:solid; border-width:1px; border-color:#999;"> &nbsp;&nbsp;&nbsp;&nbsp;Reset&nbsp;&nbsp;&nbsp;&nbsp; 
          </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <button name="submit" type="submit" value="Submit!" > Submit 
          </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <a href="timeline/kieton.php" style="text-decoration:none;" >
            <button type="button" style="background-color:#FFF; color:#666; border:solid; border-width:1px; border-color:#999;"> Cancel 
            </button>
          </a>
        </pt>
    </div>
    </form>
  </div>
</body>
</html>
