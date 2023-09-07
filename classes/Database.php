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
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }else{
            echo 'Sucss';
        }
    }

    public function executeQuery($query)
    {
        $result = $this->conn->query($query);

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
        $therapistQuery = "SELECT * FROM therapists WHERE 'Email' = '".$usernameOrEmail."' AND 'Password' = '".$password."'";

        // Prepare the query for clients
        $clientQuery = "SELECT * FROM clients WHERE 'Email' = '".$usernameOrEmail."' AND 'Password' = '".$password."'";

        // Execute the therapist query
        $therapistResult = $this->executeQuery($therapistQuery);

        if ($therapistResult) {
            // Check if a therapist with the provided credentials exists
            if ($therapistResult->num_rows == 1) {
                $user = $therapistResult->fetch_all(PDO::FETCH_ASSOC);
                $_SESSION['user_id'] = $user['TherapistID']; // Adjust for therapist/client
                $_SESSION['username'] = $user['Username'];
                return $user;
            }
        }

        // Execute the client query
        $clientResult = $this->executeQuery($clientQuery);

        if ($clientResult) {
            // Check if a client with the provided credentials exists
            if ($clientResult->num_rows == 1) {
                $user = $clientResult->fetch_all(PDO::FETCH_ASSOC);
                $_SESSION['user_id'] = $user['ClientID']; // Adjust for therapist/client
                $_SESSION['username'] = $user['Username'];
                return $user;
            }
        }

        // User login failed
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