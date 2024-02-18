<?php
class AdsTable
{

    
    private $db;
    private $table = 'ads';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function insertAd($photo)
    {
        $query = "INSERT INTO $this->table (photo, is_deleted, created_at, updated_at) 
        VALUES ('$photo', 0, NOW(), NOW())";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function updateAd($adsID, $photo)
    {
        $query = "UPDATE $this->table SET 
                  photo = '$photo', updated_at = NOW()
                  WHERE adsID = $adsID";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function deleteAd($adsID)
    {
        $query = "DELETE FROM $this->table WHERE adsID = $adsID";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function getAds()
    {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function getAdById($adsID)
    {
        $query = "SELECT * FROM $this->table WHERE adsID = $adsID";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_assoc();
    }
}
?>