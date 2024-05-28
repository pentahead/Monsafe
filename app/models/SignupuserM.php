<?php

class SignupuserM
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function registerUser($namaPemilik, $username, $email, $password, $alamatUsaha)
    {
        // Hash password sebelum disimpan ke database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Mengecek apakah username sudah ada di database
        $this->db->query('SELECT COUNT(*) AS username_count FROM data_pemilik WHERE username = :username');
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        $usernameCount = $row['username_count'];

        // Jika username sudah ada, kembalikan false
        if ($usernameCount > 0) {
            return false;
        }

        // Mendapatkan ID terbesar dari database
        $this->db->query('SELECT MAX(id_pemilik) AS max_id FROM data_pemilik');
        $row = $this->db->single();
        $maxId = $row['max_id'];

        // Mengecek jika ada ID di database
        if ($maxId) {
            // Jika ada, tambahkan 1 untuk mendapatkan ID baru
            $newId = $maxId + 1;
        } else {
            // Jika tidak ada, gunakan ID pertama
            $newId = 1;
        }

        // Masukkan data ke database
        $this->db->query('INSERT INTO data_pemilik (id_pemilik, nama_pemilik, username, email, password, alamat_usaha) VALUES (:id_pemilik, :nama_pemilik, :username, :email, :password, :alamat_usaha)');
        $this->db->bind(':id_pemilik', $newId);
        $this->db->bind(':nama_pemilik', $namaPemilik);
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $hashedPassword);
        $this->db->bind(':alamat_usaha', $alamatUsaha);

        // Jalankan query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
