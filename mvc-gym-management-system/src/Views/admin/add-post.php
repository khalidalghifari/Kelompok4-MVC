<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="Vali is a">
  <title>Admin | Add Package</title>
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
    <h3> Add Package </h3>
    <hr />
    <div class="row">

      <div class="col-md-12">
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
          <div class="tile-body">
            <form class="row" method="post">
              <div class="form-group col-md-6">
                <label class="control-label">Category</label>
                <select name="category" id="category" class="form-control" onChange="getdistrict(this.value);">
                  <option value="NA">--select--</option>
                  <?php
                  foreach ($data['category'] as $country) {
                    echo "<option value='" . $country['id'] . "'>" . $country['category_name'] . "</option>";
                  }
                  ?>
                </select>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Package Type</label>
                <select name="package" id="package" class="form-control">
                  <option value="NA">--select--</option>
                  <?php
                  foreach ($data['package'] as $country) {
                    echo "<option value='" . $country['id'] . "'>" . $country['PackageName'] . "</option>";
                  }
                  ?>
                </select>
              </div>

              <div class="form-group col-md-6">
                <label class="control-label">Title Name</label>
                <input class="form-control" name="titlename" id="titlename" type="text" placeholder="Enter your Title Name">
              </div>



              <div class="form-group col-md-6">
                <label class="control-label">Package Duration</label>
                <input class="form-control" type="text" name="packageduratiobn" name="packageduratiobn" placeholder="Enter Package Duratiobn">
              </div>

              <div class="form-group col-md-6">
                <label class="control-label">Price</label>
                <input class="form-control" type="text" name="Price" id="Price" placeholder="Enter your Price">
              </div>

              <!-- <div class="form-group col-md-6">
                  <label class="control-label">File</label>
                  <input class="form-control" type="file" name="photo" id="photo">
                </div> -->

              <div class="form-group col-md-6">
                <label class="control-label">Description</label>
                <textarea name="description" id="description" class="form-control" cols="5" rows="10"></textarea>
              </div>

              <div class="form-group col-md-4 align-self-end">
                <input type="Submit" name="Submit" id="Submit" class="btn btn-primary" value="Submit">
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
  <script src="/js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
  <script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>

<!-- Script -->
<script>
  function getdistrict(val) {
    $.ajax({
      type: "POST",
      url: "ajaxfile.php",
      data: 'category=' + val,
      success: function(data) {
        $("#package").html(data);
      }
    });
  }
</script>