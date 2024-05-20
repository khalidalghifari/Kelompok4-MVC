<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin | Dashboard</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="/admin/css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini rtl">
  <!-- Navbar-->
  <?php include 'admin/include/header.php'; ?>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <?php include 'admin/include/sidebar.php'; ?>
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      </ul>
    </div>
    <div class="row">

      <div class="col-md-6 col-lg-6">
        <a href="add-category.php">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Listed Categories</h4>
              <p><b><?php echo $data['category']; ?></b></p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-6 col-lg-6">
        <a href="add-package.php">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Listed Package Type</h4>
              <p><b><?php echo $data['packages']; ?></b></p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-6 col-lg-6">
        <a href="booking-history.php">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Total Bookings</h4>
              <p><b><?php echo $data['booking']; ?></b></p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-6 col-lg-6">
        <a href="new-bookings.php">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-user fa-3x"></i>
            <div class="info">
              <h4>New Bookings</h4>
              <p><b><?php echo $data['null']; ?></b></p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-6 col-lg-6">
        <a href="partial-payment-bookings.php">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-user fa-3x"></i>
            <div class="info">
              <h4>Partial Payment Bookings</h4>
              <p><b><?php echo $data['partial']; ?></b></p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-6">
        <a href="full-payment-bookings.php">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-user fa-3x"></i>
            <div class="info">
              <h4>Full Payment Bookings</h4>
              <p><b><?php echo $data['full']; ?></b></p>
            </div>
          </div>
        </a>
      </div>


    </div>

  </main>
  <!-- Essential javascripts for application to work-->
  <script src="/admin/js/jquery-3.2.1.min.js"></script>
  <script src="/admin/js/popper.min.js"></script>
  <script src="/admin/js/bootstrap.min.js"></script>
  <script src="/admin/js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="/admin/js/plugins/pace.min.js"></script>
  <!-- Page specific javascripts-->
  <!-- Data table plugin-->
  <script type="text/javascript" src="/admin/js/plugins/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="/admin/js/plugins/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript">
    $('#sampleTable').DataTable();
  </script>

</body>

</html>