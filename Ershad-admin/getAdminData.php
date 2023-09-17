<?php
include("../classes/Database.php");
include("../classes/AdminTable.php");

if (isset($_GET['adminId'])) {

    $adminId = $_GET['adminId'];
    $database = new Database();
    // Create an instance of your TherapistTable class
    $adminTable = new AdminTable($database);

    // Fetch therapist data by ID
    $adminData = $adminTable->getAdminById($adminId);

    // Send the data as JSON
    header('Content-Type: application/json');
    echo json_encode($adminData);
} else {
    echo json_encode(['error' => 'Invalid therapist ID']);
}
?>