<?php


?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Client Management Sysytem|| Update Clients</title>

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
	<!--clock init-->
	<script src="/js/css3clock.js"></script>
	<!--Easy Pie Chart-->
	<!--skycons-icons-->
	<script src="/js/skycons.js"></script>
	<!--//skycons-icons-->
</head>

<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">

				<?php //include_once('includes/header.php');
				?>
				<!--//outer-wp-->
				<div class="outter-wp">
					<!--/sub-heard-part-->
					<div class="sub-heard-part">
						<ol class="breadcrumb m-b-0">
							<li><a href="dashboard.php">Home</a></li>
							<li class="active">Update Clients</li>
						</ol>
					</div>
					<!--/sub-heard-part-->
					<!--/forms-->
					<div class="forms-main">
						<h2 class="inner-tittle">Update Clients </h2>
						<div class="graph-form">
							<div class="form-body">
								<form method="post">
									<div class="form-group">
										<label for="exampleInputEmail1">Contact Name</label>
										<input type="text" name="cname" value="<?php echo $data['ContactName']; ?>" class="form-control" required='true'>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Company Name</label>
										<input type="text" name="comname" value="<?php echo $data['CompanyName']; ?>" class="form-control" required='true'>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Address</label>
										<textarea name="address" class="form-control" required='true' rows="4" cols="3"><?php echo $data['Address']; ?></textarea>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">City</label>
										<input type="text" name="city" value="<?php echo $data['City']; ?>" class="form-control" required='true'>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">State</label>
										<input type="text" name="state" value="<?php echo $data['State']; ?>" class="form-control" required='true'>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Zip Code</label>
										<input type="text" name="zcode" value="<?php echo $data['ZipCode']; ?>" class="form-control" required='true'>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Work Phone Number</label>
										<input type="text" name="wphnumber" value="<?php echo $data['Workphnumber']; ?>" class="form-control" maxlength='10' required='true' pattern="[0-9]+">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Cell Phone Number</label>
										<input type="text" name="cellphnumber" value="<?php echo $data['Cellphnumber']; ?>" class="form-control" maxlength='10' pattern="[0-9]+">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Other Phone Number</label>
										<input type="text" name="ophnumber" value="<?php echo $data['Otherphnumber']; ?>" class="form-control" maxlength='10' pattern="[0-9]+">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Email Address</label>
										<input type="email" name="email" value="<?php echo $data['Email']; ?>" class="form-control" required='true'>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Website Address</label>
										<input type="text" name="websiteadd" value="<?php echo $data['WebsiteAddress']; ?>" required='true' class="form-control">
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Notes</label>
										<textarea name="notes" class="form-control" required='true' rows="4" cols="3"><?php echo $data['Notes']; ?></textarea>
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Creation Date</label>
										<input type="text" name="" value="<?php echo $data['CreationDate']; ?>" required='true' class="form-control" readonly='true'>
									</div>
									<button type="submit" class="btn btn-default" name="submit" id="submit">Update</button>
									<input type="button" class="btn btn-default" value="Back" onClick="history.back();return true;">
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php include_once('includes/footer.php'); ?>
			</div>
		</div>
		<?php include_once('includes/sidebar.php'); ?>
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
	<script src="/js/jquery.nicescroll.js"></script>
	<script src="/js/scripts.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="/js/bootstrap.min.js"></script>
</body>

</html>