<!DOCTYPE html>
<html lang="en">
    <head>
    
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>SignUp Phase III</title>
        <meta name="description" content="Custom Login Form Styling with CSS3" />
        <meta name="keywords" content="css3, login, form, custom, input, submit, button, html5, placeholder" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="images/hlogo.png"> 
        <link rel="stylesheet" type="text/css" href="css/style1.css" />
		<link rel="stylesheet" type="text/css" href="css/style-login.css" />
		<script src="js/modernizr.custom.63321.js"></script>
		
    </head>
    <body class="login-page">

<div class="login-box " style = "width : 500px">
        <h2 class="heading-login-box">Sign Up: III(Select Image)</h2>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="user-box">
			<p class="field" style = "padding-left : 20%">
                   <!-- <td><b >Select Image:</b></td> -->
						<td colspan="2" ><input type="file" name="file"></td>
						<i class="" ></i>
					</p>
            </div>
            
            
            <p class="submit" style="align-items: center; display: flex; margin-left: 36%; margin-top:20px">
                    <button style="opacity:1 ;color:black; width:90px;height:30px; align:centre; border-radius: 10%" type="submit" name="submit" title="Finalize">Submit</button>
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
	if(!isset($_SESSION))
	{
		session_start();
	}
	
	if(isset($_FILES['file']['name']))
	{
		$filename=$_FILES["file"]["name"];
		$filetype=$_FILES["file"]["type"];
		$filesize=$_FILES["file"]["size"];
		$fileerror=$_FILES["file"]["error"];
		$tempname=$_FILES["file"]["tmp_name"];

	if ((($filetype == "image/gif") or ($filetype == "image/jpg") or ($filetype == "image/png") or ($filetype == "image/jpeg") or ($filetype == "image/pjpeg")) and ($filesize < 10000000))
			{
				$username=$_SESSION['user_signup'];
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
					 include('config.php');
					 
					 	$query="update usermaster set ProPic='{$filename}' where EmailID='$username'";
						$result=mysqli_query($con,$query) or die(mysqli_error());
						
						if($result)
						{
					 	 	$_SESSION['user_signup']=$username;																				
						 	header("location:home.php");
						}
						else
						{
							echo "Could Not Insert";	
						}
			   }
			}
	  }else
	  {
		  echo "<b><center>";
	   echo "Invalid file Type ::<br> file type ::".$filetype." <br> file size::: ".$filesize;
	   echo "</center></b>";
	}
	
	}
		
?>