<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the Database class
    require_once 'classes/Database.php';

    // Retrieve the user inputs from the login form
    $usernameOrEmail = $_POST['email'];
    $password = $_POST['password'];

    // Create an instance of the Database class
    $db = new Database();

    // Attempt to log in the user
    $user = $db->login($usernameOrEmail, $password);

    if ($user) {
        // Login successful
        // Redirect to the index page with session values
        $userId = $_SESSION['user_id'];
        $username = $_SESSION['username'];
        header("Location: index.php");
        exit;
    } else {
        // Login failed
        // Set an error message and redirect back to the login page
        $_SESSION['loginError'] = "Invalid login credentials. Please try again.";
        header("Location: login.php");
        exit;
    }
} else {
    // If the form was not submitted via POST, redirect to the login page
    header("Location: login.php");
    exit;
}
?>
