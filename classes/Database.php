<?php
class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "ershaad";
    private $conn;

    // Add a property to store the error message
    private $errorMessage = "";

    public function __construct()
    {
        // Try connecting with root and empty password
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        // Check if the connection was successful
        if ($this->conn->connect_error) {
            // If the first connection attempt failed, try with specific credentials
            $this->conn = new mysqli($this->host, "id21106103_ershad", "Ershad2023@@", "id21106103_ershad");

            // Check if the second connection attempt also failed
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
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