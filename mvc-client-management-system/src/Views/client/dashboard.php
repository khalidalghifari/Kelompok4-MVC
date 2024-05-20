<?php

?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Client Management System||Dashboard</title>

	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Bootstrap Core CSS -->
	<link href="/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="/css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="/css/font-awesome.css" rel="stylesheet">
	<!-- jQuery -->
	<link href='/fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="/css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
	<script src="/js/jquery-1.10.2.min.js"></script>
	<script src="/js/amcharts.js"></script>
	<script src="/js/serial.js"></script>
	<script src="/js/light.js"></script>
	<script src="/js/radar.js"></script>
	<link href="/css/barChart.css" rel='stylesheet' type='text/css' />
	<link href="/css/fabochart.css" rel='stylesheet' type='text/css' />
	<!--clock init-->
	<script src="/js/css3clock.js"></script>
	<!--Easy Pie Chart-->
	<!--skycons-icons-->
	<script src="/js/skycons.js"></script>

	<script src="/js/jquery.easydropdown.js"></script>

	<!--//skycons-icons-->
</head>

<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">

				<?php include_once('includes_user/header.php'); ?>

				<h1>Welcome <?= $_SESSION['login'] ?> to Client management system</h1>


				<?php include_once('includes_user/footer.php'); ?>

			</div>
		</div>
		<!--//content-inner-->

		<?php include_once('includes_user/sidebar.php'); ?>
		<div class="clearfix"></div>
	</div>
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {
			if (toggle) {
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({
					"position": "absolute"
				});
			} else {
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({
						"position": "relative"
					});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<!--js -->
	<link rel="stylesheet" href="/css/vroom.css">
	<script type="text/javascript" src="/js/vroom.js"></script>
	<script type="text/javascript" src="/js/TweenLite.min.js"></script>
	<script type="text/javascript" src="/js/CSSPlugin.min.js"></script>
	<script src="/js/jquery.nicescroll.js"></script>
	<script src="/js/scripts.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="/js/bootstrap.min.js"></script>
</body>

</html>