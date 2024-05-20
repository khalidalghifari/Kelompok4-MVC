<?php
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid'] == 0)) {
	header('location:logout.php');
} else {
?>

	<!DOCTYPE HTML>
	<html>

	<head>
		<title>Client Management Sysytem || Manage Services </title>
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
		<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
		<!-- lined-icons -->
		<link rel="stylesheet" href="/css/icon-font.min.css" type='text/css' />
		<!-- /js -->
		<script src="js/jquery-1.10.2.min.js"></script>
		<!-- //js-->
	</head>

	<body>
		<div class="page-container">
			<!--/content-inner-->
			<div class="left-content">
				<div class="inner-content">
					<!-- header-starts -->
					<?php include_once('includes/header.php'); ?>
					<!-- //header-ends -->
					<!--outter-wp-->
					<div class="outter-wp">
						<!--sub-heard-part-->
						<div class="sub-heard-part">
							<ol class="breadcrumb m-b-0">
								<li><a href="dashboard.php">Home</a></li>
								<li class="active">Manage Services</li>
							</ol>
						</div>
						<!--//sub-heard-part-->
						<div class="graph-visual tables-main">


							<h3 class="inner-tittle two">Manage Services </h3>
							<div class="graph">
								<div class="tables">
									<table class="table" border="1">
										<thead>
											<tr>
												<th>#</th>
												<th>Service Name</th>
												<th>Service Price</th>
												<th>Creation Date</th>

												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
											// Pastikan variabel $services ada dan berisi data
											if (isset($data) && count($data) > 0) {
												$cnt = 1;
												foreach ($data as $service) { ?>
													<tr>
														<td><?php echo htmlspecialchars($cnt); ?></td>
														<td><?php echo htmlspecialchars($service['ServiceName']); ?></td>
														<td><?php echo htmlspecialchars($service['ServicePrice']); ?></td>
														<td><?php echo htmlspecialchars($service['CreationDate']); ?></td>
														<td><a href="/admin/service/edit/<?= $service['ID'] ?>">Edit</a></td>
													</tr>
												<?php $cnt++;
												}
											} else { ?>
												<tr>
													<td colspan="4">No services found</td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>

							</div>

						</div>
						<!--//graph-visual-->
					</div>
					<!--//outer-wp-->
					<?php include_once('includes/footer.php'); ?>
				</div>
			</div>
			<!--//content-inner-->
			<!--/sidebar-menu-->
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
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	</body>

	</html>
<?php }  ?>