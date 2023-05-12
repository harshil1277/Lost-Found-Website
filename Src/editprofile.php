<!DOCTYPE html>
<html>
<head>
<?php
			include('loginvarifier.php');
?>
<title>Edit Profile</title>
<link rel="shortcut icon" href="images/hlogo.png"> 
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="css/style2.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo2.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style-login.css" />
</head>
<body class="login-page">

	
<div class="container" >
			<!-- freshdesignweb top bar -->
            <div class="freshdesignweb-top" style="padding: 20px 10px">
                <a href="home.php" target=""  style="background-color:none; " onmouseover="this.style.backgroundColor='transparent';" onmouseout="this.style.backgroundColor='transparent';" ><b style="text-shadow: none;
    color: aliceblue;">Home</b></a>
                <a href="changepass.php" target="" style="background-color:none " onmouseover="this.style.backgroundColor='transparent';" onmouseout="this.style.backgroundColor='transparent';"><b style="text-shadow: none;
    color: aliceblue;">Change Password</b></a>
               
                
                <span class="right">
                    <a href="logout.php" style="background-color:none " onmouseover="this.style.backgroundColor='transparent';" onmouseout="this.style.backgroundColor='transparent';">
                        <strong style="text-shadow: none;
    color: aliceblue;">LogOut(<?php echo $login_session; ?>)</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
           
     
     	
    		
   
</div> 
<div class="login-box">
<?php      	  
				include('config.php');
				$query="Select *from usermaster where EmailId='{$login_session}'";
				
				$result=mysqli_query($con,$query) or die(mysqli_error($con));
				
				while($row=mysqli_fetch_array($result))
				{
					
			?>
        <h1 class="heading-login-box" style="font-size:23px">Edit Profile</h1>
        <form  method="post" action="" enctype="multipart/form-data">
            <div class="user-box">
                <input class="user-box-input" name="txtFirstName" required tabindex="1" type="text" title="Change First Name">
                <label class="user-box-label">Change First Name</label>
            </div>
            <div class="user-box">
                <input class="user-box-input"  name="txtLastName" required tabindex="2" type="text" title="Change Last Name"  required>
                <label class="user-box-label">Change Last Name</label>
            </div>
			<p class="contact" style="padding-bottom:10px"><label for="email">Change Profile Picture &nbsp;&nbsp;&nbsp; </label>
    			<input type="file" name="file" tabindex="2" required> 
			<div class="user-box">
			</p> 
                <input class="user-box-input" name="txtUserName" required tabindex="3" type="text" title="Change User Name">
                <label class="user-box-label">Change User Name</label>
            </div>
			<div class="user-box">
                <input class="user-box-input" name="txtMobileNumber" required tabindex="4" type="text" title="Change Contact Number">
                <label class="user-box-label">Contact Number</label>
            </div>
			<div class="user-box">
                <input class="user-box-input" value = "<?php echo $row['EmailID']; ?>" name="txtEmail" readonly required tabindex="5" type="text" title="Your Email Address">
				<?php
			   }
				?> 
                
            </div>
			<p class="contact"><label for="username" style = "padding-right:20px">Gender</label>
            <select tabindex="7" class="select-style gender" name="txtGender">
           
           <option value="Male">Male</option>
           <option value="Female">Female</option>
            
            </select><br><br>
			</p> 
			
			
            <p class="submit" style="align-items: center; display: flex; margin-left: 36%; margin-top:20px">
                    <button name="submit" id="submit" tabindex="8" value="Change" type="submit" style="opacity:1 ;color:'black'; width:90px;height:30px; align:centre; border-radius: 10%">Submit</button>
                </p>
        </form>
    </div>     
</div>

</body>
</html>



<?php
	include('config.php');
	if(!isset($_SESSION))
	{
		session_start();
	}

	if((isset($_POST['txtFirstName'])) and isset($_POST['txtLastName']) and isset($_POST['txtUserName']) and 
	isset($_POST['txtMobileNumber']) and isset($_POST['txtEmail']) and isset($_FILES['file']['name']) and isset($_POST['txtGender']))
	{		
		$firstname=$_POST['txtFirstName'];		
		$lastname=$_POST['txtLastName'];
		$username1=$_POST['txtUserName'];
		$contact=$_POST['txtMobileNumber'];
		$Email=$_POST['txtEmail'];	
		$gender=$_POST['txtGender'];
		$filename=$_FILES["file"]["name"];
		$filetype=$_FILES["file"]["type"];
		$filesize=$_FILES["file"]["size"];
		$fileerror=$_FILES["file"]["error"];
		$tempname=$_FILES["file"]["tmp_name"];
		
						   
		
		if ((($filetype == "image/gif") or ($filetype == "image/jpg") or ($filetype == "image/jpeg") or ($filetype == "image/png") or
		($filetype == "image/pjpeg")) and ($filesize < 100000))
		{
			$username=$_SESSION['login_user'];
		  	if ($fileerror> 0)
			{
			  echo "File Error :  " . $fileerorr . "<br />";
			}
			else {			  			  			  
			  if (file_exists("images/".$filename))
				{
				   echo "<b>".$filename . " already exists. </b>";
				}else
				{

				   move_uploaded_file($tempname,"uploads/".$filename);
				   ?>
					 <center>Uploaded File:<br>
					 <img src="uploads/<?php echo $filename; ?>"  width="250" height="250" alt="Image path Invalid" ></center> 
                     <?php
					 $query="update usermaster set FirstName='{$firstname}',LastName='{$lastname}',ProPic='{$filename}',UserName='{$username1}',MobileNumber='{$contact}',
					 EmailID='{$Email}',Gender='{$gender}' where EmailID='{$login_session}'";
				$result= mysqli_query($con,$query) or die(mysqli_error($con));
				
				if($result)
						{
					 	 	$_SESSION['user_signup']=$username;																				
							echo "<script>alert('Updated Successfully');</script>";
							header( "refresh:0; url=editprofile.php" );
						}
						else
						{
							echo "<script>alert('Could not update');</script>";
							header( "refresh:0; url=editprofile.php" );	
						}
				}
			}
			}
			else
	  	{
		  echo "<b><center>";
	   echo "Invalid file Type ::<br> file type ::".$filetype." <br> file size::: ".$filesize;
	   echo "</center></b>";
		}
	}
	else
	{
		
	}	  
?>