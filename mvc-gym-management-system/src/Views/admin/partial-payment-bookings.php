<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Vali is a">
  <title>Admin | New Bookings</title>
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
          <div class="tile-body">
            <h3>Partial Payment</h3>
            <hr />
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
              $cnt = 1;
              if (count($data) > 0) {
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