<?php
include("../classes/Database.php");
include("../classes/ClientTable.php");

if (isset($_GET['id'])) {
    $database = new Database();
    $clients = new ClientTable($database);

    $clientId = $_GET['id'];

    if ($clients->deleteClient($clientId)) {
        // Client deleted successfully
        $response = array('success' => true);
    } else {
        // Client deletion failed
        $response = array('success' => false);
    }

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>