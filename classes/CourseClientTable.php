<?php
class CourseClientTable
{
    private $db;
    private $table = 'course_client';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function insertCourseClient($courseId, $clientId,$therapistId, $status)
    {
        $query = "INSERT INTO $this->table (CourseID, ClientID,TherapistID, Status, is_deleted, created_at, updated_at) 
                  VALUES ($courseId, $clientId,$therapistId, '$status',0,NOW(),NOW())";
                  //echo $query;
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function updateCourseClient($courseClientId, $status)
    {
        $query = "UPDATE $this->table SET Status = '$status', updated_at = NOW() 
                  WHERE id = $courseClientId";
                  
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function deleteCourseClient($courseClientId)
    {
        $query = "DELETE FROM $this->table WHERE id = $courseClientId";
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function getCourseClientById($courseClientId)
    {
        $query = "SELECT * FROM $this->table WHERE id = $courseClientId";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_assoc();
    }

    public function getAllCourseClients($Status)
    {
        $query = "SELECT cc.*, c.FullName AS ClientName, co.Title AS CourseName,t.FullName AS TherapistName
        FROM course_client cc
        JOIN clients c ON cc.ClientID = c.ClientID
        JOIN therapists t ON cc.TherapistID = t.TherapistID
        JOIN courses co ON cc.CourseID = co.CourseID WHERE cc.status = '$Status'";


        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    // Add other methods as needed

    
}
?>
