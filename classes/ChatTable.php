<?php
class ChatTable
{
    private $db;
    private $table = 'chats';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function insertChat($UserID, $TherapistID, $Message)
    {
        if ($_SESSION['type'] == 'therapist') {
            $query = "INSERT INTO $this->table (UserID, TherapistID, Message,Sender, created_at) 
                  VALUES ($UserID, $TherapistID, '$Message','Therapist', NOW())";
        } else if ($_SESSION['type'] == 'client') {
            $query = "INSERT INTO $this->table (UserID, TherapistID, Message,Sender, created_at) 
                  VALUES ($UserID, $TherapistID, '$Message','Client', NOW())";
        }
        
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function getChatsBetweenUsers($UserID, $TherapistID)
    {
        $query = "SELECT * FROM $this->table
                  WHERE (UserID = $UserID AND TherapistID = $TherapistID)
                  ORDER BY created_at ASC";

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
        // $query = "SELECT u.ClientID,u.FullName, c.Message, c.created_at AS LastMessageTime
        // FROM (
        //     SELECT UserID, MAX(created_at) AS LastMessageTime
        //     FROM chats
        //     WHERE TherapistID = $TherapistID
        //     GROUP BY UserID
        // ) AS cu
        // JOIN clients AS u ON cu.UserID = u.ClientID
        // JOIN chats AS c ON cu.UserID = c.UserID AND cu.LastMessageTime = c.created_at
        // ORDER BY cu.LastMessageTime DESC";
        $query = "SELECT DISTINCT c.FullName ,ch.created_at AS LastMessageTime,
                    c.*,ch.TherapistID,ch.UserID,
                    IFNULL(ch.Message, '') AS LastMessage,
                    IFNULL(ch.Sender, '') AS LastMessageSender
                    FROM clients c
                    LEFT JOIN
                    (SELECT UserID,
                            MAX(created_at) AS LastMessageDate
                        FROM chats
                        WHERE TherapistID = $TherapistID
                        AND is_deleted = 0
                        GROUP BY UserID) AS latest_chats ON c.ClientID = latest_chats.UserID
                    LEFT JOIN chats ch ON latest_chats.UserID = ch.UserID
                    AND latest_chats.LastMessageDate = ch.created_at
                    AND ch.TherapistID = $TherapistID
                    WHERE latest_chats.UserID IS NOT NULL
                    ORDER BY LastMessageDate DESC;";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    public function getAllChatsForUser($ClientID)
    {
        $query = "SELECT DISTINCT c.FullName ,ch.created_at AS LastMessageTime,
                    c.*,ch.TherapistID,ch.UserID,
                    IFNULL(ch.Message, '') AS LastMessage,
                    IFNULL(ch.Sender, '') AS LastMessageSender
                    FROM therapists c
                    LEFT JOIN
                    (SELECT TherapistID,
                            MAX(created_at) AS LastMessageDate
                        FROM chats
                        WHERE UserID = $ClientID
                        AND is_deleted = 0
                        GROUP BY TherapistID) AS latest_chats ON c.TherapistID = latest_chats.TherapistID
                    LEFT JOIN chats ch ON latest_chats.TherapistID = ch.TherapistID
                    AND latest_chats.LastMessageDate = ch.created_at
                    AND ch.UserID = $ClientID
                    WHERE latest_chats.TherapistID IS NOT NULL
                    ORDER BY LastMessageDate DESC;";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    // You can customize and extend this class based on your specific chat application needs
}
?>