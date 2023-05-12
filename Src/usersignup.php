<!DOCTYPE html>
<html lang="en">
<?php



?>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SignUp Phase I</title>
	<meta name="description" content="Custom Login Form Styling with CSS3" />
	<meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="images/hlogo.png">
	<link rel="stylesheet" type="text/css" href="css/style1.css" />
	<link rel="stylesheet" type="text/css" href="css/style-login.css" />
	<script src="js/modernizr.custom.63321.js"></script>

</head>

<body class="login-page">
<div class="login-box">
        <h2 class="heading-login-box">Sign Up: I</h2>
        <form method="post" action="" autocomplete="off">
            <div class="user-box">
                <input class="user-box-input" type="text" name="txtFirstName"  title="Your First Name" required>
                <label class="user-box-label">First Name</label>
            </div>
            <div class="user-box">
                <input class="user-box-input" type="text" name="txtLastName"  title="Your Last Name"  required>
                <label class="user-box-label">Last Name</label>
            </div>
			<div class="user-box">
                <input class="user-box-input" type="text" name="txtUserName"  title="UserName"  required>
                <label class="user-box-label">Username</label>
            </div>
			<div class="user-box">
                <input class="user-box-input" type="password" name="txtPassword"  title="Password"  required>
                <label class="user-box-label">Password</label>
            </div>
			<div class="user-box">
                <input class="user-box-input" type="password" name="txtConfirmPassword"  title="Password"  required>
                <label class="user-box-label">Comfirm Password</label>
            </div>
			<div class="user-box">
                <input class="user-box-input" type="text" name="txtEmail"  title="Your Email Address"  required>
                <label class="user-box-label">Email Address</label>
            </div>
			<div class="user-box">
                <input class="user-box-input" type="text" name="txMobile"  title="Your Mobile Number" required
						maxlength="10">
                <label class="user-box-label">Mobile Number</label>
            </div>
			<div class="user-box">
                <input class="user-box-input" name="txtAddress" required rows="3" cols="32">
                <label class="user-box-label">Address</label>
            </div>
			<p class="field">
					Gender:&nbsp;&nbsp;&nbsp;<select name="cmbGender" title="Select Gender" required="required">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</p>
			<div style="padding-top: 10px">
            <a title="Already a member?" href="userlogin.php"  style="background-color: black; color : aliceblue; " onmouseover="this.style.backgroundColor='black';" onmouseout="this.style.backgroundColor='black';" ><i>Already a member? Sign In</i></a></strong></div>
            <p class="submit" style="align-items: center; display: flex; margin-left: 36%; margin-top:20px">
                    <button style="opacity:1 ;color:'black'; width:90px;height:30px; align:centre; border-radius: 10%"type="submit" name="submit" title="Sign Up">Submit</button>
                </p>
        </form>
    </div>
	<div class="container">

        <!-- Codrops top bar -->
        <div class="top" style = "background-color : black; padding : 13px  0;">
            <a href="index.php" style= "color: aliceblue">
                <strong>&laquo; Return to Lost and Found </strong>
            </a>
        </div>
        <header>

            <div class="support-note">
                <span class="note-ie">Sorry, only modern browsers.</span>
            </div>
            
        </header>


	
	</div>
</body>

</html>
<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "phpmailer/src/Exception.php";
require "phpmailer/src/PHPMailer.php";
require "phpmailer/src/SMTP.php";

if (!isset($_SESSION)) {
	session_start();
}
include('config.php');
if (
	isset($_POST['txtFirstName']) and isset($_POST['txtLastName']) and isset($_POST['txtUserName']) and
	isset($_POST['txtPassword']) and isset($_POST['txtConfirmPassword']) and isset($_POST['txtEmail']) and
	isset($_POST['txMobile']) and isset($_POST['cmbGender']
) and isset($_POST['txtAddress'])
) {

	$firstname = $_POST['txtFirstName'];
	$lastname = $_POST['txtLastName'];
	$username = $_POST['txtUserName'];
	$email = addslashes($_POST['txtEmail']);
	$password = addslashes(sha1($_POST['txtPassword']));
	$confirmPassword = addslashes(sha1($_POST['txtConfirmPassword']));
	$mobile = $_POST['txMobile'];
	$gender = $_POST['cmbGender'];
	$address = $_POST['txtAddress'];
	$passchars = strlen($password);
	$confirmcode = rand(1000, 9999);
	$querysel = "select emailID from usermaster where EmailID='{$email}'";
	$querysel2 = "select MobileNumber from usermaster where MobileNumber='{$mobile}'";
	$resultsel = mysqli_query($con, $querysel) or die(mysqli_error($con));
	$resultsel2 = mysqli_query($con, $querysel2) or die(mysqli_error($con));
	//mail Confirmation code		

	if (mysqli_num_rows($resultsel) == 0) {
		if (mysqli_num_rows($resultsel2) == 0) {
			if ($passchars >= 6) {
				if ($password == $confirmPassword and $confirmPassword == $password) {
					$query = "Insert into usermaster(FirstName,LastName,UserName,Password,EmailID,MobileNumber,Gender,Address1,ConfirmationCode) values('{$firstname}','{$lastname}','{$username}','{$password}','{$email}','{$mobile}','{$gender}','{$address}','{$confirmcode}')";
					$result = mysqli_query($con, $query) or die(mysqli_error($con));
					
					
					if ($result) {
						$mail = new PHPMailer(true);

						$mail->isSMTP();
						$mail->Host = "smtp.gmail.com";
						$mail->SMTPAuth = true;
						$mail->Username = "kumari.21@iitj.ac.in";
						$mail->Password = "awjtlepcotqlccgx";
						$mail->SMTPSecure = "ssl";
						$mail->Port = 465;
						$mail->setFrom($_POST['txtEmail']);
						$mail->addAddress($_POST['txtEmail']);
						$mail->isHTML(true);
						$mail->Subject = "Confirmation Code";
						$mail->Body = "Your Email Address has been Registered to <a href='http://www.lostandfound.com'>Lost And Found</a><br>Here is your confirmation code:" . $confirmcode . "<br>Your UserName is :  " . $email ;
						$mail->send();
						echo "<script>alert('Sent Successfully')</script>";
						// $from = "Lost and Found";
						// $subject = 'Confirmation Code';
						// $message = "Your Email Address has been Registered to <a href='http://www.lostandfound.com'>Lost And Found</a><br>Here is your confirmation code:" . $confirmcode . "<br>Your UserName is:" . $email . "<br>Password:" . sha1($password);
						// mail($email, $subject, $message);
						$_SESSION['user_signup'] = $email;
						header("location:usersignupcontinue.php");
					} else {
						echo "<center>Something went wrong</center>";
					}
				} else {
					echo "<center>Password Doesn't Matches</center>";
				}
			} else {
				echo "<center>Paasword must 6 to 32 characters long</center>";
			}
		} else {
			echo "<center>Mobile Number is  Already Registered</center>";
		}
	} else {
		echo "<center>Email Already Exists</center>";
	}
} else {

}

?>