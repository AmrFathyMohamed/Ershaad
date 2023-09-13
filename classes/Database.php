<?php
class Database
{
    private $host = "localhost";
    private $username = "root"; //"id21106103_ershad"
    private $password = ""; //"Ershad2023@@"
    private $database = "ershaad"; //"id21106103_ershad"
    private $conn;

    // Add a property to store the error message
    private $errorMessage = "";

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } else {
            $query = "UPDATE therapists AS t
            JOIN (
                SELECT TherapistID, AVG(UserRate) AS AvgRating
                FROM sessions WHERE Status = 'Accepted' AND UserRate IS NOT NULL GROUP BY TherapistID
            ) AS avg_ratings ON t.TherapistID = avg_ratings.TherapistID SET t.Rating = avg_ratings.AvgRating;";
            $this->executeQuery($query);
        }
    }
    public function executeQuery($query)
    {
        $result = mysqli_query($this->conn, $query);

        if ($result === false) {
            // Handle query execution error
            $this->errorMessage = $this->conn->error;
            return false;
        }

        return $result;
    }

    public function login($usernameOrEmail, $password)
    {
        // Prepare the query for therapists
        $therapistQuery = "SELECT * FROM therapists WHERE Email = '" . $usernameOrEmail . "' AND Password = '" . $password . "'";

        // Prepare the query for clients
        $clientQuery = "SELECT * FROM clients WHERE Email = '" . $usernameOrEmail . "' AND Password = '" . $password . "'";

        // Prepare the query for admins
        $adminQuery = "SELECT * FROM admins WHERE Email = '" . $usernameOrEmail . "' AND Password = '" . $password . "'";

        $therapistResult = mysqli_query($this->conn, $therapistQuery);
        if ($therapistResult) {
            if ($therapistResult->num_rows == 1) {
                $user = mysqli_fetch_assoc($therapistResult);
                $_SESSION['user_id'] = $user['TherapistID'];
                $_SESSION['username'] = $user['Username'];
                $_SESSION['fullname'] = $user['FullName'];
                $_SESSION['type'] = 'therapist';
                return $user;
            }
        }

        $clientResult = mysqli_query($this->conn, $clientQuery);
        if ($clientResult) {
            if ($clientResult->num_rows == 1) {
                $user = mysqli_fetch_assoc($clientResult);
                $_SESSION['user_id'] = $user['ClientID'];
                $_SESSION['username'] = $user['Username'];
                $_SESSION['fullname'] = $user['FullName'];
                $_SESSION['type'] = 'client';
                return $user;
            }
        }

        $adminResult = mysqli_query($this->conn, $adminQuery);
        if ($adminResult) {
            if ($adminResult->num_rows == 1) {
                $user = mysqli_fetch_assoc($adminResult);
                $_SESSION['user_id'] = $user['AdminID'];
                $_SESSION['username'] = $user['Username'];
                $_SESSION['fullname'] = $user['FullName'];
                $_SESSION['type'] = 'admin';
                return $user;
            }
        }
        return false;
    }


    public function getErrorMessage()
    {
        // Return the stored error message
        return $this->errorMessage;
    }
    public function closeConnection()
    {
        $this->conn->close();
    }

}

?>