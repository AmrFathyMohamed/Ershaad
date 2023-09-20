<?php
class SessionTable
{
    private $db;
    private $table = 'sessions';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function insertSession($UserID, $TherapistID, $Date, $Time, $Type, $Status)
    {
        // Define your SQL query to insert a new session record
        $query = "INSERT INTO sessions (UserID, TherapistID, Date, Time, Type, Status, created_at, updated_at)
              VALUES ('$UserID', '$TherapistID', '$Date', '$Time', '$Type', '$Status', NOW(), NOW())";

        // Execute the SQL query
        $stmt = $this->db->executeQuery($query);

        // Check if the insertion was successful
        if ($stmt !== false) {
            return true; // Return true to indicate success
        } else {
            return false; // Return false to indicate failure
        }
    }


    public function updateSession($courseClientId, $status)
    {
        $query = "UPDATE $this->table SET Status = '$status', updated_at = NOW() 
        WHERE SessionID = $courseClientId";
        
$stmt = $this->db->executeQuery($query);
return $stmt !== false;
    }

    public function deleteSession($SessionId)
    {

    }

    public function getSessions()
    {
        $query = "SELECT * FROM $this->table ";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function getSessionstherapist($id)
    {
        // Define your SELECT query to fetch sessions for a therapist using $this->db->executeQuery
        $query = "SELECT s.*, u.FullName FROM $this->table s
        -- JOIN therapists t ON s.TherapistID = t.TherapistID
        JOIN clients u ON s.UserID = u.ClientID WHERE TherapistID = $id and Type != 'Courses' And Status = 'Accepted'";
        $data = [$id];
        $stmt = $this->db->executeQuery($query);

        if ($stmt !== false) {
            return $stmt->fetch_all(MYSQLI_ASSOC);
        } else {
            return []; // Return an empty array if no sessions are found
        }
    }
    public function getSessionsclient($id)
    {
        // Define your SELECT query to fetch sessions for a therapist using $this->db->executeQuery
        $query = "SELECT s.*, u.FullName FROM $this->table s
        -- JOIN therapists t ON s.TherapistID = t.TherapistID
        JOIN therapists u ON s.TherapistID = u.TherapistID WHERE UserID = $id and Type != 'Courses' And Status = 'Accepted'";
        //$data = [$id];
        $stmt = $this->db->executeQuery($query);

        if ($stmt !== false) {
            return $stmt->fetch_all(MYSQLI_ASSOC);
        } else {
            return []; // Return an empty array if no sessions are found
        }
    }

}
?>