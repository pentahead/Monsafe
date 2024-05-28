<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div>
    <div class="card">



      <form id="myform" action="<?php echo BASEURL; ?>/?controller=FormPilihan&method=updatearea" method="post">
        <input type="hidden" name="id_kolam" value="<?php echo $data['detail']['id_kolam']; ?>">
        <div class="card border-0">
          <div class="card-header bg-primary text-center h2 position-relative">
            <input name='area_kolam'
              class="text font-weight-bolder text-white text-center bg-primary border-1 border-white"
              value="<?php echo $data['detail']['area_kolam']; ?>" required autofocus oninvalid="InvalidMsg(this);" />
            <span class="input-group-text bg-primary border-0 position-absolute end-5 "
              style="top: 50%; transform: translateY(-50%);">
              <i class="fas fa-pencil-alt text-white" style="font-size: 1.5rem;"></i>
            </span>
          </div>


          <div class="card-body p-4">
            <div class="row">
              <div class="col">
                <label for="volume_air" class="form-group font-weight-bolder text-dark">Volume Air (liter)</label>
                <select id="volume_air" name="volume_air" class="form-control mb-2">
                  <option selected="" value="<?php echo $data['detail']['volume_air']; ?>">
                    <?php echo $data['detail']['volume_air']; ?>
                  </option>
                  <?php foreach ($data['volume'] as $detailItem): ?>
                    <option value="<?php echo $detailItem['volume_air']; ?>"><?php echo $detailItem['volume_air']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col mb-2">
                <div class="text font-weight-bolder text-dark">Batas Normal Amonia (ppm):</div>
                <div class="text text-dark">
                  <?php echo $data['detail']['intensitas_normal']; ?>
                </div>
              </div>
            </div>
          </div>

        </div>
      </form>
      <div class="d-flex justify-content-center p-4">
        <button class="btn btn-primary btn-icon-split align-items-center p-2" data-toggle="modal"
          data-target="#tambahModal">
          <span class="text">Simpan</span>
        </button>
      </div>

      <!-- modal -->
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


    </div>

    <div class="my-4"></div>
    <!-- End of Main Content -->

    <div class="my-4"></div>






    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

</div>
</div>

<script>
  function InvalidMsg(textbox) {
    if (textbox.value == '') {
      textbox.setCustomValidity('Lengkapi data!');
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
<!-- End of Page Wrapper -->
<!-- End of Page Wrapper -->
<!-- End of Page Wrapper -->