<?php
class CourseClientTable
{
    private $db;
    private $table = 'course_client';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function insertCourseClient($courseId, $clientId, $status)
    {
        $query = "INSERT INTO $this->table (CourseID, ClientID, Status, is_deleted, created_at, updated_at) 
                  VALUES ($courseId, $clientId, '$status',0,NOW(),NOW())";
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
        $query = "SELECT c.*,cc.*,cl.*,t.*,c.Title as Title ,cc.id as id , cc.Status as Status ,cl.FullName as CName , t.FullName as TName  
        FROM courses c 
        INNER JOIN course_client cc ON c.CourseID = cc.CourseID 
        INNER JOIN clients cl ON cc.ClientID = cl.ClientID 
        INNER JOIN course_therapist s ON c.CourseID = s.CourseID 
        INNER JOIN therapists t ON s.TherapistID = t.TherapistID
        Where cc.Status = '$Status'";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    // Add other methods as needed

    
}
?>
