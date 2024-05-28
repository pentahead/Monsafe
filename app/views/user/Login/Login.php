<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Monsafe</title>
  <link rel="icon" type="image/png" href="img/favicon.ico" />
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template -->
  <link
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i"
    rel="stylesheet">
  <link href="main_pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="main_pages/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-login-image">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="d-flex align-items-center justify-content-center">
                    <a class="btn btn-dark rounded-circle border-3 mr-4"
                      href="<?php echo BASEURL; ?>/?controller=LandingPage">
                      <i class=" fas fa-arrow-left"></i>
                    </a>
                    <img src="public/img/logo-monsafe-black.png" class="img-fluid" alt="Your Brand Logo">
                    </a>
                  </div>
                  <div class="text-center">
                    <h1 class="h6 font-weight-bold text-dark">Selamat Datang Kembali!</h1>
                  </div>
                  <div class="text-center">
                    <h1 class=" small font-weight-normal text-dark mb-4">Masukkan informasi Anda</h1>
                  </div>
                  <form method='post' action="<?php echo BASEURL; ?>/?controller=Login">
                    <div class="form-group">
                      <label for="username" class="font-weight-bold text-dark">Username</label>
                      <input type="text" name="username" class="form-control form-control-user"
                        placeholder="Masukkan Username Anda" aria-label="Username" aria-describedby="basic-addon"
                        required autofocus oninvalid="InvalidMsg(this);">
                    </div>
                    <div class="form-group">
                      <label for="password" class="font-weight-bold text-dark">Password</label>
                      <input type="password" name="password" class="form-control form-control-user mb-4"
                        placeholder="Masukkan Password Anda" aria-label="Username" aria-describedby="basic-addon"
                        required autofocus oninvalid="InvalidMsg(this);">
                    </div>
                    <div class=" row">
                      <button class="btn btn-dark btn-user btn-block btn-icon-split align-items-center mb-4 mt-4 p-2"
                        type="submit" name="login">Login
                        <span class="icon text-white">
                          <i class="fas fa-arrow-right"></i>
                        </span>
                      </button>
                  </form>
                  <hr>
                  <div class=" text-center d-flex justify-content-center ">
                    <div class="font-weight-normal small text-dark">Belum mempunyai akun? <a class="small"
                        href="<?php echo BASEURL; ?>/?controller=SignUp">Sign Up</a> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      function InvalidMsg(textbox) {
        if (textbox.value == '') {
          textbox.setCustomValidity('lengkapi data anda');
        }
        else if (textbox.validity.typeMismatch) {
          textbox.setCustomValidity('');
        }
        else {
          textbox.setCustomValidity('');
        }
        return true;
      }
    </script>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>

</html>