<?php

class Pengurasan extends Controller
{
    public function index()
    {
        // Pastikan session telah dimulai


        // Periksa apakah session ID pemilik sudah diatur
        if (!isset($_SESSION['id_pemilik'])) {
            // Jika tidak ada session ID pemilik, redirect ke halaman login
            header('location: ' . BASEURL . '/?controller=landing');
            exit();
        }

        // Ambil session ID pemilik
        $id_pemilik = $_SESSION['id_pemilik'];

        // Panggil model Monitoring untuk mendapatkan detail berdasarkan ID pemilik
        $detailModel = $this->model('PengurasanM');
        $data['detail'] = $detailModel->getDetailById($id_pemilik);
        $data['notif'] = $detailModel->countnotif();



        // Jika diperlukan, Anda dapat menambahkan penanganan jika data detail tidak ditemukan

        // Load view dengan data yang telah diperoleh
        $data['judul'] = 'Pengurasan';
        $data['folder'] = 'user/Pengurasan';
        $data['style'] = 'Pengurasan';
        $data['currentController'] = 'Pengurasan'; // Menambahkan controller aktif ke dalam data

        $this->view('user/templates/Header', $data);
        $this->view('user/templates/sidebar', $data);
        $this->view('user/templates/navbar', $data);
        $this->view('user/Pengurasan/Pengurasan', $data);
        $this->view('user/templates/footer');
    }

    // public function tambah()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $status = $_POST['status'];
    //         $id_monitoring = $_POST['id_monitoring'];

    //         $buttonModel = $this->model('PengurasanM');
    //         if ($buttonModel->updateStatus($status, $id_monitoring)) {
    //             // Redirect atau tampilkan pesan sukses
    //         } else {
    //             // Tampilkan pesan gagal
    //             echo "Gagal menambahkan data ke database.";
    //         }
    //         $result = $buttonModel->getstatus($status, $id_monitoring);
    //         $row = $result->fetch_assoc();
    //         $current_status = $row['status'];
    //         $this->view('user/Pengurasan/Pengurasan', $current_status);


    //     }
    // }
}

