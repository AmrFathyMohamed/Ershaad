<?php
class SessionTable
{
    private $db;
    private $table = 'sessions';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function insertSession($data)
    {

    }

    public function updateSession($SessionId)
    {

    }

    public function deleteSession($SessionId)
    {

    }

    public function getSessionById($SessionId)
    {

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

}
?>