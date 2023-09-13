<?php
require_once('Database.php');
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
} ?>