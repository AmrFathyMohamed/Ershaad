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
        $query = "INSERT INTO clients (FullName, Username, Email, Password, Gender, Age, City, Phone, is_deleted, created_at, updated_at) 
        VALUES ('$fullName', '$username', '$email', '$password', '$gender', $age, '$city', '$phone',0,NOW(),NOW())";
        //echo $query;
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


    public function deleteclient($clientId)
    {
        $query = "DELETE FROM $this->table WHERE clientID = :clientID";

        // Prepare the SQL statement
        $stmt = $this->db->prepare($query);

        // Bind the clientID parameter
        $stmt->bindParam(':clientID', $clientId, PDO::PARAM_INT);

        // Execute the SQL statement
        if ($stmt->execute()) {
            // Deletion was successful
            return true;
        } else {
            // Deletion failed, display the error message
            echo "Error: " . implode(", ", $stmt->errorInfo()); // Replace with your actual error handling method
            return false;
        }
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