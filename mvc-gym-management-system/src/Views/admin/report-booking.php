<?php
error_reporting(0);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Vali is a">
  <title>Admin | Booking Report</title>
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


    <div class="row">

      <div class="col-md-12">
        <div class="tile">
          <!---Success Message--->

          <!---Error Message--->
          <h3 class="tile-title">Booking Report</h3>
          <div class="tile-body">
            <form class="row" method="post">
              <div class="form-group col-md-6">
                <label class="control-label">From Date</label>
                <input class="form-control" type="date" name="fdate" id="fdate" placeholder="Enter From Date">
              </div>

              <div class="form-group col-md-6">
                <label class="control-label">To Date</label>
                <input class="form-control" type="date" name="todate" id="todate" placeholder="Enter To Date">
              </div>
              <div class="form-group col-md-4 align-self-end">
                <input type="Submit" name="Submit" id="Submit" class="btn btn-primary" value="Submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    <?php
    if (isset($_POST['Submit'])) { ?>
      <?php
      $fdate = $_POST['fdate'];
      $tdate = $_POST['todate'];
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>bookingid</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>bookingdate</th>
                  </tr>
                </thead>
                <?php

                if (true) {
                  foreach ($data as $result) {
                ?>

                    <tbody>
                      <tr>
                        <td><?php echo ($cnt); ?></td>
                        <td><?php echo htmlentities($result['id']); ?></td>
                        <td><?php echo htmlentities($result['fname']); ?></td>
                        <td><?php echo htmlentities($result['email']); ?></td>
                        <td><?php echo htmlentities($result['booking_date']); ?></td>
                      </tr>
                  <?php $cnt = $cnt + 1;
                  }
                } ?>

                    </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </main>
  <!-- Essential javascripts for application to work-->
  <script src="/admin/js/jquery-3.2.1.min.js"></script>
  <script src="/admin/js/popper.min.js"></script>
  <script src="/admin/js/bootstrap.min.js"></script>
  <script src="/admin/js/main.js"></script>
  <script src="/admin/js/plugins/pace.min.js"></script>
  <script type="text/javascript" src="/admin/js/plugins/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="/admin/js/plugins/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript">
    $('#sampleTable').DataTable();
  </script>
</body>

</html>