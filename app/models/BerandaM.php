<?php
class BerandaM
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
