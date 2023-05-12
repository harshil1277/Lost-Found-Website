<!DOCTYPE HTML>
<head>
<?php
			//include('loginvarifier.php');
			
?>
<title>Recent Lost And Founds</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400|Roboto:300,400,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/style.css">
		<!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">


<link href="css/style4.css" rel="stylesheet" type="text/css" >
<!-- <link href="css/slider.css" rel="stylesheet" type="text/css" > -->
<link href = "css/style-new.css" rel="stylesheet" >
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/startstop-slider.js"></script>
<script src="https://kit.fontawesome.com/47ebd0bae3.js" crossorigin="anonymous"></script>

</head>

<body>


  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			
			<div class="account_desc">
				<ul>
					
					<li><a href="index.php">Back to Categories</a></li>
					
					
				</ul>
			</div>
			<div class="clear">
					<h1 style="color:white; font-size:30px">
						<b>Categories : Electronics</b>
					</h1>

				</div>
			
			
			
		</div>

        <div class="main">
		<div class="content">
			
			<div class="section group">
				<div class="">
					<h2 style="background-color:darkgrey; color:white">Found Items</h2>
					<?php
					include('config.php');
					$query = "Select * FROM foundmaster WHERE Category = 'Electronics' ";
					$result = mysqli_query($con, $query) or die(mysqli_error($con));

					$imgdir = "uploads/";


					while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						$tempname = $row['Image'];
						$imagename = $imgdir . "" . $tempname;

						?>
						<div class="grid_1_of_4 images_1_of_4">
							<a href="preview.php?id=<?php echo $row['FoundID']; ?>">
								<img src="<?php echo $imagename; ?>" alt="" width="200" height="200" /></a>
							<h2>
								<?php echo $row['ProductName']; ?>
							</h2>
							<div class="price-details">
								<div class="price-number">
									<p><span class="rupees">
											<?php $row['Category']; ?>
										</span></p>
								</div>
								<div class="add-cart">
									<h4><a href="preview.php?id=<?php echo $row['FoundID']; ?>">View Details</a></h4>
								</div>
								<div class="clear"></div>
							</div>

						</div>
						<?php
					}
					?>
				</div>
			</div>
			<div class="section group">
				<div class="">
					<h2 style="background-color:darkgrey; color:white">Lost Items</h2>
			<?php
			include('config.php');
			$query = "Select *from lostmaster WHERE Category = 'Electronics'";
			$result = mysqli_query($con, $query) or die(mysqli_error($con));

			$imgdir = "uploads/";


			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$tempname = $row['Image'];
				$imagename = $imgdir . "" . $tempname;

				?>
				<div class="grid_1_of_4 images_1_of_4">
					<a href="preview.php?id=<?php echo $row['LostID']; ?>">
						<img src="<?php echo $imagename; ?>" alt="" width="200" height="200" /></a>
					<h2>
						<?php echo $row['ProductName']; ?>
					</h2>
					<div class="price-details">
						<div class="price-number">
							<p><span class="rupees">
									<?php $row['Category']; ?>
								</span></p>
						</div>
						<div class="add-cart">
							<h4><a href="preview.php?id=<?php echo $row['LostID']; ?>">View Details</a></h4>
						</div>
						<div class="clear"></div>
					</div>

				</div>
				<?php
			}
			?>
		</div>
		</div>
	</div>
	<div class="clear"></div>
	</div>




	</div>
	</div>
	</div>
	<div class="footer">
		<div class="wrap">
			<div class="section group">


			</div>
		</div>
		<div class="copy_right">
			<p>© All rights Reseverd | <a href="https://www.iitj.ac.in">IIT Jodhpur</a> </p>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function () {
			$().UItoTop({ easingType: 'easeOutQuart' });

		});
	</script>
	<a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>