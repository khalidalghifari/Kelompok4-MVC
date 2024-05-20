<?php
error_reporting(0);


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Gym Management System | User Profile</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/css/font-awesome.min.css" />
	<link rel="stylesheet" href="/css/owl.carousel.min.css" />
	<link rel="stylesheet" href="/css/nice-select.css" />
	<link rel="stylesheet" href="/css/slicknav.min.css" />

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="/css/style.css" />

</head>

<body>
	<!-- Page Preloder -->


	<!-- Header Section -->
	<?php include 'include/header.php'; ?>
	<!-- Header Section end -->



	<!-- Page top Section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
					<h2>Profile</h2>
				</div>
			</div>
		</div>
	</section>
	<!-- Page top Section end -->

	<!-- Contact Section -->
	<section class="contact-page-section spad overflow-hidden">
		<div class="container">

			<div class="row">
				<div class="col-lg-2">
				</div>
				<div class="col-lg-8">
					<form class="singup-form contact-form" method="post">
						<div class="row">
							<div class="col-md-6">
								<input type="text" name="fname" id="fname" placeholder="First Name" autocomplete="off" value="<?php echo $data['fname']; ?>">
							</div>
							<div class="col-md-6">
								<input type="text" name="lname" id="lname" placeholder="Last Name" autocomplete="off" value="<?php echo $data['lname']; ?>">
							</div>
							<div class="col-md-6">
								<input type="text" name="email" id="email" placeholder="Your Email" autocomplete="off" value="<?php echo $data['email']; ?>" readonly>
							</div>
							<div class="col-md-6">
								<input type="text" name="mobile" id="mobile" placeholder="Mobile Number" autocomplete="off" value="<?php echo $data['mobile']; ?>">
							</div>
							<div class="col-md-6">
								<input type="text" name="state" id="state" placeholder="State" autocomplete="off" value="<?php echo $data['state']; ?>">
							</div>
							<div class="col-md-6">
								<input type="text" name="city" id="city" placeholder="City" autocomplete="off" value="<?php echo $data['city'] ?>">
							</div>

							<div class="col-md-12">
								<input type="text" name="address" id="address" placeholder="Address" autocomplete="off" value="<?php echo $data['address']; ?>">
							</div>
							<div class="col-md-12">
								<input type="submit" id="submit" name="submit" value="Update" class="site-btn sb-gradient">

							</div>
						</div>
					</form>
				</div>
				<div class="col-lg-2">
				</div>
			</div>
		</div>
	</section>
	<!-- Trainers Section end -->
	<?php include 'include/footer.php'; ?>
	<!-- Footer Section end -->

	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

	<!-- Search model -->

	<!-- Search model end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>


<style>
	.errorWrap {
		padding: 10px;
		margin: 0 0 20px 0;
		background: #dd3d36;
		color: #fff;
		-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
	}

	.succWrap {
		padding: 10px;
		margin: 0 0 20px 0;
		background: #5cb85c;
		color: #fff;
		-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
	}
</style>