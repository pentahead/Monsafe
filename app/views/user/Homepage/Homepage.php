<!-- Page Wrapper -->
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-center mb-4">
    <h1 class="h1 display-4 text-center font-weight-bolder text-dark ">Ketahuilah Kondisi Kolam Ikanmu!
    </h1>
  </div>
  <div class="row justify-content-center">
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card h-100 ">
        <div class="row align-items-center">
          <?php if (!empty($data['detail'])): // Check if monitoring data is available ?>
            <div class="col-md-6">
              <div class="bg-primary text-white text-center py-3 rounded-left h-100">
                <div class="font-weight-bold mb-1"> Kadar Amonia (ppm) </div>
                <div class="h1 mb-0 display-2 font-weight-bolder">
                  <?php echo $data['detail'][0]['konsentrasi_amonia'] ?>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="font-weight-bold text-primary mb-1"> Pembaruan terakhir</div>
              <div class="h6 mb-2  text-gray-800"><?php echo $data['detail'][0]['waktu_tanggal'] ?></div>
              <div class="font-weight-bold text-primary mb-1"> Kolam Ikan</div>
              <div class="h6 mb-0 text-gray-800"><?php echo $data['detail'][0]['area_kolam'] ?></div>
            </div>
          <?php else: // If no monitoring data is available, display placeholder ?>
            <div class="col-md-6">
              <div class="bg-primary text-white text-center py-3 rounded-left h-100">
                <div class="font-weight-bold mb-1"> Kadar Amonia (ppm) </div>
                <div class="h1 mb-0 display-1 font-weight-bolder"> - </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="font-weight-bold text-primary mb-1"> Pembaruan terakhir</div>
              <div class="h6 mb-5 text-gray-800"> - </div>
              <div class="font-weight-bold text-primary mb-1"> Kolam Ikan</div>
              <div class="h6 mb-0 text-gray-800"> - </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="my-4"></div>
  <!-- End of Main Content -->
  <div class="d-flex justify-content-center">
    <a href="<?php echo BASEURL; ?>/?controller=Monitoring" class="btn btn-dark btn-icon-split align-items-center"
      style="width: 30%; min-width: 200px;"">
      <span class=" text">Monitoring</span>
      <span class="icon text-white">
        <i class="fas fa-arrow-right"></i>
      </span>
    </a>
  </div>
  <div class="my-4"></div>
</div>
</div>
<!-- End of Page Wrapper -->