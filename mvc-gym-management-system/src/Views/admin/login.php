<?php
error_reporting(0);
$msg = "";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="/admin/css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0//css/font-awesome.min.css">
  <title>GYM MS | Admin login</title>
</head>

<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1>GYM MS | Admin login</h1>
    </div>
    <div class="login-box">
      <form class="login-form" method="post">
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
        <?php if ($error) { ?><div class="errorWrap" style="color:red;"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap" style="color:red;"><strong>Error</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
        <div class="form-group">
          <label class="control-label">Emai </label>
          <input class="form-control" name="email" id="email" type="text" placeholder="Email" autofocus>
        </div>
        <div class="form-group">
          <label class="control-label">PASSWORD</label>
          <input class="form-control" name="password" id="password" type="password" placeholder="Password">
        </div>
        <div class="form-group">
          <div class="utility">

            <!--             <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p> -->
          </div>
        </div>
        <div class="form-group btn-container">

          <input type="submit" name="submit" id="submit" value="SIGN IN" class="btn btn-primary btn-block">
        </div>
        <hr />
        <a href="/">Back to Home Page</a>
      </form>
    </div>
  </section>
  <!-- Essential javascripts for application to work-->
  <script src="/admin/js/jquery-3.2.1.min.js"></script>
  <script src="/admin/js/popper.min.js"></script>
  <script src="/admin/js/bootstrap.min.js"></script>
  <script src="/admin/js/main.js"></script>
  <!-- The javascript plugin to display page loading on top-->
  <script src="js/plugins/pace.min.js"></script>
  <script type="text/javascript">
    // Login Page Flipbox control
    $('.login-content [data-toggle="flip"]').click(function() {
      $('.login-box').toggleClass('flipped');
      return false;
    });
  </script>
</body>

</html>