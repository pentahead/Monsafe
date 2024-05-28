<?php
class AkunM
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getDetailById($id)
    {
        try {
            $this->db->query("SELECT * FROM data_pemilik WHERE id_pemilik = :id");
            $this->db->bind(':id', $id);
            return $this->db->single();
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

