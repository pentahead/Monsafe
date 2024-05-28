<?php
class HistoryM
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getallData()
    {
        try {
            $this->db->query("SELECT dk.area_kolam, rm.id_kolam, rm.konsentrasi_amonia, rm.waktu
            FROM riwayat_monitoring rm
            JOIN data_kolam dk ON rm.id_kolam = dk.id_kolam
            ORDER BY rm.waktu DESC
            LIMIT 12;
            ");
            // $this->db->bind(':id', $id);
            return $this->db->resultSet();
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
