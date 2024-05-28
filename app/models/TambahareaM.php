<?php
class TambahareaM
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function tambahData($area_kolam, $volume_air, $id_pemilik)
    {
        try {
            // Mendapatkan id_amonia berdasarkan volume_air yang dimasukkan pengguna
            $this->db->query("SELECT id_amonia FROM batas_amonia WHERE volume_air = :volume_air");
            $this->db->bind(':volume_air', $volume_air);
            $id_amonia = $this->db->single()['id_amonia'];

            // Menentukan id_kolam berikutnya
            $this->db->query("SELECT MAX(id_kolam) AS max_id FROM data_kolam");
            $max_id = $this->db->single()['max_id'];
            $id_kolam = $max_id + 1;

            // Memasukkan data baru ke dalam tabel data_kolam
            $this->db->query("INSERT INTO data_kolam (id_kolam, area_kolam, id_amonia, id_pemilik) 
                          VALUES (:id_kolam, :area_kolam, :id_amonia, :id_pemilik)");
            $this->db->bind(':id_kolam', $id_kolam);
            $this->db->bind(':area_kolam', $area_kolam);
            $this->db->bind(':id_amonia', $id_amonia);
            $this->db->bind(':id_pemilik', $id_pemilik);
            $this->db->execute();

            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
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
?>