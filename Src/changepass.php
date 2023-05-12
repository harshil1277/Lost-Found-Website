<!DOCTYPE html>
<html>

<head>
    <?php
			include('loginvarifier.php');
?>
    <title>Change Password</title>
    <link rel="shortcut icon" href="images/hlogo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="css/style2.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo2.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style-login.css" />
</head>

<body class="login-page">



    <div class="container">
        <!-- freshdesignweb top bar -->
        <div class="freshdesignweb-top" style="padding: 20px 10px">
            <a href="home.php" target="" style="background-color:none " onmouseover="this.style.backgroundColor='transparent';" onmouseout="this.style.backgroundColor='transparent';" ><b style="text-shadow: none;
    color: aliceblue;">Home</b></a>
            <a href="editprofile.php" target="" style="background-color:none " onmouseover="this.style.backgroundColor='transparent';" onmouseout="this.style.backgroundColor='transparent';" ><b style="text-shadow: none;
    color: aliceblue;">Edit Profile</b></a>


            <span class="right">
                <a href="logout.php  style="background-color:none " onmouseover="this.style.backgroundColor='transparent';" onmouseout="this.style.backgroundColor='transparent';" >
                    <strong style="text-shadow: none;
    color: aliceblue;">LogOut(<?php echo $login_session; ?>)</strong>
                </a>
            </span>
            <div class="clr"></div>
        </div>

        

        </div>
    </div>
	<div class="login-box">
	<h1 class="heading-login-box" style="font-size:23px">Change Password</h1>
        <form method="post" action="" autocomplete="off">
            <div class="user-box">
                <input class="user-box-input" name="txtCurrentPass" required tabindex="1" type="password" title="Current Password">
                <label class="user-box-label">Current Password</label>
            </div>
            <div class="user-box">
                <input class="user-box-input" name="txtNewPass" required tabindex="2" type="password" title="New Password">
                <label class="user-box-label">New Password</label>
            </div>
			<div class="user-box">
                <input class="user-box-input" name="txtConfirmPass" required tabindex="2" type="password" title="Confirm Password">
                <label class="user-box-label">Repeat Password</label>
            </div>
			
			
			
            <p class="submit" style="align-items: center; display: flex; margin-left: 36%; margin-top:20px">
                    <button style="opacity:1 ;color:'black'; width:90px;height:30px; align:centre; border-radius: 10%"name="submit" id="submit" tabindex="8" value="Change" type="submit" >Submit</button>
                </p>
        </form>
    </div>

</body>

</html>



<?php
	include('config.php');
	if(!isset($_SESSION))
	{
		session_start();
	}

	if((isset($_POST['txtCurrentPass'])) and isset($_POST['txtNewPass']) and isset($_POST['txtConfirmPass']))
	{	
		$length=strlen($_POST['txtNewPass']);
		
		$currentpass=addslashes(sha1($_POST['txtCurrentPass']));		
		$newpass=addslashes(sha1($_POST['txtNewPass']));
		$confirmpass=addslashes(sha1($_POST['txtConfirmPass']));
		
		$query1="Select * from usermaster where EmailID='{$login_session}'";
		$result1=mysqli_query($con,$query1);
		
		while($row1=mysqli_fetch_array($result1))
		{
			$dbpass=$row1['Password'];
		}
		
		
			if($length<6)
			{
			
				echo "<center>Password must greater than 6 charactes</center>";	
			
			}
			else
			{
				if($newpass==$confirmpass and $confirmpass==$newpass)
				{
					
						if($currentpass==$dbpass)
						{
						$query="update usermaster set Password='{$newpass}' where EmailID='{$login_session}'";
						$result= mysqli_query($con,$query) or die(mysqli_error($con));
				
							if($result)
							{
										
							 $_SESSION['user_signup']=$login_session;
							 	
								echo "<script>alert('Password Chnaged Successfully');</script>";
								header( "refresh:0; url=changepass.php" );																			
								
							}
							else
							{	
								echo "<center>Could Not able to update</center>";
							}
									
						}
						else
						{
							echo "<center>Could not matched new password with old one</center>";
						}
				}
				else
				{
					echo "<center>Password Doen't Matches</center>";	
				}
			}
			
		}
		else
		{
			//echo "Please Provide Values";			
		}
	
?>