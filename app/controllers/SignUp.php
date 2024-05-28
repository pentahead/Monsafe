<?php
class SignUp extends Controller
{
    public function index()
    {
        $data['judul'] = 'Sign Up';
        $data['folder'] = 'user/Signupuser';
        $data['error_message'] = 'Username sudah digunakan. Silakan coba dengan username yang lain.';

        // Jika tombol register ditekan
        if (isset($_POST['signup'])) {
            // Ambil data dari form
            $firstName = $_POST['name'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $alamat = $_POST['alamat'];

            // Gabungkan nama depan dan belakang menjadi satu

            // Panggil model User
            $userModel = $this->model('SignupuserM');

            // Panggil metode registerUser dari model
            $result = $userModel->registerUser($firstName, $username, $email, $password, $alamat);

            // Periksa hasilnya
            if ($result) {
                // Registrasi berhasil, lakukan tindakan yang sesuai
                header('Location: ' . BASEURL . '/?controller=Login');
                exit();
            } else {
                // Registrasi gagal karena username sudah ada
                // Atau lakukan tindakan lain, seperti menampilkan pesan error
                echo "<script>alert('Ganti Username, Username telah terpakai!')</script>";

                // Lanjutkan ke langkah berikutnya untuk menampilkan pesan error di view
            }
            // Kirim data ke view, termasuk pesan error jika ada


            // Panggil method registerUser untuk mendaftarkan pengguna
            $registerStatus = $userModel->registerUser($firstName, $username, $email, $password, $alamat);

            // Jika pendaftaran berhasil, redirect ke halaman login
            if ($registerStatus) {
                header('Location: ' . BASEURL . '/?controller=Login');
                exit();
            } else {


            }
        }
        $this->view('user/templates/header', $data);
        $this->view('user/SignUp/SignUp', $data);

    }
}
