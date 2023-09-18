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


    // public function getClientById($clientId)
    // {
    //     $query = "SELECT * FROM $this->table WHERE ClientID = $clientId";
    //     $data[] = $clientId;
    //     $stmt = $this->db->executeQuery($query);
    //     return $stmt->fetch_assoc();
    // }
    public function getClients()
    {
        $query = "SELECT * FROM $this->table ";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    public function getClientById($ClientId)
    {
        $query = "SELECT * FROM $this->table WHERE ClientID = $ClientId";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_assoc();
    }
    public function getDataByClientIdAccepted($ClientId, $tableName)
    {
        $query = "SELECT * FROM $tableName WHERE UserID = $ClientId And Status = 'Accepted'";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    public function getDataByClientId($ClientId, $tableName)
    {
        if ($tableName == "course_client") {
            $query = "SELECT c.*  FROM courses AS c INNER JOIN $tableName AS ct ON c.CourseID = ct.CourseID WHERE ct.ClientID = $ClientId";
        } else {
            $query = "SELECT * FROM $tableName WHERE ClientID = $ClientId";
        }
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
}
?>