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
        $currentLocalTime = new DateTime('now', new DateTimeZone('Asia/Amman'));
        $t = $currentLocalTime->format("Y-m-d H:i");
        if ($_SESSION['type'] == 'therapist' || $_SESSION['type'] == 'admin') {
            $query = "INSERT INTO $this->table (UserID, TherapistID, Message,Sender, created_at,updated_at) 
                  VALUES ($UserID, $TherapistID, '$Message','Therapist', '$t','$t')";
        } else if ($_SESSION['type'] == 'client') {
            $query = "INSERT INTO $this->table (UserID, TherapistID, Message,Sender, created_at,updated_at) 
                  VALUES ($UserID, $TherapistID, '$Message','Client', '$t','$t')";
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
    public function getChatsCheck($UserID, $TherapistID)
    {
        $currentLocalTime = new DateTime('now', new DateTimeZone('Asia/Amman'));
        $t = $currentLocalTime->format("Y-m-d H:i:s");
        $query = "SELECT COUNT(*) AS sessionCount
              FROM sessions
              WHERE UserID = $UserID 
                AND TherapistID = $TherapistID
                AND DATE_FORMAT(CONCAT(Date, ' ', Time - INTERVAL 5 MINUTE), '%Y-%m-%d %H:%i:%s') <= '$t'
                AND DATE_FORMAT(CONCAT(Date, ' ', Time + INTERVAL 1 HOUR), '%Y-%m-%d %H:%i:%s') >= '$t'
                AND Status = 'Accepted'";

        $stmt = $this->db->executeQuery($query);
        $row = $stmt->fetch_all(MYSQLI_ASSOC);

        if ($row[0]['sessionCount'] > 0) {
            return 1;
        } else {
            return 0;
        }
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
        //echo $query;
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
        //echo $query;
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    // You can customize and extend this class based on your specific chat application needs
}
?>