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
require_once('appvars.php');
require_once('connectvars.php');
require_once('startsession.php');
require_once('hm_functions.php');
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if (isset($_SESSION['hm_id'])) {
if(isset($_POST['submit'])){
$first_name = mysqli_real_escape_string($dbc,trim($_POST['firstname']));
$last_name = mysqli_real_escape_string($dbc,trim($_POST['lastname']));
$id_proof = mysqli_real_escape_string($dbc,trim($_POST['idproof']));
$mobile_1 = mysqli_real_escape_string($dbc,trim($_POST['mobile1']));
$profile_pic = mysqli_real_escape_string($dbc,trim($_FILES['profile_pic']['name']));
$profile_pic_type = mysqli_real_escape_string($dbc,trim($_FILES['profile_pic']['type']));
$profile_pic_size = mysqli_real_escape_string($dbc,trim($_FILES['profile_pic']['size'])); 
$day_of_birth = mysqli_real_escape_string($dbc,trim($_POST['birthday']));
$month_of_birth = mysqli_real_escape_string($dbc,trim($_POST['birthmonth']));
$year_of_birth = mysqli_real_escape_string($dbc,trim($_POST['birthyear']));
$mobile_2 = mysqli_real_escape_string($dbc,trim($_POST['mobile2']));
$description = mysqli_real_escape_string($dbc,trim($_POST['description']));
$address_1 = mysqli_real_escape_string($dbc,trim($_POST['address1']));
$address_2 = mysqli_real_escape_string($dbc,trim($_POST['address2']));
$city = mysqli_real_escape_string($dbc,trim($_POST['city']));
$country = mysqli_real_escape_string($dbc,trim($_POST['country']));
$state = mysqli_real_escape_string($dbc,trim($_POST['state']));
if(!empty($first_name) && !empty($last_name) && !empty($id_proof) && !empty($mobile_1) && !empty($address_1) && !empty($address_2) && !empty($city) && !empty($country) && !empty($state)){
if ((trim($_FILES['profile_pic']['name']) !== "" ) && (trim($_FILES['profile_pic']['size']) !== 0 )){
if ((($profile_pic_type == 'image/gif') || ($profile_pic_type == 'image/jpeg') || ($profile_pic_type == 'image/pjpeg') || ($profile_pic_type == 'image/png')) && ($profile_pic_size > 0) && ($profile_pic_size <= HM_MAXFILESIZE)) {
if ($_FILES['profile_pic']['error'] == 0) {
// Move the file to the target upload folder
$target = HM_UPLOADPATH . $profile_pic;
if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target)) {
$query1 = "UPDATE hm_profile SET first_name = '$first_name', last_name = '$last_name',
mobile_no1 = '$mobile_1', mobile_no2 = '$mobile_2', address1 = '$address_1', address2 = '$address_2',
d_o_b = '$year_of_birth-$month_of_birth-$day_of_birth', about_me = '$description', 
profile_pic = '$profile_pic', city = '$city', state = '$state', country = '$country' WHERE hm_id = '" . $_SESSION['hm_id'] . "' ";
mysqli_query($dbc, $query1);
$error_msg = "";
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Work%20Space/Schoolic/timeline/kieton.php';
header('Location: ' . $home_url);
mysqli_close($dbc);
exit();	
}
else {
echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
}
}
}
else {
echo '<p class="error">The screen shot must be a GIF, JPEG, or PNG image file no greater than ' . (HM_MAXFILESIZE / 1024) . ' KB in size.</p>';
}
// Try to delete the temporary screen shot image file
@unlink($_FILES['profile_pic']['tmp_name']);
}
else{
$query2 = "UPDATE hm_profile SET first_name = '$first_name', last_name = '$last_name',
mobile_no1 = '$mobile_1', mobile_no2 = '$mobile_2', address1 = '$address_1', address2 = '$address_2',
d_o_b = '$year_of_birth-$month_of_birth-$day_of_birth', about_me = '$description', 
city = '$city', state = '$state', country = '$country' WHERE id_proof = '" . $_SESSION['id_proof'] . "' ";
mysqli_query($dbc, $query2);
$error_msg = "";
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/Work%20Space/Schoolic/timeline/kieton.php';
header('Location: ' . $home_url);
mysqli_close($dbc);
exit();	
}
}
else{
echo'<p class="error">You must enter <b>all of the required</b> (field with astric*) profile data.<?p>';
}
}		
$hm_info = profileInfo($_SESSION['hm_id']);
}
?>








    <div style="margin:20px;" align="center">
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data" title="All the input fields with Astric ( * ) mark are compulsory" autocomplete="off" target="_parent">
        <fieldset style="border:solid; border-width:2px; border-color:#39F; border-radius:13px; box-shadow:2px 4px 9px #FFFFFF; background-color:#D7E4FF; opacity:0.8; margin-top:-5px; width:600px;">
          <legend>
            <h2>Personal
            </h2>
          </legend>
          <br>
          <table>
            <tr>
              <td>
                <label for="Name">First Name:*
                </label>
              </td>
              <td align="right">
                <input type="text" name="firstname" id="firstname" value="<?php echo $hm_info['first_name']; ?>" maxlength="50" placeholder="Firstname" style="width:250px" autofocus required>
              </td>
            </tr>
            <tr>
            </tr>
            <tr>
              <td align="left">
                <label for="Name">Last Name:*
                </label>
              </td>
              <td align="right">
                <input type="text" name="lastname" id="lastname" value="<?php echo $hm_info['last_name']; ?>" maxlength="50" placeholder="Lastname" style="width:250px" required>
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
                <input type="email" name="idproof" value="<?php echo $hm_info['id_proof']; ?>" id="idproof" size="25" title="Enter a valid Email Address. So, that it will be helpfull to drop a Email regarding any notification" placeholder="Email Address" style="width:250px" required>
              </td>
            </tr>
            <tr>
            </tr>
            <tr>
              <td align="left">
                <label for="Mno">Mobile No.:*
                </label>
              </td>
              <td align="left">
                <input name="mobile1" id="phone" type="tel" value="<?php echo $hm_info['mobile_no1']; ?>" title="Enter a valid Mobile number. So, that it will be helpfull to contact you." minlegth="11" maxlength="11" placeholder="Mobile No." style="width:250px;" required>
              </td>
            </tr>
            <tr>
            </tr>
          </table>
          <br>
          <fieldset style="border:solid; border-width:1.5px; border-color:#69F; border-radius:9px; background-color:#E6EEFF; opacity:0.8; margin-top:-5px;">
            <legend>
              <h3>More Info
              </h3>
            </legend>
            <br>
            <table>
              <tr>
                <td>
                  <label for="profile_pic">Upload your Profile picture:
                  </label>
                </td>
                <td align="right" style="width:221px;">
                  <img id="blah" src="images/profile_pic/<?php echo $hm_info['profile_pic']; ?>" style="border-radius:10px; margin:8px;" width="100px" />
                  <input type='file' name="profile_pic" name="files[0]" id="profilepic" onchange="readURL(this);" style="border-color:#FFF; margin-bottom:10px;" title="Upload your profile picture"/>
                </td>
              </tr>
              <tr>
              </tr>
              <tr>
                <td align="left">
                  <label for="dob">Date of Birth:
                  </label>
                </td>
                <td align="right">
                  <span name="dateofbirth" >
                    <select name="birthday" id="day" title="Day"  style="width:53px; height:25px;" >
                      <option value="0" selected="1">Day
                      </option>
                      <option value="01">1
                      </option>
                      <option value="02">2
                      </option>
                      <option value="03">3
                      </option>
                      <option value="04">4
                      </option>
                      <option value="05">5
                      </option>
                      <option value="06">6
                      </option>
                      <option value="07">7
                      </option>
                      <option value="08">8
                      </option>
                      <option value="09">9
                      </option>
                      <option value="10">10
                      </option>
                      <option value="11">11
                      </option>
                      <option value="12">12
                      </option>
                      <option value="13">13
                      </option>
                      <option value="14">14
                      </option>
                      <option value="15">15
                      </option>
                      <option value="16">16
                      </option>
                      <option value="17">17
                      </option>
                      <option value="18">18
                      </option>
                      <option value="19">19
                      </option>
                      <option value="20">20
                      </option>
                      <option value="21">21
                      </option>
                      <option value="22">22
                      </option>
                      <option value="23">23
                      </option>
                      <option value="24">24
                      </option>
                      <option value="25">25
                      </option>
                      <option value="26">26
                      </option>
                      <option value="27">27
                      </option>
                      <option value="28">28
                      </option>
                      <option value="29">29
                      </option>
                      <option value="30">30
                      </option>
                      <option value="31">31
                      </option>
                    </select>&nbsp;
                    <select name="birthmonth" id="month" title="Month" style="width:91px; height:25px;">
                      <option value="0" selected="1">Month
                      </option>
                      <option value="01">January
                      </option>
                      <option value="02">February
                      </option>
                      <option value="03">March
                      </option>
                      <option value="04">April
                      </option>
                      <option value="05">May
                      </option>
                      <option value="06">June
                      </option>
                      <option value="07">July
                      </option>
                      <option value="08">August
                      </option>
                      <option value="09">September
                      </option>
                      <option value="10">October
                      </option>
                      <option value="11">November
                      </option>
                      <option value="12">December
                      </option>
                    </select>&nbsp;
                    <select name="birthyear" id="year" title="Year" style="width:73px; height:25px;" >
                      <option value="0" selected="1">Year
                      </option>
                      <option value="2020">2020
                      </option>
                      <option value="2019">2019
                      </option>
                      <option value="2018">2018
                      </option>
                      <option value="2017">2017
                      </option>
                      <option value="2016">2016
                      </option>
                      <option value="2015">2015
                      </option>
                      <option value="2014">2014
                      </option>
                      <option value="2013">2013
                      </option>
                      <option value="2012">2012
                      </option>
                      <option value="2011">2011
                      </option>
                      <option value="2010">2010
                      </option>
                      <option value="2009">2009
                      </option>
                      <option value="2008">2008
                      </option>
                      <option value="2007">2007
                      </option>
                      <option value="2006">2006
                      </option>
                      <option value="2005">2005
                      </option>
                      <option value="2004">2004
                      </option>
                      <option value="2003">2003
                      </option>
                      <option value="2002">2002
                      </option>
                      <option value="2001">2001
                      </option>
                      <option value="2000">2000
                      </option>
                      <option value="1999">1999
                      </option>
                      <option value="1998">1998
                      </option>
                      <option value="1997">1997
                      </option>
                      <option value="1996">1996
                      </option>
                      <option value="1995">1995
                      </option>
                      <option value="1994">1994
                      </option>
                      <option value="1993">1993
                      </option>
                      <option value="1992">1992
                      </option>
                      <option value="1991">1991
                      </option>
                      <option value="1990">1990
                      </option>
                      <option value="1989">1989
                      </option>
                      <option value="1988">1988
                      </option>
                      <option value="1987">1987
                      </option>
                      <option value="1986">1986
                      </option>
                      <option value="1985">1985
                      </option>
                      <option value="1984">1984
                      </option>
                      <option value="1983">1983
                      </option>
                      <option value="1982">1982
                      </option>
                      <option value="1981">1981
                      </option>
                      <option value="1980">1980
                      </option>
                      <option value="1979">1979
                      </option>
                      <option value="1978">1978
                      </option>
                      <option value="1977">1977
                      </option>
                      <option value="1976">1976
                      </option>
                      <option value="1975">1975
                      </option>
                      <option value="1974">1974
                      </option>
                      <option value="1973">1973
                      </option>
                      <option value="1972">1972
                      </option>
                      <option value="1971">1971
                      </option>
                      <option value="1970">1970
                      </option>
                      <option value="1969">1969
                      </option>
                      <option value="1968">1968
                      </option>
                      <option value="1967">1967
                      </option>
                      <option value="1966">1966
                      </option>
                      <option value="1965">1965
                      </option>
                      <option value="1964">1964
                      </option>
                      <option value="1963">1963
                      </option>
                      <option value="1962">1962
                      </option>
                      <option value="1961">1961
                      </option>
                      <option value="1960">1960
                      </option>
                      <option value="1959">1959
                      </option>
                      <option value="1958">1958
                      </option>
                      <option value="1957">1957
                      </option>
                      <option value="1956">1956
                      </option>
                      <option value="1955">1955
                      </option>
                      <option value="1954">1954
                      </option>
                      <option value="1953">1953
                      </option>
                      <option value="1952">1952
                      </option>
                      <option value="1951">1951
                      </option>
                      <option value="1950">1950
                      </option>
                    </select>
                  </span>
                </td>
              </tr>
              <tr>
              </tr>
              <tr>
                <td align="left">
                  <label for="mobile2">
                    <br>Second Mobile No:
                  </label>
                </td>
                <td align="left">
                  <input name="mobile2" id="phone2" type="tel" value="<?php echo $hm_info['mobile_no2']; ?>" title="Enter your secondary mobile number. So, that you will be contacted on this in case emergency" placeholder="Another Mobile No. (Optional)" maxlength="11" minlegth="11" style="margin-top:10px; width:233px;" >
                </td>
              </tr>
              <tr>
              </tr>
              <tr>
                <td align="left">
                  <label for="description">Give your Description:
                  </label>
                </td>
                <td align="left">
                  <input name="description" type="input" value="<?php echo $hm_info['about_me']; ?>" id="descript" title="It will be helpfull for profile visitors to identify you." placeholder="Briefly discribe about yourself." maxlength="100" style="margin-top:10px; width:233px;" >
                </td>
              </tr>
            </table>
          </fieldset>
        </fieldset>
        <br>
        <fieldset style="border:solid; border-width:2px; border-color:#39F; border-radius:13px; box-shadow:2px 4px 9px #FFFFFF; background-color:#D7E4FF; opacity:0.8; width:600px;">
          <legend>
            <h2>Address
            </h2>
          </legend>
          <br>
          <table>
            <tr>
              <td>
                <label>Address:*
                </label>
              </td>
              <td>
                <input name="address1" type="text" value="<?php echo $hm_info['address1']; ?>" title="Street address, P.O. box, C/O" placeholder="Street address, P.O. box, C/O" style="width:278px;" required>
              </td>
            </tr>
            <tr>
            </tr>
            <tr>
              <td>
                <label>Address(Continued from above):*
                </label>
              </td>
              <td>
                <input name="address2" type="text" value="<?php echo $hm_info['address2']; ?>" title="Apartment, Suit, Unit, Building, Floor, etc" placeholder="Apartment,Suit,Unit,Building,Floor,etc" style="width:278px;" required>
              </td>
            </tr>
            <tr>
            </tr>
            <tr>
              <td>
                <label>City:*
                </label>
              </td>
              <td>
                <input name="city" type="text" value="<?php echo $hm_info['city']; ?>" placeholder="City in which you live."  style="width:278px;" required>
              </td>
            </tr>
            <tr>
            </tr>
            <tr>
              <td>
                <label>Select Country:*
                </label>
              </td>
              <td>
                <select name ="country" id="country"  value="<?php echo $hm_info['country']; ?>" size="1.5" style="height:33px; width:278px;" required>
                </select>
                <br>
              </td>
            </tr>
            <tr>
            </tr>
            <tr>
              <td>
                <label>Select State/Privince:*
                </label>
              </td>
              <td>
                <select name ="state" id ="state" value="<?php echo $hm_info['state']; ?>" size="1.5" style="height:33px; width:278px;" required>
                </select>
              </td>
            </tr>
            <script language="javascript">
              populateCountries("country", "state");
            </script>
          </table>
        </fieldset>
        <br>
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
