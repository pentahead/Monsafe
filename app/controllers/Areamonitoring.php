<?php

class areamonitoring extends Controller
{
    public function index($id)
    {
        $data['judul'] = 'Area Monitoring';
        $data['folder'] = 'user/areamonitoring';
        $data['style'] = 'areamonitoring';
        $data['currentController'] = 'Monitoring'; // Menambahkan controller aktif ke dalam data


        $detailModel = $this->model('areamonitoringM');
        $id_pemilik = $_SESSION['id_pemilik'];

        // Memanggil model untuk mendapatkan detail berdasarkan ID
        $data['detail'] = $detailModel->getDetailById($id_pemilik);
        $data['notif'] = $detailModel->countnotif();
         //INI GANTI ID JANGAN LUPA


        // Memeriksa apakah ada data yang ditemukan
        // if (empty($data['detail'])) {
        //     // Tidak ada data yang ditemukan, bisa ditangani sesuai kebutuhan, misalnya dengan menampilkan pesan kesalahan
        //     echo "Tidak ada data ditemukan.";
        //     return;
        // }

        // Memuat view dengan data yang telah diperoleh
        $this->view('user/templates/session');
        $this->view('user/templates/Header', $data);
        $this->view('user/templates/sidebar', $data);
        $this->view('user/templates/navbar', $data);
        $this->view('user/areamonitoring/areamonitoring', $data);
        $this->view('user/templates/footer');

    }
}

?>