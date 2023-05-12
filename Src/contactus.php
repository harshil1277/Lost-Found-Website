<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "phpmailer/src/Exception.php";
require "phpmailer/src/PHPMailer.php";
require "phpmailer/src/SMTP.php";
	include('config.php');
	if(!isset($_SESSION))
	{
		session_start();
	}
	if(isset($_POST['txtName']) and isset($_POST['txtEmail']) and isset($_POST['txtMessage']) and isset($_POST['txtSubject']))
	{
			$name=$_POST['txtName'];
			$email=$_POST['txtEmail'];
			$message=$_POST['txtMessage'];
			$subject=$_POST['txtSubject'];
			$date=date("Y-m-d");
			$query="Insert into querymaster(PersonName,EmailAddress,Query,Subject,Date,flag) 				values('{$name}','{$email}','{$message}','{$subject}','{$date}','1')";
			$result=mysqli_query($con,$query);
			
			if($result)
			{	
				$mail = new PHPMailer(true);

						$mail->isSMTP();
						$mail->Host = "smtp.gmail.com";
						$mail->SMTPAuth = true;
						$mail->Username = "kumari.21@iitj.ac.in";
						$mail->Password = "awjtlepcotqlccgx";
						$mail->SMTPSecure = "ssl";
						$mail->Port = 465;
						$mail->setFrom($_POST['txtEmail']);
						$mail->addAddress('kumari.21@iitj.ac.in');
						$mail->isHTML(true);
						$mail->Subject = $subject;
						$mail->Body ="Name : ".$name."<br>Email Address :  ".$email. '<br>' .$message ;
						$mail->send();
						
				$ref = $_SERVER["HTTP_REFERER"];
				
				if ( $ref == '{$ref}' )
				{
					echo "<script>alert('You Query is Submitted Succesfully');</script>";
					header( "refresh:0; url=home.php" );

				}
				else
				{
					echo "<script>alert('You Query is Submitted Succesfully');</script>";
					header( "refresh:0; url=home.php" );
				}			
			}
			else
			{
					echo "Could not submit your Query";
									
			}						
	}
	else
	{
			echo "Some Values are missing";	
	}
?>