<?php

class Notifikasi extends Controller
{
    public function index($id)
    {
        $data['judul'] = 'Notifikasi';
        $data['folder'] = 'user/Notification';
        $data['style'] = 'Notification';

        $detailModel = $this->model('NotificationM');

        // Memanggil model untuk mendapatkan detail berdasarkan ID
        $data['detail'] = $detailModel->getDetailById(); //INI GANTI ID JANGAN LUPA
        $data['notif'] = $detailModel->countnotif(); //INI GANTI ID JANGAN LUPA




        // Memuat view dengan data yang telah diperoleh
        $this->view('user/templates/session');
        $this->view('user/templates/Header', $data);
        $this->view('user/templates/sidebar', $data);
        $this->view('user/templates/navbar', $data);
        $this->view('user/Notifikasi/Notifikasi', $data);
        $this->view('user/templates/footer');

    }
}

