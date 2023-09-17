<?php
// Include your database configuration and classes here
include("../classes/Database.php");
include("../classes/TherapistTable.php");

// Check if the 'TherapistID' parameter is set in the URL
if (isset($_GET['TherapistID'])) {
    // Get the 'TherapistID' value from the URL
    $therapistId = $_GET['TherapistID'];

    // Create a Database object and TherapistTable object
    $database = new Database();
    $therapists = new TherapistTable($database);

    // Attempt to delete the therapist record
    if ($therapists->deleteTherapist($therapistId)) {
        // Deletion successful, you can redirect or show a success message
        echo json_encode(array('success' => true));
        exit;
    } else {
        // Deletion failed, handle the error
        echo json_encode(array('success' => false, 'message' => 'Failed to delete therapist.'));
        exit;
    }
} else {
    // Handle the case when 'TherapistID' is not present in the URL
    echo json_encode(array('success' => false, 'message' => 'TherapistID not provided.'));
    exit;
}
?>