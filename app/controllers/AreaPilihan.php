<?php

class AreaPilihan extends Controller
{
    public function index($id_pemilik, $id_kolam)
    {
        $data['judul'] = 'Area Pilihan';
        $data['folder'] = 'user/AreaPilihan';
        $data['style'] = 'editarea';

        $editModel = $this->model('AreapilihanM');
        $id_pemilik = $_SESSION['id_pemilik'];

        $data['detail'] = $editModel->getDetailById($id_pemilik, $id_kolam);
        $data['volume'] = $editModel->getVolume($id_kolam);
        $data['notif'] = $editModel->countnotif();
        $data['currentController'] = 'Monitoring'; // Menambahkan controller aktif ke dalam data


        $this->view('user/templates/session');
        $this->view('user/templates/Header', $data);
        $this->view('user/templates/sidebar', $data);
        $this->view('user/templates/navbar', $data);
        $this->view('user/AreaPilihan/AreaPilihan', $data);
        $this->view('user/templates/footer');
    }


}
