<?php
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Vali is a">
  <title>Admin | Change Password</title>
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

      <div class="col-md-6">
        <div class="tile">
          <h3 class="tile-title">Change Password</h3>
          <?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

          <div class="tile-body">
            <form class="row" method="post">
              <div class="form-group col-md-12">
                <label class="control-label">Old Password</label>
                <input type="password" name="password" id="password" placeholder="Old Password" class="form-control" autocomplete="off">
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">New Password</label>
                <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="New Password" autocomplete="off">
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Confirm Password</label>
                <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" autocomplete="off" class="form-control">

              </div>

              <div class="form-group col-md-4 align-self-end">
                <input type="Submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
              </div>
            </form>
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
  <script src="/admin/js/plugins/pace.min.js"></script>
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
</body>

</html>