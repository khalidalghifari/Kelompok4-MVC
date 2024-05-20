<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid'] == 0)) {
	header('location:logout.php');
} else {
?>

	<!DOCTYPE HTML>
	<html>

	<head>
		<title>Client Management Sysytem || View Invoice </title>
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
								<li class="active">View Invoice</li>
							</ol>
						</div>
						<!--//sub-heard-part-->
						<div class="graph-visual tables-main" id="exampl">
							<h3 class="inner-tittle two">Invoice Details</h3>
							<?php
							$cnt = 1;
							$gtotal = 0;
							if (!empty($data)) {
								foreach ($data as $row) {
									if ($cnt === 1) { // Menampilkan header Client Details hanya sekali
							?>
										<div class="graph">
											<div class="tables">
												<h4>Invoice #<?php echo htmlentities($row['BillingId']); ?></h4>
												<table class="table table-bordered" width="100%" border="1">
													<tr>
														<th colspan="8">Client Details</th>
													</tr>
													<tr>
														<th>Company Name</th>
														<td><?php echo htmlentities($row['CompanyName']); ?></td>
														<th>Contact Name</th>
														<td><?php echo htmlentities($row['ContactName']); ?></td>
													</tr>
													<tr>
														<th>Contact no.</th>
														<td><?php echo htmlentities($row['Workphnumber']); ?></td>
														<th>Email</th>
														<td><?php echo htmlentities($row['Email']); ?></td>
													</tr>
													<tr>
														<th>Account ID</th>
														<td><?php echo htmlentities($row['AccountID']); ?></td>
														<th>Invoice Date</th>
														<td colspan="6"><?php echo htmlentities($row['PostingDate']); ?></td>
													</tr>
												</table>
											</div>
										</div>
							<?php
									}
									$cnt++;
								}
							} ?>
							<div class="graph">
								<div class="tables">
									<table class="table table-bordered" width="100%" border="1">
										<tr>
											<th colspan="3">Services Details</th>
										</tr>
										<tr>
											<th>#</th>
											<th>Service</th>
											<th>Cost</th>
										</tr>
										<?php
										$cnt = 1;
										if (!empty($data)) {
											foreach ($data as $row) {
										?>
												<tr>
													<th><?php echo htmlentities($cnt); ?></th>
													<td><?php echo htmlentities($row['ServiceName']); ?></td>
													<td><?php echo "$" . htmlentities($subtotal = $row['ServicePrice']); ?></td>
												</tr>
										<?php
												$gtotal += $subtotal;
												$cnt++;
											}
										} ?>
										<tr>
											<th colspan="2" style="text-align:center">Grand Total</th>
											<th><?php echo "$" . htmlentities($gtotal); ?></th>
										</tr>
									</table>
									<p style="margin-top:1%" align="center">
										<i class="fa fa-print fa-2x" style="cursor: pointer;" onClick="CallPrint(this.value)"></i>
									</p>
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
		<script>
			function CallPrint(strid) {
				var prtContent = document.getElementById("exampl");
				var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
				WinPrint.document.write(prtContent.innerHTML);
				WinPrint.document.close();
				WinPrint.focus();
				WinPrint.print();
				WinPrint.close();
			}
		</script>
	</body>

	</html>
<?php }  ?>