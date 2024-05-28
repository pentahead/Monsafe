<body class="bg-register-image">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
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
                    <h1 class="h5 font-weight-bolder text-dark">Selamat Datang!</h1>
                  </div>
                  <div class="text-center">
                    <h1 class=" h6 font-weight-bold text-dark mb-4">Buat akun baru Anda</h1>
                  </div>
                  <form method='post' action="<?php echo BASEURL; ?>/?controller=SignUp">
                    <div class="row">
                      <div class="col">
                        <div class="form-group font-weight-bolder text-dark">
                          <label>Nama</label>
                          <input class="form-control" type="text" name="name" placeholder="Masukkan Nama Anda" value=""
                            required autofocus oninvalid="InvalidMsg(this);">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group font-weight-bolder text-dark">
                          <label>Username</label>
                          <input class="form-control" type="text" name="username" placeholder="Buatlah username baru"
                            value="" required autofocus oninvalid="InvalidMsg(this);">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group font-weight-bolder text-dark">
                          <label>Email</label>
                          <input class="form-control" type="text" name="email" placeholder="Masukkan alamat email Anda"
                            value="" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" title="Format email tidak valid"
                            required autofocus oninvalid="InvalidMsg(this);">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group font-weight-bolder text-dark">
                          <label>Password</label>
                          <input class="form-control" type="password" name="password"
                            placeholder="Buatlah password baru" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Password harus memiliki 8 karakter, setidaknya ada angka, huruf kapital, dan huruf kecil"
                            required autofocus oninvalid="InvalidMsg(this);">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group font-weight-bolder text-dark">
                          <label>Alamat Usaha</label>
                          <input class="form-control" type="text" name="alamat" placeholder="Masukkan alamat usaha Anda"
                            value="" required autofocus oninvalid="InvalidMsg(this);">
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-dark btn-user btn-block btn-icon-split align-items-center mb-4 mt-4 p-2"
                      data-toggle="modal" data-target="#signupModal" type="submit" name="signup">Sign Up
                      <span class="icon text-white">
                        <i class="fas fa-arrow-right"></i>
                      </span>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- MOdal toogle -->
  <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold text-dark" id="exampleModalLabel">Akun Berhasil Dibuat</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
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
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>