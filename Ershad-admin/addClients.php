<?php
include("../classes/Database.php");
include("../classes/ClinetTable.php");

// Check if the updateclinet POST request was submitted
if (isset($_POST['updateclinet'])) {
    // Get the form data
    $clinetId = $_POST['edit_clinetId'];
    $fullName = $_POST['edit_fullName'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    // Create a new Database instance
    $database = new Database();

    // Create a new clinetTable instance
    $clinets = new ClientTable($database);

    // Update the clinet record in the database
    $updated = $clinets->updateClient($clinetId, $fullName, $username, $email, $password);

    if ($updated) {
        // Update successful, you can redirect or show a success message
        header("Location: clinets.php");
        exit;
    } else {
        // Update failed, handle the error (e.g., display an error message)
        echo "Failed to update the clinet. Please try again.";
    }
} else {
    // Handle the case when the form was not submitted (e.g., direct access to updateclinet.php)
    // You might want to redirect the user or show an error message
    header("Location: index.php");
    exit;
}
?>