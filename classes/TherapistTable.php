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
        $query = "INSERT INTO $this->table (FullName, Specialization, Price,Percentage,PriceAfterPercentage Rating, City, Bio, Gender, Phone, Username, Email, Password, Age, Profile) 
                  VALUES ('$fullName', '$specialization', '$price','$percentage','$priceAfterPercentage','$rating', '$city', '$bio', '$gender', '$phone', '$username', '$email', '$password', '$age', '$profile')";
        $stmt = $this->db->executeQuery($query);
        return $stmt !== false;
    }


    public function updateTherapist($edit_therapistId, $edit_fullName, $edit_specialization, $edit_price, $edit_percentage, $editpriceAfterPercentage, $edit_rating, $edit_city, $edit_bio, $edit_gender, $edit_phone, $edit_username, $edit_email, $edit_password, $edit_age, $edit_profile)
    {
        $edit_query = "UPDATE $this->table SET 
              FullName = '$edit_fullName', Specialization = '$edit_specialization', Price = $edit_price, Percentage = $edit_percentage,PriceAfterPercentage =$editpriceAfterPercentage, Rating = $edit_rating, City = '$edit_city',
              Bio = '$edit_bio', Gender = '$edit_gender', Phone = '$edit_phone', Username = '$edit_username', Email = '$edit_email',
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
        } else {
            $query = "SELECT * FROM $tableName WHERE TherapistID = $therapistId";
        }
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    public function getTherapists()
    {
        $query = "SELECT * FROM $this->table ";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    public function getTherapistsBySpecialization($SpecialtyID)
    {
        $query = "SELECT * FROM $this->table where Specialization = (SELECT Specialty FROM specialties where SpecialtyID = $SpecialtyID) ORDER BY Rating DESC";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
    public function getRandomTopRatedTherapists($count)
    {
        $query = "SELECT * FROM $this->table ORDER BY RAND() LIMIT $count";
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