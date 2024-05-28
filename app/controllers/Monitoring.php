<?php

class Monitoring extends Controller
{
    public function index()
    {
        // Pastikan session telah dimulai


        // Periksa apakah session ID pemilik sudah diatur
        if (!isset($_SESSION['id_pemilik'])) {
            // Jika tidak ada session ID pemilik, redirect ke halaman login
            header('location: ' . BASEURL . '/?controller=LandingPage');
            exit();
        }

        // Ambil session ID pemilik
        $id_pemilik = $_SESSION['id_pemilik'];

        // Panggil model Monitoring untuk mendapatkan detail berdasarkan ID pemilik
        $detailModel = $this->model('MonitoringM');
        $data['detail'] = $detailModel->getDetailById($id_pemilik);
        $data['notif'] = $detailModel->countnotif();

        // Jika diperlukan, Anda dapat menambahkan penanganan jika data detail tidak ditemukan

        // Load view dengan data yang telah diperoleh
        $data['judul'] = 'Monitoring';
        $data['folder'] = 'user/Monitoring';
        $data['style'] = 'Monitoring';
        $data['currentController'] = 'Monitoring'; // Menambahkan controller aktif ke dalam data

        $this->view('user/templates/Header', $data);
        $this->view('user/templates/sidebar', $data);
        $this->view('user/templates/navbar', $data);
        $this->view('user/Monitoring/Monitoring', $data);
        $this->view('user/templates/footer');
    }
}

