<?php
// Include necessary files and initialize the database connection
include("../classes/Database.php");
include("../classes/AppointmentTable.php");

// Check if therapistID is provided via POST
if (isset($_POST['therapistID'])) {
    $therapistID = intval($_POST['therapistID']);

    // Create an instance of the AppointmentTable class
    $database = new Database();
    $appointmentTable = new AppointmentTable($database);

    // Fetch appointments for the specified therapist
    $appointments = $appointmentTable->getAppointmentsByTherapist($therapistID);


    if ($appointments) {
        $response = array();
        foreach ($appointments as $appointment) {
            // Add each appointment to the response array
            $response[] = array(
                'AppointmentID' => $appointment['AppointmentID'],
                'Date' => $appointment['Date'],
                'Time' => $appointment['Time'],
                'Type' => $appointment['Type']
            );
        }
    }

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($appointments);
} else {
    // Handle the case where therapistID is not provided
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(array('error' => 'Therapist ID is missing.'));
}
?>