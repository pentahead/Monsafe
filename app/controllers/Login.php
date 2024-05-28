<?php

class login extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login';
        $data['folder'] = 'user/Loginuser';
        $data['style'] = 'Loginuser';

        if (isset($_POST['login'])) {
            // Ambil data dari form
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Panggil model User
            $userModel = $this->model('LoginuserM');

            // Panggil method CheckUserLogin untuk memeriksa login pengguna
            $user = $userModel->CheckUserLogin($username, $password);

            // Jika login berhasil, redirect ke halaman dashboard atau halaman yang sesuai
            if ($user) {
                // Sesuaikan nama session dengan session yang digunakan di view
                $_SESSION['id_pemilik'] = $user['id_pemilik'];
                header('Location: ' . BASEURL . '/?controller=Homepage');
                exit();
            } else {
                $data['loginError'] = 'Email or password is incorrect.';
            }
        }
        $this->view('user/templates/Header', $data);
        $this->view('user/Login/Login', $data);
    }
}

