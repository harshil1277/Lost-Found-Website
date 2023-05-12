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
      


            
            <div class="clr"></div>
        </div>

        

        </div>
    </div>
	<div class="login-box">
	<h1 class="heading-login-box" style="font-size:23px">Change Password</h1>
        <form method="post" action="" autocomplete="off">
            <div class="user-box">
            <input class="user-box-input" type="text" name="txtConfirmationCode"  required title="Check you Email For Confirmation Code" maxlength="4" >
                <label class="user-box-label" >Confirmation Code</label>
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
	

	if((isset($_POST['txtConfirmationCode'])) and isset($_POST['txtNewPass']) and isset($_POST['txtConfirmPass']))
	{	
		$length=strlen($_POST['txtNewPass']);
		
		$currentpass=$_POST['txtConfirmationCode'];		
		$newpass=addslashes(sha1($_POST['txtNewPass']));
		$confirmpass=addslashes(sha1($_POST['txtConfirmPass']));
        $query1="Select * from usermaster where EmailID='{$login_session}'";

		
		$result1=mysqli_query($con,$query1);
		
		while($row1=mysqli_fetch_array($result1))
		{
			// $dbpass=$row1['Password'];
		
		
		
			if($length<6)
			{
			
				echo "<center>Password must greater than 6 charactes</center>";	
			
			}
			else
			{
				if($newpass==$confirmpass and $confirmpass==$newpass)
				{
					
						if($currentpass==$row1['ConfirmationCode'])
						{
						$query="update usermaster set Password='{$newpass}' where EmailID='{$login_session}'";
						$result= mysqli_query($con,$query) or die(mysqli_error($con));
				
							if($result)
							{
										
							 $_SESSION['user_signup']=$login_session;
							 	
								echo "<script>alert('Password Chnaged Successfully');</script>";
								header( "refresh:0; url=userlogin.php" );																			
								
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
    }
		else
		{
			echo "Please Provide Values";			
		}
    
	
?>