<?php session_start(); ?>
<?php include("classes/Database.php"); ?>
<?php include("classes/ChatTable.php"); ?>
<?php
// Assuming you have a function to insert messages into the database
// Replace 'insertMessage' with your actual function name
if (isset($_SESSION['user_id'])) {
    // Get the 'id' value from the URL
    $userId = $_SESSION['user_id'];
    $database = new Database();
    $chats = new ChatTable($database);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $UserID = $_POST['UserID'];
        $TherapistID = $_SESSION['user_id']; // Get TherapistID from the session
        $Message = $_POST['Message'];

        // Insert the message into the database
        $db = new Database();
        echo $UserID.$TherapistID.$Message;
        $result = $chats->insertChat($UserID, $TherapistID, $Message);

        if ($result) {
            // Message was inserted successfully
            $newMessageData = array(
                'TherapistID' => $TherapistID,
                'Message' => $Message
            );

            // Return the newly inserted message data as JSON
            echo json_encode($newMessageData);
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