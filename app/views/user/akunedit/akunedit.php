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
                    <form id="myform" action="<?php echo BASEURL; ?>/?controller=Akunedit&method=updateProfile"
                      method="post">
                      <div class="row">
                        <div class="col">
                          <h2 class="text-center font-weight-bolder text-dark"> Akun Ku </h2>
                          <div class="form-group font-weight-bolder text-dark">
                            <label>Nama</label>
                            <input class="form-control" type="text" name="nama_pemilik" placeholder=""
                              value="<?php echo $data['detail']['nama_pemilik']; ?>" oninvalid="InvalidMsg(this);"
                              required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group font-weight-bolder text-dark">
                            <label>Username </label>
                            <input class="form-control" type="text" name="username" placeholder=""
                              value="<?php echo $data['detail']['username']; ?>" oninvalid="InvalidMsg(this);" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group font-weight-bolder text-dark">
                            <label>Email</label>
                            <input class="form-control" type="text" name="email" placeholder=""
                              value="<?php echo $data['detail']['email']; ?>" oninvalid="InvalidMsg(this);" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group font-weight-bolder text-dark">
                            <label>Alamat Usaha</label>
                            <input class="form-control" type="text" name="alamat_usaha" placeholder=""
                              value="<?php echo $data['detail']['alamat_usaha']; ?>" oninvalid="InvalidMsg(this);"
                              required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 col-sm-6 mb-3">
                          <div class="mb-2 font-weight-bolder text-dark"><b>Ganti Password</b></div>
                          <div class="row">
                            <div class="col">
                              <div class="form-group font-weight-bolder text-dark">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" placeholder="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <div class="col d-flex justify-content-end">
                      <button class="btn btn-primary " data-toggle="modal" data-target="#tambahModal">
                        <span class="text">Simpan</span>
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
  <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bolder text-dark" id="exampleModalLabel">Data
            Berhasil Diubah!</h5>
          <button form="myform" type="submit" class="btn">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="my-4"></div>
  <!-- Tambahkan skrip JavaScript di bagian bawah halaman -->
  <!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<script>
  function InvalidMsg(textbox) {
    if (textbox.value == '') {
      textbox.setCustomValidity('Lengkapi data! ');
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
<!-- End of Page Wrapper -->