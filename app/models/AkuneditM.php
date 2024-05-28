<?php
class AkuneditM
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getDetailById($id)
    {
        try {
            $this->db->query("SELECT * FROM data_pemilik WHERE id_pemilik = :id LIMIT 1");
            $this->db->bind(':id', $id);
            return $this->db->single(); // Mengembalikan satu baris data
        } catch (PDOException $e) {
            // Tangani kesalahan jika terjadi
            return null;
        }
    }

    public function updateUserProfile($id, $nama_pemilik, $username, $email, $alamat_usaha, $password)
    {
        try {
            // Mulai membangun kueri SQL untuk UPDATE
            $sql = "UPDATE data_pemilik SET ";
            $setArray = []; // Array untuk menyimpan bagian SET dari kueri SQL

            // Cek dan tambahkan setiap kolom yang diperbarui ke array
            if (!empty($nama_pemilik)) {
                $setArray[] = "nama_pemilik = :nama_pemilik";
            }
            if (!empty($username)) {
                $setArray[] = "username = :username";
            }
            if (!empty($email)) {
                $setArray[] = "email = :email";
            }
            if (!empty($alamat_usaha)) {
                $setArray[] = "alamat_usaha = :alamat_usaha";
            }
            if (!empty($password)) {
                // Hash password sebelum menyimpannya
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $setArray[] = "password = :password";
            }

            // Gabungkan setiap bagian SET dengan koma dan tambahkan ke kueri SQL
            $sql .= implode(", ", $setArray);
            $sql .= " WHERE id_pemilik = :id";

            // Jalankan kueri SQL
            $this->db->query($sql);
            $this->db->bind(':id', $id);
            if (!empty($nama_pemilik)) {
                $this->db->bind(':nama_pemilik', $nama_pemilik);
            }
            if (!empty($username)) {
                $this->db->bind(':username', $username);
            }
            if (!empty($email)) {
                $this->db->bind(':email', $email);
            }
            if (!empty($alamat_usaha)) {
                $this->db->bind(':alamat_usaha', $alamat_usaha);
            }
            if (!empty($password)) {
                $this->db->bind(':password', $hashedPassword);
            }

            // Eksekusi kueri dan kembalikan hasilnya
            return $this->db->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    public function countnotif()
    {
        try {
            $this->db->query("SELECT 
            COUNT(DISTINCT dm.id_kolam) AS jumlah_kolam
        FROM 
            data_monitoring dm
        WHERE 
            dm.id_notifikasi = 1;");
            return $this->db->single();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}

