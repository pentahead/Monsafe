<?php

class FormPilihan extends Controller
{
    public function index($id_pemilik, $id_kolam)
    {
        $data['judul'] = 'Edit Area';
        $data['folder'] = 'user/editarea';
        $data['style'] = 'editarea';

        $editModel = $this->model('EditareaM');
        $id_pemilik = $_SESSION['id_pemilik'];

        $data['detail'] = $editModel->getkolamById($id_kolam);
        $data['volume'] = $editModel->getVolume();
        $data['notif'] = $editModel->countnotif();
        $data['currentController'] = 'Monitoring'; // Menambahkan controller aktif ke dalam data

        $this->view('user/templates/session');
        $this->view('user/templates/Header', $data);
        $this->view('user/templates/sidebar', $data);
        $this->view('user/templates/navbar', $data);
        $this->view('user/FormPilihan/FormPilihan', $data);
        $this->view('user/templates/footer');
    }

    public function updatearea()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['id_pemilik'])) {
            $editModel = $this->model('EditareaM');
            $editData = $editModel->getDetailById($_SESSION['id_pemilik']);

            if ($editData) {



                $id_pemilik = $_SESSION['id_pemilik'];
                $volume_air = $_POST['volume_air'];
                $area_kolam = $_POST['area_kolam'];
                $id_kolam = $_POST['id_kolam'];

                $result = $editModel->updateVolume($id_kolam, $id_pemilik, $volume_air, $area_kolam);


                if ($result) {
                    $_SESSION['flash_message'] = 'Data berhasil diubah';
                    header('location: ' . BASEURL . '/?controller=AreaPilihan&id_kolam=' . $id_kolam);
                    exit();
                } else {
                    echo "Gagal memperbarui Data Kolam!!!! isi semua inputan";
                }
            }
        }

    }
}
