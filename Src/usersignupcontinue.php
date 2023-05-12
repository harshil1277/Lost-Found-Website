<!DOCTYPE html>
<html lang="en">
    <head>
    
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>SignUp Phase II</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="images/hlogo.png"> 
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
		<link rel="stylesheet" type="text/css" href="css/style-login.css" />
		<script src="js/modernizr.custom.63321.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
    </head>
    <body class="login-page">

	<div class="login-box" >
        <h2 class="heading-login-box">Sign Up: II</h2>
        <form method="post" action="" autocomplete="off">
            <div class="user-box">
			<p class="field" style="padding: 10px 0;">
                    	<td><b>Country</b>&nbsp;&nbsp;&nbsp;</td><td><select name="cmdCountry" title="Select Country" required="required" style = "width: 70%">						<?php
						include('config.php');
						$query="Select *from countrymaster Order by CountryName ASC";
						$result=mysqli_query($con,$query)or die(mysqli_error());
						$row=mysqli_num_rows($result);
						while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
						{
                        	echo "<option value='".$row['CountryName']."'>".$row['CountryName']."</option>";
						}
							
					?>
                        </select></td></tr>						
					</p> 
            </div>
            <div class="user-box" style="padding: 10px 0;">
			<p class="field">
                    	<td ><b style="padding-right : 6%">State</b>&nbsp;&nbsp;&nbsp;</td><td ><select name="cmbState" title="Select State" required="required" style = "width: 70%">
                        	<?php
										include('config.php');
										$query="select *from statemaster Order by StateName ASC";
										$result=mysqli_query($con,$query) or die(mysqli_error());
										while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
										{
											echo "<option value='".$row['StateName']."'>".$row['StateName']."</option>";	
										}
									?>
                                                    
                        </select></td></tr>						
					</p>
            </div>
			<div class="user-box" style="padding: 10px 0;">
			<p class="field">
                    	<td><b style="padding-right : 8%">City</b>&nbsp;&nbsp;&nbsp;</td><td><select name="cmbCity" title="Select City" required="required" style = "width: 70%">
                       <?php
						include('config.php');
						$query="Select *from citymaster Order by CityName ASC";
						$result=mysqli_query($con,$query) or die(mysqli_error());
						
						while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
						{
                        	echo "<option value='".$row['CityName']."'>".$row['CityName']."</option>";
						}
							
					?>                          
                        </select></td></tr>						
					</p>
            </div>
			<div class="user-box" >
                <input class="user-box-input" type="text" name="txtConfirmationCode"  required title="Check you Email For Confirmation Code" maxlength="4" >
                <label class="user-box-label" >Confirmation Code</label>
            </div>
            
            <p class="submit" style="align-items: center; display: flex; margin-left: 36%; margin-top:20px">
                    <button style="opacity:1 ;color:black; width:90px;height:30px; align:centre; border-radius: 10%"type="submit" name="submit" title="Finalize">Submit</button>
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
			
				

				<div class="support-note">
					<span class="note-ie">Sorry, only modern browsers.</span>
				</div>
				<!-- <cetenr><h1><b>Sign Up :: Phase II</b></h1></center> -->
			</header>
            
			
			
        </div>
    </body>
</html>
<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
	include('config.php');
	if(isset($_POST['cmdCountry']) and isset($_POST['cmbState']) and isset($_POST['cmbCity']) and 
	isset($_POST['txtConfirmationCode']))
	{
			$country=$_POST['cmdCountry'];
			$state=$_POST['cmbState'];
			$city=$_POST['cmbCity'];
			$username=$_SESSION['user_signup'];
			$confirmationcode=$_POST['txtConfirmationCode'];
			
			$query="Select *from usermaster where EmailID='$username'";
			$result1=mysqli_query($con,$query) or die(mysqli_error());			
			$row=mysqli_fetch_array($result1,MYSQLI_ASSOC);

			if($confirmationcode==$row['ConfirmationCode'])
			{
				$query2="update usermaster set Country='{$country}',State='{$state}',City='{$city}' where EmailID='{$username}'";
				$result2=mysqli_query($con,$query2) or die(mysqli_error());
				if($result2)
				{
					$_SESSION['user_signup']=$username;																				
					header("location:usersignupfinal.php");
				}
				else
				{
					echo "<center>Coudld not Insert</center>";	
				}
			}
			else
			{
				echo "<center>Confirmation Code Doen't matches</center>";
			}
		}
		else
		{
			echo "<center>Values are not sufficient</center>";
		}
	
	

	
?>