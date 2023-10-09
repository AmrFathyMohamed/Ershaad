<?php
class ClientTable
{
    private $db;
    private $table = 'clients';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }
    public function insertClient($fullName, $username,$email,$password,$gender,   $age, $city,  $phone)
    {
        $query = "INSERT INTO clients (FullName, Username, Email, Password, Gender, Age, City, Phone, is_deleted, created_at, updated_at) 
        VALUES ('$fullName', '$username', '$email', '$password', '$gender', $age, '$city', '$phone',0,NOW(),NOW())";
        //echo $query;
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }
    public function insertClient2($fullName, $username, $email, $password, $gender, $age, $city, $phone)
    {
        // Check if the email is already registered
        $emailExistsQuery = "SELECT COUNT(*) as count FROM clients WHERE Email = '$email'";
        $emailExistsResult = $this->db->executeQuery($emailExistsQuery);
    
        $emailExistsData = $emailExistsResult->fetch_assoc();
    
        if ($emailExistsData['count'] > 0) {
            // Email is already registered, return true (or a specific message/error code)
            return true;
        }
    
        // Email is not registered, proceed to insert
        $query = "INSERT INTO clients (FullName, Username, Email, Password, Gender, Age, City, Phone, is_deleted, created_at, updated_at) 
        VALUES ('$fullName', '$username', '$email', '$password', '$gender', $age, '$city', '$phone', 0, NOW(), NOW())";
    
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }
    

    public function updateClient($edit_clientId,$edit_fullName, $edit_username,$edit_email,$edit_password,$edit_gender,   $edit_age, $edit_city,  $edit_phone)
    {
        $query = "UPDATE $this->table SET 
                  FullName = '$edit_fullName', Username = '$edit_username', Email = '$edit_email', Password = '$edit_password',
                  Gender = '$edit_gender', Age = $edit_age, City = '$edit_city', Phone = '$edit_phone' ,updated_at = NOW()
                  WHERE ClientID = $edit_clientId";
        //$data[] = $clientId;
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function updateClientDate($edit_clientId,$edit_gender,$edit_age,$edit_city,$edit_phone)
    {
        $query = "UPDATE $this->table SET 
                  Gender = '$edit_gender', Age = $edit_age, City = '$edit_city', Phone = '$edit_phone' ,updated_at = NOW()
                  WHERE ClientID = $edit_clientId";
        //$data[] = $clientId;
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }
    public function deleteclient($clientId)
    {
        

        $query1 = "DELETE FROM sessions WHERE UserID = $clientId";
        $stmt1 = $this->db->executeQuery($query1);
        if ($stmt1 === false) {
            return false;
        }
        $query2 = "DELETE FROM course_client WHERE clientID = $clientId";
        $stmt2 = $this->db->executeQuery($query2);
        if ($stmt2 === false) {
            return false;
        }
        $query5 = "DELETE FROM chats WHERE UserID = $clientId";
        $stmt5 = $this->db->executeQuery($query5);
        if ($stmt5 === false) {
            return false;
        }
        $query6 = "DELETE FROM $this->table WHERE clientID = $clientId";
        $stmt6 = $this->db->executeQuery($query6);
        return $stmt6 !== false;
    }
    public function getClients()
    {
        $query = "SELECT * FROM $this->table ";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    public function getClientsWithTherapistNames()
{
    $query = "SELECT cc.*, c.FullName, t.Title
              FROM course_client AS cc
              INNER JOIN clients AS c ON cc.ClientID = c.ClientID
              INNER JOIN courses AS t ON cc.CourseID = t.CourseID";
    
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
            $query = "SELECT c.*,ct.Status  FROM courses AS c INNER JOIN $tableName AS ct ON c.CourseID = ct.CourseID WHERE ct.ClientID = $ClientId";
        } else {
            $query = "SELECT * FROM $tableName WHERE ClientID = $ClientId";
        }
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    // Function to get data by ClientID and Status (Accepted, Pending Review, Canceled)
    public function getDataByClientIdAndStatus($clientId, $tableName, $status)
    {
        $query = "SELECT * FROM $tableName WHERE ClientID = $clientId AND Status = '$status'";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    // Function to update the status of a course request
    public function updateCourseRequestStatus($Id, $status)
    {
        $query = "UPDATE course_client SET Status = '$status' WHERE id = $Id";
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }
    public function resetPassword($email, $Password)
    {
        $query = "UPDATE clients SET password = '$Password' WHERE email = '$email'";
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }   
}
?>