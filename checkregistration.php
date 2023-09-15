<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include the Database class
    require_once 'classes/Database.php';
    require_once 'classes/ClientTable.php';
    $db = new Database();
    $client = new ClientTable($db);
    // $field = $_POST['field'];
    // $value = $_POST['value'];
    // $stmt = $db->executeQuery("SELECT COUNT(*) FROM users WHERE $field = '$value'");  
    // // For this example, we'll simulate the result
    // $count = count($stmt->fetch_all(MYSQLI_ASSOC));
  
    // if ($count > 0) {
    //   echo 'taken';
    // } else {
    //   echo 'available';
    // }
  
    $FullName = $_POST['FullName'];
    $Username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $RePassword = $_POST['RePassword'];
    $Gender = $_POST['Gender'];
    $Age = $_POST['Age'];
    $City = $_POST['City'];
    $Phone = $_POST['Phone'];
    // Create an instance of the Database class
    
    // Attempt to log in the user
    if($Gender == 'no'){
        $Gender = "Male";
    }else{
        $Gender = "Female";
    }
    $user = $client->insertClient($FullName, $City, $Gender, $Phone, $Username, $Email, $Password, $Age);

    if ($user) {
        // Registration successful
        $user2 = $db->login($Email, $Password);

        if ($user2) {
            // Login successful
            header("Location: index.php");
            exit;
        }
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