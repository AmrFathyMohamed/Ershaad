<?php
class ClientTable
{
    private $db;
    private $table = 'clients';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function insertClient($fullName, $city, $gender, $phone, $username, $email, $password, $age)
    {
        $query = "INSERT INTO clients (FullName, Username, Email, Password, Gender, Age, City, Phone) 
        VALUES ('$fullName', '$username', '$email', '$password', '$gender', '$age', '$city', '$phone')";
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
    public function getClients()
    {
        $query = "SELECT * FROM $this->table ";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    // Add more methods for querying clients here as needed
}
?>