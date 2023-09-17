<?php
include("../classes/Database.php");
include("../classes/AdminTable.php");

// Check if the updateAdmin POST request was submitted
if (isset($_POST['updateAdmin'])) {
    // Get the form data
    $adminId = $_POST['edit_AdminId'];
    $fullName = $_POST['edit_fullName'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    // Create a new Database instance
    $database = new Database();

    // Create a new AdminTable instance
    $admins = new AdminTable($database);

    // Update the admin record in the database
    $updated = $admins->updateAdmin($adminId, $fullName, $username, $email, $password);

    if ($updated) {
        // Update successful, you can redirect or show a success message
        header("Location: Admins.php");
        exit;
    } else {
        // Update failed, handle the error (e.g., display an error message)
        echo "Failed to update the admin. Please try again.";
    }
} else {
    // Handle the case when the form was not submitted (e.g., direct access to updateAdmin.php)
    // You might want to redirect the user or show an error message
    header("Location: index.php");
    exit;
}
?>

