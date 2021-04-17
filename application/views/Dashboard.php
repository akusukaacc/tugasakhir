<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Creative - Bootstrap Admin Template</title>

  <!-- Bootstrap CSS -->
  <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?=base_url('assets/css/bootstrap-theme.css')?>" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?=base_url('assets/css/elegant-icons-style.css')?>" rel="stylesheet" />
  <link href="<?=base_url('assets/css/font-awesome.min.css')?>" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="<?=base_url('assets/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')?>" rel="stylesheet" />
  <link href="<?=base_url('assets/assets/fullcalendar/fullcalendar/fullcalendar.css')?>" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="<?=base_url('assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')?>" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="<?=base_url('assets/css/owl.carousel.css')?>" type="text/css">
  <link href="<?=base_url('assets/css/jquery-jvectormap-1.2.2.css')?>" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="<?=base_url('assets/css/fullcalendar.css')?>">
  <link href="<?=base_url('assets/css/widgets.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/css/style.css')?>" rel="stylesheet">
  <link href="<?=base_url('assets/css/style-responsive.css')?>" rel="stylesheet" />
  <link href="<?=base_url('assets/css/xcharts.min.css')?>" rel=" stylesheet">
  <link href="<?=base_url('assets/css/jquery-ui-1.10.4.min.css')?>" rel="stylesheet">

  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo">INVENTARIS <span class="lite">ADMIN</span></a>
      <!--logo end-->

  

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">


          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                            </span>
                            <span class="username">My Profile</span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
              <li>
                <a href="login.html"><i class="icon_key_alt"></i> Log Out</a>
              </li>
              <li>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="index.html">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Master Data</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="form_component.html">Barang</a></li>
              <li><a class="" href="form_validation.html">User</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <ul class="sub">
              <li><a class="" href="general.html">Elements</a></li>
              <li><a class="" href="buttons.html">Buttons</a></li>
              <li><a class="" href="grids.html">Grids</a></li>
            </ul>
          </li>
          <li>
          </li>
          <li>

          </li>

          <li class="sub-menu">
            <ul class="sub">
              <li><a class="" href="basic_table.html">Basic Table</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <ul class="sub">
              <li><a class="" href="profile.html">Profile</a></li>
              <li><a class="" href="login.html"><span>Login Page</span></a></li>
              <li><a class="" href="contact.html"><span>Contact Page</span></a></li>
              <li><a class="" href="blank.html">Blank Page</a></li>
              <li><a class="" href="404.html">404 Error</a></li>
            </ul>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-cloud-download"></i>
              <div class="count">6.674</div>
              <div class="title">Download</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-shopping-cart"></i>
              <div class="count">7.538</div>
              <div class="title">Purchased</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-thumbs-o-up"></i>
              <div class="count">4.362</div>
              <div class="title">Order</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-cubes"></i>
              <div class="count">1.426</div>
              <div class="title">Stock</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->


    


        <!-- Today status end -->



        <div class="row">

       
          <!--/col-->

          <div class="col-md-3">

            <!--/social-box-->

          </div>
          <!--/col-->

          <!--/col-->

        </div>



        <!-- statics end -->




        <!-- project team & activity start -->


        <!-- project team & activity end -->

        </section>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="<?=base_url('assets/js/jquery.js')?>"></script>
  <script src="<?=base_url('assets/js/jquery-ui-1.10.4.min.js')?>"></script>
  <script src="<?=base_url('assets/js/jquery-1.8.3.min.js')?>"></script>
  <script type="text/javascript" src="<?=base_url('assets/js/jquery-ui-1.9.2.custom.min.js')?>"></script>
  <!-- bootstrap -->
  <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
  <!-- nice scroll -->
  <script src="<?=base_url('assets/js/jquery.scrollTo.min.js')?>"></script>
  <script src="<?=base_url('assets/js/jquery.nicescroll.js')?>" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="<?=base_url('assets/assets/jquery-knob/js/jquery.knob.js')?>"></script>
  <script src="<?=base_url('assets/js/jquery.sparkline.js')?>" type="text/javascript"></script>
  <script src="<?=base_url('assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')?>"></script>
  <script src="<?=base_url('assets/js/owl.carousel.js')?>"></script>
  <!-- jQuery full calendar -->
  <<script src="<?=base_url('assets/js/fullcalendar.min.js')?>"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="<?=base_url('assets/assets/fullcalendar/fullcalendar/fullcalendar.js')?>"></script>
    <!--script for this page only-->
    <script src="<?=base_url('assets/js/calendar-custom.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.rateit.min.js')?>"></script>
    <!-- custom select -->
    <script src="<?=base_url('assets/js/jquery.customSelect.min.js')?>"></script>
    <script src="<?=base_url('assets/assets/chart-master/Chart.js')?>"></script>

    <!--custome script for all page-->
    <script src="<?=base_url('assets/js/scripts.js')?>"></script>

    <!-- custom script for this page-->
    <script src="<?=base_url('assets/js/sparkline-chart.js')?>"></script>
    <script src="<?=base_url('assets/js/easy-pie-chart.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery-jvectormap-1.2.2.min.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery-jvectormap-world-mill-en.js')?>"></script>
    <script src="<?=base_url('assets/js/xcharts.min.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.autosize.min.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.placeholder.min.js')?>"></script>
    <script src="<?=base_url('assets/js/gdp-data.js')?>"></script>
    <script src="<?=base_url('assets/js/morris.min.js')?>"></script>
    <script src="<?=base_url('assets/js/sparklines.js')?>"></script>
    <script src="<?=base_url('assets/js/charts.js')?>"></script>
    <script src="<?=base_url('assets/js/jquery.slimscroll.min.js')?>"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>

</body>

</html>