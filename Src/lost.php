<!DOCTYPE html>
<html>
<head>
<?php
			include('loginvarifier.php');
?>
<title>Lost Something</title>
<link rel="shortcut icon" href="images/hlogo.png"> 
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="css/style2.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo2.css" media="all" />
	<link rel="stylesheet" href="css/style-login.css">
</head>
<body class="login-page">
<div class="container">
	
			<!-- freshdesignweb top bar -->
            <div class="freshdesignweb-top" style="padding: 20px 10px">
                <a href="home.php" target=""style="background-color:none " onmouseover="this.style.backgroundColor='transparent';" onmouseout="this.style.backgroundColor='transparent';" ><b style="text-shadow: none;
    color: aliceblue;">Home</b></a>
                <a href="found.php" target=""style="background-color:none " onmouseover="this.style.backgroundColor='transparent';" onmouseout="this.style.backgroundColor='transparent';" ><b style="text-shadow: none;
    color: aliceblue;">Found</b></a>
                <span class="right">
                    <a href="logout.php" style="background-color:none " onmouseover="this.style.backgroundColor='transparent';" onmouseout="this.style.backgroundColor='transparent';" >
                        <strong style="text-shadow: none;
    color: aliceblue;">LogOut(<?php echo $login_session; ?>)</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
			<!-- <header>
				<h1>Did you Lost Something?</h1>
            </header>        -->
      <div  class="login-box">
	  <h1 class="heading-login-box" style="font-size:23px">Have you lost something?</h1>
      <?php      	  
				include('config.php');
				$query="Select *from usermaster where EmailId='{$login_session}'";
				
				$result=mysqli_query($con,$query) or die(mysqli_error($con));
				
				while($row=mysqli_fetch_array($result))
				{
					
			?>
    		<form id="contactform" method="post" action="" enctype="multipart/form-data"> 
			<div class="user-box">
                <input class="user-box-input" name="txtProduct" required tabindex="1" type="text" title="Lost thing">
                <label class="user-box-label">Lost Thing with Description</label>
            </div>
			<p class="contact" style="padding-bottom:20px"><label for="email" style="padding-right:20px" >Image</label> 
    			<input type="file" name="file" tabindex="2" required>
				</p>
			<div class="user-box">
                <input class="user-box-input" name="txtLostFrom"  required tabindex="3" type="text" title="Where did you Found?">
                <label class="user-box-label">Location</label>
            </div>
			<div class="user-box">
                <input class="user-box-input" name="txtMobileNumber"  required tabindex="4" type="text" title="Provide Your Contact Number">
                <label class="user-box-label">Contact Number</label>
            </div>
			<div class="user-box">
                <input class="user-box-input" name="txtEmail" value="<?php echo $row['EmailID']; ?>"  readonly required tabindex="5" type="text" title="Your Email Address"> 
                  <?php
			   }
				?>
                
            </div>
            <div class="user-box">
                <input class="user-box-input" name="txtPersonName" required tabindex="6" type="text" title="The Person Who have found?">
                <label class="user-box-label">Person's Name</label>
            </div>
                
        
               
  			<p class="contact"><label for="username" style="padding-right:20px">Category</label>
            <select tabindex="7" class="select-style gender" name="txtCategory">
            <?php
							include('config.php');
							$query="select *from categorymaster ORDER BY CategoryName ASC";
							$result=mysqli_query($con,$query);
							while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
							{
								echo "<option value='".$row['CategoryName']."'>".$row['CategoryName']."</option>";	
							}
			?>
           </p> 
            
            </select><br><br>
            
            <p class="submit" style="align-items: center; display: flex; margin-left: 36%; margin-top:20px">
            <input style="opacity:1 ;color:'black'; width:90px;height:30px; align:centre; border-radius: 10%" class="buttom" name="submit" id="submit" tabindex="8" value="Add Lost" type="submit"> 	 
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
	
	if((isset($_POST['txtProduct'])) and isset($_POST['txtCategory']) and isset($_POST['txtLostFrom']) and 
	isset($_POST['txtPersonName']) and isset($_POST['txtMobileNumber']) and isset($_POST['txtEmail']) and 
	isset($_FILES["file"]["name"]))
	{
		
		echo "hi";
		$product=$_POST['txtProduct'];
		$cat=$_POST['txtCategory'];
		$lostFrom=$_POST['txtLostFrom'];
		$person=$_POST['txtPersonName'];
		$contact=$_POST['txtMobileNumber'];
		$Email=$_POST['txtEmail'];	
		$filename=$_FILES["file"]["name"];
		$filetype=$_FILES["file"]["type"];
		$filesize=$_FILES["file"]["size"];
		$fileerror=$_FILES["file"]["error"];
		$tempname=$_FILES["file"]["tmp_name"];
		
						   
		
		if ((($filetype == "image/gif") or ($filetype == "image/jpg") or ($filetype == "image/jpeg") or 
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
					 $query="insert into lostmaster(ProductName,Category,Image,LostFrom,ContactNumber,EmailAdd,PersonName)
				values('{$product}','{$cat}','{$filename}','{$lostFrom}','{$contact}','{$Email}','{$person}')";
				$result= mysqli_query($con,$query) or die(mysqli_error($con));
				
				if($result)
						{
							echo "<script>alert('Added Successfully');</script>";							
					 	 	$_SESSION['user_signup']=$username;																				
						 	header( "refresh:0; url=lost.php" );	
						}
						else
						{
							echo "<script>alert('Could Not Add');</script>";												 	 																				
						 	header( "refresh:0; url=lost.php" );	
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
		echo "Some Values are Missing";
	}
  
?>