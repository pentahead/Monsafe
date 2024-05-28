<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="card">
    <div class="card-header bg-primary">
      <h2 class="text font-weight-bolder text-white text-center">
        <?php echo $data['volume'][0]['area_kolam'] ?>
      </h2>
    </div>
    <div class="card-body p-4">

      <div class="row">
        <div class="col mb-2">
          <div class="form-group font-weight-bolder text-dark">Volume Air (liter):</div>
          <div class="text text-dark">
            <?php echo $data['volume'][0]['volume_air']; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col mb-2">
          <div class="text font-weight-bolder text-dark">Batas Normal Amonia (ppm):</div>
          <div class="text text-dark">
            <?php echo $data['volume'][0]['intensitas_normal']; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center p-4">
      <a href="<?php echo BASEURL; ?>/?controller=FormPilihan&id_kolam=<?php echo $data['volume'][0]['id_kolam']; ?>"
        class="btn btn-primary btn-icon-split align-items-center p-2" ">
        <span class=" btn btn-primary">Ubah</span>
      </a>
    </div>
  </div>
  <div class="my-4"></div>
  <!-- End of Main Content -->
  <div class="my-4"></div>
  <!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->