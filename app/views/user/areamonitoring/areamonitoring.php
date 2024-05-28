<!-- Begin Page Content -->
<div class="container-fluid d-flex flex-column min-vh-100">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-center mb-4">
    <h1 class="h1 display-4 text-center font-weight-bolder text-dark">Tambahkan Area Monitoring Baru!</h1>
  </div>
  <div class="d-flex justify-content-center p-4">
    <a href="<?php echo BASEURL; ?>/?controller=FormArea" class="btn btn-dark btn-icon-split align-items-center p-2"
      style="width: 50%;">
      <span class="text">Tambahkan</span>
    </a>
  </div>
  <div class="row justify-content-center flex-grow-1">
    <div class="col-xl-8 col-md-6 mb-4">
      <?php foreach ($data['detail'] as $detailItem): ?>
        <div class="d-flex align-items-center justify-content-center mb-3">
          <a href="<?php echo BASEURL; ?>/?controller=AreaPilihan&id_kolam=<?php echo $detailItem['id_kolam']; ?>"
            class="btn btn-primary btn-icon-split d-flex align-items-center p-2" style="width: 50%;">
            <span class="d-flex align-items-center justify-content-start pl-2" style="width: 15%;">
              <img src="public/img/icon-kolam.png" style="max-width: 60%; height: auto;" alt="icon">
            </span>
            <span
              class="text d-flex align-items-center justify-content-start flex-grow-1"><?php echo $detailItem['area_kolam']; ?></span>
            <span class="text-white">
              <i class="fas fa-arrow-right pr-2"></i>
            </span>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<!-- End of Page Wrapper -->