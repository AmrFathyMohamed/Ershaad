<?php
// Include necessary files and initialize the database connection
include("../classes/Database.php");
include("../classes/SessionTable.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if session_id, session_date, and session_time are set
    if (isset($_POST["session_id"]) && isset($_POST["session_date"]) && isset($_POST["session_time"])) {
        // Get the values from the form
        $sessionId = $_POST["session_id"];
        $sessionDate = $_POST["session_date"];
        $sessionTime = $_POST["session_time"];

        // Create a Database object and a SessionTable object
        $database = new Database();
        $sessionTable = new SessionTable($database);

        // Update the session in the database
        $updated = $sessionTable->updateSessionDT($sessionId, $sessionDate, $sessionTime);

        if ($updated) {
            // Session updated successfully, you can show a success message or redirect
            header("Location: Sessions.php");
            exit;
        } else {
            // Handle the case where the update failed (e.g., display an error message)
            echo "Error updating the session.";
        }
    } else {
        // Handle the case where the required fields are not set (e.g., display an error message)
        echo "Missing data in the form.";
    }
} else {
    // Handle the case where the form was not submitted (e.g., redirect to the original page)
    header("Location: CoursesRequestsAccepted.php");
    exit;
}
?>
