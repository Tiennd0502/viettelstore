<!DOCTYPE html>
<html lang="en">
<head>
	<base href="http://localhost/PRO1014/">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Viettel Store</title>
  <link rel="shortcut icon" href="public/images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="public/css/app.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="public/fonts/fontawesome-pro-5.14.0-web/css/all.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="public/css/icons.min.css"> -->
  <link rel="stylesheet" type="text/css" href="public/css/sb-admin.css">
</head>
<body>
  <!-- Begin page -->
  <div id="wrapper">
    <!-- Topbar Start -->
    <?php require_once './mvc/views/blocks/navbar_admin.php'; ?>
    <!-- end Topbar -->
    <!-- ========== Left Sidebar Start ========== -->
    <?php require_once './mvc/views/blocks/side_menu.php'; ?>
    <!-- Left Sidebar End -->
    <!--========================= -->
    <!-- Start Page Content here -->
    <!-- ========================================== -->
    <div class="content-page">
      <div class="content">
      <!-- Start Content-->
      <div class="container-fluid">
        <!-- start page title -->
         <?php require_once './mvc/views/blocks/submenu.php'; ?>   
        <!-- end page title --> 
      <?php require_once './mvc/views/pages/'. $data["Page"].".php"; ?>
       </div> <!-- end container-fluid -->
    </div>
    <!-- end content -->
      <!-- Footer Start -->
      <?php require_once './mvc/views/blocks/footer_admin.php'; ?>
      <!-- end Footer -->
    </div>
    <!-- =============================== -->
    <!-- End Page content -->
    <!-- ============================== -->
  </div>
  <!-- END wrapper -->

  <!-- Right Sidebar -->
  <div class="right-bar">
    <div class="rightbar-title">
        <a href="javascript:void(0);" class="right-bar-toggle float-right">
            <i class="mdi mdi-close"></i>
        </a>
        <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
    </div>
    <div class="slimscroll-menu">

        <div class="p-3">
            <div class="alert alert-warning" role="alert">
                <strong>Customize </strong> the overall color scheme, layout, etc.
            </div>
            <div class="mb-2">
                <img src="assets/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
            </div>
    
            <div class="mb-2">
                <img src="assets/images/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" 
                    data-appStyle="assets/css/app-dark.min.css" />
                <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
            </div>
    
            <div class="mb-2">
                <img src="assets/images/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
            </div>

            <div class="mb-2">
                <img src="assets/images/layouts/dark-rtl.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-5">
                <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" 
                    data-appStyle="assets/css/app-dark-rtl.min.css" />
                <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
            </div>

            <a href="https://1.envato.market/y2YAD" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
        </div>
    </div> <!-- end slimscroll-menu-->
  </div>
  <!-- /Right-bar -->

  <!-- Right bar overlay-->
  <div class="rightbar-overlay"></div>
  <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
      <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
  </a>

  <!-- Vendor js -->
  <script src="public/javascripts/vendor.min.js"></script>

  <!--C3 Chart-->
  <script src="public/library/d3/d3.min.js"></script>
  <script src="public/library/c3/c3.min.js"></script>

  <script src="public/library/echarts/echarts.min.js"></script>

  <script src="public/javascripts/pages/dashboard.init.js"></script>

  <!-- App js -->
  <script src="public/javascripts/app.min.js"></script>
  <script src="public/javascripts/admin.js"></script>

  <!-- jQuery -->
  <script type="text/javascript" src="public/javascripts/jquery-3.5.0.min.js"></script>
  <script type="text/javascript" src="public/library/ckeditor/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('Description');
  </script>     
</body>
</html>