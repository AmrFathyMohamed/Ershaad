<?php
include("../classes/Database.php");
include("../classes/TherapistTable.php");

if (isset($_GET['therapistId'])) {
    
    $therapistId = $_GET['therapistId'];
    $database = new Database();
    // Create an instance of your TherapistTable class
    $therapistTable = new TherapistTable($database);

    // Fetch therapist data by ID
    $therapistData = $therapistTable->getTherapistById($therapistId);

    // Send the data as JSON
    header('Content-Type: application/json');
    echo json_encode($therapistData);
} else {
    echo json_encode(['error' => 'Invalid therapist ID']);
}
?>
