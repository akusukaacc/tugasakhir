
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title> FISHPICK </title>

  <!-- Bootstrap CSS -->
  <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?=base_url('assets/css/bootstrap-theme.css')?>" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?=base_url('assets/css/elegant-icons-style.css')?>" rel="stylesheet" />
  <link href="<?=base_url('assets/css/font-awesome.css')?>" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/css/style-responsive.css')?>" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" method="POST"  action="<?= base_url('dashboard/prosesLogin') ?>">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span style="background-color:#ffd700" class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name ="username" class="form-control" placeholder="Username" autofocus>
        </div>
        <div class="input-group">
          <span style="background-color:#ffd700" class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </div>
        
        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
      
      </div>
    </form>
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
        </div>
    </div>
  </div>


</body>

</html>
