<?php
class PengurasanM
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getDetailById($id_pemilik)
    {
        try {
            $this->db->query("SELECT dm.id_monitoring, dm.id_kolam, dm.konsentrasi_amonia, dm.waktu_tanggal,
            dk.id_amonia, dk.area_kolam,
            dp.id_pemilik, dp.username, dp.nama_pemilik, dp.alamat_usaha, dp.email
            FROM data_monitoring dm
             JOIN data_kolam dk ON dm.id_kolam = dk.id_kolam
             JOIN data_pemilik dp ON dk.id_pemilik = dp.id_pemilik
            WHERE dp.id_pemilik = :id;");
            $this->db->bind(':id', $id_pemilik);
            return $this->db->resultSet(); // Mengubah single() menjadi resultSet()
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    // public function updateStatus($status, $id_monitoring)
    // {
    //     try {
    //         $this->db->query("UPDATE data_monitoring
    //         SET status = ':status'
    //         WHERE id_monitoring = :id;");
    //         $this->db->bind(':status', $status);
    //         $this->db->bind(':id', $id_monitoring);


    //         if ($this->db->execute()) {
    //             return "Record updated successfully";
    //         } else {
    //             return "Error updating record";
    //         }
    //     } catch (PDOException $e) {
    //         die($e->getMessage());
    //     }
    // }
    // public function getstatus($id_monitoring)
    // {
    //     try {
    //         $this->db->query("SELECT status FROM data_monitoring WHERE id_monitoring = :id_monitoring; ");
    //         $this->db->bind(':id', $id_monitoring);

    //         return $this->db->resultSet(); // Mengubah single() menjadi resultSet()
    //     } catch (PDOException $e) {
    //         die($e->getMessage());
    //     }
    // }



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
