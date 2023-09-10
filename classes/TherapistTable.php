<?php
class TherapistTable
{
    private $db;
    private $table = 'therapists';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function insertTherapist($data)
    {
        $query = "INSERT INTO $this->table (FullName, Specialization, Price, Rating, City, Bio, Gender, Phone, Username, Email, Password, Age, Profile) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function updateTherapist($therapistId)
    {
        $query = "UPDATE $this->table SET 
                  FullName = ?, Specialization = ?, Price = ?, Rating = ?, City = ?,
                  Bio = ?, Gender = ?, Phone = ?, Username = ?, Email = ?,
                  Password = ?, Age = ?, Profile = ? 
                  WHERE TherapistID = ?";
        $data[] = $therapistId;
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function deleteTherapist($therapistId)
    {
        $query = "DELETE FROM $this->table WHERE TherapistID = $therapistId";
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function getTherapistById($therapistId)
    {
        $query = "SELECT * FROM $this->table WHERE TherapistID = $therapistId";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_assoc();
    }

    public function getRandomTopRatedTherapists($count)
    {
        $query = "SELECT * FROM $this->table ORDER BY Rating DESC LIMIT $count";
        $stmt = $this->db->executeQuery($query);

        if ($stmt !== false) {
            $therapists = $stmt->fetch_all(MYSQLI_ASSOC);
        } else {
            $therapists = [];
        }

        // Shuffle the therapists to get random results
        shuffle($therapists);

        return $therapists;
    }
    
}
?>
