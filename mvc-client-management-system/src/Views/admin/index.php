<?php



?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Client Management System||Login Page</title>

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
	<link rel="stylesheet" href="//css/style.css">

	<!--clock init-->
</head>

<body>
	<div class="error_page">

		<div class="error-top">
			<h2 class="inner-tittle page">CMS Admin</h2>
			<div class="login">

				<div class="buttons login">
					<h3 class="inner-tittle t-inner" style="color: lightblue">Sign In</h3>
				</div>
				<form id="login" method="post" name="login">
					<?php
					if (isset($_SESSION['message'])) : ?>
						<div class="alert alert">
							<?= htmlspecialchars($_SESSION['message']['text']) ?>
						</div>
					<?php endif; ?>
					<input type="text" class="text" value="User Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'E-mail address';}" name="username" required="true">
					<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" name="password" required="true">
					<div class="submit"><input type="submit" onclick="myFunction()" value="Login" name="login"></div>
					<div class="clearfix"></div>

					<div class="new">
						<p><a href="/admin/login/forgot">Forgot Password</a></p><br />
						<p><a href="/">Back Home!!</a></p>

						<div class="clearfix"></div>
					</div>
				</form>
			</div>


		</div>


		<!--//login-top-->
	</div>

	<!--//login-->
	<!--footer section start-->
	<div class="footer">

		<?php include_once('includes/footer.php'); ?>
	</div>
	<!--footer section end-->
	<!--/404-->
	<!--js -->
	<script src="/js/jquery.nicescroll.js"></script>
	<script src="/js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="/js/bootstrap.min.js"></script>
</body>

</html>