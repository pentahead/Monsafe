<?php

class LoginuserM
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function CheckUserLogin($username, $password)
    {
        // Lakukan query untuk mencari pengguna berdasarkan username
        $sql = "SELECT * FROM data_pemilik WHERE username = :username";
        $this->db->query($sql);
        $this->db->bind(':username', $username);
        $user = $this->db->single();

        // Jika pengguna ditemukan
        if ($user) {
            // Periksa apakah password yang dimasukkan oleh pengguna cocok dengan password yang tersimpan (setelah di-dehash)
            if (password_verify($password, $user['password'])) {
                // Jika cocok, kembalikan data pengguna
                return $user;
            }
        }

        // Jika tidak ada pengguna ditemukan atau password tidak cocok, kembalikan null
        return null;
    }
}

