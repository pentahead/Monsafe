<?php
class areamonitoringM
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getDetailById($id)
    {
        try {
            $this->db->query("SELECT area_kolam,id_kolam FROM data_kolam
            WHERE id_pemilik = :id;");
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
