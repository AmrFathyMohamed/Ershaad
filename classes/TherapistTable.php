<?php
class TherapistTable
{
    private $db;
    private $table = 'therapists';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function insertTherapist($fullName, $specialization, $price, $percentage, $priceAfterPercentage, $rating, $city, $bio, $gender, $phone, $username, $email, $password, $age, $profile)
    {
        $query = "INSERT INTO $this->table (FullName, Specialization, Price,Percentage,PriceAfterPercentage, Rating, City, Bio, Gender, Phone, Username, Email, Password, Age, Profile, is_deleted, created_at, updated_at)  
                  VALUES ('$fullName', '$specialization', '$price','$percentage','$priceAfterPercentage','$rating', '$city', '$bio', '$gender', '$phone', '$username', '$email', '$password', '$age', '$profile',0,NOW(),NOW())";

        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }


    public function updateTherapist($edit_therapistId, $edit_fullName, $edit_specialization, $edit_price, $edit_percentage, $editpriceAfterPercentage, $edit_rating, $edit_city, $edit_bio, $edit_phone, $edit_username, $edit_email, $edit_password, $edit_age, $edit_profile)
    {
        $edit_query = "UPDATE $this->table SET 
              FullName = '$edit_fullName', Specialization = '$edit_specialization', Price = $edit_price, Percentage = $edit_percentage,PriceAfterPercentage =$editpriceAfterPercentage, Rating = $edit_rating, City = '$edit_city',
              Bio = '$edit_bio', Phone = '$edit_phone', Username = '$edit_username', Email = '$edit_email',updated_at = NOW(),
              Password = '$edit_password', Age = $edit_age, Profile = '$edit_profile' 
              WHERE TherapistID = $edit_therapistId";
        $stmt = $this->db->executeQuery($edit_query);

        if ($stmt !== false) {
            // Update successful
            return true;
        } else {
            // Update failed
            return false;
        }
    }

    public function updateTherapistWithoutImage($edit_therapistId, $edit_fullName, $edit_specialization, $edit_price, $edit_percentage, $editpriceAfterPercentage, $edit_rating, $edit_city, $edit_bio, $edit_phone, $edit_username, $edit_email, $edit_password, $edit_age)
    {
        $edit_query = "UPDATE $this->table SET 
              FullName = '$edit_fullName', Specialization = '$edit_specialization', Price = $edit_price, Percentage = $edit_percentage,PriceAfterPercentage =$editpriceAfterPercentage, Rating = $edit_rating, City = '$edit_city',
              Bio = '$edit_bio', Phone = '$edit_phone', Username = '$edit_username', Email = '$edit_email',updated_at = NOW(),
              Password = '$edit_password', Age = $edit_age
              WHERE TherapistID = $edit_therapistId";

        $stmt = $this->db->executeQuery($edit_query);

        if ($stmt !== false) {
            // Update successful
            return true;
        } else {
            // Update failed
            return false;
        }
    }
    public function deleteTherapist($therapistId)
    {
        $query1 = "DELETE FROM sessions WHERE TherapistID = $therapistId";
        $stmt1 = $this->db->executeQuery($query1);
        if ($stmt1 === false) {
            return false;
        }
        $query2 = "DELETE FROM course_therapist WHERE TherapistID = $therapistId";
        $stmt2 = $this->db->executeQuery($query2);
        if ($stmt2 === false) {
            return false;
        }
        
        $query2 = "DELETE FROM course_client WHERE TherapistID = $therapistId";
        $stmt2 = $this->db->executeQuery($query2);
        if ($stmt2 === false) {
            return false;
        }
        $query3 = "DELETE FROM documents WHERE TherapistID = $therapistId";
        $stmt3 = $this->db->executeQuery($query3);
        if ($stmt3 === false) {
            return false;
        }
        $query4 = "DELETE FROM appointments WHERE TherapistID = $therapistId";
        $stmt4 = $this->db->executeQuery($query4);
        if ($stmt4 === false) {
            return false;
        }
        $query5 = "DELETE FROM chats WHERE TherapistID = $therapistId";
        $stmt5 = $this->db->executeQuery($query5);
        if ($stmt5 === false) {
            return false;
        }
        $query6 = "DELETE FROM $this->table WHERE TherapistID = $therapistId";
        $stmt6 = $this->db->executeQuery($query6);
        return $stmt6 !== false;
    }


    public function getTherapistById($therapistId)
    {
        $query = "SELECT * FROM $this->table WHERE TherapistID = $therapistId";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_assoc();
    }
    public function getDataByTherapistIdAccepted($therapistId, $tableName)
    {
        $query = "SELECT * FROM $tableName WHERE TherapistID = $therapistId And Status = 'Accepted' AND UserRate is not NULL ORDER BY UserRate DESC";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    public function getDataByTherapistId($therapistId, $tableName)
    {
        if ($tableName == "documents") {
            $query = "SELECT * FROM $tableName WHERE TherapistID = $therapistId ORDER BY DocumentDate DESC";
        } else if ($tableName == "course_therapist") {
            $query = "SELECT c.* ,ct.Status FROM courses AS c INNER JOIN $tableName AS ct ON c.CourseID = ct.CourseID WHERE ct.TherapistID = $therapistId";
        } else if ($tableName == "soon") {
            $query = "SELECT c.* ,ct.Status FROM courses AS c INNER JOIN course_therapist AS ct ON c.CourseID = ct.CourseID WHERE ct.TherapistID = $therapistId And Status = 'Accepted'";
        } else {
            $query = "SELECT * FROM $tableName WHERE TherapistID = $therapistId";
        }
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    public function getTherapists()
    {
        $query = "SELECT * FROM $this->table  Where TherapistID > 1000 ORDER BY Rating DESC";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    public function getTherapistsBySpecialization($SpecialtyID)
    {
        $query = "SELECT * FROM $this->table where Specialization = (SELECT Specialty FROM specialties where SpecialtyID = $SpecialtyID)  and TherapistID > 1000 ORDER BY Rating DESC";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    public function getRandomTopRatedTherapists($count)
    {
        $query = "SELECT * FROM $this->table Where TherapistID > 1000 ORDER BY RAND() LIMIT $count ";
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


    public function searchTherapistsWithSessionCount($therapistName, $specialty, $fromDate, $toDate)
    {
        $sql = "SELECT T.*, COUNT(S.SessionID) AS SessionCount
            FROM therapists T
            LEFT JOIN sessions S ON T.TherapistID = S.TherapistID
            Where T.TherapistID > 1000";

        if ($therapistName !== 'All') {
            $sql .= " AND T.FullName LIKE '%$therapistName%'";
        }

        if ($specialty !== 'All') {
            $sql .= " AND T.Specialization = '$specialty'";
        }

        if (!empty($fromDate) && !empty($toDate)) {
            $sql .= " AND S.Date BETWEEN '$fromDate' AND '$toDate'";
        }

        $sql .= "AND Status = 'Accepted' GROUP BY T.TherapistID";

        $stmt = $this->db->executeQuery($sql);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

}
?>