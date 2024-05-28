<?php
class AkunKu extends Controller
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

        // Panggil model Akun untuk mendapatkan detail berdasarkan ID pemilik
        $detailModel = $this->model('AkunM');
        $data['detail'] = $detailModel->getDetailById($id_pemilik);
        $data['notif'] = $detailModel->countnotif();


        // Load view dengan data yang telah diperoleh
        $data['judul'] = 'Akun Ku';
        $data['folder'] = 'user/Akun';
        $data['style'] = 'Akun';
        $data['activeController'] = 'Akun'; // Menambahkan controller aktif ke dalam data

        $this->view('user/templates/session');
        $this->view('user/templates/Header', $data);
        $this->view('user/templates/sidebar', $data);
        $this->view('user/templates/navbar', $data);
        $this->view('user/AkunKu/AkunKu', $data);
        $this->view('user/templates/footer');
    }
}
