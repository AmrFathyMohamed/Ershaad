<?php
include("classes/Database.php"); // Include your database connection class

// Check if the required parameters are set
if (isset($_POST['date'], $_POST['time'], $_POST['therapistId'], $_POST['status'],$_POST["uid"],$_POST["type"])) {
    // Sanitize and validate user input
    $selectedDate = $_POST['date'];
    $selectedTime = $_POST['time'];
    $therapistId = $_POST['therapistId'];
    $status = $_POST['status'];
    $Uid = $_POST["uid"];
    $Type = $_POST["type"];


    // Initialize the database connection
    $database = new Database();
    // Prepare and execute a query to insert a new session
    $sql = "INSERT INTO sessions (date, time,UserID, TherapistID,Type, status) VALUES ('$selectedDate', '$selectedTime',$Uid, $therapistId,'$Type', '$status')";

    try {
        $stmt = $database->executeQuery($sql);
        if ($stmt) {
            if($Type == "Work"){
                echo "1";}
            else{
                echo "2";
            }
        } else {
            echo "Error inserting session";
        }
        
    } catch (Exception $e) {
        echo 'Database error: ' . $e->getMessage();
    }
} else {
    echo 'Invalid input.';
}
?>
