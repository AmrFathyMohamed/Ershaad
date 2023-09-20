<?php
// Include necessary files and classes
include("layout.php");
include("../classes/Database.php");
include("../classes/ClientTable.php");

// Check if the user is logged in as an admin
if (!isset($_SESSION['user_id'])) {
    // You can return an error response if needed
    $response = array("success" => false, "message" => "Unauthorized access.");
    echo json_encode($response);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get data from the AJAX request
    $clientId = $_POST['id'];
    $action = $_POST['action'];

    // Create a database connection and ClientTable instance
    $database = new Database();
    $clientsTable = new ClientTable($database);

    // Update the status in the database
    if ($clientsTable->updateCourseRequestStatus($clientId, $action)) {
        $response = array("success" => true, "message" => "Status updated successfully.");
    } else {
        $response = array("success" => false, "message" => "Failed to update status.");
    }

    // Return a JSON response to the AJAX request
    echo json_encode($response);
} else {
    // Handle other HTTP methods if needed
    $response = array("success" => false, "message" => "Invalid request method.");
    echo json_encode($response);
}
