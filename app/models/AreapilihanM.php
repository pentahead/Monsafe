<?php
class AreapilihanM
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getDetailById($id_pemilik, $id_kolam)
    {
        try {
            $this->db->query("SELECT konsentrasi_amonia, area_kolam
            FROM data_monitoring dm 
            JOIN data_kolam dk ON dm.id_kolam = dk.id_kolam
            WHERE dk.id_pemilik = :id_pemilik AND dk.id_kolam = :id_kolam;");
            $this->db->bind(':id_kolam', $id_kolam);
            $this->db->bind(':id_pemilik', $id_pemilik);
            return $this->db->single(); // Menggunakan single() karena mengembalikan satu baris data
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getVolume($id_kolam)
    {
        try {
            $this->db->query("SELECT dk.id_kolam, dk.area_kolam, ba.id_amonia, ba.intensitas_normal, ba.volume_air
            FROM data_kolam AS dk
            INNER JOIN batas_amonia AS ba ON dk.id_amonia = ba.id_amonia
            WHERE dk.id_kolam = :id_kolam;

            ");
            $this->db->bind(':id_kolam', $id_kolam);
            return $this->db->resultSet(); // Menggunakan single() karena mengembalikan satu baris data
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
