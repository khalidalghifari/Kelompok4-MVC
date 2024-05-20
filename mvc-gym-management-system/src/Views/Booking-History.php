<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>User | Booking History</title>
  <meta charset="UTF-8">
  <meta name="description" content="Ahana Yoga HTML Template">
  <meta name="keywords" content="yoga, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <link rel="stylesheet" href="css/owl.carousel.min.css" />
  <link rel="stylesheet" href="css/nice-select.css" />
  <link rel="stylesheet" href="css/slicknav.min.css" />

  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="css/style.css" />

</head>

<body>
  <!-- Page Preloder -->


  <!-- Header Section -->
  <?php include 'include/header.php'; ?>
  <!-- Header Section end -->

  <!-- Page top Section -->
  <section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 m-auto text-white">
          <h2>Booking History</h2>

        </div>
      </div>
    </div>
  </section>
  <!-- Page top Section end -->
  <!-- Contact Section -->
  <section class="contact-page-section spad overflow-hidden">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Sr.No</th>
                <th>bookingid</th>
                <th>Name</th>
                <th>email</th>
                <th>bookingdate</th>
                <th>title</th>
                <th>PackageDuratiobn</th>
                <th>price</th>
                <th>Description</th>
                <th>Action</th>
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
                    <td><?php echo htmlentities($result['titlename']); ?></td>
                    <td><?php echo $result['PackageDuratiobn']; ?></td>
                    <td><?php echo $result['Price']; ?></td>
                    <td><?php echo htmlentities($result['Description']); ?></td>
                    <td><a href="/booking/<?php echo htmlentities($result['id']); ?>"><button class="btn btn-primary" type="button">View</button></td>
                  </tr>
              <?php $cnt = $cnt + 1;
              }
            } ?>

                </tbody>
          </table>
        </div>

      </div>
    </div>
  </section>
  <!-- Trainers Section end -->



  <!-- Footer Section -->
  <?php include 'include/footer.php'; ?>
  <!-- Footer Section end -->

  <div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

  <!--====== Javascripts & Jquery ======-->
  <script src="/js/vendor/jquery-3.2.1.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/jquery.slicknav.min.js"></script>
  <script src="/js/owl.carousel.min.js"></script>
  <script src="/js/jquery.nice-select.min.js"></script>
  <script src="/js/jquery-ui.min.js"></script>
  <script src="/js/jquery.magnific-popup.min.js"></script>
  <script src="/js/main.js"></script>

</body>

</html>
<style>
  .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #dd3d36;
    color: #fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
  }

  .succWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #5cb85c;
    color: #fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
  }
</style>