<!DOCTYPE html>
<html lang="en">
<head>
	<base href="http://localhost/PRO1014/">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Viettel Store</title>
  <link rel="shortcut icon" href="public/images/favicon.ico">
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/app.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="public/fonts/fontawesome-pro-5.14.0-web/css/all.min.css">
</head>
<body class="authentication-bg bg-primary authentication-bg-pattern d-flex align-items-center pb-0 vh-100">
	<div class="home-btn d-none d-sm-block">
    <a href="home.php"><i class="fas fa-home h2 text-white"></i></a>
  </div>
  <div class="account-pages w-100 mt-5 mb-5">
    <div class="container">
			<div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
          <div class="card mb-0">
            <div class="card-body p-4">
              <div class="account-box">
                <div class="account-logo-box">
                  <div class="text-center">
                    <a href="index.html">
                      <img src="public/images/viettelstore-logo-login.png" alt="" height="50">
                    </a>
                  </div>
                  <h5 class="text-uppercase mb-1 mt-4">Đăng nhập</h5>
                  <p class="mb-0">Đăng nhập vào tại khoản quản trị</p>
                </div>
                <?php if (isset($data["Error"])): ?>
                    <div class="mt-2 mb-2" id="errorMessage" style="color: #d0021b">
                  Tên đăng nhập hoặc Mật khẩu không đúng!
                    </div>
                  <?php endif ?>
                <div class="account-content mt-4">
                  <form class="form-horizontal" action="Admin" method="post" accept-charset="utf-8" autocomplete="off">
                    <div class="form-group row">
                      <div class="col-12">
                        <label for="username">Tên đăng nhập</label>
                        <input class="form-control" type="text" id="username" name="username" nrequired="" placeholder="Tên đăng nhập" autocomplete="off">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-12">
                        <a href="page-recoverpw.html" class="text-muted float-right"><small>Quên mật khẩu?</small></a>
                        <label for="password">Mật khẩu</label>
                        <input class="form-control" type="password" required="" id="password" name="password" placeholder="Mật khẩu của bạn" autocomplete="off">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-12">
                        <div class="checkbox checkbox-success">
                          <input id="remember" type="checkbox" checked="">
                          <label for="remember">
                             Ghi nhớ đăng nhập
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row text-center mt-2">
                      <div class="col-12">
                        <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit" name="login">Đăng nhập</button>
                      </div>
                    </div>
                  </form>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="text-center">
                        <button type="button" class="btn mr-1 btn-facebook waves-effect waves-light">
                          <i class="fab fa-facebook-f"></i>
                        </button>
                        <button type="button" class="btn mr-1 btn-googleplus waves-effect waves-light">
                          <i class="fab fa-google"></i>
                        </button>
                        <button type="button" class="btn mr-1 btn-twitter waves-effect waves-light">
                          <i class="fab fa-twitter"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- <div class="row mt-4 pt-2">
                    <div class="col-sm-12 text-center">
                      <p class="text-muted mb-0">Don't have an account? <a href="page-register.html" class="text-dark ml-1"><b>Sign Up</b></a></p>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
       <!-- end row -->
    </div>
    <!-- end container -->
  </div>
  <!-- end page -->
</body>
</html>