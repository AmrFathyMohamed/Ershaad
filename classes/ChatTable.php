<!-- SELECT DISTINCT u.FullName
FROM clients AS u
JOIN (
    SELECT UserID
    FROM chats
    WHERE TherapistID = 100
) AS cu
ON u.ClientID = cu.UserID
ORDER BY u.FullName; -->
<?php
class ChatTable
{
    private $db;
    private $table = 'chats';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function insertChat($data)
    {
        $query = "INSERT INTO $this->table (UserID, TherapistID, Message, created_at) 
                  VALUES (?, ?, ?, NOW())";
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function getChatsBetweenUsers($userID1, $userID2)
    {
        $query = "SELECT * FROM $this->table
                  WHERE (UserID = ? AND TherapistID = ?) OR (UserID = ? AND TherapistID = ?)
                  ORDER BY created_at ASC";
        $data = [$userID1, $userID2, $userID2, $userID1];
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function getChatByChatID($chatID)
    {
        $query = "SELECT * FROM $this->table WHERE ChatID = ?";
        $data = [$chatID];
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_assoc();
    }

    public function deleteChat($chatID)
    {
        $query = "DELETE FROM $this->table WHERE ChatID = ?";
        $data = [$chatID];
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    // Additional methods for chat operations can be added here

    // For example, you can add a method to retrieve all chats for a specific user:
    public function getChatsForUser($UserID)
    {
        $query = "SELECT * FROM $this->table WHERE UserID = $UserID ORDER BY created_at ASC";

        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    // For example, you can add a method to retrieve all chats for a specific Therapist:
    public function getChatsForTherapist($TherapistID)
    {
        $query = "SELECT * FROM $this->table WHERE TherapistID = $TherapistID ORDER BY created_at ASC";

        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    public function getAllChatsForTherapist($TherapistID)
    {
        $query = "SELECT u.FullName, c.Message, c.created_at AS LastMessageTime
        FROM (
            SELECT UserID, MAX(created_at) AS LastMessageTime
            FROM chats
            WHERE TherapistID = $TherapistID
            GROUP BY UserID
        ) AS cu
        JOIN clients AS u ON cu.UserID = u.ClientID
        JOIN chats AS c ON cu.UserID = c.UserID AND cu.LastMessageTime = c.created_at
        ORDER BY cu.LastMessageTime DESC";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    public function getAllChatsForUser($ClientID)
    {
        $query = "SELECT DISTINCT u.FullName
        FROM therapists AS u
        JOIN (
            SELECT TherapistID
            FROM chats
            WHERE UserID = $ClientID
        ) AS cu
        ON u.TherapistID = cu.TherapistID
        ORDER BY u.FullName";

        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    // You can customize and extend this class based on your specific chat application needs
}
?>