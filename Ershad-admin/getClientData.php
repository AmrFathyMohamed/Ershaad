<?php
include("../classes/Database.php");
include("../classes/ClientTable.php");

if (isset($_GET['ClientId'])) {

    $ClientId = $_GET['ClientId'];
    $database = new Database();
    // Create an instance of your TherapistTable class
    $ClientTable = new ClientTable($database);

    // Fetch therapist data by ID
    $ClientData = $ClientTable->getClientById($ClientId);

    // Send the data as JSON
    header('Content-Type: application/json');
    echo json_encode($ClientData);
} else {
    echo json_encode(['error' => 'Invalid therapist ID']);
}
?>