<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the Database class
    require_once 'classes/Database.php';
    require_once 'classes/ClientTable.php';

    // Retrieve the user inputs from the login form
    $to = $_POST['email'];
    $randomPassword = $_POST['randomPassword']; // Generate a random password
    // Create an instance of the Database class
    $db = new Database();

    // Attempt to log in the user
    $user = new ClientTable($db);

    if ($user->resetPassword($to,$randomPassword)) {
        // Login successful
        header("Location: index.php");
        exit;
    } else {
        // Login failed
        // Set an error message and redirect back to the login page
        $_SESSION['loginError'] = "Invalid Email . Please try again.";
        header("Location: login.php");
        exit;
    }
} else {
    // If the form was not submitted via POST, redirect to the login page
    header("Location: login.php");
    exit;
}
?>