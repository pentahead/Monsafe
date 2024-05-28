<?php

class LandingPage extends Controller
{
    public function index($id)
    {
        $data['judul'] = 'Landing';
        $data['folder'] = 'user/Landing';
        $data['style'] = 'Landing';

        $detailModel = $this->model('LandingM');

        // Memanggil model untuk mendapatkan detail berdasarkan ID
        $data['detail'] = $detailModel->getDetailById(1); //INI GANTI ID JANGAN LUPA


        // Memeriksa apakah ada data yang ditemukan
        // if (empty($data['detail'])) {
        //     // Tidak ada data yang ditemukan, bisa ditangani sesuai kebutuhan, misalnya dengan menampilkan pesan kesalahan
        //     echo "Tidak ada data ditemukan.";
        //     return;
        // }

        // Memuat view dengan data yang telah diperoleh
        $this->view('user/templates/Header', $data);
        $this->view('user/LandingPage/LandingPage', $data);
    }
}

