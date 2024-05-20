<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Ahana | Yoga HTML Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="Ahana Yoga HTML Template">
	<meta name="keywords" content="yoga, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<script type="text/javascript">
		function valid() {
			if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
				alert("New Password and Confirm Password Field do not match  !!");
				document.chngpwd.confirmpassword.focus();
				return false;
			}
			return true;
		}
	</script>
	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #dd3d36;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}

		.succWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}
	</style>
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
					<h2>changepassword</h2>
				</div>
			</div>
		</div>
	</section>



	<!-- Pricing Section -->
	<section class="pricing-section spad">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-sm-6">

				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="pricing-item entermediate">
						<div class="pi-top">
							<h4>changepassword</h4>
						</div>
						<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

						<form class="singup-form contact-form" method="post" onSubmit="return valid();">
							<div class="row">
								<div class="col-md-12">
									<input type="password" name="password" id="password" placeholder="Old Password" autocomplete="off">
								</div>
								<div class="col-md-12">
									<input type="password" name="newpassword" id="newpassword" placeholder="New Password" autocomplete="off">
								</div>

								<div class="col-md-12">
									<input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" autocomplete="off">
								</div>

							</div>

							<input type="submit" id="submit" name="submit" value="Submit" class="site-btn sb-gradient">
						</form>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">

				</div>

			</div>
		</div>
	</section>


	<!-- Footer Section -->
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