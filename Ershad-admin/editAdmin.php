<?php
// Include necessary files and classes
include("../classes/Database.php");
include("../classes/AdminTable.php");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create a database connection
    $database = new Database();

    // Create an instance of the AdminTable class
    $Admins = new AdminTable($database);

    // Retrieve data from the form
    $adminId = $_POST['edit_AdminId'];
    $adminFullName = $_POST['edit_fullName'];
    $adminUsername = $_POST['edit_username'];
    $adminEmail = $_POST['edit_email'];
    $adminPassword = $_POST['edit_password'];

    // Update the admin's information
    if ($Admins->updateAdmin($adminId, $adminFullName, $adminUsername, $adminEmail, $adminPassword)) {
        // Update successful, you can redirect or show a success message
        echo json_encode(["success" => true, "message" => "Admin updated successfully"]);
        exit;
    } else {
        // Update failed, handle the error
        echo json_encode(["success" => false, "message" => "Failed to update Admin"]);
        exit;
    }
} else {
    // Handle the case when the form is not submitted
    echo json_encode(["success" => false, "message" => "Form not submitted"]);
    exit;
}
?>