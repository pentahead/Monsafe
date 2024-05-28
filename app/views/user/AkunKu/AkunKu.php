<!-- Content Wrapper -->
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="container">
    <div class="row flex-lg-nowrap">
      <div class="col-12 col-lg-auto mb-3" style="width: 200px;"></div>
      <div class="col">
        <div class="row">
          <div class="col mb-3">
            <div class="card">
              <div class="card-body">
                <div class="tab-content pt-3">
                  <div class="tab-pane active">
                    <form class="form" novalidate="">
                      <div class="row">
                        <div class="col">
                          <h2 class="text-center font-weight-bolder text-dark"> Akun Ku </h2>
                          <div class="form-group font-weight-bolder text-dark">
                            <label>Nama </label>
                            <input class="form-control font-weight-bold text-dark" type="text" name="name"
                              placeholder="<?php echo $data['detail']['nama_pemilik']; ?>" disabled
                              style="color: #000000;">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group font-weight-bolder text-dark">
                            <label>Username </label>
                            <input class="form-control font-weight-bold text-dark" type="text" name="name"
                              placeholder="<?php echo $data['detail']['username']; ?>" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group font-weight-bolder text-dark">
                            <label>Email</label>
                            <input class="form-control font-weight-bold text-dark" type="text" name="name"
                              placeholder="<?php echo $data['detail']['email']; ?>" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group font-weight-bolder text-dark">
                            <label>Password</label>
                            <input class="form-control" type="password" placeholder="••••••" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group font-weight-bolder text-dark">
                            <label>Alamat </label>
                            <input class="form-control font-weight-bold text-dark" type="text" name="name"
                              placeholder="<?php echo $data['detail']['alamat_usaha']; ?>" disabled>
                          </div>
                        </div>
                      </div>
                    </form>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <a href="<?php echo BASEURL; ?>/?controller=Akunedit">
                          <button class="btn btn-primary">Ubah
                          </button>
                        </a>
                      </div>
                      <div class=" px-xl-3">
                        <div class=" px-xl-3">
                          <button class="btn btn-danger  " data-toggle="modal" data-target="#logoutModal">
                            <i class="fa fa-sign-out"></i>
                            <span>Logout</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="my-4"></div>
  <!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->