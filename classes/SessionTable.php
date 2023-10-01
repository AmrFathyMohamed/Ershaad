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
    public function updateSessionDT($sessionID, $newDate, $newTime)
    {
        $query = "UPDATE $this->table SET Date = '$newDate', Time = '$newTime', updated_at = NOW() 
        WHERE SessionID = $sessionID";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }
    public function updateSessionRate($sessionid, $r , $c)
    {
        $query = "UPDATE $this->table SET UserOpinion = '$c',UserRate = $r, updated_at = NOW() 
        WHERE SessionID = $sessionid";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function getSessions()
    {
        $query = "SELECT s.*, c.FullName AS ClientName, t.FullName AS TherapistName
              FROM sessions s
              JOIN clients c ON s.UserID = c.ClientID
              JOIN therapists t ON s.TherapistID = t.TherapistID";

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
    public function getSessionSums()
    {
        $query = "SELECT SUM(A) AS TotalSumA, SUM(B) AS TotalSumB FROM ( SELECT TherapistID, FullName, TotalIncome, SessionCount, TotalIncome * SessionCount AS A, TotalOutcome * SessionCount AS B FROM ( SELECT t.TherapistID, t.FullName, SUM(t.PriceAfterPercentage) AS TotalIncome, COUNT(s.SessionID) AS SessionCount, SUM(t.PriceAfterPercentage - t.Price) AS TotalOutcome FROM therapists t JOIN sessions s ON t.TherapistID = s.TherapistID WHERE s.Status = 'Accepted' GROUP BY t.TherapistID, t.FullName ) AS SubqueryAlias ) AS SubqueryAlias2; ";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_assoc();

    }
    public function getSessionTotal()
    {
        // Define your SELECT query to fetch sessions for a therapist using $this->db->executeQuery
        $query = "SELECT
        COUNT(*) AS TotalSessions,
        SUM(CASE WHEN DATE(Date) = CURDATE() THEN 1 ELSE 0 END) AS TotalSessionsToday
    FROM
        sessions;
    ";
        $stmt = $this->db->executeQuery($query);

        return $stmt->fetch_assoc();

    }
}
?>