<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the Database class
    require_once 'classes/Database.php';
    require_once 'classes/ClientTable.php';
    $db = new Database();
    $client = new ClientTable($db);
    $clientId = $_SESSION['user_id'];
    $Password = $_POST['oldpass'];
    $NewPassword = $_POST['newpass'];
    $NewPasswordConfirm = $_POST['newpasscon'];
    // Create an instance of the Database class
    
    // Attempt to log in the user
    if($NewPassword == $NewPasswordConfirm){
$user = $client->updateClientDatePassword($clientId,$Password,$NewPassword);

    if ($user) {
        // Registration successful
        //$user2 = $db->login($Email, $Password);

        // if ($user2) {
            // Login successful
            header("Location: index.php");
            exit;
        // }
    } else {
        // Login failed
        // Set an error message and redirect back to the login page
        $_SESSION['loginError'] = "Invalid login credentials. Please try again.";
        header("Location: login.php");
        exit;
    }
    }else{
        echo'<script>alert("كلمتى السر غير متطابقتين او  كلمة المرور القديمة غير صحيحة");window.location.href = "index.php";</script>';

    }
    
} else {
    // If the form was not submitted via POST, redirect to the login page
    header("Location: login.php");
    exit;
}
?>