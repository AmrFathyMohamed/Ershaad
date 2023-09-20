<?php
class AdminTable
{
    private $db;
    private $table = 'admins';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function insertAdmin($fullName, $username, $email, $password)
    {
        $query = "INSERT INTO $this->table (FullName, Username, Email, Password, is_deleted, created_at, updated_at) 
        VALUES ('$fullName', '$username', '$email', '$password', 0, NOW(), NOW())";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function updateAdmin($adminID, $fullName, $username, $email, $password)
    {
        $query = "UPDATE $this->table SET 
                  FullName = '$fullName', Username = '$username', Email = '$email', Password = '$password',
                  updated_at = NOW()
                  WHERE AdminID = $adminID";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function deleteAdmin($adminID)
    {
        $query = "DELETE FROM $this->table WHERE AdminID = $adminID";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function getAdmins()
    {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function getAdminById($adminID)
    {
        $query = "SELECT * FROM $this->table WHERE AdminID = $adminID";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_assoc();
    }
}
?>