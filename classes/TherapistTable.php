<?php
class TherapistTable
{
    private $db;
    private $table = 'therapists';

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function insertTherapist($fullName, $specialization, $price, $rating, $city, $bio, $gender, $phone, $username, $email, $password, $age, $profile)
    {
        $query = "INSERT INTO $this->table (FullName, Specialization, Price, Rating, City, Bio, Gender, Phone, Username, Email, Password, Age, Profile) 
                  VALUES ('$fullName', '$specialization', '$price', '$rating', '$city', '$bio', '$gender', '$phone', '$username', '$email', '$password', '$age', '$profile')";
         $stmt = $this->db->executeQuery($query);
         return $stmt !== false;
    }


    public function updateTherapist($edit_therapistId, $edit_fullName, $edit_specialization, $edit_price, $edit_rating, $edit_city, $edit_bio, $edit_gender, $edit_phone, $edit_username, $edit_email, $edit_password, $edit_age, $edit_profile)
{
    $edit_query = "UPDATE $this->table SET 
              FullName = '$edit_fullName', Specialization = '$edit_specialization', Price = $edit_price, Rating = $edit_rating, City = '$edit_city',
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
    public function getTherapists()
    {
        $query = "SELECT * FROM $this->table ";
        $stmt = $this->db->executeQuery($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
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