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


	<link href="css/style4.css" rel="stylesheet" type="text/css">
	<!-- <link href="css/slider.css" rel="stylesheet" type="text/css" > -->
	<link href="css/style-new.css" rel="stylesheet">
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
				<div class="call">
					<img class="iitj-logo" src="images/logo1.gif" style="height : 60px ; width : 80px">

				</div>
				<div class="account_desc">
					<ul>
						<li><a style="color: #9C9C9C;" onmouseover="this.style.color='white';"
								onmouseout="this.style.color='#9C9C9C';" href="help.php">Help</a></li>
						<li><a style="color: #9C9C9C;" onmouseover="this.style.color='white';"
								onmouseout="this.style.color='#9C9C9C';" href="home.php">Dashboard</a></li>


					</ul>
				</div>
				<div class="clear">
					<h1
						style="font-size : 60px;color : aliceblue; text-align : center;  font-family: 'Courier New', Courier, monospace">
						<b>Lost and Found</b>
					</h1>
					<h2 style="font-size : 23px; padding-bottom : 20px">LOST IT. LIST IT. FIND IT.</h2>
				</div>

			</div>
			<div class="header_slide">
				<div class="header_bottom_left">
					<div class="categories">
						<ul>
							<h3>Categories</h3>
							<?php
							include('config.php');
							$query = "Select *From categorymaster";
							$result = mysqli_query($con, $query) or die(mysqli_error($con));

							while ($row = mysqli_fetch_assoc($result)) {
								?>
															
								<li><a href=" <?php echo $row['CategoryName']; ?>.php"><?php echo $row['CategoryName']; ?></a></li>

							<?php
							}
							?>
						</ul>
					</div>
				</div>
				<div class="header_bottom_right">
					<div class="slider">
						<div id="slider">
							<div id="mover">


								<div class="features-container section-container">


									<div class="row">
										<div class="col-sm-6 features-box wow fadeInLeft">
											<div class="row">
												<a href="found.php">
												<div class="col-sm-3 features-box-icon">
													<i class="fa-solid fa-magnifying-glass"></i>
												</div>
												<div class="col-sm-9">
													<h3 style="font-size:30px">Lost Something?</h3>
													<p style="font-size:20px ; color : #888888">
														Browse lost and found items, claim yours by logging in
													</p>
												</div>
												</a>
											</div>
										</div>
										<div class="col-sm-6 features-box wow fadeInLeft">
											<div class="row">
											<a href="lost.php">
												<div class="col-sm-3 features-box-icon">
													<i class="fa-solid fa-check"></i>
												</div>
												<div class="col-sm-9">
													<h3 style="font-size:30px">Found Something?</h3>
													<p style="font-size:20px ; color : #888888">
														Help lost items find their way back home, upload your found item
														now
													</p>
												</div>
											</a>	
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-6 features-box wow fadeInLeft">
						<div class="row">
							<div class="col-sm-3 features-box-icon">
								<i class="fa-solid fa-question"></i>
							</div>
							<div class="col-sm-9">
								<h3 style="font-size:30px">Categories</h3>
								<p style="font-size:20px ; color : #888888">
									The categories section sorts all the lost and found items with its categories.
								</p>
							</div>
						</div>
					</div>
										<div class="col-sm-6 features-box wow fadeInLeft">
											<div class="row">
												<a href="help.php">
													<div class="col-sm-3 features-box-icon">
														<i class="fa-solid fa-circle-info"></i>
													</div>
													<div class="col-sm-9">
														
															<h3 style="font-size:30px">FAQs</h3>
															<p style="font-size:20px ; color : #888888">
																Got questions about lost and found? Find answers here in our FAQ
																section

															</p>	
													</div>
												</a>	
											</div>
										</div>
									</div>

								</div>
							</div>





						</div>
					</div>
					
				</div>
			</div>
			
		</div>
	</div>
	<div class="header_top">


		<script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents: function () {
					var obj = this;

					obj.dd.on('click', function (event) {
						$(this).toggleClass('active');
						event.stopPropagation();
					});
				}
			}

			$(function () {

				var dd = new DropDown($('#dd'));

				$(document).click(function () {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		</script>
		<div class="clear"></div>

	</div>




	<div class="main">
		<div class="content">
			<div style="background-color: black" class="content_top">
				<div class="heading">
					<h3 style="color: aliceblue ; font-family: 'Courier New', Courier, monospace; padding: 15px 10px">
						Recent Lost and Found</h3>
				</div>
				<div class="see">

				</div>
				<div class="clear"></div>
			</div>
			<div class="section group">
				<div class="">
					<h2 style="background-color:darkgrey; color:white">Found Items</h2>
					<?php
					include('config.php');
					$query = "Select *from foundmaster";
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
			$query = "Select *from lostmaster";
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