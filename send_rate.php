<?php session_start(); ?>
<?php include("classes/Database.php"); ?>
<?php include("classes/SessionTable.php"); ?>
<?php
// Assuming you have a function to insert messages into the database
// Replace 'insertMessage' with your actual function name
if (isset($_SESSION['user_id'])) {
    // Get the 'id' value from the URL
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $Rates = new SessionTable($database);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $SessionID = $_POST['SessionID']; // Get TherapistID from the session
        $Comment = $_POST['Comment'];
        $Rate = $_POST['Rate'];
        
        // Insert the message into the database
        $db = new Database();
        //echo $UserID.$TherapistID.$Message;
        $result = $Rates->updateSessionRate($SessionID, $Rate, $Comment);

        if ($result) {
            header("Location: my profile.php");
            exit;
        } else {
            // Handle the case where the message insertion failed
            echo json_encode(array('error' => 'Message insertion failed'));
        }
    }
} else {
    header("Location: index.php");
    exit;
}
?>