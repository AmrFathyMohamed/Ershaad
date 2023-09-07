<?php
class ClientTable
{
    private $db;
    private $table = 'clients';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function insertClient($data)
    {
        $query = "INSERT INTO $this->table (FullName, Username, Email, Password, Gender, Age, City, Phone) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function updateClient($clientId, $data)
    {
        $query = "UPDATE $this->table SET 
                  FullName = ?, Username = ?, Email = ?, Password = ?,
                  Gender = ?, Age = ?, City = ?, Phone = ? 
                  WHERE ClientID = ?";
        $data[] = $clientId;
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function deleteClient($clientId)
    {
        $query = "DELETE FROM $this->table WHERE ClientID = $clientId";
        $data[] = $clientId;
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function getClientById($clientId)
    {
        $query = "SELECT * FROM $this->table WHERE ClientID = $clientId";
        $data[] = $clientId;
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_assoc();
    }

    // Add more methods for querying clients here as needed
}
?>
