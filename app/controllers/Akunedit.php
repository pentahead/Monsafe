<?php
class Akunedit extends Controller
{
    public function index($id)
    {
        $data['judul'] = 'Edit Akun';
        $data['folder'] = 'user/Akunedit';
        $data['style'] = 'Akunedit';

        $detailModel = $this->model('AkuneditM');
        $id = $_SESSION['id_pemilik'];

        // Memanggil model untuk mendapatkan detail berdasarkan ID
        $data['detail'] = $detailModel->getDetailById($id);
        $data['notif'] = $detailModel->countnotif();


        // Memuat view dengan data yang telah diperoleh
        $this->view('user/templates/session');
        $this->view('user/templates/Header', $data);
        $this->view('user/templates/sidebar', );
        $this->view('user/templates/navbar', $data);
        $this->view('user/Akunedit/Akunedit', $data);
        $this->view('user/templates/footer');

    }

    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['id_pemilik'])) {
            $userModel = $this->model('AkuneditM');
            $userData = $userModel->getDetailById($_SESSION['id_pemilik']);
            if ($userData) {
                $id = $_SESSION['id_pemilik'];
                $nama_pemilik = isset($_POST['nama_pemilik']) ? $_POST['nama_pemilik'] : $userData['nama_pemilik'];
                $username = isset($_POST['username']) ? $_POST['username'] : $userData['username'];
                $email = isset($_POST['email']) ? $_POST['email'] : $userData['email'];
                $alamat_usaha = isset($_POST['alamat_usaha']) ? $_POST['alamat_usaha'] : $userData['alamat_usaha'];
                $password = isset($_POST['password']) ? $_POST['password'] : $userData['password'];

                $result = $userModel->updateUserProfile($id, $nama_pemilik, $username, $email, $alamat_usaha, $password);

                if ($result) {
                    $_SESSION['flash_message'] = true;
                    header('Location: ' . BASEURL . '/?controller=AkunKu');
                    exit();
                } else {
                    echo "Gagal memperbarui profil.";
                    exit();
                }
            }
        }
    }
}
