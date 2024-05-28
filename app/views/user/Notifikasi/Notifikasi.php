<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-center m-5 mb-4">
    <h1 class="h1 display-4 text-center font-weight-bolder text-dark  ">Dapatkan Pemberitahuan Waktu
      Pengurasan
      Amonia
    </h1>
  </div>
  <div class="row justify-content-center">
    <div class="row justify-content-center">
      <?php
      $counter = 0; // Inisialisasi penghitung
      foreach ($data['detail'] as $detail):
        if ($counter >= 12)
          break; // Hentikan loop jika sudah 12 card
        ?>
        <div class="col-md-12 py-2">
          <div class="card bg-danger">
            <div class="row align-items-center">
              <div class="col-md-8">
                <div class="text-white py-1 m-3">
                  <div class="h5 font-weight-bolder mb-1">Intensitas Amonia Kolam Mu melebihi batas normal ! Segera
                    Lakukan Pengurasan!</div>
                  <div class="h6 mb-1"><?php echo $detail['area_kolam'] ?> butuh dikuras! Amonia sudah melebihi
                    batas ambang
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        $counter++; // Tambah penghitung setiap iterasi
      endforeach; ?>
    </div>
  </div>
  <div class="my-4"></div>
  <div class="my-4"></div>
</div>
</div>
<!-- End of Page Wrapper -->