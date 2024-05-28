<?php

class FormArea extends Controller
{
    public function index()
    {
        $data['judul'] = 'Tambah Area Kolam';
        $data['folder'] = 'user/TambahArea';
        $data['style'] = 'TambahArea';
        $data['currentController'] = 'Monitoring'; // Menambahkan controller aktif ke dalam data
        $detailModel = $this->model('TambahAreaM');
        $data['notif'] = $detailModel->countnotif();

        // Tidak perlu memanggil model untuk mendapatkan detail berdasarkan ID jika tidak ada ID yang diterima
        // $data['detail'] = $detailModel->getDetailById($id);

        // Memuat view tanpa data detail

        $this->view('user/templates/Header', $data);
        $this->view('user/templates/sidebar', $data);
        $this->view('user/templates/navbar', $data);
        $this->view('user/FormArea/FormArea', $data);
        $this->view('user/templates/footer');
    }

    public function tambah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $area_kolam = $_POST['kolam']; // Sesuaikan dengan nama input dalam form
            $volume_air = $_POST['volume_air']; // Sesuaikan dengan nama input dalam form

            // Mengambil id_pemilik dari sesi login
            $id_pemilik = $_SESSION['id_pemilik']; // Sesuaikan dengan nama sesi login

            $tambahareaModel = $this->model('TambahareaM');
            if ($tambahareaModel->tambahData($area_kolam, $volume_air, $id_pemilik)) {
                // Redirect atau tampilkan pesan sukses
                header('Location: ' . BASEURL . '/?controller=Monitoring');
            } else {
                // Tampilkan pesan gagal
                echo "Gagal menambahkan data ke database.";
            }
        }
    }


}

