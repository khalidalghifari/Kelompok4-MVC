<?php
error_reporting(0);
// include  'include/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Vali is a">
  <title>Admin | Add Package Type</title>
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
    <h3>Package Types</h3>
    <hr />
    <div class="row">

      <div class="col-md-6">
        <div class="tile">
          <!---Success Message--->
          <?php if ($msg) { ?>
            <div class="alert alert-success" role="alert">
              <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
            </div>
          <?php } ?>

          <!---Error Message--->
          <?php if ($errormsg) { ?>
            <div class="alert alert-danger" role="alert">
              <strong>Oh snap!</strong> <?php echo htmlentities($errormsg); ?>
            </div>
          <?php } ?>

          <form class="row" method="post">
            <div class="form-group col-md-12">
              <label class="control-label">Add Category</label>
              <select class="form-control" name="category" id="category">
                <option value="NA">--select--</option>
                <?php
                foreach ($data['categories'] as $country) {
                  echo "<option value='" . $country['id'] . "'>" . $country['category_name'] . "</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Add Package</label>
              <input class="form-control" name="addPackage" id="addPackage" type="text" placeholder="Enter Add Package">
            </div>
            <div class="form-group col-md-4 align-self-end">
              <input type="submit" name="submit" id="submit" class="btn btn-primary" value=" Submit">
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Sr.No</th>
                  <th>Category </th>
                  <th>Package</th>
                  <th>Action</th>

                </tr>
              </thead>
              <?php
              if (true) {
                foreach ($data['package'] as $result) {
              ?>
                  <tbody>
                    <tr>
                      <td><?php echo ($cnt); ?></td>
                      <td><?php echo htmlentities($result['category_name']); ?></td>
                      <td><?php echo htmlentities($result['PackageName']); ?></td>
                      <td>
                        <a href="/admins/packagetype/delete/<?php echo htmlentities($result['id']); ?>"><button class="btn btn-danger" type="button">Delete</button></a>
                      </td>
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