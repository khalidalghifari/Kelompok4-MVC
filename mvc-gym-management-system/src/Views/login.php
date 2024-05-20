<?php
error_reporting(0);
$msg = "";
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Gym Management System</title>
	<meta charset="UTF-8">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/css/font-awesome.min.css" />
	<link rel="stylesheet" href="/css/owl.carousel.min.css" />
	<link rel="stylesheet" href="/css/nice-select.css" />
	<link rel="stylesheet" href="/css/magnific-popup.css" />
	<link rel="stylesheet" href="/css/slicknav.min.css" />
	<link rel="stylesheet" href="/css/animate.css" />

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
					<h2>Login</h2>

				</div>
			</div>
		</div>
	</section>



	<!-- Pricing Section -->
	<section class="pricing-section spad">
		<div class="container">

			<div class="row">
				<div class="col-lg-3 col-sm-6">

				</div>
				<div class="col-lg-6 col-sm-6">
					<div class="pricing-item entermediate">
						<div class="pi-top">

						</div>
						<div class="pi-price">
							<h3>User</h3>
							<p>Login</p>
						</div>
						<?php if ($error) { ?><div class="errorWrap" style="color:red;"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" style="color:red;"><strong>Error</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

						<form class="singup-form contact-form" method="post">
							<div class="row">
								<div class="col-md-12">
									<input type="text" name="email" id="email" placeholder="Your Email" autocomplete="off" required>
								</div>
								<div class="col-md-12">
									<input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
								</div>


							</div>
							<div class="row">
								<div class="col-md-6">
									<input type="submit" id="submit" name="submit" value="Login" class="site-btn sb-gradient">
								</div>
								<div class="col-md-6">
									<a href="/user/registration" class="site-btn sb-gradient">Registration</a>
								</div>
							</div>

						</form>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">

				</div>

			</div>
		</div>
	</section>


	<?php include 'include/footer.php'; ?>
	<!-- Footer Section end -->

	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

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