<?php
class EditareaM
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getDetailById($id)
    {
        try {
            $this->db->query("SELECT dm.id_monitoring, dm.id_kolam, dm.konsentrasi_amonia, dm.waktu_tanggal,
            dk.id_amonia, dk.area_kolam,
            dp.id_pemilik, dp.username, dp.nama_pemilik, dp.alamat_usaha, dp.email
            FROM data_monitoring dm
             JOIN data_kolam dk ON dm.id_kolam = dk.id_kolam
             JOIN data_pemilik dp ON dk.id_pemilik = dp.id_pemilik
            WHERE dp.id_pemilik = :id;");
            $this->db->bind(':id', $id);
            return $this->db->resultSet(); // Mengubah single() menjadi resultSet()
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getkolamById($id_kolam)
    {
        try {
            $this->db->query("SELECT dk.id_kolam, dk.area_kolam, ba.id_amonia, ba.intensitas_normal, ba.volume_air 
            FROM data_kolam AS dk INNER JOIN batas_amonia AS ba ON dk.id_amonia = ba.id_amonia 
            WHERE dk.id_kolam = :id_kolam; ");
            $this->db->bind(':id_kolam', $id_kolam);
            return $this->db->single(); // Menggunakan single() karena mengembalikan satu baris data
            // Menggunakan single() karena mengembalikan satu baris data
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getVolume()
    {
        try {
            $this->db->query("SELECT volume_air 
            FROM batas_amonia ");
            return $this->db->resultSet(); // Menggunakan single() karena mengembalikan satu baris data
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateVolume($id_kolam, $id_pemilik, $volume_air, $area_kolam)
    {
        try {
            // Mendapatkan id_amonia berdasarkan volume_air
            $this->db->query("SELECT id_amonia FROM batas_amonia WHERE volume_air = :volume_air");
            $this->db->bind(':volume_air', $volume_air);
            $id_amonia = $this->db->single()['id_amonia'];

            // Memperbarui data kolam
            $this->db->query("
                UPDATE data_kolam
                SET id_amonia = :id_amonia, area_kolam = :area_kolam
                WHERE id_kolam = :id_kolam AND id_pemilik = :id_pemilik;
            ");

            // Mengikat parameter
            $this->db->bind(':id_kolam', $id_kolam);
            $this->db->bind(':id_pemilik', $id_pemilik);
            $this->db->bind(':id_amonia', $id_amonia);
            $this->db->bind(':area_kolam', $area_kolam);

            // Menjalankan query dan mengembalikan hasil
            return $this->db->execute();
        } catch (PDOException $e) {
            // Mengembalikan false jika terjadi kesalahan
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
