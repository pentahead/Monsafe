<!-- Page Wrapper -->
<!-- End of Topbar -->
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="row justify-content-center">
    <?php
    $counter = 0; // Inisialisasi penghitung
    foreach ($data['detail'] as $detail):
      if ($counter >= 12)
        break; // Hentikan loop jika sudah 12 card
      ?>
      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card h-100 ">
          <div class="row align-items-center">
            <div class="col-md-5">
              <div class="bg-primary text-white text-center py-3 rounded-left ">
                <div class="font-weight-bold mb-1">Kadar Amonia (ppm)</div>
                <div class="  display-4  font-weight-bolder"><?php echo $detail['konsentrasi_amonia']; ?></div>
              </div>
            </div>
            <div class="col-auto">
              <div class="font-weight-bold text-primary mb-1">
                Pembaruan terakhir</div>
              <div class="h6 mb-2  text-gray-800"><?php echo $detail['waktu']; ?></div>
              <div class="font-weight-bold text-primary mb-1">
                Kolam Ikan</div>
              <div class="h6 mb-0  text-gray-800"><?php echo $detail['area_kolam']; ?></div>
            </div>
          </div>
        </div>
      </div>
      <?php
      $counter++; // Tambah penghitung setiap iterasi
    endforeach; ?>
  </div>
  <div class="my-4"></div>
  <!-- End of Main Content -->
  <div class="my-4"></div>
</div>
</div>
<!-- End of Content Wrapper -->
<!-- End of Page Wrapper -->
