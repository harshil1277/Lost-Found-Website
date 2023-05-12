
<html>
<head>Found<title></title></head>
</html>
<?php
	include('loginvarifier.php');
	include('config.php');
	

	if((!(isset($_POST['txtProductName']))) or(!isset($_POST['txtCategory'])) or (!isset($_POST['txtFoundFrom'])) or 
	(!isset($_POST['txtPersonName'])) or (!isset($_POST['txtMobileNumber'])) or (!isset($_POST['txtEmailAddress'])))
	{
		echo "<script>alert('Some Values are missing');</script>";
		header( "refresh:0; url=found.php" );
	}
	else
	{
		$product=$_POST['txtProductName'];
		$cat=$_POST['txtCategory'];
		$foundFrom=$_POST['txtFoundFrom'];
		$person=$_POST['txtPersonName'];
		$contact=$_POST['txtMobileNumber'];
		$Email=$_POST['txtEmailAddress'];	
		$image = $_FILES['txtFoundImage'] ;
		$filename = $_FILES["txtFoundImage"]["name"];
		$filetype = $_FILES["txtFoundImage"]["type"];
		$filesize = $_FILES["txtFoundImage"]["size"];
		$fileerror = $_FILES["txtFoundImage"]["error"];
		$tempname = $_FILES["txtFoundImage"]["tmp_name"];
		
		
		if (
			(($filetype == "image/gif") or ($filetype == "image/jpg") or ($filetype == "image/jpeg") or
				($filetype == "image/pjpeg")) or ($filetype == "image/png") and ($filesize < 10000000)
		){
			?>
			<?php
			$name = $_FILES['txtFoundImage']['name'] ;

			$query="insert into foundmaster(ProductName,Category,Image,FoundFrom,ContactNumber,EmailAdd,PersonName)
				values('{$product}','{$cat}','{$name}','{$foundFrom}','{$contact}','{$Email}','{$person}')";
			$result= mysqli_query($con,$query) or die(mysqli_error($con));
			echo "<script>alert('New Found added');</script>";
			header( "refresh:0; url=found.php" );
		}
		else{
			echo "Invalid File Type";
		}
		
		
	}
	
	
		
	
		
	  
?>