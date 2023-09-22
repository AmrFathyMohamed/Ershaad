<?php
class Database
{
    private $host = "localhost";
    private $username = "root"; //"id21106103_ershad"
    private $password = ""; //"Ershad2023@@"
    private $database = "ershad"; //"id21106103_ershad"
    private $conn;
    // private $host = "localhost";
    // private $username = "id21106103_ershad";
    // private $password = "Ershad2023@@";
    // private $database = "id21106103_ershad";
    // private $conn;
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



    // function checkUser($data = array()){ 
    //     if(!empty($data)){ 
    //         // Check whether the user already exists in the database 
    //         $checkQuery = "SELECT * FROM  WHERE oauth_provider = '".$data['oauth_provider']."' AND oauth_uid = '".$data['oauth_uid']."'"; 
    //         $checkResult = $this->db->query($checkQuery); 
             
    //         // Add modified time to the data array 
    //         if(!array_key_exists('modified',$data)){ 
    //             $data['modified'] = date("Y-m-d H:i:s"); 
    //         } 
             
    //         if($checkResult->num_rows > 0){ 
    //             // Prepare column and value format 
    //             $colvalSet = ''; 
    //             $i = 0; 
    //             foreach($data as $key=>$val){ 
    //                 $pre = ($i > 0)?', ':''; 
    //                 $colvalSet .= $pre.$key."='".$this->db->real_escape_string($val)."'"; 
    //                 $i++; 
    //             } 
    //             $whereSql = " WHERE oauth_provider = '".$data['oauth_provider']."' AND oauth_uid = '".$data['oauth_uid']."'"; 
                 
    //             // Update user data in the database 
    //             $query = "UPDATE ".$this->userTbl." SET ".$colvalSet.$whereSql; 
    //             $update = $this->db->query($query); 
    //         }else{ 
    //             // Add created time to the data array 
    //             if(!array_key_exists('created',$data)){ 
    //                 $data['created'] = date("Y-m-d H:i:s"); 
    //             } 
                 
    //             // Prepare column and value format 
    //             $columns = $values = ''; 
    //             $i = 0; 
    //             foreach($data as $key=>$val){ 
    //                 $pre = ($i > 0)?', ':''; 
    //                 $columns .= $pre.$key; 
    //                 $values  .= $pre."'".$this->db->real_escape_string($val)."'"; 
    //                 $i++; 
    //             } 
                 
    //             // Insert user data in the database 
    //             $query = "INSERT INTO ".$this->userTbl." (".$columns.") VALUES (".$values.")"; 
    //             $insert = $this->db->query($query); 
    //         } 
             
    //         // Get user data from the database 
    //         $result = $this->db->query($checkQuery); 
    //         $userData = $result->fetch_assoc(); 
    //     } 
         
    //     // Return user data 
    //     return !empty($userData)?$userData:false; 
    // } 

}

?>