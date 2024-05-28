<?php
$servername = "localhost";
$dbname = "monsafe";
$username = "root";
$password = "";
$api_key_value = "12345678912";

$api_key = $ppm_act = "";

// Menerima data berat aktual (berat_act) dan kunci API (api_key) dari permintaan POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    $ppm_act = test_input($_POST["ppm_act"]);

    // Memeriksa apakah kunci API yang diterima sesuai dengan kunci yang diharapkan
    if ($api_key == $api_key_value) {
        // Membuat koneksi ke database
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Memeriksa koneksi
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Menyiapkan dan menjalankan queri SQL untuk menyimpan berat ke dalam tabel
        $sql = "
        INSERT INTO `riwayat_monitoring` (`id_riwayat`, `id_kolam`, `konsentrasi_amonia`, `waktu`) VALUES (NULL, '0', '$ppm_act', current_timestamp()); ";



        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Menutup koneksi database
        $conn->close();
    } else {
        echo "Wrong API Key provided.";
    }
} else {
    echo "No data posted with HTTP POST.";
}

// Fungsi untuk membersihkan dan memvalidasi input data
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
