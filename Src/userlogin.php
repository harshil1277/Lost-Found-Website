<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn to You Account</title>
    <meta name="description" content="Custom Login Form Styling with CSS3" />
    <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="images/hlogo.png">
    <link rel="stylesheet" type="text/css" href="css/style1.css" />
    <link rel="stylesheet" href="css/style-login.css">
    <script src="js/modernizr.custom.63321.js"></script>
    <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
</head>

<body class="login-page">

<div class="login-box">
        <h2 class="heading-login-box">Login</h2>
        <form method="post" action="" autocomplete="off">
            <div class="user-box">
                <input class="user-box-input" type="text" name="txtUserName"  title="UserName" required>
                <label class="user-box-label">Email Address</label>
            </div>
            <div class="user-box">
                <input class="user-box-input" type="password" name="txtPassword"  title="Password"  required>
                <label class="user-box-label">Password</label>
            </div>
            <div style="padding-top: 10px">
            <a title="Not a Member?" href="usersignup.php"  style="background-color: black; ; color : aliceblue;" onmouseover="this.style.backgroundColor='black';" onmouseout="this.style.backgroundColor='black';" >Not a member?SignUp</a></strong></div>
            <p class="submit" style="align-items: center; display: flex; margin-left: 36%; margin-top:20px">
                    <button style="opacity:1 ;color:black; width:90px;height:30px; align:centre; border-radius: 10%"type="submit" name="submit" title="Log In">Submit</button>
                </p>
        </form>
    </div>

    <div class="container">

        <!-- Codrops top bar -->
        <div class="top" style = "background-color : black; padding : 13px  0;">
            <a href="index.php" style="background-color: black; ; color : aliceblue;" onmouseover="this.style.backgroundColor='black';" onmouseout="this.style.backgroundColor='black';">
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
	session_start();
	include('config.php');
	if(isset($_POST['txtUserName']) and isset($_POST['txtPassword']))
	{
		
		$username=addslashes($_POST['txtUserName']);
		$password=addslashes(sha1($_POST['txtPassword']));
		
		$query="SELECT * FROM usermaster WHERE EmailID='$username' and Password='$password'";
		$result=mysqli_query($con,$query)  or die(mysqli_error($con));
		$row=mysqli_fetch_array($result);
		
		$count=mysqli_num_rows($result);
			if($count==1)
			{															
				if($result!="")
				{
					$_SESSION['login_user']=$username;
					header("location: home.php");
				}
			}
			else
			{
				echo "<center><p>UserName or Password is wrong. Not yet signed up?</p></center>";
                
			}
		}
			
	
?>