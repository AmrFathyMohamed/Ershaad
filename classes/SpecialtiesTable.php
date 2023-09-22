<?php
class SpecialtiesTable
{
    private $db;
    private $table = 'specialties';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }
    public function getDataByTableName()
    {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }


    public function insertSpecialty($specialtyName)
    {
        $query = "INSERT INTO $this->table (Specialty, is_deleted, created_at, updated_at) 
        VALUES ('$specialtyName', 0, NOW(), NOW())";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function updateSpecialty($specialtyID, $specialtyName)
    {
        $query = "UPDATE $this->table SET 
                  Specialty = '$specialtyName', updated_at = NOW()
                  WHERE SpecialtyID = $specialtyID";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function deleteSpecialty($specialtyID)
    {
        $query = "DELETE FROM $this->table WHERE SpecialtyID = $specialtyID";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function getSpecialties()
    {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function getSpecialtyById($specialtyID)
    {
        $query = "SELECT * FROM $this->table WHERE SpecialtyID = $specialtyID";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_assoc();
    }
}
?>