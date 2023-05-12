<html>
<head>Lost<title></title></head>
</html>

<?php
	include('loginvarifier.php');
	include('config.php');
	

	if((!(isset($_POST['txtProductName']))) or(!isset($_POST['txtCategory'])) or (!isset($_POST['txtLostFrom'])) or 
	(!isset($_POST['txtPersonName'])) or (!isset($_POST['txtMobileNumber'])) or (!isset($_POST['txtEmailAddress'])))
	{
		echo "<script>alert('Some Values are missing')</script>";
		header( "refresh:0; url=lost.php" );
	}
	else
	{
		$product=$_POST['txtProductName'];
		$cat=$_POST['txtCategory'];
		$lostFrom=$_POST['txtLostFrom'];
		$person=$_POST['txtPersonName'];
		$contact=$_POST['txtMobileNumber'];
		$Email=$_POST['txtEmailAddress'];	
		$image = $_FILES['LostImage'] ;
		$filename = $_FILES["LostImage"]["name"];
		$filetype = $_FILES["LostImage"]["type"];
		$filesize = $_FILES["LostImage"]["size"];
		$fileerror = $_FILES["LostImage"]["error"];
		$tempname = $_FILES["LostImage"]["tmp_name"];
		if (
			(($filetype == "image/gif") or ($filetype == "image/jpg") or ($filetype == "image/jpeg") or
				($filetype == "image/pjpeg")) or ($filetype == "image/png") and ($filesize < 10000000)
		){
			?>
			<?php
						   
			$name = $_FILES['LostImage']['name'] ;
			
			$query="insert into lostmaster(ProductName,Category,Image,LostFrom,ContactNumber,EmailAdd,PersonName)
				values('{$product}','{$cat}','{$name}','{$lostFrom}','{$contact}','{$Email}','{$person}')";
			$result= mysqli_query($con,$query) or die(mysqli_error($con));
			echo "<script>alert('New Lost Added');</script>";
			header( "refresh:0; url=lost.php" );
		
	}
	else{
		echo "Invalid File Type";
	}
	
	
		
	
}	
	  
?>