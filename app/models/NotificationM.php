<?php
class NotificationM
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getDetailById()
    {
        try {
            $this->db->query("SELECT 
            dm.id_monitoring,
            dm.id_notifikasi,
            dk.area_kolam
        FROM 
            data_monitoring dm
        JOIN 
            data_kolam dk ON dm.id_kolam = dk.id_kolam
        WHERE 
            dm.id_notifikasi = 1;");
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
