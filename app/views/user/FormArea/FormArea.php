<!-- Begin Page Content -->
<!-- user/TambahArea/TambahArea.php -->
<div class="container-fluid">
  <div class="card">
    <div class="card-header bg-primary">
      <h2 class="text font-weight-bolder text-white text-center">Buat Area Monitoring Baru</h2>
    </div>
    <div class="card-body p-4">
      <form id="myform" method='post' action="<?php echo BASEURL; ?>/?controller=FormArea&method=tambah">
        <div class="row">
          <div class="col">
            <div class="form-group font-weight-bolder text-dark">
              <label>Nama Kolam</label>
              <input class="form-control" type="text" name="kolam" placeholder="Buatlah nama kolam" value=""
                title=" Tidak Boleh Kosong" required autofocus oninvalid="InvalidMsg(this);" oninput="checkForm()">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group font-weight-bolder text-dark">
              <label>Volume Air</label>
              <select id="country" class="form-control mb-2" name="volume_air" required autofocus oninput="checkForm()">
                <option selected="" value="">Pilih Volume</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="30">30</option>
                <option value="35">35</option>
                <option value="40">40</option>
                <option value="45">45</option>
                <option value="50">50</option>
                <option value="55">55</option>
              </select>
            </div>
          </div>
        </div>
      </form>
      <div class="d-flex justify-content-center p-4">
        <button class="btn btn-primary btn-icon-split align-items-center p-2" style="width: 50%;" data-toggle="modal"
          data-target="#tambahModal" name="tambahkan" id="submitButton" disabled>
          <span class="text">Tambahkan</span>
        </button>
      </div>
    </div>
  </div>
  <div class="my-4"></div>
</div>
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bolder text-dark" id="exampleModalLabel">Area Monitoring Berhasil
          Ditambahkan!</h5>
        <button form="myform" type="submit" class="btn">
          <span aria-hidden="true">×</span>
        </button>
      </div>
    </div>
  </div>
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- End of Page Wrapper -->
<script>
  function InvalidMsg(textbox) {
    if (textbox.value == '') {
      textbox.setCustomValidity('Lengkapi data!');
    } else if (textbox.validity.typeMismatch) {
      textbox.setCustomValidity('');
    } else {
      textbox.setCustomValidity('');
    }
    return true;
  }

  function checkForm() {
    const form = document.getElementById('myform');
    const submitButton = document.getElementById('submitButton');
    const isValid = form.checkValidity();

    submitButton.disabled = !isValid;
  }

  document.addEventListener('DOMContentLoaded', (event) => {
    const inputs = document.querySelectorAll('#myform input, #myform select');
    inputs.forEach(input => {
      input.addEventListener('input', checkForm);
    });
    checkForm(); // Initial check
  });
</script>