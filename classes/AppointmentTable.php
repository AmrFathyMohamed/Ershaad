<?php
class AppointmentTable
{
    private $db;
    private $table = 'appointments';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function insertAppointment($date, $time, $type,$TherapistID)
    {
        $query = "INSERT INTO $this->table (Date, Time, Type,TherapistID, is_deleted, created_at, updated_at) 
        VALUES ('$date', '$time', '$type',$TherapistID, 0, NOW(), NOW())";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function updateAppointment($appointmentID, $date, $time, $type)
    {
        $query = "UPDATE $this->table SET 
                  Date = '$date', Time = '$time', Type = '$type', updated_at = NOW()
                  WHERE AppointmentID = $appointmentID";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function deleteAppointment($appointmentID)
    {
        $query = "DELETE FROM $this->table WHERE AppointmentID = $appointmentID";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }

    public function getAppointments()
    {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function getAppointmentById($appointmentID)
    {
        $query = "SELECT * FROM $this->table WHERE AppointmentID = $appointmentID";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_assoc();
    }
    public function getAppointmentsByTherapist($TherapistID)
    {
        $query = "SELECT * FROM $this->table WHERE TherapistID = $TherapistID";
        $stmt = $this->db->executeQuery($query);
        if ($stmt !== false) {
            return $stmt->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
}
?>
