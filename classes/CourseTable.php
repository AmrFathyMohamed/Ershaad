<?php
class CourseTable
{
    private $db;
    private $table = 'courses';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function getAllCourses()
    {
        $query = "SELECT * FROM $this->table WHERE is_deleted = 0";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function getCourseById($courseId)
    {
        $query = "SELECT * FROM $this->table WHERE CourseID = $courseId";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_assoc();
    }

    public function insertCourse($title, $description, $sessions, $price, $type)
    {
        $query = "INSERT INTO $this->table (Title, Description, Sessions, Price, Type, created_at, updated_at) 
                  VALUES ('$title', '$description', $sessions, $price, '$type', NOW(), NOW())";
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function updateCourse($courseId, $title, $description, $sessions, $price, $type)
    {
        $query = "UPDATE $this->table SET 
                  Title = '$title', Description = '$description', Sessions = $sessions, Price = $price, 
                  Type = '$type', updated_at = NOW() 
                  WHERE CourseID = $courseId";
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function deleteCourse($courseId)
    {
        $query = "UPDATE $this->table SET is_deleted = 1 WHERE CourseID = $courseId";
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }
}
?>
