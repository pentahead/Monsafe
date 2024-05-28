<!-- Page Wrapper -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "monsafe";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $status = $_POST['status'];
  $sql = "UPDATE data_monitoring SET status='$status' WHERE id_monitoring=0";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}
$result = $conn->query("SELECT status FROM data_monitoring WHERE id_monitoring=0");
$row = $result->fetch_assoc();
$current_status = $row['status'];


$conn->close();
?>
<style>
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }

  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: .4s;
    border-radius: 34px;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
  }

  input:checked+.slider {
    background-color: #32CD32;
  }

  input:checked+.slider:before {
    transform: translateX(26px);
  }
</style>
<script>
  function toggleStatus() {
    var status = document.getElementById('switch').checked ? 'ON' : 'OFF';
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("status=" + status);

    // Update current status on the page
    document.getElementById('status').innerText = status;
  }

  window.onload = function () {
    var currentStatus = '<?php echo $current_status; ?>';
    document.getElementById('switch').checked = (currentStatus === 'ON');
  }
</script>
<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row justify-content-center">
    <?php foreach ($data['detail'] as $detail): ?> <!-- Melakukan iterasi melalui setiap detail -->
      <div class="col-12 mb-4"> <!-- Gunakan col-12 untuk memastikan setiap card mengambil seluruh lebar -->
        <div class="card h-100">
          <div class="row align-items-center">
            <div class="col-md-4">
              <div class="bg-primary text-white text-center py-3 rounded-left">
                <div class="font-weight-bold mb-1">Kadar Amonia (ppm)</div>
                <div class="h5 display-4 font-weight-bolder"><?php echo $detail['konsentrasi_amonia']; ?></div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="font-weight-bold text-primary mb-1">Pembaruan terakhir</div>
              <div class="h6 mb-2 text-gray-800"><?php echo $detail['waktu_tanggal']; ?></div>
              <div class="font-weight-bold text-primary mb-1">Kolam Ikan</div>
              <div class="h6 mb-0 text-gray-800"><?php echo $detail['area_kolam']; ?></div>
            </div>
            <div class="col-md-4 text-center">
              <div class="font-weight-bold text-primary mb-1">Pengurasan</div>
              <!-- Kolom baru untuk Pengurasan dan tombol -->
              <label class="switch">
                <input type="checkbox" id="switch" onclick="toggleStatus()">
                <span class="slider"></span>
              </label>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="my-4"></div>
</div>
</div>
<!-- End of Page Wrapper -->